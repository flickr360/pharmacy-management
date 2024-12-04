<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}"> <!-- Link to custom CSS -->
</head>
<style>
body {
    font-family: 'Inter', sans-serif;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 100%;
    max-width: 400px;  /* Reduced width to make it more compact */
    height: auto;
    max-height: 600px;  /* Limits the height */
    overflow: hidden;  /* Prevents overflow */
}

.heading h2 {
    text-align: center;
    margin-bottom: 20px;  /* Reduced margin */
}

.form-fields {
    margin-bottom: 20px;
}

.form-field {
    margin-bottom: 10px;  /* Reduced margin */
}

.form-label {
    display: block;
    font-weight: 500;
    margin-bottom: 6px;  /* Reduced space */
}

.form-input {
    width: 100%;
    padding: 10px;  /* Reduced padding */
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;  /* Slightly smaller font */
}

.error-message {
    color: red;
    font-size: 12px;
    margin-top: 5px;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;  /* Reduced space */
}

.form-button {
    padding: 10px 16px;  /* Reduced padding */
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;  /* Slightly smaller font */
    width: 48%;  /* Button width for better compactness */
}

.form-button:hover {
    background-color: #0056b3;
}

.cancel-link {
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
    width: 48%;
    text-align: center;
    display: inline-block;
}

.cancel-link:hover {
    text-decoration: underline;
}

.login-link-container {
    text-align: center;
    margin-top: 15px;  /* Reduced space */
}

.login-link {
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
}

.login-link:hover {
    text-decoration: underline;
}
</style>

<body>

    <div class="form-container">
        <div class="heading">
            <h2>Register</h2>
        </div>

        <!-- Register Form -->
        <form method="POST" action="register">
            @csrf
            <div class="form-fields">
                <!-- First Name Field -->
                <div class="form-field">
                    <label for="first_name" class="form-label">First Name</label>
                    <input
                        name="first_name"
                        id="first_name"
                        value="{{ old('first_name') }}"
                        required
                        class="form-input"
                        placeholder="Enter your first name"
                    />
                    @error('first_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Last Name Field -->
                <div class="form-field">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input
                        name="last_name"
                        id="last_name"
                        value="{{ old('last_name') }}"
                        required
                        class="form-input"
                        placeholder="Enter your last name"
                    />
                    @error('last_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-field">
                    <label for="email" class="form-label">Email</label>
                    <input
                        name="email"
                        id="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        class="form-input"
                        placeholder="Enter your email"
                    />
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
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
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
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
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons Section -->
            <div class="action-buttons">
                <button type="submit" class="form-button">Register</button>
                <a href="/login" class="cancel-link">Cancel</a>
            </div>
        </form>

        <div class="login-link-container">
            <a href="{{ route('login') }}" class="login-link">Already have an account? Log In</a>
        </div>
    </div>

</body>
</html>
