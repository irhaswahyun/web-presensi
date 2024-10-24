@extends('admin.body.main')
@section('admin')

<main class="main" id="main">
  <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Absen</h5>

              <!-- General Form Elements -->
              <form method="post" action="{{ route('absen.store') }}">
                  @csrf
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Guru ID</label>
                    <div class="col-sm-10">
                      <input type="text" name="guru_id" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputWaktu" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                      <input type="date" name="waktu" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputTime" class="col-sm-2 col-form-label">Masuk</label>
                    <div class="col-sm-10">
                      <input type="time" name="masuk" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputTime" class="col-sm-2 col-form-label">Pulang</label>
                    <div class="col-sm-10">
                      <input type="time" name="pulang" class="form-control">
                    </div>
                  </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
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