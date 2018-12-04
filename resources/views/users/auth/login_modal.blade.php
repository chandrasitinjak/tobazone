<div class="modal fade loginmodal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
     data-backdrop="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header " style="border: none;">
          <h3 class="modal-title" style="margin: auto">Ulos Zone</h3>
        <button type="button" class="close p-0 m-0" data-dismiss="modal" aria-label="Close" style="">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body px-5">
        <h6 class=" font-light small" id="exampleModalLabel">Masuk ke Akun Anda</h6>
        <form>
          <div class="form-group">
            <!--<label for="recipient-name" class="col-form-label"></label>-->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
              </div>
              <input type="text" class="form-control form-control-sm" id="email" placeholder="Email">
            </div>

          </div>
          <div class="form-group ">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control form-control-sm" id="password" placeholder="Password">
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer  py-0 px-5" style="border: none">
        <button type="button" class="btn btn-primary btn-block" onclick="login()">Login</button>
      </div>


      <div class="modal-footer border-0 justify-content-between">
        <p> Belum punya akun?
          <a href="{{ url('/register')}}" class="">Daftar disini</a>
        </p>
        <p>
          <a class="" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
        </p>

      </div>
    </div>
  </div>
</div>

<script>
    async function login() {
        const email = document.getElementById('email').value
        const password = document.getElementById('password').value

        await jQuery.ajax({
            url: '/login',
            type: 'POST',
            data: {
                email: email,
                password: password,
                _token: "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function() {

            },
            complete: () => {
            window.location.reload();
    }
    })
    }

</script>