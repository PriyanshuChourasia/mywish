<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        {{-- <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body">
            <form action="">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Student Name</label>
                            <input type="text" name="" id="student_name"
                                class="form-control bg-dark text-white" value="{{ $student->name }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for=""
                                class="fs-4">{{ __('Are you sure you want to ban this student?') }}</label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <span style="font-size: 12px"
                            class="text-danger">{{ __('Once student is banned. Student will not be able to access his/her account. And Every activity of that student will be stopped!') }}</span>

                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
    </div>
</div>
