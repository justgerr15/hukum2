    <x-head :setting="$setting"/>

        <header class="header">

        <div class="header-top">
            <x-sub-header :setting="$setting"/>
    </header>

            <!-- preloader -->
    <div class="preloader">
        <div class="loader-book">
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
        </div>
    </div>
    <!-- preloader end -->

    <x-navbar :setting="$setting"/>
        <!-- login area -->
        <div class="login-area py-120">
            <div class="container">
                <div class="col-md-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            <img src="{{ asset('upload/setting/' . ($setting[0]->logo ?? 'default.png')) }}" alt="">
                            <p>Login </p>
                        </div>

                        @if(request('session') == 'expired')
                        <div class="alert alert-warning">
                            Session Anda telah habis, silahkan login kembali.
                        </div>
                    @endif


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
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                            </div>
                        </form>
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