<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IniController extends Controller
{
    public function index(){
    	$data = DB::table('murajaah')->orderBy('tanggal', 'desc')->paginate(30);
    	return view('beranda', compact('data'));
    }
}
