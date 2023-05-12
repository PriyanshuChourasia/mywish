<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Student</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="update_data"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Name" value="{{$student->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter Email" value="{{$student->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="number" name="contact_no" id="contact_no" class="form-control"
                                placeholder="Enter Contact Number" value="{{$student->contact_no}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender"
                                id="gender">
                                <option selected>Open this select menu</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender }}">{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Alternate Contact Number</label>
                            <input type="number" name="alt_contact" id="alt_contact" class="form-control"
                                placeholder="Enter Alternate Contact Number" value="{{$student->alt_contact}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="Enter Address" value="{{$student->address}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Programming Language</label>
                            <select class="form-select" aria-label="Default select example" name="subject"
                                id="subject ">
                                <option selected>Open this select menu</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"{{$subject->id == $student->subject ? 'selected': ''}}>{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Class</label>
                            <select class="form-select" aria-label="Default select example" name="student_class"
                                id="student_class">
                                <option selected>Open this select menu</option>
                                @foreach ($student_classes as $student_class)
                                    <option value="{{ $student_class }}">{{ $student_class }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Profile Image</label>
                        <input type="file" name="profile_image" id="profile_image" class="form-control" value="{{$student->profile_image}}">
                        @if ($student->profile_image != null)
                        <img src="{{asset('uploads/student/profile_image/'. $student->profile_image)}}" width="40px" height="40px" style="border-radius: 50%" alt="" srcset="">
                        @else
                        <span class="fw-bold text-danger">No Image Found</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="">Document Image</label>
                        <input type="file" name="document_image" id="document_image" class="form-control" value="{{$student->document_image}}">
                        @if ($student->document_image != null)
                        <img src="{{asset('uploads/student/document_image/'. $student->document_image)}}" width="40px" height="40px" style="border-radius: 50%" alt="" srcset="">
                        @else
                        <span class="fw-bold text-danger">No Image Found</span>
                        @endif

                    </div>
                </div>
                <div class="text-center mt-4 mb-3">
                    <input type="submit" value="{{ __('Save Data') }}" id="data_update" class="btn btn-dark w-75">
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Understood</button>
    </div> --}}
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#update_data').on("submit", function(e){
            e.preventDefault();

            $('#data_update').val('Updating......');
            $('#data_update').prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                url:"{{route('admin.update_student',$student->id)}}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response)
                {
                    if(response.status === 400)
                    {
                        console.log(response)
                        $('#data_update').val('Save Data');
                        $('#data_update').prop('disabled', false);  
                        toastr.error('Some Error Occured'); 
                    }else if(response.status === 200){
                        toastr.success('Student Updated Successfully');
                        // $('#modal-popup').html(response.html);
                        $('#modal-popup').modal('hide');
                        window.location.reload(true);
                    }
                }
            });
        });
    });
</script>