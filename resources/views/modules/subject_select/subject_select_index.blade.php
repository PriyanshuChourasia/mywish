@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Subject List</h1>
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
                                <h3 class="card-title float-right"><a href="javascript:void(0)"
                                    data-url="{{route('admin.create_subject_select')}}"     class="btn btn-info load-popup">{{__('Select Subject')}}</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Student Name</th>
                                            <th>Subject Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($collections as $k => $item)
                                            <tr>
                                                <th>{{$k+1}}</th>
                                                <th>{{$item->student->name}}</th>
                                                <th>{{$item->subject->subject_name}}</th>
                                                <th>
                                                    @if ($item->status == 'requested')
                                                        <span class="badge badge-warning">Requested</span>
                                                    @else
                                                        @if ($item->status == 'active')
                                                            <span class="badge badge-success">Running</span>
                                                        @endif
                                                    @endif
                                                </th>
                                                <th>
                                                    @if ($item->status == 'requested' || $item->status == null)
                                                    <a href="javascript:void(0)" data-url="{{route('admin.change_status',$item->id)}}" class="btn btn-warning load-popup"><i class="bi bi-person-fill-check"></i></a>
                                                    @else
                                                  
                                                        <a href="javasxcript:void(0)" data-url="{{route('admin.complete_status',$item->id)}}" class="btn btn-info load-popup"><i class="bi bi-person-check-fill"></i></a>
                                                    @endif
                                                    
                                                </th>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
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
