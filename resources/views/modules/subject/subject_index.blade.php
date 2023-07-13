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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"
                            data-url="{{ route('admin.create_subject') }}" class="btn btn-info load-popup">{{__('Add Subject')}}</a></li>
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
                                        data-url="{{ route('admin.create_subject') }}" class="btn btn-info load-popup">{{__('Add Subject')}}</a></h3>
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Subject</th>
                                            <th>Fees(per Months)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($collections as $k => $item)
                                    <tr>
                                        <th>{{$k+1}}</th>
                                        <th>{{$item->subject_name}}</th>
                                        <th>{{$item->fees}}</th>
                                        <th>
                                            <a href="javascript:void(0)" class="btn btn-warning load-popup" data-url="{{route('admin.edit_subject',$item->id)}}"><i class="bi bi-pencil-square fw-bold"></i></a>
                                            {{-- <a href="" class="btn btn-danger"><i class="bi bi-trash3 fw-bold"></i></a> --}}
                                        </th>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
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
