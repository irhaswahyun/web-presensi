<?php

namespace App\Http\Controllers\Backend;

use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function GuruView() {
        // $allDataUser=User::all();
        $data['allDataGuru']=guru::all();
        return view('backend.guru.view_guru', $data);
    }

    public function GuruAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.guru.add_guru');
    }

    public function GuruStore(Request $request) {

       // Validate the request data
        $request->validate([
            'nip' => 'required|integer|unique:gurus,nip',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
        ]);

        // Membuat data baru di tabel users
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->nip),
            'role' => 'guru',
        ]);

        // Membuat data baru di tabel gurus dan menghubungkannya dengan data di tabel users
        $guru = Guru::create([
            'user_id' => $user->id,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()->route('guru.view')->with('info', 'Tambah Guru berhasil');
    }

    public function GuruEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= guru::find($id);
        return view('backend.guru.edit_guru', compact('editData'));
    }

    public function GuruUpdate(Request $request, $id) {

        $request->validate([
            'nip' => 'required|integer|unique:gurus,nip,' . $id, // Pastikan NIP unik kecuali untuk guru yang sedang diupdate
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,  // Password tidak wajib diisi
        ]);
    
        // Mencari guru berdasarkan ID
        $guru = Guru::findOrFail($id);
        $user = User::findOrFail($guru->user_id); // Mengambil user terkait
    
        // Memperbarui data di tabel users
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save(); // Simpan perubahan di tabel users
    
        // Memperbarui data di tabel gurus
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->email = $request->email; // Anda bisa menghapus ini jika tidak perlu
    
        $guru->save();

        return redirect()->route('guru.view')->with('info', 'Update guru berhasil');
    }

    public function GuruDelete($id) {
        $deleteData= guru::find($id);
        $user = User::where('id',  $deleteData->user_id)->first();
        $deleteData->delete();

        if($user) {
            $user->delete();
        }

        return redirect()->route('guru.view')->with('info', 'Delete guru berhasil');
    }
}
