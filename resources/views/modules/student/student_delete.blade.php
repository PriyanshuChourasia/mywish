<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        {{-- <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body">
            <form id="confirm_delete">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Student Name</label>
                            <input type="text" name="" id="student_name"
                                class="form-control bg-dark text-white" value="{{ $student->name }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for=""
                                class="fs-4">{{ __('Are you sure you want to Delete this student?') }}</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <span style="font-size: 12px"
                            class="text-danger">{{ __('Once student is banned. Student will not be able to access his/her account. And Every activity of that student will be stopped!') }}</span>

                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="{{__('Confirm')}}" class="btn btn-success" id="delete_confirm">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#confirm_delete').on('submit',function(e)
        {
            e.preventDefault();
            
            $('#delete_confirm').val('Please wait.....');
            $('#delete_confirm').prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                url:"{{route('admin.destroy_student',$student->id)}}",
                type:"POST",
                processData:false,
                contentType:false,
                data: formData,
                success: function(data){
                    if(data.status === 400)
                    {
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