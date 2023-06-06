<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Release Seats</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" id="add_seat" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="text" name="date"  id="set_date"  class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        {{-- <div class="form-group">
                            <label>Time picker:</label>
                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <input type="time" name="time" class="form-control" />
                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="">Time</label>
                            <input type="time" name="time" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Choose Subject</label>
                            <select class="form-select" aria-label="Default select example" name="subject_id"
                            id="subject_id">
                            <option selected>Select Subject</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="">No of Seats <span class="text-secondary" style="font-size: 16px">to be released</span></label>
                        <input type="number" name="seat_number" id="seat_number" class="form-control" placeholder="Enter No of seats">
                    </div>
                </div>
                <div class="text-center mt-4 mb-2">
                    <input type="submit" value="Create Seat" id="create_seat" class="btn btn-primary fw-bold rounded-2 w-100">
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
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth()+1;

    if(month<10)
    {
        month = '0'+month
    }
    var todaysDate = String(date.getDate() + 1).padStart(2,'0');
    var datePattern = year + '-' + month + '-' + todaysDate;
    $('#set_date').val(datePattern);
</script>
<script>
    $(function(){
        //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    });
      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
    });
    });
</script>
<script>
    $(document).ready(function(){
        $('#add_seat').on('submit', function(e){
            e.preventDefault();

            $('#create_seat').val('Creating.....');
            $('#create_seat').prop('disabled', true);
            
            var formData = new FormData(this);

            $.ajax({
                url: "{{route('admin.store_seat')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response){
                    if(response.status === 400)
                    {
                        console.log(response);
                        $('#create_seat').val('Create Seat');
                        $('#create_seat').prop('disabled', false);
                    }else if(response.status === 200)
                    {
                        toastr.success('Seats Created Successfully');
                        $('#modal-popup').modal('hide');
                        window.location.reload();
                    }
                }
            });

        });
    });
</script>