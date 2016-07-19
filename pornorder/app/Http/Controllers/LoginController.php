<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * trending method
     *
     * @return Response
     */
    public function index()
    {
        return view('login.index');
    }
}



