


<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Courses</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_course">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student ID</label>
                            <select class="form-select" aria-label="Default select example" id="student_id" name="student_id">
                                <option selected>Open this select menu</option>
                                @forelse ($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @empty
                                    <option class="text-secondary">No data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject ID</label>
                            <select class="form-select" aria-label="Default select example" id="subject_id" name="subject_id">
                                <option >Open this select menu</option>
                                @forelse ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                @empty
                                    <option class="text-secondary">No data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Course Duration</label>
                            <input type="text" name="course_duration" id="course_duration" class="form-control bg-black text-white" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Course Fees</label>
                        <input type="text" name="" id="course_fees" class="form-control bg-black text-white" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Course Starting Date</label>
                            <input type="date" name="course_starting_date" id="course_starting_date" class="form-control" value="<?php echo date('Y-m-d')     ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Course Ending Date</label>
                            <input type="date" name="course_end_date" id="course_end_date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3 mb-3">
                    <input type="submit" value="{{__('ADD Course')}}" class="btn btn-success" id="course_register">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    


    $(document).ready(function(){
        $('#subject_id').change(function(e){
            e.preventDefault();
            
            var id = $(this).val();
            

            $.ajax({
                url:'/admin/modules/courses/get_ids/'+id,
                type:'GET',
                contentType: false,
                processData: false,
                success: function(data){
                    $('#course_duration').val(data.duration); 
                    $('#course_fees').val(data.fees);
                    $('#course_end_date').val(data.end_date);
                }
            });
        });

        $('#register_course').on('submit',function(e){
            e.preventDefault();

            $('#course_register').val('Adding.....');
            $('#course_register').prop('disabled',true);

            var formData = new FormData(this);

            $.ajax({
                url: "{{route('admin.store_course')}}",
                type: 'POST',
                contentType: false,
                data: formData,
                processData: false,
                success: function(data)
                {
                    if(data.status == 400)
                    {
                        $('#course_register').val('ADD Course');
                        $('#course_register').prop('disabled',false);
                        console.log(data);
                    }else if(data.status === 200)
                    {
                        $('#modal-popup').modal('hide');
                        window.location.reload(true);
                    }
                }
            });
        });
    });
</script>