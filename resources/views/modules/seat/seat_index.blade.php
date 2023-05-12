@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seats List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}"
                                class="btn btn-dark">Dashboard</a></li>
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
                                <h3 class="card-title float-right"><a href="javascript:void(0)" data-url="{{route('admin.create_seat')}}" class="btn btn-info load-popup">{{__('Create Seat')}}</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($seats as $k => $item)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->subject_name}}</td>
                                            <td>{{$item->student_id}}</td>
                                           
                                                @if ($item->status == 1)
                                                    <td><span class="badge badge-success">active</span></td>
                                                @else
                                                <td><span class="badge badge-danger">deactive</span></td>
                                                @endif
                                                
                                                @if ($item->student_id == null)
                                                <td>
                                                    <a href="" class="btn btn-danger disabled">Revoke</a>
                                                    <a href="" class="btn btn-dark">View</a>
                                                </td>
                                                @else
                                                <td>
                                                    <a href="javascript:void(0)" data-url="{{route('admin.revoke_seat',$item->subject_id)}}" class="load-popup btn btn-danger">Revoke</a>
                                                    <a href="" class="btn btn-info">View</a>
                                                </td>
                                                @endif
                                          
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
