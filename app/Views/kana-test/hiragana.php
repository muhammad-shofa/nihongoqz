<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Nihongoqz | Hiragana</title>
</head>

<body>
    <!-- navbar -->
    <?= view('components/navbar') ?>

    <!-- select test category -->
    <div class="container test-prepare bg-light-subtle">
        <div class="text-center">
            <h1 class="my-5">Hiragana Kana Test</h1>
            <p>Ready to test your Hiragana skills? This quiz will challenge you with different types of Hiragana, from the basic Main Kana (あ, い, う, え, お) to the modified Dakuten (が, ざ, だ, etc.) and even Combination Kana (きゃ, しゃ, ちゃ, etc.)! Choose the test that suits your level and see how well you can recognize and read Hiragana. Whether you're just starting or looking to improve, this quiz will help you sharpen your Japanese reading skills in a fun and interactive way. Pick a category and let’s get started!</p>
            <select class="form-select w-25 mx-auto" id="kana_types" aria-label="Default select example">
                <option selected>Select kana type</option>
                <option value="main_kana">Main Kana</option>
                <option value="dakuten" disabled>Dakuten</option>
                <option value="combination" disabled>Combination</option>
                <option value="all" disabled>All</option>
            </select>
            <br>
            <button class="btn-start-test btn btn-lg text-white" style="background-color: #EB5B00;">Start Test</button>
        </div>
    </div>

    <!-- ongoing test -->
    <div class="container test-ongoing bg-light-subtle d-none">
        <h1 class="my-5 text-center">Hiragana Kana Test</h1>
        <!-- semua card hiragana -->
        <div id="container-card" class="d-flex flex-wrap justify-content-center m-3 gap-3">
            <!--  -->
        </div>
        <!-- btn finish test -->
        <div class="text-center">
            <button class="btn-finish btn btn-lg btn-success rounded m-3">Finish</button>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/hiragana.js"></script>
</body>

</html>