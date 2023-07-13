<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Attendance</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="register_attendance">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="text" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" readonly
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Time</label>
                            <input type="time" name="time" id="time" value="<?php echo date('h:i'); ?>" readonly
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Day</label>
                            <input type="text" name="day_name" readonly class="form-control" id="day_name" value="<?php echo date('D') ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student ID</label>
                            <select class="form-select" aria-label="Default select example" id="student_id"
                                name="student_id">
                                <option selected>Open this select menu</option>
                                @forelse ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @empty
                                    <option value="">No data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject ID</label>
                            <input type="text" name="subject_id" id="subject_id" readonly class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6" id="present_box">
                        <div class="form-group">
                            <label for="">Present/Absent</label>
                            <select class="form-select" aria-label="Default select example" id="appearance"
                                name="appearance">
                                <option value="1" selected>Present</option>
                                <option value="0">Absent</option>


                            </select>
                        </div>
                    </div>
                    <div class="col-md-6" id="status-box">
                        <div class="form-group">
                            <label for="">Informed/ Not Informed</label>
                            <select class="form-select" aria-label="Default select example" name="status"
                                id="att_status">
                                <option value="">Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" value="{{ 'Submit' }}" id="attendance_register"
                        class="btn btn-success w-100">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#present_box').hide();
        $('#status-box').hide();
        $('#appearance').change(function() {
            // alert($('#appearance').val());
            if ($('#appearance').val() == 0) {
                $('#status-box').show();
            } else if ($('#appearance').val() == 1) {
                $('#att_status').val("");
                $('#status-box').hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#student_id').change(function(e) {
            e.preventDefault();

            $('#attendance_register').prop('disabled',true);
            var id = $(this).val();

            $.ajax({
                url: '/admin/modules/attendance/get_info/' + id,
                type: 'GET',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#subject_id').val(data.sub_id);
                    if (data.sub_id == null) {
                      
                            $('#attendance_register').val('Subject id is null');
                            $('#attendance_register').prop('disabled', true);
                    }else if(data.sub_id != null)
                    {
                        $('#present_box').show();
                        $('#attendance_register').prop('disabled',false);
                    }
                }
            });
        });
        $('#register_attendance').on('submit', function(e) {
            e.preventDefault();

            $('#attendance_register').val('Please wait....');
            $('#attendance_register').prop('disabled',true);
            var subject = $('#subject_id').val();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.store_attendance') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 400) {
                        console.log(response);
                        $('#attendance_register').val('Submit');
                        $('#attendance_register').prop('disabled', false);
                        toastr.error('Please Select Student');

                    } else if (response.status === 200) {
                        toastr.success('Attendance Submitted Successfully');
                        $('#modal-popup').modal('hide');
                        window.location.reload(true);
                    }
                }
            });
        });
    });
</script>
