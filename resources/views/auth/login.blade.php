<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login-reg.css') }}"> <!-- Correct path to your CSS -->
</head>
<body>

    <div class="form-container">
        <div class="heading">
            <h2>Log In</h2>
        </div>

        <!-- Display any general authentication error (invalid credentials) -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-fields">
                <!-- Email Field -->
                <div class="form-field">
                    <label for="email">Email</label>
                    <input
                        name="email"
                        id="email"
                        type="email"
                        value="{{ old('email') }}" 
                        required
                        class="{{ $errors->has('email') ? 'input-error' : '' }}" 
                    />
                    <!-- Display error message for email field -->
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Password Field -->
                <div class="form-field">
                    <label for="password">Password</label>
                    <input
                        name="password"
                        id="password"
                        type="password"
                        required
                        class="{{ $errors->has('password') ? 'input-error' : '' }}" 
                    />
                    @if ($errors->has('password'))
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>

            <div class="action-buttons">
                <button type="submit" class="submit-btn">Log In</button>
                <a href="/" class="cancel-link">Cancel</a>
                <span></span>
            </div>
        </form>

        <div class="register-link-container">
            <a href="/register" class="register-link">Don't have an account? Register</a>
        </div>
    </div>

</body>
</html>
