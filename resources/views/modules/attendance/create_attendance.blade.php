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
                            <input type="text" name="date" id="date" value="{{$attendances->date}}" readonly class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Time</label>
                            <input type="text" name="time" id="time" value="{{$attendances->time}}" readonly class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject ID</label>
                            <input type="text" name="subject_id" id="" value="{{$attendances->subject_id}}" readonly class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student ID</label>
                            <input type="text" name="student_id" id="" value="{{$attendances->student_id}}" readonly class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Present/Absent</label>
                            <select class="form-select" aria-label="Default select example" id="appearance" name="appearance">
                                <option value="1" selected>Present</option>
                                <option value="0" >Absent</option>
                            
                                
                              </select>
                        </div>
                    </div>
                    <div class="col-md-6" id="status-box">
                        <div class="form-group">
                            <label for="">Informed/ Not Informed</label>
                            <select class="form-select" aria-label="Default select example" name="status">
                                <option value="null">Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                                
                              </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" value="{{'Submit'}}" id="attendance_register" class="btn btn-success w-100">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#status-box').hide();
        $('#appearance').change(function(){
            // alert($('#appearance').val());
            if($('#appearance').val() == 0)
            {
                $('#status-box').show();
            }else if($('#appearance').val() == 1)
            {
                $('#status-box').hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#register_attendance').on('submit', function(e){
            e.preventDefault();

            $('#attendance_register').val('Submitting.....');
            $('#attendance_register').prop('disabled', true);
            

            var formData = new FormData(this);

            $.ajax({
                url: "{{route('admin.store_attendance')}}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.status === 400)
                    {
                        console.log(response);
                        $('#attendance_register').val('Submit');
                        $('#attendance_register').prop('disabled', false);
                        
                    }else if(response.status === 200)
                    {
                        toastr.success('Attendance Submitted Successfully');
                        $('#modal-popup').modal('hide');
                        // window.location.reload();
                    }
                }
            });
        });
    });
</script>