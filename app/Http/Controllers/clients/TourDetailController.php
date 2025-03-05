<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clienrs\Account;
use App\Models\clienrs\Tour;
use Illuminate\Http\Request;

class TourDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $tourDetail;
    private $user;

    public function __construct()
    {
        $this->tourDetail = new Tour();
        $this->user = new Account();
    }

    public function index($id)
    {
        $email = session()->get('email');
        $user_id = $this->user->getUserId($email);
        $tourDetail = $this->tourDetail->getTourDetail($id);
        $getReview = $this->tourDetail->getReview($id);
        // dd($getReview);
        // check điều kiện để hiện form thêm đánh gía
        $hasCompletedTour = $this->tourDetail->hasCompletedTour($user_id, $id);
        $hasReviewed = $this->tourDetail->hasReviewed($user_id, $id);
        $can_review = $hasCompletedTour && !$hasReviewed;

        // dd($can_review);
        return view('client.tour_detail', compact('tourDetail', 'getReview', 'can_review'));
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
