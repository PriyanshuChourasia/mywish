<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-warning">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Due Amount</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_due">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="" id="student_id" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" name="" id="subject_id" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Due Amount</label>
                            <input type="text" name="due_amount" id="due_amount" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" value="{{_('Pay Dues')}}" class="btn btn-warning" id="due_register">
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    $(document).ready(function(){
        $('#register_due').on('submit', function(e){
            e.preventDefault();

            $('#due_register').val('Please wait....');
            $('#due_register').prop('disabled', true);
            
            var formData = new FormData(this);
            
            $.ajax({
                url:"",
                type:"POST",
                processData:false,
                contentType: false,
                data:formData,
                success:function(data)
                {
                    if(data.status === 400)
                    {

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
