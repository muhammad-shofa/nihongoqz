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
        <script>
            function changeBg(counter_quiz) {
                const cardQuiz = document.getElementById("card-quiz-" + counter_quiz);
                cardQuiz.style.backgroundColor = "#0d6efd";
            }
        </script>
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
            <p>Start Your Hiragana Quiz With Nihongoqz.</p>
            <h4>Select Kana</h4>
            <button class="btn btn-red">
                Main Kana
            </button>
            <p><?= $message_answer ?>
            </p>
        </div>
        <!-- container text quiz end -->

        <!-- container quiz start -->
        <div class="container-quiz p-3 mx-auto m-3 d-flex flex-wrap justify-content-center rounded-3 shadow">
            <?php
            $counter_quiz = 1;
            while (isset($result_select_hiragana) ? $data_hiragana = $result_select_hiragana->fetch_assoc() : false) {
                // Tentukan apakah jawaban benar atau tidak
                $is_correct_answer = $message_answer === "your answer is correct!";
                // Tentukan warna latar belakang card-quiz berdasarkan apakah jawaban benar atau salah
                $bg_color = $is_correct_answer ? 'style="background-color: #28a745;"' : ''; // Default background color is white if answer is incorrect
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div id="card-quiz-<?= $counter_quiz ?>"
                        class="card-quiz p-3 pt-5 m-3 border-5 rounded-3 shadow text-center align-items-center" <?= $bg_color ?>>
                        <h1 style="font-style: 30%;"><?= $data_hiragana['hiragana'] ?></h1>
                        <br>
                        <div class="input-group-lg">
                            <input type="hidden" name="counter_quiz" value="<?= $counter_quiz ?>">
                            <input type="hidden" name="real_answer" value="<?= $data_hiragana['hiragana'] ?>">
                            <input type="text" class="form-control text-center border-3" name="answer_hiragana">
                        </div>
                    </div>
                </form>
                <?php
                $counter_quiz++;
            }
            ?>









        </div>
        <!-- container quiz end -->
    </div>
    <!-- hiragana end -->
    <!-- js -->
    <!-- custom js -->
    <!-- <script src="assets/js/main.js"></script> -->
    <!-- bootstrap -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>