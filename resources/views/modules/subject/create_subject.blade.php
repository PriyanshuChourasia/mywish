    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Subject</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_subject">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Subject Name</label>
                                <input type="text" name="subject_name" id="subject_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Duration(in months)</label>
                                <input type="number" name="duration" id="duration" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Fees(per months)</label>
                                <input type="number" name="fees" id="fees" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="{{__('Add Subject')}}" class="btn btn-dark rounded-2" id="subject_btn">
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> --}}
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#add_subject').on("submit", function(e){
                e.preventDefault();
                $('#subject_btn').val('Please wait.....');
                $('#subject_btn').prop('disabled', true);


                var formData = new FormData(this);

                $.ajax({
                    url: "{{route('admin.store_subject')}}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response.status === 400)
                        {
                            $('#subject_btn').val('Add Subject');
                            $('#subject_btn').prop('disabled', false);
                            toastr.error("Some Error Occured")
                        }else if(response.status === 200)
                        {
                            toastr.success("Subject Added Successfully");
                            // $('#modal-popup').html(response.html);
                            $('#modal-popup').modal('hide');
                            window.location.reload(true);
                        }
                    }
                });
            });
        });
    </script>
