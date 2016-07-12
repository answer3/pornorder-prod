<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * index method
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }
}

