    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Create Fees Card') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="register_fees">
                    @csrf

                    <input type="text" name="duration" id="duration" class="sr-only">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Student</label>
                                <select class="form-select" aria-label="Default select example" id="students" class="bg-dark text-white" name="student_id">
                                    <option value="0">Select Student</option>
                                    @forelse ($courses as $course)
                                        <option value="{{ $course->student_id }}">{{ $course->student->name }}</option>
                                    @empty
                                        <option value="null">No Students Available</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Subject ID</label>
                                <input type="text" name="subject_id" id="subject_id"
                                    class="form-control bg-black text-white" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paying Date</label>
                                <input type="date" name="paid_date" id="paid_date" class="form-control"
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Admission Fees</label>
                                <input type="number" name="admission_fees" id="admission_fees" class="form-control"
                                    readonly value="200">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Monthly Fees</label>
                                <input type="text" name="monthly_fees" id="monthly_fees"
                                    class="form-control bg-dark text-white" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total Amount</label>
                                <input type="text" name="total_amount" id="total_amount"
                                    class="form-control bg-dark text-white" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paid Amount</label> <span id="copy_amount"
                                    class="badge badge-primary fs-6"
                                    style="cursor: pointer">{{ __(' Copy Total Amount') }}</span>
                                <input type="number" name="paid_amount" id="paid_amount" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fees Status</label>
                                <input type="text" name="fees_status" id="fees_status" class="form-control bg-black text-white" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <label for="">Due Amount</label>
                            <input type="number" name="due_amount" id="due_amount"
                                class="form-control bg-dark text-white" value="" readonly>
                        </div>
                    </div>
                    <div class="text-center mt-3 mb-3">
                        <input type="submit" value="{{ __('Create Card') }}" class="btn btn-success w-100"
                            id="fees_register">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#subject_id').val('select student');
            $('#fees_amount').val('select student');
            $('#monthly_fees').val('select student');
            $('#total_amount').val('select student')
            $('#students').change(function(e) {
                e.preventDefault();

                var id = $(this).val();

                if (id == "0") {
                    $('#subject_id').val('select student');
                    $('#fees_amount').val('select student');
                    $('#monthly_fees').val('select student');
                    $('#total_amount').val('select student');
                    return;
                }

                $.ajax({
                    url: "/admin/modules/fees/get_subject_id/" + id,
                    type: 'GET',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.status == 200) {
                            var sub_id = data.sub;
                            var fee_amount = data.amount;
                            $('#subject_id').val(sub_id);
                            $('#fees_amount').val(fee_amount);
                            $('#monthly_fees').val(fee_amount);
                            var num1 = fee_amount;
                            var num2 = 200;
                            var sum = Number(num1) + Number(num2);
                            $('#total_amount').val(sum);
                            $('#duration').val(data.duration);
                        } else {

                        }

                    }
                });
            });






            $('#copy_amount').on('click', function(e) {
                e.preventDefault();
                var amo = $('#total_amount').val();
                $('#paid_amount').val(amo);
                $('#fees_status').val('paid');
                $('#due_amount').val(0);
                // alert(amo);
            });

            $('#paid_amount').on('keyup', function() {

               
                var num1 = $('#paid_amount').val();
                var num2 = $('#total_amount').val();
                var diff = Number(num2) - Number(num1);
                $('#due_amount').val(diff);
                // alert(diff)
                if(diff == '0')
                {
                    $('#fees_status').val('paid');
                }
               if(diff != 0){
                    $('#fees_status').val('due');
                }
                if(diff < 0)
                {
                    $('#paid_amount').val(num2);
                    $('#due_amount').val(0);
                    $('#fees_status').val('paid');
                }
               
               
            });
            

            $('#register_fees').on('submit', function(e) {
                e.preventDefault();

                $('#fees_register').val('Please Wait.......');

                var formData = new FormData(this);

                $('#fees_register').prop('disabled', true);

                $.ajax({
                    url: "{{ route('admin.store_fees') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status === 400) {
                            $('#fees_register').val('Create Card');
                            $('#fees_register').prop('disabled', false);
                        } else if (data.status === 200) {

                            toastr.success(data.messages);
                            $('#modal-popup').modal('hide');
                            window.location.reload(true);
                        }
                    }
                });
            });
        });
    </script>
