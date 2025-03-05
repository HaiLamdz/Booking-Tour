<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clienrs\Tour;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    private $tourDetail;

    public function __construct()
    {
        $this->tourDetail = new Tour();
    }

    public function index($id)
    {
        $tour = $this->tourDetail->getTourDetail($id);
        // dd($tour);
        return view('client.checkout', compact('tour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
