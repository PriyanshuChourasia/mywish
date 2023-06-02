<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Routine</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_routine">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label for="">Routine Name</label>
                        <input type="text" name="routine_name" id="routine_name" class="form-control" placeholder="For eg: JAVA Routine, C++ Routine">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12">
                        <label for="">Select Day Count</label>
                        <select class="form-select" id="day_count" name="day_count">
                            <option selected>Open this select menu</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6" id="day1">
                        <label for="">Day</label>
                        <select class="form-select" id="day1" name="day_one" onchange="getSelectedValue(this.value)">
                            <option selected>Open this select menu</option>
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6" id="day2">
                        <label for="">Day</label>
                        <select class="form-select" id="day2" name="day_two" onchange="getSelectedValue(this.value)">
                            <option selected>Open this select menu</option>
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6" id="day3">
                        <label for="">Day</label>
                        <select class="form-select" id="day3" name="day_three" onchange="getSelectedValue(this.value)">
                            <option selected>Open this select menu</option>
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6" id="day4">
                        <label for="">Day</label>
                        <select class="form-select" id="day4" name="day_four" onchange="getSelectedValue(this.value)">
                            <option selected>Open this select menu</option>
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6" id="day5">
                        <label for="">Day</label>
                        <select class="form-select" id="day5" name="day_five">
                            <option selected>Open this select menu</option>
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
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
                    <input type="submit" value="{{ __('Submit') }}" id="routine_register" class="btn btn-info w-100">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('#day1').hide();
        $('#day2').hide();
        $('#day3').hide();
        $('#day4').hide();
        $('#day5').hide();

        $('#day_count').change(function() {
            if ($('#day_count').val() == 2) {
                $('#day1').show();
                $('#day2').show();
                $('#day3').hide();
                $('#day4').hide();
                $('#day5').hide();
            } else if ($('#day_count').val() == 3) {
                $('#day1').show();
                $('#day2').show();
                $('#day3').hide();
                $('#day4').hide();
                $('#day5').show();
            } else if ($('#day_count').val() == 5) {
                $('#day1').show();
                $('#day2').show();
                $('#day3').show();
                $('#day4').show();
                $('#day5').show();
            } else if ($('#day_count').val() != 2 || 3 || 5) {
                $('#day1').hide();
                $('#day2').hide();
                $('#day3').hide();
                $('#day4').hide();
                $('#day5').hide();
            }
        });
    });

    function getSelectedValue(day1)
{
    if(day1 != '')
    {
        $('#day2 option[value="'+day1+'"]').hide();
        $('#day2 option[value!="'+day1+'"]').show();
        $('#day3 option[value="'+day1+'"]').hide();
        $('#day3 option[value!="'+day1+'"]').show();
        $('#day4 option[value="'+day1+'"]').hide();
        $('#day4 option[value!="'+day1+'"]').show();
        $('#day5 option[value="'+day1+'"]').hide();
        $('#day5 option[value!="'+day1+'"]').show();
    }
}
// function getSelectedValue(day2)
// {
//     if(day2 != '')
//     {
//         $('#day1 option[value="'+day2+'"]').hide();
//         $('#day1 option[value!="'+day2+'"]').show();
//         $('#day3 option[value="'+day2+'"]').hide();
//         $('#day3 option[value!="'+day2+'"]').show();
//         $('#day4 option[value="'+day2+'"]').hide();
//         $('#day4 option[value!="'+day2+'"]').show();
//         $('#day5 option[value="'+day2+'"]').hide();
//         $('#day5 option[value!="'+day2+'"]').show();
//     }
// }
// function getSelectedValue(day3)
// {
//     if(day3 != '')
//     {
//         $('#day4 option[value="'+day3+'"]').hide();
//         $('#day4 option[value!="'+day3+'"]').show();
//     }
// }
// function getSelectedValue(day4)
// {
//     if(day4 != '')
//     {
//         $('#day5 option[value="'+day4+'"]').hide();
//         $('#day5 option[value!="'+day4+'"]').show();
//     }
// }


    $(document).ready(function() {
        $('#register_routine').on('submit', function(e) {
            e.preventDefault();

            $('#routine_register').val('Submitting.....');
            $('#routine_register').prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.store_routine') }}",
                type: "POST",
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 400) {
                        $('#routine_register').val('Submit');
                        $('#routine_register').prop('disabled', false);
                        console.log(response);
                        toastr.error('Some Error Occurred');
                    } else if (response.status === 200) {
                        $('#modal-popup').modal('hide');
                        toastr.success('Routine Successfully Created');
                    }
                }
            });
        });
    });
</script>
