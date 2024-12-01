<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Supplier</title>
    <!-- Add some basic styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Create Supplier</h1>

    <!-- Form to create a new supplier -->
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <!-- Supplier Name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <!-- Supplier Address -->
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <!-- Supplier Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <!-- Supplier Phone Number -->
        <label for="phonenumber">Phone Number:</label>
        <input type="text" id="phonenumber" name="phonenumber" required>

        <!-- Supplier Payment Terms -->
        <label for="paymentterms">Payment Terms:</label>
        <input type="text" id="paymentterms" name="paymentterms" required>

        <!-- Submit Button -->
        <input type="submit" value="Save Supplier">
    </form>

</body>
</html>
