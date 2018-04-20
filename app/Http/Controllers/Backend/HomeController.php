<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        \Log::info('访问者IP'.$request->getClientIp());
        /*$user = Auth::user();
        return view('backend.home', compact('user'));*/
        return view('backend.home');
    }
}
