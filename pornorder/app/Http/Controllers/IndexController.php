<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * index mathod
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }
}

