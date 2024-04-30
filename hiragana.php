<?php
session_start();
include "service/connection.php";
include "service/select.php";
include "service/insert.php";
// include "service/.php";
// include "service/.php";

// select hiragana
$sql_select_hiragana = $select->selectTable($table_name = "hiragana", $fields = "*", $condition = "");
$result_select_hiragana = $connected->query($sql_select_hiragana);


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
    <title>Nihongoqz | Hiragana Quiz</title>
</head>

<body>
    <!-- hiragana start -->
    <div class="hiragana p-2" id="hiragana">
        <!-- navbar start -->
        <?php include "layout/navbar.php" ?>
        <!-- navbar end -->
        <div class="container-quiz p-3 mx-auto m-3 d-flex flex-wrap justify-content-center rounded-3 shadow">
            <?php while (isset($result_select_hiragana) ? $data_hiragana = $result_select_hiragana->fetch_assoc() : false) { ?>
                <div class="card-quiz p-3 pt-5 mx-3 border-5 rounded-3 shadow text-center align-items-center">
                    <h1 style="font-style: 30%;"><?= $data_hiragana['hiragana'] ?></h1>
                    <br>
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control text-center" name="answer_hiragana">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- hiragana end -->
    <!-- js -->
    <!-- bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>