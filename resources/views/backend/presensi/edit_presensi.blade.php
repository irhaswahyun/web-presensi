@extends('admin.dashboard')
@section('admin')

<section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card mt-5">
          <div class="card-body">
            <h5 class="card-title">Update Absen</h5>

            <!-- General Form Elements -->
            <form method="post" action="{{ route('absen.update', $editData->id) }}">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Guru ID</label>
                <div class="col-sm-10">
                  <input type="text" name="guru_id" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Waktu</label>
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