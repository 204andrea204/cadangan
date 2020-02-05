<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Menu;

class MenuController extends Controller
{
    public function index()
    {
    	$d['menus'] = Menu::all();
    	return view("admin.menu.index", $d);
    }
    public function tambah()
    {
        return view('admin.menu.add');
    }

    public function add(Request $r){
    	$d = new Menu;
    	$d->nam_menu = $r->input("nama_menu");
    	$d->harga = $r->input("harga");
    	$d->status_menu = $r->input("status_menu");
    	if($r->file('gambar')){
            $file = $r->file('gambar');
            $filename = $file->getClientOriginalName();
            $r->file('gambar')->move("gambar/jurusan", $filename);
            $d->gambar = $filename;
        }

    	$d->save();
        return redirect('/menu');
    }
}
