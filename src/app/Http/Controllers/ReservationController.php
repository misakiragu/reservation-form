<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shop_id' => 'required',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'reservation_number' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::create([
            'shop_id' => $validatedData['shop_id'],
            'reservation_date' => $validatedData['reservation_date'],
            'reservation_time' => $validatedData['reservation_time'],
            'reservation_number' => $validatedData['reservation_number'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('done');
    }
}
