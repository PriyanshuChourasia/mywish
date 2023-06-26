    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="register_student" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter Name">
                                    <span class="text-danger" id="name_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter Email">
                                    <span class="text-danger" id="email_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Contact Number</label>
                                <input type="number" name="contact_no" id="contact_no" class="form-control"
                                    placeholder="Enter Contact Number">
                                    <span class="text-danger" id="contact_err"></span>
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
                                <span class="text-danger" id="gender_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alternate Contact Number</label>
                                <input type="number" name="alt_contact" id="alt_contact" class="form-control"
                                    placeholder="Enter Alternate Contact Number" value="1234567890">
                                    <span class="text-danger" id="alt_contact_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Enter Address" value="Baguiati">
                                    <span class="text-danger" id="address_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Education</label>
                                <select class="form-select" aria-label="Default select example" name="education"
                                    id="education">
                                    <option selected value="null">Open this select menu</option>
                                    @foreach ($student_classes as $student_class)
                                        <option value="{{ $student_class }}">{{ $student_class }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="education_err"></span>
                            </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gaurdian Name</label>
                                <input type="text" name="parents_name" id="parents_name" class="form-control" placeholder="Enter Parent Name">
                                <span class="text-danger" id="parents_name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Profile Image</label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Document Image</label>
                            <input type="file" name="document_image" id="document_image" class="form-control">
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-3">
                        <input type="submit" value="{{ __('Register') }}" id="register_btn" class="btn btn-dark w-75">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#register_student').on("submit", function(e) {
                e.preventDefault();

                $('#register_btn').val('Please wait.....');
                $('#register_btn').prop('disabled', true);

                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.store_student') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === 400) {
                            console.log(response);
                            $('#register_btn').val('Register');
                            $('#register_btn').prop('disabled', false);
                        } else if (response.status === 200) {
                            toastr.success('User Registered Successfully');
                            // $('#modal-popup').html('');
                            // $('#modal-popup').html(response.html);
                            $('#modal-popup').modal('hide');
                            window.location.reload(true);
                        }
                    }
                });
            });
        });
    </script>
