<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function JabatanView() {
        // $allDataUser=User::all();
        $data['allDataJb']=jabatan::all();
        return view('backend.jabatan.view_jabatan', $data);
    }

    public function JabatanAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.jabatan.add_jabatan');
    }

    public function JabatanStore(Request $request) {

        $data=new jabatan();
        $data->nama_jabatan=$request->nama_jabatan;
        $data->save();

        return redirect()->route('jabatan.view')->with('info', 'Tambah Guru berhasil');
    }

    public function JabatanEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= jabatan::find($id);
        return view('backend.jabatan.edit_jabatan', compact('editData'));
    }

    public function JabatanUpdate(Request $request, $id) {

        $data=jabatan::find($id);
        $data->nama_jabatan=$request->nama_jabatan;
        $data->save();

        return redirect()->route('jabatan.view')->with('info', 'Update jabatan berhasil');
    }

    public function JabatanDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= jabatan::find($id);
        $deleteData->delete();

        return redirect()->route('jabatan.view')->with('info', 'Delete jabatan berhasil');
    }
}
