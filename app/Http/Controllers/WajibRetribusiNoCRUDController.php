<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WajibRetribusiNoCRUDController extends Controller
{
   public function index() {
    return view('wajibretribusi.laporan');
   }
   public function index1() {
    return view('wajibretribusi.cetaklaporan');
   }
}
