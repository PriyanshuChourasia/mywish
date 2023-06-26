<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">

            <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">{{Auth::guard('student')->user()->name}}</h1>


            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_subject">
                @csrf
                <div class="sr-only">
                    <input type="text" name="student_id"id="student_id"
                        value="{{ Auth::guard('student')->user()->id }}">
                    <input type="text" name="status" id="status" value="requested">
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <select class="form-select" aria-label="Default select example" name="subject_id" id="subject_id">
                                <option selected>Open this select menu</option>
                                @forelse ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                @empty
                                    <option value="">No Data Available</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="">Fees</label>
                        <input type="text" name="" readonly id="fees" class="form-control text-white bg-black">
                    </div>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" value="{{ __('Request') }}" class="btn btn-success" id="subject_register">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#subject_id').change( function(e){
            e.preventDefault();

            var id = $(this).val();


            $.ajax({
                url:"get_fees/"+id,
                type:"GET",
                processData: false,
                contentType:false,
                success: function(data)
                {
                    $('#fees').val(data.fees);
                }
            });
        });
        $('#register_subject').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('student.save_subject_select') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    if (data.status === 400) {
                        console.log(data);
                    } else if (data.status === 200) {
                        $('#modal-popup').modal('hide');
                        window.location.reload(true);
                    }
                }
            });
        });
    });
</script>
