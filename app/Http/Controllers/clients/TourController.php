<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clienrs\Tour;
use App\Models\clienrs\Category;


class TourController extends Controller
{
    private $tour;
    private $cate;

    public function __construct(){
        $this->tour = new Tour();
        $this->cate = new Category();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = $this->tour->getAllTour();
        $countByCate = $this->tour->getAllTourByCate();
        // dd($countByCate);

        return view('client.tour', compact('tours', 'countByCate'));
    }

    /**
     * Display the specified resource.
     */
    public function tourCate(string $id)
    {
        $tours = $this->tour->tourByCate($id);
        $category = $this->cate->cateById($id);
        $categories = $this->cate->getAllCategory();

        // dd($categories);
        return view('client.tour_cate', compact('tours', 'category', 'categories'));
    }
}
