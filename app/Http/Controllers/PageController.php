<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;

class PageController extends Controller
{
   	public function login()
	{
		return view('loginuser.login');
	}
	public function register()
	{
		return view('loginuser.register');
	}
    public function proses_login(Request $r){
    	$name = $r->name;
    	$password = $r->password;
    	if (Auth::attempt(['email' => $name, 'password' => $password]) || Auth::attempt(['name' => $name, 'password' => $password])){
    		if (Auth::user()->role == "1"){
    			return view('/owner/index');
    		}
            if (Auth::user()->role == "2"){
    			return view('/admin/index');
    		}
            if (Auth::user()->role == "3"){
                return view('/kasir/index');
            }
            if (Auth::user()->role == "4"){
                return view('/waiter/index');
            }
            if (Auth::user()->role == "0"){
                return view('/pelanggan/index');
            }
            
    	}
    		return redirect('/not_found/404.jpg');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/userlogin/login');
    }




    public function pengguna() {
        $pengguna = User::all();
        return view('superadmin.pengguna.index', compact('pengguna'));
    }
    public function tambah() {
        $pengguna = User::all();
        return view('superadmin.pengguna.tambah', compact('pengguna'));
    }
    public function proses_tambah(Request $r) {
        $pengguna = new User;
        $pengguna->name = $r->name;
        $pengguna->email = $r->email;
        $pengguna->password = bcrypt($r->password);
        $pengguna->role = $r->role;
        $pengguna->save();
        return redirect(route('pengguna'))->with('sukses', 'Data Berhasil Ditambah!');
    }
    public function detail($id) {
        $pengguna = User::find($id);    
        return view('superadmin.pengguna.detail', compact('pengguna'));
    }
    public function hapus($id) {
        $pengguna = User::find($id);
        $pengguna->delete();
        return redirect(route('pengguna'))->with('sukses', 'Data Berhasil Dihapus!');
    } 
}
