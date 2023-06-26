<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">Change Password</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="register_password">
              @csrf
              <div class="mb-4">
                <span class="text-primary fs-3">{{$student->name}}</span>
              </div>
              <div class="row mt-3S">
                <div class="col-12">
                  <div class="form-group">
                    <label for="">Enter Old Password</label>
                    <input type="password" name="" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Enter New Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Enter Old Password</label>
                    <input type="cpassword" name="" id="cpassword" class="form-control" required>
                    {{-- <input type="text" name=""  id="match"> --}}
                    <span class="text-success" id="match"></span>
                    <span class="text-danger" id="not_match"></span>
                  </div>
                  
                </div>
              </div>
              <div class="text-center">
                <input type="submit" value="{{__('Save Changes')}}" class="btn btn-success" id="password_register">
              </div>
            </form>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    $('#password').on('keyup', function(e){
      e.preventDefault();

        var str_p = $(this).val();

        if(str_p == "")
        {
          $('#password_register').prop('disabled', true);

        }else if(str_p != "")
        {
          $('#password_register').prop('disabled', false);
        }
    });
    $('#cpassword').on('keyup',function(e){
      e.preventDefault();
      
      var str1 = $('#cpassword').val();
      var str2 = $('#password').val();
     
      if(str1 == str2)
      {
        // alert(str1);
        $('#match').html('Password Matched');
        $('#not_match').hide();
        $('#password_register').prop('disabled', false);
      }else if(str1 == "" || str2 == ""){
        $('#password_register').prop('disabled', true);
        $('#match').hide();
        $('#not_match').hide();
      }
      else{
        $('#password_register').prop('disabled', true);
        $('#match').html('');
        $('#not_match').html('Password Doesnot Match');
      }
    });


    $('#register_password').on('submit', function(e){
      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({
        url:"{{route('student.save_password',$student->id)}}",
        type:"POST",
        data:formData,
        processData: false,
        contentType:false,
        success:function(data)
        {
          if(data.status === 400)
          {
            console.log(data);
          }else if(data.status === 200)
          {
            $('#modal-popup').modal('hide');
            toastr.success('Password Changed Successfully');
          }
        }
      });
    });
  });
</script>
