@extends('layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Fees List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    {{-- <li class="breadcrumb-item"><a href="#" class="btn btn-info">Restore</a></li> --}}
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
                                    data-url="{{ route('admin.create_fees') }}" class="btn btn-info load-popup">Create Card</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL_No</th>
                                        <th>Student Name</th>
                                        <th>Monthly</th>
                                        <th>Contact No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($collections as $k => $item)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$item->student->name}}</td>
                                        <td>{{$item->subject->fees}}</td>
                                        <td>{{$item->student->contact_no}}</td>
                                        <td>
                                            <a href="{{route('admin.fees_card',$item->student_id)}}" class="btn btn-primary">{{__('PROCEED')}}</a>
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