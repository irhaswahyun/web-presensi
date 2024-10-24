@extends('admin.body.main')
@section('admin')

<main class="main" id="main">
<section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-12">

        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Update Guru</h5>

            <!-- General Form Elements -->
            <form method="post" action="{{ route('guru.update', $editData->id) }}">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                  <input type="text" name="nip" class="form-control" value="{{ old('nip', $editData->nip) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control" value="{{ old('nama', $editData->nama) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" value="{{ old('email', $editData->email) }}">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection