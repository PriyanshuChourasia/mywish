@extends('layouts.main')
@section('content')

    @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
        
        $guards = array_keys(config('auth.guards'));
        
        $guard = Auth::getDefaultDriver();
        
        $user = Auth::guard($guard)->user();
        //   @dd($guard);
    @endphp




    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Fees Card') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        <li class="breadcrumb-item active"><a href="{{ route('admin.fees_index') }}" class="btn btn-dark">Go
                                Back</a></li>
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

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Monthly</th>
                                            <th>Fees Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($collections as $k => $item)
                                            <tr>
                                                <td>{{ $k + 1 }}</td>
                                                <td>{{ $item->student->name }}</td>
                                                <td>
                                                    {{ $item->subject->subject_name }}
                                                </td>
                                                <td>
                                                    {{ $item->subject->fees }}
                                                </td>
                                                <td>
                                                    {{ $item->paid_date }}
                                                </td>
                                                <td>
                                                    @if ($guard === 'admin')
                                                        @if ($item->status == 'paid')
                                                            <span class="badge badge-success">Paid</span>
                                                        @else
                                                            @if ($item->status == 'due')
                                                                <a href="javascript:void(0)" data-url=""
                                                                    class="load-popup btn btn-warning">Due</a>
                                                            @else
                                                                @if ($item->status == 'pending')
                                                                    <a href="javascript:void(0)"
                                                                        data-url="{{ route($guard . '.fees_pay_confirm', $item->id) }}"
                                                                        class="load-popup btn btn-warning">Confirm</a>
                                                                @else
                                                                    <a href="javascript:void(0)"
                                                                        data-url="{{ route($guard . '.fees_pay_view', $item->id) }}"
                                                                        class="load-popup btn btn-success">Pay</a>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($item->status == null)
                                                            <a href="javascript:void(0)"
                                                                data-url="{{ route($guard . '.fees_pay_view', $item->id) }}"
                                                                class="load-popup btn btn-success">Pay</a>
                                                        @else
                                                            @if ($item->status == 'paid')
                                                                <span class="badge badge-success">Paid</span>
                                                            @else
                                                                @if ($item->status == 'pending')
                                                                    <span class="badge badge-warning">Pending</span>
                                                                @else
                                                                    <a href="" class="btn btn-warning">Dues</a>
                                                                @endif
                                                            @endif
                                                        @endif
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
