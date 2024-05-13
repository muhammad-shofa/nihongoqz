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


$message_answer = "";

if (isset($_POST['answer_hiragana'])) {
    $real_answer = $_POST['real_answer']; // hiragana
    $answer_hiragana = $_POST['answer_hiragana']; // romaji

    $sql_romaji = $select->selectTable($table_name = "hiragana", $fields = '*', $condition = "WHERE hiragana='$real_answer' AND romaji='$answer_hiragana'");
    $result_romaji = $connected->query($sql_romaji);

    if ($result_romaji->num_rows > 0) {
        $message_answer = "your answer is correct!"; ?>

    <?php } else {
        $message_answer = "Incorrect";
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
    <title>Nihongoqz | Hiragana Quiz</title>
</head>

<body>
    <!-- hiragana start -->
    <div class="hiragana p-2" id="hiragana">
        <!-- navbar start -->
        <?php include "layout/navbar.php" ?>
        <!-- navbar end -->

        <!-- container text quiz start -->
        <div class="container-text p-3 mx-auto m-3 justify-content-center rounded-3 shadow text-center">
            <h2><b class="text-red">Hiragana</b> Quiz</h2>
            <p>Start Your Hiragana Quiz With Nihongoqz. <br> Type the Romaji in input box kana</p>
            <h4>Select Kana</h4>
            <!-- <div class="container-all-tab mx-auto"> -->
            <!-- trigger select kana start -->
            <div class="d-flex gap-3 justify-content-center">
                <button class="btn-red py-2 px-3" id="btn-main-kana" onclick="mainKana()">Main Kana</button>
                <button class="btn-red py-2 px-3" id="btn-dakuten" onclick="dakuten()">Dakuten</button>
                <button class="btn-red py-2 px-3" onclick="combination()">Combination</button>
            </div>
            <!-- trigger select kana end -->

            <div class="d-flex gap-3 justify-content-center">
                <!-- content main kana start -->
                <div class="content-main-kana my-3" id="content-main-kana">
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Ka/か</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Sa/さ</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Ta/た</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Na/な</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Ha/は</p>
                </div>
                <!-- content main kana end -->
                <!-- content dakuten start -->
                <div class="content-dakuten my-3" id="content-dakuten">
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Ga/が</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Za/ざ</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Da/だ</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Ha/は</p>
                    <p class="fs-5 border border-3 border-danger py-2 px-3 text-underline-none">Pa/ぱ</p>
                </div>
                <!-- content dakuten end -->
                <!-- content combination start -->
                <div class="content-combination my-3" id="content-combination">
                    <p>coming soon</p>
                </div>
                <!-- content combination end -->
            </div>
            <div class="btn-start" id="btn-start">
                <button class="btn-red py-2 px-3 my-2">Start Quiz</button>
            </div>
            <!-- content main kana end -->

            <!-- </div> -->
            <p><?= $message_answer ?></p>
        </div>
        <!-- container text quiz end -->

        <!-- container quiz start -->
        <div class="container-quiz p-3 mx-auto m-3 d-flex flex-wrap justify-content-center rounded-3 shadow">
            <?php $counter_quiz = 1;
            while (isset($result_select_hiragana) ? $data_hiragana = $result_select_hiragana->fetch_assoc() : false) { ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div id="card-quiz-<?= $counter_quiz ?>"
                        class="card-quiz p-3 pt-5 m-3 border-5 rounded-3 shadow text-center align-items-center">
                        <h1 style="font-style: 30%;"><?= $data_hiragana['hiragana'] ?></h1>
                        <br>
                        <div class="input-group-lg">
                            <input type="hidden" name="counter_quiz" value="<?= $counter_quiz ?>">
                            <input type="hidden" name="real_answer" value="<?= $data_hiragana['hiragana'] ?>">
                            <input type="text" class="form-control text-center border-3" name="answer_hiragana"
                                onclick="changeBg(<?= $counter_quiz ?>)">
                        </div>
                    </div>
                </form>
                <?php $counter_quiz++;
            } ?>
        </div>
        <!-- container quiz end -->
    </div>
    <!-- hiragana end -->
    <!-- js -->
    <!-- custom js -->
    <script src="assets/js/main.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>