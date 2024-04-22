<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\ReservationForm;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreReservationFormRequest;
use App\Http\Requests\UpdateReservationFormRequest;

class ReservationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservationForms = ReservationForm::get();

        return view('admin.reservationForms.index', compact('reservationForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationFormRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservationForm  $reservationForm
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationForm $reservationForm)
    {
        $reservationForm->load('rooms');
        return view('admin.reservationForms.show', compact('reservationForm'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservationForm  $reservationForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationForm $reservationForm)
    {
        $reservationForm->load('rooms');
        return view('admin.reservationForms.edit', compact('reservationForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservationForm  $reservationForm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationFormRequest $request, ReservationForm $reservationForm)
    {
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

        return redirect()->route('admin.reservation-forms.index')->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationForm  $reservationForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationForm $reservationForm)
    {
        abort_if(Gate::denies('form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $reservationForm->delete();
        return redirect()->route('admin.reservation-forms.index')->with('success', 'Booking deleted successfully!');
    }
}
