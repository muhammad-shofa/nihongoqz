<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

    <title>Nihongoqz | Result</title>
</head>

<body>
    <!-- navbar -->
    <?= view('components/navbar') ?>

    <div class="container bg-light-subtle">
        <h1 class="my-5 text-center">Your Result</h1>
        <!-- result test -->
        <div id="container-card" class="d-flex justify-content-evenly align-items-center m-3 p-2 gap-3 rounded border border-5">
            <div>
                <div class="pl-5">
                    <h3>11/10</h2>
                    <h3>66,66%</h3>
                    <h3>Moderate</h3>
                    <p>You did well, scoring 10 out of 15, achieving a solid 66.66%. Your proficiency is at a moderate level, which means you have a good understanding but still have room for improvement. Keep practicing, and you’ll reach a higher level soon!</p>
                </div>
                <!-- <table>
                    <tbody>
                        <tr>
                            <td>Score</td>
                            <td>:</td>
                            <td>10/15</td>
                        </tr>
                        <tr>
                            <td>Percentage</td>
                            <td>:</td>
                            <td>66,66%</td>
                        </tr>
                        <tr>
                            <td>Proficiency</td>
                            <td>:</td>
                            <td class="fw-bold text-success">High</td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
            <div>
                <img src="<?= base_url('img/japanese_person_2.jpg') ?>" alt="result img" width="500px">
            </div>
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
    <!-- <script src="js/result.js"></script> -->
    <script src="<?= base_url('js/result.js'); ?>"></script>
</body>

</html>