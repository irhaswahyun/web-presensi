@extends('admin.dashboard')
@section('admin')

<section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card mt-5">
          <div class="card-body">
            <h5 class="card-title">Update Siswa</h5>

            <!-- General Form Elements -->
            <form method="post" action="{{ route('siswa.update', $editData->id) }}">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Kelas ID</label>
                <div class="col-sm-10">
                  <input type="text" name="kelas_id" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_siswa" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Submit Button</label>
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

@endsection