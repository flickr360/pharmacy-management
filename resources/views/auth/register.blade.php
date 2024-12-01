<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}"> <!-- Link to custom CSS -->
</head>
<body>

    <div class="form-container">
        <div class="heading">
            <h2>Register</h2>
        </div>

        <form method="POST" action="/register">
            @csrf
            <div class="form-fields">
                <!-- First Name Field -->
                <div class="form-field">
                    <label for="first_name" class="form-label">First Name</label>
                    <input
                        name="first_name"
                        id="first_name"
                        required
                        class="form-input"
                        placeholder="Enter your first name"
                    />
                    <div class="error-message"></div>
                </div>

                <!-- Last Name Field -->
                <div class="form-field">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input
                        name="last_name"
                        id="last_name"
                        required
                        class="form-input"
                        placeholder="Enter your last name"
                    />
                    <div class="error-message"></div>
                </div>

                <!-- Email Field -->
                <div class="form-field">
                    <label for="email" class="form-label">Email</label>
                    <input
                        name="email"
                        id="email"
                        type="email"
                        required
                        class="form-input"
                        placeholder="Enter your email"
                    />
                    <div class="error-message"></div>
                </div>

                <!-- Password Field -->
                <div class="form-field">
                    <label for="password" class="form-label">Password</label>
                    <input
                        name="password"
                        id="password"
                        type="password"
                        required
                        class="form-input"
                        placeholder="Create a password"
                    />
                    <div class="error-message"></div>
                </div>

                <!-- Confirm Password Field -->
                <div class="form-field">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input
                        name="password_confirmation"
                        id="password_confirmation"
                        type="password"
                        required
                        class="form-input"
                        placeholder="Re-enter your password"
                    />
                    <div class="error-message"></div>
                </div>
            </div>

            <!-- Action Buttons Section -->
            <div class="action-buttons">
                <a href="/" class="cancel-link">Cancel</a>
                <button type="submit" class="form-button">Register</button>
            </div>
        </form>

        <!-- Link to Login Page -->
        <div class="login-link-container">
            <a href="{{ route('login') }}" class="login-link">Already have an account? Log In</a>
        </div>
    </div>

</body>
</html>
