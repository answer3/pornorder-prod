<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * trending method
     *
     * @return Response
     */
    public function index()
    {
        return view('video.index');
    }
}



