@extends('layouts.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    {{-- <li class="breadcrumb-item"><a href="#" class="btn btn-info">Restore</a></li> --}}
                    <li class="breadcrumb-item active"><a href="{{ route('admin.fees_index') }}"
                            class="btn btn-dark">Go Back</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 50rem">
            <div class="card-body">
                <div class="text-center">
                    <div class="btn btn-lg btn-info fs-1">CREATE FEES CARD (first)</div>
                    <div class="mt-4"><a href="{{route('admin.fees_index')}}" class="btn btn-primary">{{__('Back To Index')}}</a></div>
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection