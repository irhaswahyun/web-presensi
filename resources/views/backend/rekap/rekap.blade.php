@extends('admin.body.main')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-4">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="row justify-content-end"> 

          <div class="col-lg-9">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Data Rekap</h3>
                {{-- <a href="" style="float:right;" type="button" class="btn btn-rounded btn-success mb-5">absen</a> --}}
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Nama Guru</th>
                              <th>Jumlah Kehadiran</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>{{ $namaGuru->nama }}</td>   
                            <td>{{ $kehadiran }}</td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

           
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->

@endsection