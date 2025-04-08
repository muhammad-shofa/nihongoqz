<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Nihongoqz</title>
</head>

<body>
    <!-- hero start -->
    <div class="hero mt--3" id="bg-home">
        <!-- navbar -->
        <?= view('components/navbar') ?>
        <div class="d-flex justify-content-evenly mt-5 pt-5">
            <div class="text-hero text-white">
                <h1><b class="text-highlight">Nihongoqz</b><b> | Master Japanese Kana with Fun Quizzes!</b></h1>
                <p>Test your Japanese reading skills with interactive quizzes designed for all levels! Whether you're a beginner learning Hiragana & Katakana or an advanced learner tackling Kanji, NihongoQZ helps you improve in a fun and engaging way.</p>
                <button class="btn-hero">Try Now!</button>
            </div>
            <div class="img-hero">
                <img src="img/japan-old-place-3.jpg" alt="image">
            </div>
        </div>
    </div>

    <!-- waves -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -300px;">
        <path fill="#EB5B00" fill-opacity="1" d="M0,224L1440,32L1440,320L0,320Z"></path>
    </svg>

    <!-- test available start -->
    <div class="test-available">
        <h2 class="text-center fw-bold text-white">Test Available</h2>
        <div class="all-card d-flex flex-wrap gap-3 justify-content-evenly mt-5 text-center">
        <div class="card">
                <img src="img/hiragana.png" class="card-img-top" alt="Katakana Img">
                <div class="card-body">
                    <h2>Hiragana</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card">
                <img src="img/katakana.png" class="card-img-top" alt="Katakana Img">
                <div class="card-body">
                    <h2>Katakana</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- waves -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#EB5B00" fill-opacity="1" d="M0,64L1440,192L1440,0L0,0Z"></path>
    </svg>

    <!-- footer -->
    <?= view('components/footer') ?>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>