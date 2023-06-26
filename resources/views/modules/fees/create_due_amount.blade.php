<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-warning">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Due Amount</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_due">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="" id="student_id" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" name="" id="subject_id" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                </div>
            </form>
        </div>
    </div>
</div>
