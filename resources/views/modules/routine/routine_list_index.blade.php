@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Routine</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.routine_index')}}" class="btn btn-info">Routine Index</a></li>
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
                                <h3 class="card-title float-right"><a href="javascript:void(0)" data-url="{{route('admin.create_routine')}}" class="btn btn-dark load-popup">Create Routine</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Days</th>
                                            <th>From</th>
                                            <th>Upto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($collections as $k => $item)
                                       <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$item->day_name}}</td>
                                        <td>{{date('g:i A', strtotime($item->class_from))}}</td>
                                        <td>{{date('g:i A', strtotime($item->class_upto))}}</td>
                                        <td>
                                            <a href="{{route('admin.routine_delete',$item->id)}}" class="btn btn-danger"><i class="bi bi-trash fw-bold"></i></a>
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
