<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="parent">
        <div class="leftchild">
            <h1>IEEE CyberSecurity</h1>
            <p>This is a free workshop to show you how to stay safe online.</p>
            <div class="image">
                <img src="ieee.png" alt="ieee">
            </div>
            <h6>IEEE, Cairo</h6>
        </div>
        <div class="rightchild">
            <form id="registrationForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <h1>Register Now</h1>
                <div class="formlabel">
                    <i class='bx bxs-user'></i><input type="text" id="fullname" name="fullname" placeholder="Full Name"
                        required>
                    <br>
                    <span id="fullnameError" class="error"></span>
                </div>
                <br>
                <div class="formlabel">
                    <i class='bx bxs-user'></i><input type="text" id="username" name="username" placeholder="Username"
                        required><br>
                    <span id="usernameError" class="error"></span>
                </div>
                <br>
                <div class="formlabel">
                    <i class='bx bxs-envelope'></i><input type="email" id="email" name="email" placeholder="Email"
                        required>
                    <span id="emailError" class="error"></span><br>
                </div>
                <br>
                <div class="formlabel">
                    <i class='bx bxs-lock-alt'></i><input type="password" id="password" name="password"
                        placeholder="Password" required>
                    <span id="passwordError" class="error"></span><br>
                </div>
                <br>
                <div class="formlabel">
                    <i class='bx bxs-lock-alt'></i><input type="password" id="confirmpassword" name="confirmpassword"
                        placeholder="Confirm Password" required>
                    <span id="confirmPasswordError" class="error"></span><br>
                </div>
                <br>
                <div class="formlabel">
                    <i class='bx bxs-phone'></i><input type="text" id="phone" name="phone" placeholder="Phone"
                        required><br>
                    <span id="phoneError" class="error"></span>
                </div>
                <br>
                <div class="formlabel">
                    <i class="fas fa-map-marker-alt"></i><input type="text" id="address" name="address"
                        placeholder="Address" required><br>
                    <span id="addressError" class="error"></span>
                </div>
                <br>
                <div class="formlabel">
                    <i class="fas fa-calendar-alt"></i><input type="date" id="birthdate" name="birthdate"
                        placeholder="Birthdate" required><br>
                    <span id="birthdateError" class="error"></span>
                </div>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var fullname = document.getElementById("fullname").value;
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            var birthdate = document.getElementById("birthdate").value;

            // Get the error message div
            var errorDiv = document.getElementById("errorDiv");

            // Clear previous error messages
            errorDiv.innerHTML = "";

            // Simple validation for demonstration
            if (fullname == "" || username == "" || email == "" || password == "" || confirmPassword == "" || phone == "" || address == "" || birthdate == "") {
                displayErrorMessage("All fields are required", "#ff0000"); // Red color for required fields
                return false;
            }

            if (password != confirmPassword) {
                displayErrorMessage("Passwords do not match", "#ff0000"); // Red color for password mismatch
                return false;
            }

            return true;
        }

        // Function to display error message
        function displayErrorMessage(message, color) {
            var errorDiv = document.getElementById("errorDiv");
            errorDiv.innerHTML = message;
            errorDiv.style.color = color;
            errorDiv.style.fontWeight = "bold";
            errorDiv.style.marginTop = "10px";
        }
    </script>

</body>

</html>

<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "ieee") or die("Could not connect" . mysqli_error($conn));

// Initialize variables
$fullname = $username = $email = $password = $confirmpassword = $phone = $address = $birthdate = "";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Sanitize user inputs
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);

    // Check for existing username or email
    $duplicate = mysqli_query($conn, "SELECT * FROM data WHERE email = '$email' OR username = '$username'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<div class='alert alert-error'>Username or email has already been taken</div>";
    } else {
        if ($password == $confirmpassword) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $query = "INSERT INTO data (fullname, username, email, password, phone, address, birthdate) 
                      VALUES ('$fullname','$username','$email','$hashed_password','$phone','$address','$birthdate')";
            if (mysqli_query($conn, $query)) {
                echo "<div class='alert alert-success'>Added Successfully</div>";
            } else {
                echo "<div class='alert alert-error'>Error: " . mysqli_error($conn) . "</div>";
            }
        } else {
            echo "<div class='alert alert-error'>Passwords do not match</div>";
        }
    }
}
?>