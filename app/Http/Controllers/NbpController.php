<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NbpController extends Controller
{
    public function index()
    {
        session()->flash('error', 'Wystąpił błąd');
        return view('welcome');
    }
}
