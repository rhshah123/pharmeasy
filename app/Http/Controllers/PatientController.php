<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addRecord(Request $request)
    {
        $this->validate($request, ['title'=>'required', 'body'=>'required']);
        return redirect()->route('home');
    }
}
