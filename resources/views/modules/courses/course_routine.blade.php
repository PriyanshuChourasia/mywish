<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Routine Setup') }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_routine">
                @csrf
                <input type="text" name="status" id="status" class="sr-only" value="running">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="" id="course_id" value="{{ $course->id }}"
                            class="bg-dark text-white form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="" id="subject_id" value="{{ $course->subject_id }}"
                            class="bg-dark text-white form-control" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="routine_id" id="routine_id">
                            @forelse ($routines as $item)
                                <option value="{{ $item->id }}">{{ $item->id }}</option>
                            @empty
                                <option value="">No Routine Created</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" value="{{ __('Set Routine') }}" class="form-control btn btn-success w-100"
                        id="routine_register">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#register_routine').on("submit", function(e) {
            e.preventDefault();
            $('#routine_register').val('Please wait........');
            $('#routine_register').prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.update_course', $course->id) }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                 
                    if (data.status == 400) {
                        $('#routine_register').val('Set Routine');
                        $('#routine_register').prop('disabled', false);
                    } else if(data.status === 200){
                        $('#modal-popup').modal('hide');
                        window.location.reload(true);
                    }
                }
            });
        });
    });
</script>
