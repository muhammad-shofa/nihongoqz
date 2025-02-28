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
    <!-- <php include APPPATH . 'Views/components/navbar.php'; ?> -->

    <?= view('components/navbar') ?>

    <div class="container bg-light-subtle">
        <h1 class="my-5 text-center">Hiragana Kana Test</h1>
        <!-- semua card hiragana -->
        <div id="container-card" class="d-flex flex-wrap justify-content-center m-3 gap-3">
            <!--  -->
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {


            // simpan jawaban benar pada array
            let user_true_answer = [];
            let user_false_answer = [];


            // function untuk mengacak isi array 
            function shuffleArray(array) {
                let shuffled = array.slice(); // Copy array
                for (let i = shuffled.length - 1; i > 0; i--) {
                    let j = Math.floor(Math.random() * (i + 1));
                    [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
                }
                return shuffled;
            }

            // function untuk meminta semua data hiragana dari backend melalui endpoint
            function loadHiraganaTest() {
                $.ajax({
                    url: '/api/hiragana',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            let cards = "";
                            let shuffled_hiragana = shuffleArray(response.dataHiragana);
                            // console.log(shuffled_hiragana);
                            let get_user_true_answer = JSON.parse(localStorage.getItem('user_true_answer')) || [];
                            let get_user_false_answer = JSON.parse(localStorage.getItem('user_false_answer')) || [];
                            // let matching_answer = shuffleArray.filter(item => get_user_true_answer.includes(item));

                            shuffled_hiragana.forEach(hiragana => {
                                let is_correct = get_user_true_answer.includes(hiragana.hiragana_id);
                                let is_wrong = get_user_false_answer.includes(hiragana.hiragana_id);
                                
                                let bg_class = "bg-white"; // Default putih
                                cards += `
                                <div class="card text-center ${bg_class}" style="width: 18rem;" id="card_${hiragana.hiragana_id}">
                                    <div class="card-body">
                                        <h2>${hiragana.hiragana_kana}</h2>
                                        <input type="text" class="dakuten_field form-control" id="dakuten_field_${hiragana.hiragana_id}" data-hiragana_id="${hiragana.hiragana_id}">
                                        <input type="hidden" class="true_answer" id="true_answer_${hiragana.hiragana_id}" value="${hiragana.dakuten}">
                                    </div>
                                </div>`;

                                // Atur warna card berdasarkan kondisi
                                if (is_correct) {
                                    bg_class = "bg-success"; // Hijau jika benar
                                } else if (is_wrong) {
                                    bg_class = "bg-danger"; // Merah jika salah
                                }
                            });
                            $('#container-card').html(cards);
                        }
                    },
                    error: function() {
                        alert('Failed to fetch data');
                    }
                })
            }

            loadHiraganaTest();

            $(document).on('change', '.dakuten_field', function() {
                let hiragana_id = $(this).data("hiragana_id");
                let dakuten_field = $('#dakuten_field_' + hiragana_id).val();
                let true_answer = $('#true_answer_' + hiragana_id).val();

                // simpan ke localstorage agar ketika direfresh data tidak hilang sampai user menyelesaikan test-nya
                if (dakuten_field == true_answer) {
                    console.log("Jawaban kamu " + dakuten_field + " BENAR!");
                    $('#card_' + hiragana_id).removeClass('bg-white');
                    $('#card_' + hiragana_id).removeClass('bg-danger');
                    $('#card_' + hiragana_id).addClass('bg-success');

                    // tambahkan ke dalam array user_true_answer dan simpan ke localstorage
                    user_true_answer.push(hiragana_id);
                    localStorage.setItem('user_true_answer', JSON.stringify(user_true_answer));
                } else {
                    console.log("Jawaban kamu " + dakuten_field + " SALAH!");
                    $('#card_' + hiragana_id).removeClass('bg-white');
                    $('#card_' + hiragana_id).removeClass('bg-success');
                    $('#card_' + hiragana_id).addClass('bg-danger');

                    // tambahkan ke dalam array user_false_answer dan simpan ke localstorage
                    user_false_answer.push(hiragana_id);
                    localStorage.setItem('user_false_answer', JSON.stringify(user_false_answer));
                }
            })
        })
    </script>
</body>

</html>