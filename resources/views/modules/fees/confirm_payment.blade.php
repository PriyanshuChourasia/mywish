<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $fees->student_id }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_confirm">
                @csrf
                <div class="sr-only">
                    <input type="text" name="student_id" id="" value="{{$fees->student_id}}">
                    <input type="text" name="subject_id" id="" value="{{$fees->subject_id}}">
                </div>
                <div class="row">
                    <div class="col-12">
                        <img
                            src="{{ asset('uploads/student/payment_image/' . $fees->payment_image) }}"
                              style="height: 80px; width:80px; border-radius:50%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Paid Date</label>
                            <input type="text" name="paid_date" id="paid_date" class="form-control"
                                value="{{ $fees->paid_date }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Monthly Fees</label>
                            <input type="text" name="monthly_fees" id="monthly_fees" class="form-control"
                                value="{{ $fees->monthly_fees }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Paid Amount</label>
                            <input type="text" name="paid_amount" id="paid_amount" class="form-control"
                                value="{{ $fees->paid_amount }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" id="status" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="">Due Amount</label>
                        <input type="text" name="due_amount" id="due_amount" class="form-control" readonly>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <input type="submit" value="{{ __('Confirm Payment') }}" class="btn btn-primary"
                        id="confirm-register">
                </div>
            </form>
        </div>
    </div>
</div>



<script>

    $(function(){
        var paidAmount = $('#paid_amount').val();
        var monthlyFees = $('#monthly_fees').val();
        var diff = Number(monthlyFees) - Number(paidAmount);

        if(paidAmount == monthlyFees)
        {
            $('#status').val('paid');
            $('#due_amount').val();
        }else{
            $('#status').val('due');
            $('#due_amount').val(diff);
        }
     });
    $(document).ready(function(){
        $('#register_confirm').on('submit', function(e) {
                e.preventDefault();

                $('#confirm-register').val('Please Wait.......');

                var formData = new FormData(this);

                $('#confirm-register').prop('disabled', true);

                $.ajax({
                    url: "{{ route('admin.confirm_fees',$fees->id) }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status === 400) {
                            $('#fees_register').val('Create Card');
                            $('#fees_register').prop('disabled', false);
                        } else if (data.status === 200) {

                            
                            $('#modal-popup').modal('hide');
                            window.location.reload(true);
                        }
                    }
                });
            });
    });
</script>
