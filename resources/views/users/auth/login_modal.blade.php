<div class="modal fade loginmodal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
  data-backdrop="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h3 class="modal-title" style="margin: auto">Tobazone</h3>
        <button type="button" class="close p-0 m-0" data-dismiss="modal" aria-label="Close" style="">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <h6 class="font-light" id="exampleModalLabel"></h6>
        {{-- <p id="test"></p> --}}

        <div id="loader" style="position: fixed;width: 100%;height: 100%;margin-left : 10rem;z-index:99;display:none">
            <img src="{{ url("/images/assets/spinner.gif") }}" alt="">
          </div>
        <form id="form-login-submit">
          <div class="form-group">
            <!-- <label for="recipient-name" class="col-form-label"></label> -->
            <div class="input-group" >
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
              </div>
              <input type="email" class="form-control form-control-sm" id="email" placeholder="E-mail" required >
            </div>
            <label style="color: red; display:none" id="err_requiredEmail">E-mail tidak boleh kosong</label>
            <label style="color: red; display:none" id="err_notValidEmail">Masukkan email dengan format example@mail.com</label>
          </div>
          <div class="form-group ">
            <div class="input-group ">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control form-control-sm" id="password" placeholder="Kata Sandi" style="" required>
            </div>
            <label style="color: red;display:none" id="Err_requiredPassword">Kata Sandi tidak boleh kosong</label>
             <p class=" lupas">
              <a class="small" href="{{ route('password.request') }}" style="color: black">
                {{ __('Lupa kata sandi?') }}
              </a>
            </p>
          </div>
        </form>
      </div>
      <div class="modal-footer  py-0 " style="border: none">
        <input type="hidden" id="hidden-customer" value="customer">
        <button type="submit" class="btn essence-btn btn-block" onclick="login() ">Masuk</button>
      </div>

      <div class="modal-footer border-0 justify-content-between px-5">
        <p> Belum punya akun Tobazone?
          <a href="{{ url('/register')}}" class="" style="font-weight: 800; color: #4b1815">Daftar</a>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade loginmodal" id="loginModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
     data-backdrop="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h3 class="modal-title" style="margin: auto">Tobazone</h3>
        <button type="button" class="close p-0 m-0" data-dismiss="modal" aria-label="Close" style="">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <h6 class="font-light" id="exampleModalLabel"></h6>
        {{-- <p id="test"></p> --}}

        <div id="loader" style="position: fixed;width: 100%;height: 100%;margin-left : 10rem;z-index:99;display:none">
          <img src="{{ url("/images/assets/spinner.gif") }}" alt="">
        </div>
        <form id="form-login-submit">
          <div class="form-group">
            <!-- <label for="recipient-name" class="col-form-label"></label> -->
            <div class="input-group" >
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
              </div>
              <input type="email" class="form-control form-control-sm" id="email" placeholder="E-mail" required >
            </div>
            <label style="color: red; display:none" id="err_requiredEmail">E-mail tidak boleh kosong</label>
            <label style="color: red; display:none" id="err_notValidEmail">Masukkan email dengan format example@mail.com</label>
          </div>
          <div class="form-group ">
            <div class="input-group ">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control form-control-sm" id="password" placeholder="Kata Sandi" style="" required>
            </div>
            <label style="color: red;display:none" id="Err_requiredPassword">Kata Sandi tidak boleh kosong</label>
            <p class=" lupas">
              <a class="small" href="{{ route('password.request') }}" style="color: black">
                {{ __('Lupa kata sandi?') }}
              </a>
            </p>
          </div>
        </form>
      </div>
      <div class="modal-footer  py-0 " style="border: none">
        <input type="hidden" id="hidden-merchant" value="merchant">
        <button type="submit" class="btn essence-btn btn-block" onclick="login() ">Masuk</button>
      </div>

      <div class="modal-footer border-0 justify-content-between px-5">
        <p> Belum punya akun Tobazone?
          <a href="{{ url('/register')}}" class="" style="font-weight: 800; color: #4b1815">Daftar</a>
        </p>
      </div>
    </div>
  </div>
</div>

