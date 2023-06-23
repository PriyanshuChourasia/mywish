<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Fees Payment') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="fees_payment">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student ID</label>
                            <input type="text" name="" id="" readonly
                                value="{{ $fees_id->student_id }}" class="form-control bg-black text-white">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Monthly Fees</label>
                            <input type="text" name="" id="monthly_fees" readonly
                                value="{{ $fees_id->monthly_fees }}" class="form-control bg-black text-white">
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
                            <label for="">Payment Date</label>
                            <input type="date" name="paid_date" id="paid_date" class="form-control"
                                value="{{ $fees_id->next_fees_date }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Paying Amount</label> <span id="copy_amount"
                                class="badge badge-primary fs-6"
                                style="cursor: pointer">{{ __(' Copy Monthly Fees') }}</span>
                            <input type="text" name="paid_amount" id="paid_amount" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Fees Status</label>
                            <input type="text" name="fees_status" id="fees_status"
                                class="form-control bg-black text-white" value="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Due Amount</label>
                        <input type="number" name="due_amount" id="due_amount" class="form-control bg-dark text-white"
                            value="" readonly>
                    </div>
                </div>
                <div class="text-center mt-3 mb-3">
                    <input type="submit" value="{{ __('PAY') }}" class="btn btn-primary w-100" id="payment_fees">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#copy_amount').on('click', function(e) {
            e.preventDefault();
            var amo = $('#monthly_fees').val();
            $('#paid_amount').val(amo);
                $('#due_amount').val(0);
                $('#fees_status').val('paid');
        });

        $('#paid_amount').on('keyup', function() {


            var num1 = $('#paid_amount').val();
            var num2 = $('#monthly_fees').val();
            var diff = Number(num2) - Number(num1);
            var ch = $('#due_amount').val(diff);
            if (diff == '0') {
                $('#fees_status').val('paid');
            }
            if (diff != 0) {
                $('#fees_status').val('due');
            }
            if (diff <= 0) {
                $('#paid_amount').val(num2);
                $('#due_amount').val(0);
                $('#fees_status').val('paid');
            }
            if (num1 == num2) {
                $('#fees_status').val('paid');
            }
        });

        $('#fees_payment').on("submit",function(e){

            $('#payment_fees').val('Please wait.........');
            $('#payment_fees').prop('disabled',true);

            var formData = new FormData(this);

            $.ajax({
                url:"",
                type:"POST",
                data: formData,
                processData:false,
                contentType:false,
                success: function(data)
                {
                    if(data.status == 400)
                    {

                    }else if(data.status === 200)
                    {
                        
                    }
                }
            });
        });
    });
</script>
