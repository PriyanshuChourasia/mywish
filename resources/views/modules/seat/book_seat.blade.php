<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Book Your Seat</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL_No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($collections as $k => $item)
                              <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->time}}</td>
                                @if($item->student_id != null)
                                <td><span class="badge bg-danger">Booked</span></td>
                                @else
                                <td><a href="javascript:void(0)" class="btn btn-dark load-popup" data-url="{{route('student.seat_booking',$item->id)}}">Book Now</a></td>
                                @endif
                              </tr>
                          @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div> --}}
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.book_my_seat').on('click',function(e){
            e.preventDefault();

            alert('Hello');
        });
    });
</script>