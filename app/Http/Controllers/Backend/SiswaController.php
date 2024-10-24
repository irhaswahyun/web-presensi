<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function SiswaView() {
        // $allDataUser=User::all();
        $data['allDataSw']=siswa::all();
        return view('backend.siswa.view_siswa', $data);
    }

    public function SiswaAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.siswa.add_siswa');
    }

    public function SiswaStore(Request $request) {

        $data=new siswa();
        $data->kelas_id=$request->kelas_id;
        $data->nama_siswa=$request->nama_siswa;
        $data->save();

        return redirect()->route('siswa.view')->with('info', 'Tambah Siswa berhasil');
    }

    public function SiswaEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= siswa::find($id);
        return view('backend.siswa.edit_siswa', compact('editData'));
    }

    public function SiswaUpdate(Request $request, $id) {

        $data=siswa::find($id);
        $data->kelas_id=$request->kelas_id;
        $data->nama_siswa=$request->nama_siswa;
        $data->save();

        return redirect()->route('siswa.view')->with('info', 'Update siswa berhasil');
    }

    public function SiswaDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= siswa::find($id);
        $deleteData->delete();

        return redirect()->route('siswa.view')->with('info', 'Delete siswa berhasil');
    }
}
