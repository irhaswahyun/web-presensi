@extends('admin.body.main')
@section('admin')

<main class="main" id="main">
  <div class="pagetitle">
    <h1>Guru Mts</h1>
    <nav>
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">General</li>
      </ol> -->
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="title-table d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0 mt-2">Data Guru</h5>
            <a href="{{ route('guru.add') }}" class="btn btn-success">Tambah data</a>
          </div>        
          <!-- Table with stripped rows -->
          <div class="table mt-3">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allDataGuru as $key => $guru)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $guru->nip }}</td>
                              <td>{{ $guru->nama }}</td>
                              <td>{{ $guru->email }}</td>
                              <td>
                                <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-info"><i class="bi bi-pencil-square text-white"></i></a>
                                <a href="{{ route('guru.delete', $guru->id) }}" id= "delete" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                              </td>
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