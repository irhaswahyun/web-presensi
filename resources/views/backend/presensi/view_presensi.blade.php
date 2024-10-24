@extends('admin.body.main')
@section('admin')

<main class="main" id="main">
  <div class="pagetitle">
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="title-table d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0 mt-2">Data Presensi</h5>
            {{-- <a href="{{ route('absen.add') }}" class="btn btn-success">Tambah data</a> --}}
          </div>        
          <!-- Table with stripped rows -->
          <div class="table mt-3">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Hari/Tanggal</th>
                  <th scope="col">Masuk</th>
                  <th scope="col">Pulang</th>
                  {{-- <th scope="col">Aksi</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($allDataPr as $key => $pr)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pr->user->name }}</td>
                    <td>{{ $pr->created_at->locale('id')->translatedFormat('l, d F Y') }}</td>
                    <td>{{ $pr->masuk }}</td>
                    <td>{{ $pr->pulang }}</td>
                    {{-- <td>
                      <a href="{{ route('absen.edit', $pr->id) }}" class="btn btn-info">Edit</a>
                      <a href="{{ route('absen.delete', $pr->id) }}" id= "delete" class="btn btn-danger">Delete</a>
                      <!-- <a href="{{ route('absen.rekap', $pr->guru_id) }}" id= "rekap" class="btn btn-warning">Rekap</a> -->
                    </td> --}}
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- End Table with stripped rows -->
        </div>
      </div>
    </div>
  </div>
</main>
@endsection