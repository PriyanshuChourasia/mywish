<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Subject</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_subject_select">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Student Name</label>
                            <select class="form-select" aria-label="Default select example" name="student_id" id="student_id">
                                <option selected>Open this select menu</option>
                                @forelse ($students as $student)
                                    <option value="{{$student->id}}">{{$student->name}}</option>
                                @empty
                                    <option value="">No Data Available</option>
                                @endforelse
                              </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <select class="form-select" aria-label="Default select example" name="subject_id" id="subject_id">
                                <option selected>Open this select menu</option>
                                @forelse ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                                @empty
                                    <option value="">No Data Available</option>
                                @endforelse
                              </select>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <label for="">Select Routine</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                </div> --}}
                <div class="text-center">
                    <input type="submit" value="{{__('Save Selection')}}" id="subject_select_register" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#register_subject_select').on('submit', function(e){
            e.preventDefault();
            
            $('#subject_select_register').val('Please wait........');
            $('#subject_select_register').prop('disabled', true);
            
          
            var formData = new FormData(this);

            $.ajax({
                url:"{{route('admin.store_subject_select')}}",
                type:'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(data)
                {
                    if(data.status === 400)
                    {
                        $('#subject_select_register').val('Save Selection');
                        $('#subject_select_register').prop('disabled', false);

                        console.log(data);
                    }else if(data.status === 200)
                    {
                        $('#modal').modal('hide');
                        window.location.reload(true);
                    }
                }
            });
        });
    });
</script>