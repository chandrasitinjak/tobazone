<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
  data-backdrop="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header align-items-center border-0">
        <h5 class="modal-title font-light " id="exampleModalLabel">Masuk ke Akun Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <!--<label for="recipient-name" class="col-form-label"></label>-->
            <input type="text" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
        </form>

        <div class="col-12 mt-50" style="border-bottom: 1px solid #ced4da; width: 100%;"></div>
      </div>
      <div class="modal-footer" style="border: none">
        <button type="button" class="btn btn-primary btn-block" onclick="login()">Login</button>
      </div>
      <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
      </a>
      <div class="modal-footer align-self-center">
        <a href="{{ url('/register')}}" class="btn btn-block btn-link"> Register New Account </a>
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