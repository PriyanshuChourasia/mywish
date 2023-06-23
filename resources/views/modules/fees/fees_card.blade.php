@extends('layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{__('Fees Card')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item active"><a href="{{ route('admin.fees_index') }}"
                            class="btn btn-dark">{{__('Go Back')}}</a></li>
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
                                     class="btn btn-warning load-popup">Dues</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL_No</th>
                                        <th>Student ID</th>
                                        <th>Subject ID</th>
                                        <th>Monthly</th>
                                        <th>Fees Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($collections as $k => $item)
                                      <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$item->student_id}}</td>
                                        <td>{{$item->subject_id}}</td>
                                        <td>{{$item->monthly_fees}}</td>
                                        <td>{{$item->next_fees_date}}</td>
                                        <td>
                                            {{-- <a href="javascript:void(0)" data-url="{{route('admin.fees_pay_view',$item->id)}}" class="btn btn-success load-popup">Pay</a> --}}

                                            @if (date('Y-m-d') >= $item->next_fees_date)
                                            <a href="javascript:void(0)" data-url="{{route('admin.fees_pay_view',$item->id)}}" class="btn btn-success load-popup">Pay</a>
                                            @else
                                           
                                            <a href="#" class="btn btn-success disabled" tabindex="-1" role="button" aria-disabled="true">{{__('PAY')}}</a>
                                            @endif
                                            @if ($item->due_amount != NULL)
                                            <a href="" class="btn btn-warning" title="DUES">DUES</a>
                                            @endif
                                        </td>
                                      </tr>
                                  @empty
                                      <tr>
                                        <td class="text-black">No Data Available</td>
                                      </tr>
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