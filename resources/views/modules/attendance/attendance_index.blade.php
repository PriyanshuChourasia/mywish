@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Attendance List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"
                            data-url="{{ route('admin.create_attendance') }}" class="btn btn-info load-popup">{{__('Add Attendance')}}</a></li>
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
                            {{-- <div class="card-header">
                                <h3 class="card-title float-right"><a href="javascript:void(0)"
                                    data-url="{{ route('admin.create_attendance') }}" class="btn btn-info load-popup">{{__('Add Attendance')}}</a></h3>
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Day</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collections as $k => $item)
                                            <tr>
                                                <td>{{ $k + 1 }}</td>
                                                <td>{{ $item->student->name }}</td>
                                                <td>{{ $item->subject->subject_name }}</td>
                                                <td>{{$item->day_name }}</td>
                                                <td>
                                                   
                                                      <a href="{{route('admin.delete_attendance',$item->id)}}" class="btn btn-danger">{{__('Revoke')}}</a>
                                                  
                                                    {{-- <a href="javascript:void(0)" data-url="{{route('admin.create_attendance',$item->student_id)}}"
                                                    class="btn btn-dark load-popup">{{ __('Go to Attendance') }}</a> --}}
                                                </td>
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
