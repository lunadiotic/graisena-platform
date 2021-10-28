@extends('auth.app')

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <p class="text-muted mb-4 mt-3">
                                Enter your email address to get a password reset link.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                @enderror
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Send Password Reset Link </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        @if (Route::has('login'))
                            <p class="text-white-50">Already have an account?  <a href="{{ route('login') }}" class="text-white ms-1">Login</a></p>
                        @endif
                        @if (Route::has('register'))
                            <p class="text-white-50">Don't have an account? <a href="{{ route('register') }}" class="text-white ms-1"><b>Sign Up</b></a></p>
                        @endif
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
@endsection

