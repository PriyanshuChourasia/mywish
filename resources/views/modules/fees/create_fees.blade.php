    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Create Fees Card') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="register_fees">
                    @csrf

                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Student</label>
                                <select class="form-select" aria-label="Default select example" id="students" class=" text-black" name="student_id" required>
                                    <option value="0">Select Student</option>
                                    @forelse ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
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
                                    class="form-control  text-black" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Registration Date</label>
                                <input type="date" name="registration_date" id="registation_date" class="form-control"
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Admission Fees</label>
                                <input type="number" name="admission_fees" id="admission_fees" class="form-control"
                                     value="200">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Monthly Fees</label>
                                <input type="text" name="monthly_fees" id="monthly_fees"
                                    class="form-control  text-black" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total Amount</label>
                                <input type="text" name="total_amount" id="total_amount"
                                    class="form-control  text-black" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paid Amount</label> <span id="copy_amount"
                                    class="badge badge-primary fs-6"
                                    style="cursor: pointer">{{ __(' Copy Total Amount') }}</span>
                                <input type="number" name="paid_amount" id="paid_amount" class="form-control" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Month</label>
                                <input type="text" name="month" id="month" class="form-control" value="<?php echo date('F')   ?>" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fees Status</label>
                                <input type="text" name="status" id="fees_status" class="form-control  text-black" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Due Amount</label>
                            <input type="number" name="due_amount" id="due_amount"
                                class="form-control  text-black" value="" readonly>
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
            $('#total_amount').val('select student');
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
                        if(data.status === 400)
                        {
                            $('#fees_register').val('No Subject Selected Till Now');
                            $('#fees_register').prop('disabled',true);
                        }else if(data.status === 200)
                        {
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

            $('#admission_fees').on('keyup', function(e){
                e.preventDefault();
                var num1 = $('#admission_fees').val();
                var num2 = $('#monthly_fees').val();
                if(num1 < 0 || num1 == 0 )
                {
                    $('#admission_fees').val('');
                    $('#total_amount').val(num2);
                }
                
                var sum = Number(num1) + Number(num2);
                $('#total_amount').val(sum);
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
