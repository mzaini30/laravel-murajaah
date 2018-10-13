<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murajaah;

class IniController extends Controller
{
    public function index(){
    	$data = Murajaah::orderBy('tanggal', 'desc')->paginate(30);
    	return view('beranda', compact('data'));
    }
    public function baru(){
    	return view('tambah baru');
    }
    public function edit($id){
    	$data = Murajaah::find($id);
    	return view('edit', compact('data'));
    }
}
