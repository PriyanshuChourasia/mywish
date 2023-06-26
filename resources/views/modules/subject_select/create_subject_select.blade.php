<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Subject</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_subject_select">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student Name</label>
                            <select class="form-select" aria-label="Default select example" name="student_id" id="student_id">
                                <option selected>Open this select menu</option>
                                @forelse ($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @empty
                                    <option value="">No Data Available</option>
                                @endforelse
                              </select>
                        </div>
                    </div>
                    <div class="col-md-6" id="sub_status">
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <select class="form-select" aria-label="Default select example" name="subject_id" id="subject_id">
                                <option selected>Open this select menu</option>
                                @forelse ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                @empty
                                    <option value="">No Data Available</option>
                                @endforelse
                              </select>
                        </div>
                    </div>
                </div>
                <div id="data_box" >
                    <div class="row mt-4" >
                        <div class="col-md-6" >
                            <div class="form-group">
                                <input type="text" name="" id="subject_id_box" class="form-control text-black fw-bold" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="" id="status_box" class="form-control text-success fw-bold" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <span class="text-danger">You have to complete your running course</span>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <input type="submit" value="{{__('Save Selection')}}" id="subject_select_register" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    $(function(){
        $('#data_box').hide();
    });
    
    $(document).ready(function(){
        $('#student_id').change(function(e){
            e.preventDefault();

            var id = $(this).val();
          
         


            $.ajax({
                url:'/admin/modules/subject_select/get_sub/'+id,
                type:"GET",
                contentType: false,
                processData: false,
                success: function(data){
                    $('#data_box').hide();
                    if(data.sub_name != null)
                    {
                        $('#sub_status').hide();
                        $('#date_status').hide();
                        $('#subject_id_box').val(data.sub_name);
                        if(data.status == 1)
                        {
                            $('#status_box').val('Active');
                        }
                        $('#data_box').show();
                        $('#subject_select_register').prop('disabled',true);
                        $('#subject_select_register').val('Cannot be Submitted');
                    }else{
                        $('#data_box').hide();
                        $('#sub_status').show();
                        $('#date_status').show();
                        $('#subject_select_register').prop('disabled',false);
                        $('#subject_select_register').val('Save Selection');
                        $('#subject_id_box').val();
                        $('#status_box').val();
                    }
                }

            });
        });
        $('#register_subject_select').on('submit', function(e){
            e.preventDefault();
            
            $('#subject_select_register').val('Please wait........');
            $('#subject_select_register').prop('disabled', true);
            
          
            var formData = new FormData(this);

            $.ajax({
                url:"{{route('admin.store_subject_select')}}",
                type:'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(data)
                {
                    if(data.status === 400)
                    {
                        $('#subject_select_register').val('Save Selection');
                        $('#subject_select_register').prop('disabled', false);

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