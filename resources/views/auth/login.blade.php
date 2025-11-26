    <x-head></x-head>
    <x-navbar></x-navbar>
        <!-- login area -->
        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            <img src="assets/img/logo/logo.png" alt="">
                            <p>Login </p>
                        </div>

                        @if(session('failed'))
                            <div class="alert alert-danger">{{session('failed')}}</div>
                        @endif

                        <form action="/login" method ="post">
                                @csrf

                                {{-- ERROR EMAIL --}}
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                                </div>
                                {{-- ERROR PASSWORD --}}
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <label>Password</label>
                                    <div style="position: relative;">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Your Password">

                                        <!-- TOMBOL SHOW PASSWORD -->
                                        <span onclick="togglePassword()" 
                                            style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer;">
                                            👁️
                                        </span>
                                    </div>
                                </div>

                            <div class="d-flex justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="forgot-password.html" class="forgot-pass">Forgot Password?</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                            </div>
                        </form>
                        <div class="login-footer">
                            <p>Don't have an account? <a href="register.html">Register.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
function togglePassword() {
    const input = document.getElementById("password");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
</script>
        <!-- login area end -->

        <x-footer></x-footer>