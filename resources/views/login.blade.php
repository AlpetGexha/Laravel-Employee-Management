<x-layout>
  <x-slot name="title">Employee Management | Login</x-slot>

  <!-- ====== Banner Start ====== -->
  <x-page-banner :title="'Login'" />
  <!-- ====== Banner End ====== -->
  <section class="ud-page-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-banner-content">

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Banner End ====== -->

    <section class="ud-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-login-wrapper" id="login-wrapper">
            <div class="ud-login-logo">
              <img src="{{ asset('assets/images/logo/logo-2.svg') }}" alt="logo" />
            </div>
            <form class="ud-login-form" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="ud-form-group">
                <input type="email" name="email" placeholder="Email/username" required />
              </div>
              <div class="ud-form-group">
                <input type="password" name="password" placeholder="*********" required />
              </div>
              <div class="ud-form-group">
                <button type="submit" class="ud-main-btn w-100">Login</button>
              </div>
            </form>

            <div class="ud-socials-connect" id="socials-connect">
              <p>Connect With</p>

              <ul>
                <li>
                  <a href="javascript:void(0)" class="facebook">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="twitter">
                    <i class="lni lni-twitter-filled"></i>
                  </a>                </li>
                <li>
                  <a href="javascript:void(0)" class="google">
                    <i class="lni lni-google"></i>
                  </a>
                </li>
              </ul>
            </div>

            <a class="forget-pass" href="{{ route('password.request') }}">
              Forgot Password?
            </a>
            <p class="signup-option">
              Not a member yet? <a href="{{ route('register') }}"> Sign Up </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Login End ====== -->
</x-layout>
