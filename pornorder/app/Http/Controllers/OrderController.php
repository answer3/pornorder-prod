<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * trending method
     *
     * @return Response
     */
    public function trending()
    {
        return view('order.trending');
    }
}

