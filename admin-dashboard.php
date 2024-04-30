<?php

session_start();
include "service/connection.php";
include "service/select.php";
include "service/insert.php";

$message_insert_hiragana = "";
// insert data
if (isset($_POST['add_hiragana'])) {
    $hiragana = $_POST['hiragana'];
    $romaji = $_POST['romaji'];

    $sql_insert_hiragana = $insert->selectTable($table_name = "hiragana", $condition = "('hiragana', 'romaji') VALUES ('$hiragana', '$romaji')");
    $result_insert_hiragana = $connected->query($sql_insert_hiragana);
    if ($result_insert_hiragana) {
        $message_insert_hiragana = "Kana successfull added";
        // header('location: admin-dashboard.php');
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nihongoqz | Admin Dashboard</title>
</head>

<body>
    <?= $message_insert_hiragana ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <h3>Tambah Hiragana</h3>
        <input type="text" name="hiragana" placeholder="hiragana" required>
        <input type="text" name="romaji" placeholder="romaji" required>
        <button type="submit" name="add_hiragana">Add</button>
    </form>
</body>

</html>