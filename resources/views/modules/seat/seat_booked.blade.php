<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            {{-- <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1> --}}
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="register_seat">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="" readonly class="form-control" value="{{$seatId->time}}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" id="" readonly class="form-control" value="{{$seatId->date}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="hidden" name="" class="seatID" id="" value="{{$seatId->id}}" class="form-control" readonly>
                    </div>
                    <div class="col-12">
                        <input type="text" name="student_id" id="" class="sr-only" value="{{Auth::guard('student')->user()->id}}" readonly>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" value="{{__('Book')}}" id="seat_register" class="btn btn-dark w-100">
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
    $(document).ready(function(){
        $('#register_seat').on("submit", function(e){
            e.preventDefault();

            $('#seat_register').val('Booking');
            $('#seat_register').css("class",'btn btn-success');
            $('#seat_register').prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                url: "{{route('student.save_seat',$seatId->id)}}",
                type:"POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 400)
                    {
                        console.log(response);
                        $('#seat_register').val('Booking');
                        $('#seat_register').css("class",'btn btn-dark');
                        $('#seat_register').prop('disabled', false);
                    }else if(response.status === 200)
                    {
                        $('#modal-popup').modal('hide')
                        toastr.success('Seat Booked Successfully');
                        window.location.reload(true);
                    }
                }
            });
        });
    });
</script>
