<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    /**
     * trending method
     *
     * @return Response
     */
    public function index()
    {
        return view('signup.index');
    }
}



