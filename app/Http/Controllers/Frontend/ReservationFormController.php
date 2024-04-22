<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\ReservationForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationFormRequest;

class ReservationFormController extends Controller
{
    public function create()
    {
        return view('booking');
    }

    public function room()
    {
        return view('room');
    }

    public function store(StoreReservationFormRequest $request)
    {
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


        return redirect()->back()->with('success', 'Reservation Form applied successfully.');
    }
}
