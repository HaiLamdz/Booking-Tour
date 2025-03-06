<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clienrs\Article;
use App\Models\clienrs\Category;
use App\Models\clienrs\Destiantion;
use Illuminate\Http\Request;
use App\Models\clienrs\Home;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $homeTour;
    private $destination;
    private $cate;
    private $new;

    public function __construct()
    {
        $this->destination = new Destiantion();
        $this->homeTour = new Home();
        $this->cate = new Category();
        $this->new = new Article();
    }

    public function index()
    {
        $title = 'Trang Chủ';
        $tours = $this->homeTour->gethomeTour();
        $destinations = $this->destination->getHomeDestination();
        $categories = $this->cate->getAllCategory();
        $news = $this->new->getHomeNew();

        // dd($tours);
        // foreach ($tours as $tour){
        // dd($tour->image);die();}
        return view('client.home', compact('tours', 'destinations', 'categories', 'news'));
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
