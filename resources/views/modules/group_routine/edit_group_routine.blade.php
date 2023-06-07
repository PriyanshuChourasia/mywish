<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Group Routine</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_group">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('Routine Group Name') }}</label>
                            <input type="text" name="group_name" id="group_name" class="form-control"
                                placeholder="Enter Routine Group Name  Ex:- Java Routine, C++ Routine">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form_group">
                            <label for="">{{ __('Monday') }}</label>
                            <select class="form-select" aria-label="Default select example" name="day_one">
                                <option selected value="null">Open this select menu</option>
                                @forelse ($monday as $item)
                                <option value="{{$item->id}}">{{$item->day_name}} {{date('g:i A', strtotime($item->class_from))}} {{__(' to ')}}{{date('g:i A', strtotime($item->class_upto))}}</option>
                                @empty
                                <option value="null">No Data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form_group">
                            <label for="">{{ __('Tuesday') }}</label>
                            <select class="form-select" aria-label="Default select example" name="day_two">
                                <option selected value="null">Open this select menu</option>
                                @forelse ($tuesday as $item)
                                <option value="{{$item->id}}">{{$item->day_name}} {{date('g:i A', strtotime($item->class_from))}} {{__(' to ')}}{{date('g:i A', strtotime($item->class_upto))}}</option>
                                @empty
                                <option value="null">No Data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form_group">
                            <label for="">{{ __('Wednesday') }}</label>
                            <select class="form-select" aria-label="Default select example" name="day_three">
                                <option selected value="null">Open this select menu</option>
                                @forelse ($wednesday as $item)
                                <option value="{{$item->id}}">{{$item->day_name}} {{date('g:i A', strtotime($item->class_from))}} {{__(' to ')}}{{date('g:i A', strtotime($item->class_upto))}}</option>
                                @empty
                                <option value="null">No Data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form_group">
                            <label for="">{{ __('Thrusday') }}</label>
                            <select class="form-select" aria-label="Default select example" name="day_four">
                                <option selected value="null">Open this select menu</option>
                                @forelse ($thrusday as $item)
                                <option value="{{$item->id}}">{{$item->day_name}} {{date('g:i A', strtotime($item->class_from))}} {{__(' to ')}}{{date('g:i A', strtotime($item->class_upto))}}</option>
                                @empty
                                <option value="null">No Data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form_group">
                            <label for="">{{ __('Friday') }}</label>
                            <select class="form-select" aria-label="Default select example" name="day_five">
                                <option selected value="null">Open this select menu</option>
                                @forelse ($friday as $item)
                                <option value="{{$item->id}}">{{$item->day_name}} {{date('g:i A', strtotime($item->class_from))}} {{__(' to ')}}{{date('g:i A', strtotime($item->class_upto))}}</option>
                                @empty
                                <option value="null">No Data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-5 mb-4">
                    <input type="submit" value="{{__('Submit')}}" class="btn btn-success w-100" id="group_register">
                </div>
            </form>
        </div>
    </div>
</div>
