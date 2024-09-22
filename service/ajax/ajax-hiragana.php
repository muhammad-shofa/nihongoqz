<?php include "../connection.php";
include "../select.php";
include "../insert.php";
include "../update.php";
include "../delete.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // siswa
    if (isset($_GET["hiragana_id"])) {
        $id = $_GET["hiragana_id"];
        $stmt = $connected->prepare($select->selectTable($tableName = "hiragana", $fields = "*", $condition = "WHERE hiragana_id = ?"));
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        $result = $connected->query($select->selectTable($tableName = "hiragana", $fields = "*", $condition = ""));

        $data = [];

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $row['check'] = '<button class="edit btn btn-primary" data-hiragana_id="' . $row['hiragana_id'] . '">Check</button>';
            $data[] = $row;
        }

        echo json_encode(["data" => $data]);
    }

}