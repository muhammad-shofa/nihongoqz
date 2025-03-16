<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Nihongoqz | Profile</title>
</head>

<body id="bg-profile">
    <!-- navbar -->
    <?= view('components/navbar') ?>

    <!-- select test category -->
    <div class="container d-flex justify-content-center align-items-center text-center">
        <div class="card-glass bg-orange">
            <img src="img/profile.png" alt="Profile" width="60px">
            <h1 class="my-3">Hi <b class="text-decoration-underline"><?= session()->get('username') ?></b></h1>
            <div class="row mt-3">
                <a href="#" class="col coming-soon menu-card-profile">Edit</a>
                <a href="/history" class="col menu-card-profile">History</a>
            </div>
            <div class="row">
                <a href="#" class="col coming-soon menu-card-profile">Info</a>
                <a href="/api/auth/logout" class="col menu-card-profile">
                    Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/profile.js"></script>
</body>

</html>