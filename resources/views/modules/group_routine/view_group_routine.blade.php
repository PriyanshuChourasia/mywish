<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">View Group Routine</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-black">
            <div class="text-center">
                <label for="">Routine Group Name</label>
                <input type="text" readonly value="{{$routines->subject->subject_name}}" class="form-control text-success fw-bold text-center" style="font-size: 22px">
            </div>
            <div class="row">
              <div class="col-md-6 mt-2">
                <label for="">Monday</label>
                @if ($routines->day_one == 'null')
                <input type="text" readonly class="form-control text-black fw-bold" value="{{__('No Class Selected')}}" id="">
                @else
                <input type="text" readonly value="{{$routines->routine_one->day_name}}{{__(' ')}}{{date('g:i A,', strtotime($routines->routine_one->class_from))}}{{__(' to ')}}{{date('g:i A', strtotime($routines->routine_one->class_upto))}}" class="form-control fw-bold text-black">
                    
                @endif
              </div>
              <div class="col-md-6 mt-2">
                <label for="">Tuesday</label>
                @if ($routines->day_two == 'null')
                    <input type="text" readonly class="form-control fw-bold text-black" value="{{__('No Class Selected')}}" id="">
                @else
                <input type="text" readonly value="{{$routines->routine_two->day_name}}{{__(' ')}}{{date('g:i A,', strtotime($routines->routine_two->class_from))}}{{__(' to ')}}{{date('g:i A', strtotime($routines->routine_two->class_upto))}}" class="form-control fw-bold text-black">
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mt-3">
                <label for="">Wednesday</label>
                @if ($routines->day_three == 'null')
                    <input type="text" class="form-control fw-bold text-black" readonly value="{{__('No Class Selected')}}" id="">
                @else
                <input type="text" readonly value="{{$routines->routine_three->day_name}}{{__(' ')}}{{date('g:i A,', strtotime($routines->routine_three->class_from))}}{{__(' to ')}}{{date('g:i A', strtotime($routines->routine_three->class_upto))}}" class="form-control fw-bold text-black">
                @endif
              </div>
              <div class="col-md-6 mt-3">
                <label for="">Thrusday</label>
                @if($routines->day_four == 'null')
                    <input type="text" value="{{__('No Class Selected')}}" readonly class="form-control fw-bold text-black">
                @else
                <input type="text" readonly value="{{$routines->routine_four->day_name}}{{__(' ')}}{{date('g:i A,', strtotime($routines->routine_four->class_from))}}{{__(' to ')}}{{date('g:i A', strtotime($routines->routine_four->class_upto))}}" class="form-control fw-bold text-black">
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mt-2">
                <label for="">Friday</label>
                @if ($routines->day_five == 'null')
                <input type="text" readonly value="{{__('No Class Selected')}}" class="form-control fw-bold text-black">
                @else
                <input type="text" readonly value="{{$routines->routine_five->day_name}}{{__(' ')}}{{date('g:i A,', strtotime($routines->routine_five->class_from))}}{{__(' to ')}}{{date('g:i A', strtotime($routines->routine_five->class_upto))}}" class="form-control fw-bold text-black">
                @endif
              </div>
             
            </div>
        </div>

    </div>
</div>
