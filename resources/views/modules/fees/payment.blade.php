<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Fees Payment') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="fees_payment">
                @csrf

                @php
                    $prefix = Request::route()->getPrefix();
                    $route = Route::current()->getName();
                    
                    $guards = array_keys(config('auth.guards'));
                    
                    $guard = Auth::getDefaultDriver();
                    
                    $user = Auth::guard($guard)->user();
                    //   @dd($guard);
                @endphp
                <input type="text" class="sr-only" value="<?php echo $guard; ?>" class="" id="guard">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student ID</label>
                            <input type="text" name="student_id" id="student_id" readonly
                                value="{{ $fees_id->student_id }}" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject ID</label>
                            <input type="text" name="subject_id" id="subject_id" class="form-control" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Monthly Fees</label>
                            <input type="text" name="monthly_fees" id="monthly_fees" readonly value=""
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Paid Date</label>
                            <input type="date" name="paid_date" id="paid_date" class="form-control"
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Paying Amount</label>
                            @if ($guard != 'student')
                                <span id="copy_amount" class="badge badge-primary fs-6"
                                    style="cursor: pointer">{{ __(' Copy Monthly Fees') }}</span>
                            @endif

                            <input type="text" name="paid_amount" id="paid_amount" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Month</label>
                            <input type="text" name="month" readonly required id="month" class="form-control"
                                value="<?php echo date('F'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row" id="fee_due">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fees Status</label>
                            <input type="text" name="status" id="fees_status" class="form-control " value=""
                                required readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Due Amount</label>
                        <input type="number" name="due_amount" id="due_amount" class="form-control" value=""
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Payment Image</label>
                            <input type="file" name="payment_image" id="payment_image" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3 mb-3">
                    <input type="submit" value="{{ __('Confirm Payment') }}" class="btn btn-primary w-100"
                        id="payment_fees">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(function() {
        var stu_id = $('#student_id').val()
        // alert(stu_id);
        var guard = $('#guard').val();

        if (guard != 'student') {
            $.ajax({
                url: "/admin/modules/fees/get_subs/" + stu_id,
                type: "GET",
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#subject_id').val(data.sub);
                    $('#monthly_fees').val(data.amount);
                }
            });
        } else {
            $.ajax({
                url: "/student/modules/fees/get_subs/" + stu_id,
                type: "GET",
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#subject_id').val(data.sub);
                    $('#monthly_fees').val(data.amount);
                }
            });
        }




    });





    $(document).ready(function() {

        var guard = $('#guard').val();
    

        if (guard === 'student') {
            $('#fee_due').hide();
            $('#fees_status').val('pending');


            $('#fees_payment').on("submit", function(e) {
                e.preventDefault();
                $('#payment_fees').val('Please wait.........');
                $('#payment_fees').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('student.fee_paid', $fees_id->id) }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 400) {

                        } else if (data.status === 200) {
                            $('#modal-popup').modal('hide');
                            window.location.reload(true);
                        }
                    }
                });
            });
        } else {
            $('#copy_amount').on('click', function(e) {
                e.preventDefault();
                var amo = $('#monthly_fees').val();
                $('#paid_amount').val(amo);
                $('#due_amount').val(0);
                $('#fees_status').val('paid');
            });

            $('#paid_amount').on('keyup', function(e) {
                e.preventDefault();

                var num1 = $('#paid_amount').val();
                var num2 = $('#monthly_fees').val();
                if (num1 < 0) {
                    $('#paid_amount').val(num2);
                    $('#due_amount').val('0');
                    $('#fees_status').val('paid');
                }
                var diff = Number(num2) - Number(num1);
                var ch = $('#due_amount').val(diff);
                if (diff == '0') {
                    $('#fees_status').val('paid');
                }
                if (diff != 0) {
                    $('#fees_status').val('due');
                }
                if (diff < 0) {
                    $('#paid_amount').val(num2);
                    $('#due_amount').val(0);
                    $('#fees_status').val('paid');
                }
                if (num1 == num2) {
                    $('#fees_status').val('paid');
                }
            });

            $('#fees_payment').on("submit", function(e) {
                e.preventDefault();
                $('#payment_fees').val('Please wait.........');
                $('#payment_fees').prop('disabled', true);

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.fee_paid', $fees_id->id) }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 400) {

                        } else if (data.status === 200) {
                            $('#modal-popup').modal('hide');
                            window.location.reload(true);
                        }
                    }
                });
            });
        }



    });
</script>
