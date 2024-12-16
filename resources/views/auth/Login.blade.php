<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLTE 4 | Login Page</title>
    <meta name="title" content="AdminLTE 4 | Login Page">
    @include('Layouts.styles') <!-- Required Plugin (AdminLTE) -->
    <style>
        .login-page {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom, #007bff, #6c757d);
        }
        .login-box {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            color: #007bff;
            margin-bottom: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <!-- Logo -->
        <div class="login-logo">
            <b>AdminLTE</b>
        </div>

        <!-- Card Container -->
        <div class="card">
            <div class="card-body">
                <p class="text-center text-muted">Silakan login ke akun Anda</p>

                <!-- Alert Messages -->
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('loginproccess') }}" method="POST">
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email" value="{{ old('email') }}">
                            <label for="email">Email</label>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Login Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('Layouts.Scirpts') <!-- Required Scripts -->
</body>

</html>
