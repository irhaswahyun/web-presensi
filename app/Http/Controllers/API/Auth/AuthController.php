<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\guru;
use App\Models\User;
use App\Models\kelas;
use App\Models\siswa;
use App\Models\jabatan;
use App\Models\presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'email | required | unique:users',
            'password' => 'required | confirmed',
            'role' => 'required|in:admin,guru',
        ]);

        // create user
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        $user->save();

        return response()->json($user, 201);
    }

    public function login(Request $request) {
        $role = $request->role;

        // Validate based on role
        if ($role === 'admin') {
            $validateData = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            $loginDetails = ['email' => $request->email, 'password' => $request->password];

        } elseif ($role === 'guru') {
            $validateData = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            $loginDetails = ['email' => $request->email, 'password' => $request->password];
        }

        if (!Auth::attempt($loginDetails)) {
            return response()->json(['error' => 'Invalid login credentials'], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_id' => $token->id,
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'nip' => $user->nip,
        ], 200);

        if ($user->role === 'admin') {
            return redirect()->route('admin.admin_dashboard');
        } elseif ($user->role === 'guru') {
            return redirect()->route('admin.admin_dashboard'); // Sesuaikan dengan route guru
        }
    }

    // GURU
    public function create(Request $request) {
        $guru = new guru();

        $guru->nip=$request->input('nip');
        $guru->nama=$request->input('nama');
        $guru->email=$request->input('email');
        $guru->jabatan_id=$request->input('jabatan_id');

        $guru->save();
        return response()->json($guru);
    }

    public function read() {
        $guru = guru::all();
        return response()->json($guru);
    }

    public function readbyId($id) {
        $guru = guru::find($id);
        return response()->json($guru);
    }

    public function update(Request $request, $id) {
        $guru = guru::find($id);

        $guru->nip=$request->input('nip');
        $guru->nama=$request->input('nama');
        $guru->email=$request->input('email');
        $guru->jabatan_id=$request->input('jabatan_id');

        $guru->save();
        return response()->json($guru);
    }

    public function deletebyId(Request $request, $id) {
        $guru = guru::find($id);
        $guru->delete();

        return response()->json($guru);
    }

    // JABATAN
    public function createJb(Request $request) {
        $jabatan = new jabatan();

        $jabatan->nama_jabatan=$request->input('nama_jabatan');

        $jabatan->save();
        return response()->json($jabatan);
    }

    public function readJb() {
        $jabatan = jabatan::all();
        return response()->json($jabatan);
    }

    public function readbyIdJb($id) {
        $jabatan = jabatan::find($id);
        return response()->json($jabatan);
    }

    public function updateJb(Request $request, $id) {
        $jabatan = jabatan::find($id);

        $jabatan->nama_jabatan=$request->input('nama_jabatan');

        $jabatan->save();
        return response()->json($jabatan);
    }

    public function deletebyIdJb(Request $request, $id) {
        $jabatan = jabatan::find($id);
        $jabatan->delete();

        return response()->json($jabatan);
    }

    // KELAS
    public function createKelas(Request $request) {
        $kelas = new kelas();

        $kelas->nama_kelas=$request->input('nama_kelas');
        $kelas->jumlah_siswa=$request->input('jumlah_siswa');

        $kelas->save();
        return response()->json($kelas);
    }

    public function readKelas() {
        $kelas = kelas::all();
        return response()->json($kelas);
    }

    public function readbyIdKelas($id) {
        $kelas = kelas::find($id);
        return response()->json($kelas);
    }

    public function updateKelas(Request $request, $id) {
        $kelas = kelas::find($id);

        $kelas->nama_kelas=$request->input('nama_kelas');
        $kelas->jumlah_siswa=$request->input('jumlah_siswa');

        $kelas->save();
        return response()->json($kelas);
    }

    public function deletebyIdKelas(Request $request, $id) {
        $kelas = kelas::find($id);
        $kelas->delete();

        return response()->json($kelas);
    }

    // Siswa
    public function createSiswa(Request $request) {
        $siswa = new siswa();

        $siswa->kelas_id=$request->input('kelas_id');
        $siswa->nama_siswa=$request->input('nama_siswa');

        $siswa->save();
        return response()->json($siswa);
    }

    public function readSiswa() {
        $siswa = siswa::all();
        return response()->json($siswa);
    }

    public function readbyIdSiswa($id) {
        $siswa = siswa::find($id);
        return response()->json($siswa);
    }

    public function updateSiswa(Request $request, $id) {
        $siswa = siswa::find($id);

        $siswa->kelas_id=$request->input('kelas_id');
        $siswa->nama_siswa=$request->input('nama_siswa');

        $siswa->save();
        return response()->json($siswa);
    }

    public function deletebyIdSiswa(Request $request, $id) {
        $siswa = siswa::find($id);
        $siswa->delete();

        return response()->json($siswa);
    }

    // Presensi
    public function createPresensi(Request $request) {
        $presensi = new presensi();

        $presensi->guru_id=$request->input('guru_id');
        $presensi->waktu=$request->input('waktu');
        $presensi->masuk=$request->input('masuk');
        $presensi->pulang=$request->input('pulang');

        $presensi->save();
        return response()->json($presensi);
    }

    public function readPresensi() {
        $presensi = presensi::all();
        return response()->json($presensi);
    }

    public function readbyIdPresensi($id) {
        $presensi = presensi::find($id);
        return response()->json($presensi);
    }

    public function updatePresensi(Request $request, $id) {
        $presensi = presensi::find($id);

        $presensi->guru_id=$request->input('guru_id');
        $presensi->waktu=$request->input('waktu');
        $presensi->masuk=$request->input('masuk');
        $presensi->pulang=$request->input('pulang');

        $presensi->save();
        return response()->json($presensi);
    }

    public function deletebyIdPresensi(Request $request, $id) {
        $presensi = presensi::find($id);
        $presensi->delete();

        return response()->json($presensi);
    }

}
