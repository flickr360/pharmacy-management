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

        <form method="POST" action="/login">
            @csrf
            <div class="form-fields">
                <!-- Email Field -->
                <div class="form-field">
                    <label for="email">Email</label>
                    <input
                        name="email"
                        id="email"
                        type="email"
                        required
                    />
                    <div class="error-message"></div>
                </div>

                <!-- Password Field -->
                <div class="form-field">
                    <label for="password">Password</label>
                    <input
                        name="password"
                        id="password"
                        type="password"
                        required
                    />
                    <div class="error-message"></div>
                </div>
            </div>

            <!-- Action Buttons Section -->
            <div class="action-buttons">
                <a href="/" class="cancel-link">Cancel</a>
                <button type="submit" class="submit-btn">Log In</button>
            </div>
        </form>

        <!-- Link to Register Page -->
        <div class="register-link-container">
            <a href="{{ route('register') }}" class="register-link">Don't have an account? Register</a>
        </div>
    </div>

</body>
</html>
