@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Profile') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        <li class="breadcrumb-item active"><a href="{{ route('admin.student_index') }}"
                                class="btn btn-dark">{{ __('Go Back') }}</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('uploads/student/profile_image/' . $student->profile_image) }}"
                                    alt="User profile picture" style="height: 70px; width:70px; border-radius:50%;">
                            </div>

                            <h3 class="profile-username text-center">{{ $student->name }}</h3>

                            <p class="text-muted text-center">Student</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Classes</b> <a class="float-right">00</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right" style="user-select: none">{{ $student->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:void(0)" data-url="{{route('student.change_password',$student->id)}}" class="btn btn-danger load-popup">Change Password</a>
                                </li>
                            </ul>

                            {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- <strong><i class="fas fa-book mr-1"></i>{{__('Subject')}}</strong> --}}

                            <p class="text-muted">

                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i>{{ __('Address') }}</strong>

                            <p class="text-muted">{{ $student->address }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>



                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i>Email</strong>

                            <p class="text-muted">{{ $student->email }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
