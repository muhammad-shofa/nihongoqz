<?php

include "service/connection.php";
include "service/insert.php";

$status_signup = "";

// check login
isset($_SESSION['is_login']) ? header("location: index.php") : false;

// insert data register
if (isset($_POST["sign-up"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $region = htmlspecialchars($_POST["region"]);

    $hash_password = hash('sha256', $password);

    $sql_signup = $insert->selectTable($table_name = "users", $condition = "(username, password, name, email, gender, region) VALUES ('$username', '$hash_password', '$name', '$email', '$gender', '$region')");
    $result = $connected->query($sql_signup);
    if ($result) {
        $status_signup = "<b>successfully, please <a href='signin.php'>Sign In!</a></b>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <title>Nihongoqz | Sign Up</title>
</head>

<body>
    <!-- register start -->
    <div class="register p-2">
        <!-- navbar start -->
        <?php include "layout/navbar.php" ?>
        <!-- navbar end -->
        <!-- container register start -->
        <div class="container-register mx-auto my-3 rounded-3 shadow">
            <!-- form register start -->
            <div class="card-body px-4 py-5 px-md-5">
                <h2 class="text-center p-3">Sign Up <b class="text-red">Nihongoqz</b></h2>
                <p class="text-center fw-bold">Sign up to access all features</p>
                <p>
                    <?= $status_signup ?>
                </p>
                <form action="signup.php" method="POST">
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="username" id="username" class="form-control" required />
                        <label class="form-label" for="username">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="password" class="form-control" required />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <div class="form-outline">
                            <input type="text" name="name" id="name" class="form-control" required />
                            <label class="form-label" for="name">Your name</label>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control" required />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Gender input -->
                    <div class="form-outline mb-4">
                        <select name="gender" id="gender" class="form-select">
                            <option value="Male">Male</option>
                            <option value="Famale">Famale</option>
                        </select>
                        <label class="form-label" for="gender">Gender</label>
                    </div>

                    <!-- Region input -->
                    <div class="form-outline mb-4">
                        <select name="region" id="region" class="form-select">
                            <option value="indonesia">Indonesia</option>
                            <option value="malaysia">Malaysia</option>
                            <option value="thailand">Thailand</option>
                            <option value="singapura">Singapura</option>
                            <option value="amerika_serikat">Amerika Serikat</option>
                        </select>
                        <label class="form-label" for="region">Region</label>
                    </div>

                    <!-- Terms and Condition -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms&conditions" required>
                        <label class="form-check-label" for="terms&conditions">I agree to the <a href="#0"
                                class="text-primary">Terms & Conditions</a></label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="sign-up" class="btn btn-primary btn-block mb-4">
                        Sign up
                    </button>

                    <div class="text-center">
                        <p>Already have an Account? <a href="signin.php">Sign In!</a></p>
                    </div>
                </form>
            </div>
            <!-- form register end -->
        </div>
        <!-- container register start -->
    </div>
    <!-- register end -->
    <!-- js -->
    <!-- bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>