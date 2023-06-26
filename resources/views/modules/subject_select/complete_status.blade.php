<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Status Change</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_status">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student Name</label>
                            <input type="text" name="" id="" class="form-control" readonly value="{{$students->student->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <input type="text" name="" class="form-control" readonly id="" value="{{$students->subject->subject_name}}">
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Completion Date</label>
                            <input type="date" name="end_date" readonly class="form-control" id="" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="text" class="form-control" readonly value="complete" name="status">
                    </div>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" value="{{__('Change Status')}}" class="btn btn-success" id="status_register">
                </div>
            </form>
        </div>
 
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#register_status').on('submit', function(e){
            e.preventDefault();

            $('#status_register').prop('disabled', true);
            $('#status_register').val('Please Wait....');

            var formData = new FormData(this);


            $.ajax({
                url:"{{route('admin.save_complete_status',$students->id)}}",
                type:"POST",
                data:formData,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    if(data.status === 400)
                    {
                        $('#register_status').prop('disabled', false);
                        $('#register_status').val('Confirm CIurse');
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
