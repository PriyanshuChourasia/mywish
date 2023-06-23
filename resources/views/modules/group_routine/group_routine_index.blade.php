@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Routine Group</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.routine_index') }}" class="btn btn-info">Routine
                                Index</a></li>
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
                                        data-url="{{ route('admin.create_group_routine') }}"
                                        class="btn btn-dark load-popup">Create Group</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Routine name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($collections as $k => $item)
                                            <tr>
                                                <td>{{ $k + 1 }}</td>
                                                <td class="fw-bold text-primary">{{ $item->subject->subject_name }}</td>
                                                <td>
                                                    <a href="#" data-url="{{route('admin.view_group_routine',$item->group_name)}}" class="btn btn-outline-info load-popup"><i
                                                            class="bi bi-person-badge fw-bold"></i></a>
                                                    <a href="{{ route('admin.routine_group_delete', $item->group_name) }}"
                                                        class="btn btn-danger"><i class="bi bi-trash fw-bold"></i></a>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td>{{ __('No Data Available') }}</td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                    <tfoot>
                                        <tr>
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
