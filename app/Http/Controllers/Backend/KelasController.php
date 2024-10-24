<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function KelasView() {
        // $allDataUser=User::all();
        $data['allDataKl']=kelas::all();
        return view('backend.kelas.view_kelas', $data);
    }

    public function KelasAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.kelas.add_kelas');
    }

    public function KelasStore(Request $request) {

        $data=new kelas();
        $data->nama_kelas=$request->nama_kelas;
        $data->jumlah_siswa=$request->jumlah_siswa;
        $data->save();

        return redirect()->route('kelas.view')->with('info', 'Tambah Kelas berhasil');
    }

    public function KelasEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= kelas::find($id);
        return view('backend.kelas.edit_kelas', compact('editData'));
    }

    public function KelasUpdate(Request $request, $id) {

        $data=kelas::find($id);
        $data->nama_kelas=$request->nama_kelas;
        $data->jumlah_siswa=$request->jumlah_siswa;
        $data->save();

        return redirect()->route('kelas.view')->with('info', 'Update Kelas berhasil');
    }

    public function KelasDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= kelas::find($id);
        $deleteData->delete();

        return redirect()->route('kelas.view')->with('info', 'Delete Kelas berhasil');
    }
}
