@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                                        data-url="{{ route('admin.create_course') }}" class="btn btn-info load-popup">Add
                                        Course</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($collections as $k => $item)
                                            <tr>
                                                <td>{{ $k + 1 }}</td>
                                                <td>{{ $item->student->name }}</td>
                                                <td>{{ $item->subject->subject_name }}</td>
                                                <td>
                                                    @if ($item->routine_id != null)
                                                        @if ($item->status != null)
                                                            <span class="badge badge-success fs-6">running</span>
                                                        @endif
                                                    @else
                                                    <span class="badge badge-warning fs-6">Setup Routine</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($item->routine_id == null)
                                                        <a href="javascript:void(0)"
                                                            data-url="{{ route('admin.routine_setup', $item->id) }}"
                                                            class="btn btn-dark load-popup" title="Routine Setup"><i
                                                                class="bi bi-clipboard-check-fill"></i></a>
                                                    @endif
                                                    @if (date('Y-m-d') >= $item->course_end_date)
                                                        <a href="javascript:void(0)" class="btn btn-success"
                                                            title="Status Update"><i class="bi bi-send-check-fill"></i></a>
                                                    @endif

                                                </td>
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
