<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Nihongoqz | Result</title>
</head>

<body>
    <!-- navbar -->
    <?= view('components/navbar') ?>

    <div class="container bg-light-subtle">
        <h1 class="my-5 text-center">Result test</h1>
        <!-- result test -->
        <div id="container-card" class="d-flex flex-wrap justify-content-center m-3 gap-3">
            <!--  -->
        </div>
        <!-- btn restart test -->
        <div class="text-center">
            <button class="btn-restart btn btn-lg btn-warning rounded m-3">Restart</button>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/result.js"></script>
</body>

</html>