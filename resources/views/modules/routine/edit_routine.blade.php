<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Routine</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="edit_routine">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label for="">Day</label>
                        <select class="form-select" id="day" name="id">
                            <option selected>Open this select menu</option>
                            @foreach ($days as $day)
                            <option value="{{$day}}">{{$day}}</option>
                            @endforeach
                           
                          </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="">From</label>
                        <input type="time" name="class_from" id="class_from" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Upto</label>
                        <input type="time" name="class_upto" id="class_upto" class="form-control">
                    </div>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" value="{{__('Submit')}}" id="routine_edit" class="btn btn-info w-100">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#edit_routine').on('submit', function(e){
            e.preventDefault();

            $('#routine_edit').val('Submitting.....');
            $('#routine_edit').prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                url: url,
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response)
                {
                    if(response.status === 400)
                    {
                        $('#routine_edit').val('Submit');
                        $('#routine_edit').prop('disabled', false);
                        console.log(response);
                        toastr.error('Some Error Occurred');
                    }else if(response.status === 200)
                    {
                        $('#modal-popup').modal('hide');
                        toastr.success('Routine Edited Created');
                    }
                }
            });
        });
    });
</script>