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
                <h3 class="box-title">Data Siswa</h3>
                <a href="{{ route('siswa.add') }}" style="float:right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Data</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Kelas ID</th>
                              <th>Nama Siswa</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allDataSw as $key => $sw)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $sw->kelas_id }}</td>
                              <td>{{ $sw->nama_siswa }}</td>
                              <td>
                                <a href="{{ route('siswa.edit', $sw->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('siswa.delete', $sw->id) }}" id= "delete" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                          @endforeach
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