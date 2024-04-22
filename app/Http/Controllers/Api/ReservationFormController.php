<?php

namespace App\Http\Controllers\Api;

use Validator;
use Gate;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\ReservationForm;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ReservationFormResource;

class ReservationFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('form_access', auth()->user()), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservationForms = ReservationForm::get();

        return response()
            ->json([
                'data' => ReservationFormResource::collection($reservationForms),
                'status' => Response::HTTP_OK
            ]);
    }

    public function show(ReservationForm $reservationForm)
    {
        $reservationForm->load('rooms');
        return response()
            ->json([
                'data' => new ReservationFormResource($reservationForm),
                'status' => Response::HTTP_OK
            ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => "string|required",
            'last_name' => "string|required",
            'address' => "string|required",
            'zip_code' => "required",
            'city' => "string|required",
            'state' => "string|required",
            'email' => "email|required",
            'phone' => "string|required",
            'check_in_date' => "required|date_format:" . config('panel.date_format'),
            'check_out_date' => "required|date_format:" . config('panel.date_format'),
        ]);
        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()
                ], Response::HTTP_FORBIDDEN);
        }
        try {
            DB::beginTransaction();
            $reservationForm = ReservationForm::create($request->all());

            if ($request->rooms) {
                foreach ($request->rooms as $key => $room) {
                    Room::create([
                        'room_name' => 'Room ' . $key + 1 . ' Type',
                        'room_type' => $room,
                        'reservation_form_id' => $reservationForm->id,
                    ]);
                }
            }
            DB::commit();
            return response()
                ->json([
                    'data' => new ReservationFormResource($reservationForm),
                    'message' => 'Reservation Form applied successfully',
                    'status' => Response::HTTP_OK
                ], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()
                ->json([
                    'message' => 'Fail to apply',
                    'status' => 500
                ], 500);
        }
    }

    public function update(Request $request, ReservationForm $reservationForm)
    {
        abort_if(Gate::denies('form_edit', auth()->user()), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $validator = Validator::make($request->all(), [
            'first_name' => "string|required",
            'last_name' => "string|required",
            'address' => "string|required",
            'zip_code' => "required",
            'city' => "string|required",
            'state' => "string|required",
            'email' => "email|required",
            'phone' => "string|required",
            'check_in_date' => "required",
            'check_out_date' => "required",
        ]);
        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()
                ], Response::HTTP_FORBIDDEN);
        }
        try {
            DB::beginTransaction();
            $reservationForm->update($request->all());

            $reservationForm->rooms()->delete();
            if ($request->rooms) {
                for ($i = 0; $i < count($request->rooms['room_type']); $i++) {
                    Room::create([
                        'room_name' => 'Room ' . $i + 1 . ' Type',
                        'room_type' => $request->rooms['room_type'][$i],
                        'room_no'   => $request->rooms['room_no'][$i],
                        'reservation_form_id' => $reservationForm->id,
                    ]);
                }
            }
            DB::commit();
            return response()
                ->json([
                    'data' => new ReservationFormResource($reservationForm),
                    'message' => 'Reservation Form updated successfully',
                    'status' => Response::HTTP_OK
                ], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()
                ->json([
                    'message' => 'Fail to update',
                    'status' => 500
                ], 500);
        }
    }

    public function destroy(ReservationForm $reservationForm)
    {
        abort_if(Gate::denies('form_delete', auth()->user()), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $reservationForm->delete();
        return response()
            ->json([
                'message' => 'Form deleted successfully',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
    }
}
