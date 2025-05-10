<x-layout>
  <x-slot name="title">Employee Management | Register</x-slot>

  <!-- ====== Banner Start ====== -->
  <x-page-banner :title="'Register'" />
  <!-- ====== Banner End ====== -->

  <!-- ====== Register Start ====== -->
  <section class="ud-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="ud-login-wrapper" id="register-wrapper">
            <div class="ud-login-logo">
              <img src="{{ asset('assets/images/logo/logo-2.svg') }}" alt="logo" />
            </div>
            <form class="ud-login-form" method="POST" action="{{ route('register') }}">
              @csrf
              <div class="ud-form-group">
                <input required autofocus autocomplete maxlength="255" minlength="3" type="text" name="username"
                  placeholder="Username" />
              </div>
              <div class="ud-form-group">
                <input required autocomplete maxlength="255" minlength="3" type="email" name="email"
                  placeholder="Email" />
              </div>
              <div class="ud-form-group">
                <input required minlength="3" type="password" name="password" placeholder="Password" />
              </div>

              <div class="ud-form-group">
                <input required type="password" name="password_confirmation" placeholder="Confirm Password" />
              </div>

              <div class="ud-form-group">
                <button type="submit" class="ud-main-btn w-100">Register</button>
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
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="google">
                    <i class="lni lni-google"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Register End ====== -->
</x-layout>
