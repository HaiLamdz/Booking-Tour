<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clienrs\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $new;

    public function __construct()
    {
        $this->new = new Article();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = $this->new->getAllNew();
        return view('client.new', compact('news'));
    }



    public function new_detail(string $id)
    {
        $news = $this->new->getHomeNew();
        $new = $this->new->getDetailNew($id);
        return view('client.new_detail', compact('new', 'news'));
    }

    
}
