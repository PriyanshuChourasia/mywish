<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Student</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Select Student</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Student</option>
                            @forelse ($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                            @empty
                                <option value="null">No Students Available</option>
                            @endforelse
                          </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
    </div>
</div>
