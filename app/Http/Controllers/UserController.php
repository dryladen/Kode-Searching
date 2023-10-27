<?php

namespace App\Http\Controllers;

use App\Models\Templates;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login'
        );
        return view('login', $data);
    }
    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard',
            'data_user' => User::all()->count(),
            'data_templates' => Templates::all()->count(),
        );
        return view('dashboard', $data);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($infoLogin)) {
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        } else {
            return redirect('login')->withErrors('Email dan Password tidak terdaftar')->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
    public function data()
    {
        $data = array(
            'title' => 'Users',
            'data' => User::all()
        );
        return view('users', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required|confirmed|min:3',
        ], [
            'email.required' => 'Email wajib memiliki nilai',
            'password.min' => 'Password minimal 3 angka',
            'password.confirmed' => 'Password tidak sesuai',
            'name' => 'Nama wajib memiliki nilai',
        ]);
        if ($validator->fails()) return redirect('users')->withErrors($validator);
        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('users')
                ->withErrors($e);
        }
        return redirect('users')->with('success', 'Data berhasil disimpan');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'confirmed',
        ], [
            'email.required' => 'Email wajib memiliki nilai',
            'password.confirmed' => 'Password tidak sesuai',
            'name' => 'Nama wajib memiliki nilai',
        ]);
        if ($validator->fails()) return redirect('users')->withErrors($validator);
        DB::beginTransaction();
        try {
            User::where('id', $id)->where('id', $id)->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('users')
                ->withErrors($e);
        }
        return redirect('users')->with('success', 'Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('users')->with('success', 'Data Berhasil Dihapus');
    }
}
