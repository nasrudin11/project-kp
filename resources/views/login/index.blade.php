@extends('layouts.main')

@section('content')
    <main class="container d-flex align-items-center justify-content-center flex-grow-1">
        <div class="col-lg-5 col-md-8 col-sm-10">
            <div class="card shadow border-0 form-registration">
                <div class="card-body">

                    @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('retryAfter'))
                        <div class="alert alert-warning">
                            Too many login attempts. Please try again in <span id="time">{{ session('retryAfter') }}</span> seconds.
                        </div>
                        <script>
                            let countdown = {{ session('retryAfter') }};
                            const timer = setInterval(() => {
                                countdown--;
                                document.getElementById('time').innerText = countdown;
                                if (countdown <= 0) {
                                    clearInterval(timer);
                                }
                            }, 1000);
                        </script>
                    @endif

                    <form action="/login" method="post">
                        @csrf
                        <div class="text-center">
                            <img class="mb-4 logo-img" src="img/logo.png" alt="">
                            <h1 class="h3 mb-3 fw-normal">Log in</h1>
                        </div>       
                        <div class="form-floating">
                            <input type="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control rounded-bottom" id="floatingPassword" name="password" placeholder="Password" autofocus required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
