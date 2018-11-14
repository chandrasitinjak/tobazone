<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="pull-left">
          <h3 class="box-title"> Login </h3>
        </div>
      </div>
      <div class="modal-body col-6 align-self-center">
        <div class="">
          <label class="label"> Email </label>
          <input type="text" class="form-control" id="email">
        </div>

        <div class="mt-4">
          <label class="label"> Password </label>
          <input type="password" class="form-control" id="password">
        </div>

        <div class="mt-4 align-self-center">
          <button type="button" class="btn essence-btn" onclick="login()">Login</button>
        </div>
        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
      </div>
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