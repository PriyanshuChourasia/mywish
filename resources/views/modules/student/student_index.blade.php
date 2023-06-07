@extends('layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#" class="btn btn-info">Restore</a></li>
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
                                        data-url="{{ route('admin.create_student') }}" class="btn btn-info load-popup">Add
                                        Student</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL_No</th>
                                            <th>Name</th>
                                            <th>Profile</th>
                                            <th>Contact</th>
                                            <th>Subject</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collections as $k => $item)
                                            <tr>
                                                <td>{{ $k + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                @if ($item->profile_image == null)
                                                    <td class="text-secondary">{{ __('No Image Found') }}</td>
                                                @else
                                                    <td> <img
                                                            src="{{ asset('uploads/student/profile_image/' . $item->profile_image) }}"
                                                            style="height: 50px; width:50px; border-radius:50%;"></td>
                                                @endif
                                                <td>{{ $item->contact_no }}</td>
                                                @if ($item->subject_id == 'null')
                                                    <td><span>{{ __('No Subject Selected') }}</span></td>
                                                @else
                                                    <td>{{ $item->subject->subject_name }}</td>
                                                @endif
                                                @if ($item->status == 1)
                                                    <td><span class="badge bg-success">Active</span></td>
                                                @else
                                                    <td><span class="badge bg-danger">Deactive</span></td>
                                                @endif


                                                <td>
                                                    <a href="javascript:void(0)" title="Edit Student"
                                                        data-url="{{ route('admin.edit_student', $item->id) }}"
                                                        class="load-popup btn btn-warning"><i
                                                            class="bi bi-pencil-square fw-bold"></i></a>
                                                    <a href="{{route('admin.view_student', $item->id)}}" title="View Student" class="btn btn-info"><i
                                                            class="bi bi-person-badge fw-bold"></i></a>
                                                    <a href="{{ route('admin.student_delete', $item->id) }}" title="Delete Student"
                                                        class="btn btn-danger"><i class="bi bi-trash fw-bold"></i></a>
                                                    <a href="#" class="btn btn-dark" title="Routine Setup"><i class="bi bi-clipboard2-data-fill"></i></a>
                                                    {{-- <button type="button" value="{{$item->id}}" class="btn btn-danger delete_student"><i class="bi bi-trash fw-bold"></i></button> --}}
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

    {{-- <script>
        $(document).ready(function() {
            $('.delete_student').on('click', function(e) {
                e.preventDefault();

                let id = $(this).val();
                let csrf = '{{ csrf_token() }}';

                // alert(id);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var student_url = "{{route('admin.student_delete')}}"
                        $.ajax({
                            url: "{{route('admin.student_delete')}}",
                            type: "GET",
                            data:{
                                id: id,
                                _token: csrf
                            },
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status === 400) {
                                    console.log(response);
                                } else if (response.status === 200) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    window.location.reload();
                                }
                            }
                        });

                    }
                })
            });
        });
    </script> --}}
@endsection
