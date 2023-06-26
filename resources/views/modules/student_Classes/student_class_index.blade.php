@extends('layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Student Class</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
            <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}" class="btn btn-dark">Dashboard</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title float-right"><a href="javascript:void(0)"  class="btn btn-info load-popup">Add Class</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL_No</th>
                      <th>Email</th>
                      <th>Profile</th>
                      <th>Contact</th>
                      <th>Subject</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                   
   
                    </tbody>
                    <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
  </div>
@endsection