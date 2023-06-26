@extends('layouts.main')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">{{__('')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li> --}}
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <div class="container">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="  float-right"><a href="javascript:void(0)" data-url="{{route('student.book_seat')}}" class="btn btn-outline-info load-popup">{{__('Register Seat')}}</a></h1>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL_No</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($collections as $k => $item)
                                            <tr>
                                                <td>{{$k+1}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->time}}</td>
                                               
                                                @if ($item->student_id == null)
            
                                                        <td><span class="badge bg-success">Available</span></td>
                                                @else
                                                    <td><span class="badge bg-danger">Booked</span></td>
                                                @endif
                                                <td><a href="javascript:void(0)" class="btn btn-warning load-popup" data-url="">Cancel Request</a></td>
                                            </tr>
                                           @endforeach
    
    
                                        </tbody>
                                        <tfoot>
                                            <tr>
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