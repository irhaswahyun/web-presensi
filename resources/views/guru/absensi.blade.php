@extends('admin.body.main')
@section('admin')

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<main class="main" id="main">
<section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tombol Presensi</h5>
            <div class="row">
                <div class="col-2">
                    <form action="{{ route('absen.masuk') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Presensi Masuk</button>
                    </form>
                </div>
                <div class="col-2">
                    <!-- Formulir absen pulang -->
                    <form action="{{ route('absen.pulang') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Presensi Pulang</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection