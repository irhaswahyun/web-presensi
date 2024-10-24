@extends('admin.dashboard')
@section('admin')

<section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card mt-5">
          <div class="card-body">
            <h5 class="card-title">Tambah Jabatan</h5>

            <!-- General Form Elements -->
            <form method="post" action="{{ route('jabatan.store') }}">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_jabatan" class="form-control">
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