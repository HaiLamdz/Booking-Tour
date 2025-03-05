<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $booking;

    public function __construct()
    {
        $this->booking = new Booking();
    }

    public function index()
    {
        $bookings = $this->booking->getBooking();
        // dd($bookings);
        return view('admin.bookings.list', compact('bookings'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bookingTour = $this->booking->getBookingTour($id);
        // dd($bookingTour);
        return view('admin.bookings.update', compact('bookingTour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'booking_status' => 'nullable'
        ]);
        $booking = $this->booking::find($id);
        $booking->booking_status = $request->booking_status;

        toastr()->success('Cập Nhập Thành Công');
        $booking->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
