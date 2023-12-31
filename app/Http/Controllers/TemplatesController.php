<?php

namespace App\Http\Controllers;

use App\Models\Templates;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as Validator;

class TemplatesController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Templates',
            'data' => Templates::all()
        );
        return view('templates', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:templates|min:6',
            'title' => 'required',
            'description' => 'required',
            'request_letter' => 'required',
            'author' => 'required'
        ], [
            'code.required' => 'Kode wajib memiliki nilai',
            'code.min' => 'Kode minimal 6 angka',
            'title' => 'Judul wajib memiliki nilai',
            'description' => 'Deskripsi wajib memiliki nilai',
            'request_letter' => 'Pesan Request wajib memiliki nilai',
            'author' => 'Penerbit wajib memiliki nilai'
        ]);
        if ($validator->fails()) return redirect('templates')->withErrors($validator);
        DB::beginTransaction();
        try {
            Templates::create([
                'code' => $request->code,
                'title' => $request->title,
                'description' => $request->description,
                'request_letter' => $request->request_letter,
                'author' => $request->author,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/templates')
                ->withErrors($e);
        }
        return redirect('/templates')->with('success', 'Data berhasil disimpan');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'request_letter' => 'required',
            'author' => 'required'
        ], [
            'code.required' => 'Kode wajib memiliki nilai',
            'code.min' => 'Kode minimal 6 angka',
            'title' => 'Judul wajib memiliki nilai',
            'description' => 'Deskripsi wajib memiliki nilai',
            'request_letter' => 'Pesan Request wajib memiliki nilai',
            'author' => 'Penerbit wajib memiliki nilai'
        ]);
        if ($validator->fails()) return redirect('templates')->withErrors($validator);
        DB::beginTransaction();
        try {
            Templates::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'request_letter' => $request->request_letter,
                'author' => $request->author,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/templates')
                ->with('error', $e);
        }
        return redirect('/templates')->with('success', 'Data berhasil diubah');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Templates::where('id', $id)->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/templates')
                ->with('error', $e);
        }
        return redirect('/templates')->with('success', 'Data berhasil dihapus');
    }
    public function show(Request $request)
    {
        $result = Templates::where('code',$request->code)->first();
        if($result){
            return redirect('/')->with(['success'=>'KODE ORIGINAL','result' => $result]);
        } else {
            return redirect('/')->with('error','KODE TIDAK DITEMUKAN');
        }
    }
}
