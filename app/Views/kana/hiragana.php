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
        <!-- btn finish test -->
        <div class="text-center">
            <button class="btn-finish btn btn-lg btn-success rounded m-3">Finish</button>
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
            let count_all_kana_test = 0;

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
                            count_all_kana_test = response.dataHiragana.length;
                            // console.log(shuffled_hiragana);
                            let get_user_true_answer = JSON.parse(localStorage.getItem('user_true_answer'))?.map(String) || [];
                            let get_user_false_answer = JSON.parse(localStorage.getItem('user_false_answer'))?.map(String) || [];
                            let get_user_true_kana_answer = JSON.parse(localStorage.getItem('user_true_kana_answer')) || [];
                            let get_user_false_kana_answer = JSON.parse(localStorage.getItem('user_false_kana_answer'))?.map(String) || [];
                            // console.log(typeof get_user_false_answer);
                            // console.log(typeof get_user_true_answer);

                            shuffled_hiragana.forEach(hiragana => {
                                // console.log(typeof hiragana.hiragana_id);
                                let is_correct = get_user_true_answer.includes(hiragana.hiragana_id);
                                let is_wrong = get_user_false_answer.includes(hiragana.hiragana_id);

                                let bg_class = "bg-white";
                                let value_kana = "";

                                // Cari indeks hiragana_id dalam user_true_answer dan user_false_answer
                                let correctIndex = get_user_true_answer.indexOf(hiragana.hiragana_id);
                                let wrongIndex = get_user_false_answer.indexOf(hiragana.hiragana_id);

                                if (is_correct && correctIndex !== -1) {
                                    bg_class = "bg-success";
                                    value_kana = get_user_true_kana_answer[correctIndex] || "";
                                } else if (is_wrong && wrongIndex !== -1) {
                                    bg_class = "bg-danger";
                                    value_kana = get_user_false_kana_answer[wrongIndex] || "";
                                }

                                cards += `
                                <div class="card text-center ${bg_class}" style="width: 18rem;" id="card_${hiragana.hiragana_id}">
                                    <div class="card-body">
                                        <h2>${hiragana.hiragana_kana}</h2>
                                        <input type="text" class="dakuten_field form-control" value="${value_kana}" id="dakuten_field_${hiragana.hiragana_id}" data-hiragana_id="${hiragana.hiragana_id}">
                                        <input type="hidden" class="true_answer" id="true_answer_${hiragana.hiragana_id}" value="${hiragana.dakuten}">
                                    </div>
                                </div>`;

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

                // Ambil data dari localStorage
                let user_true_answer = JSON.parse(localStorage.getItem('user_true_answer')) || [];
                let user_false_answer = JSON.parse(localStorage.getItem('user_false_answer')) || [];
                let user_true_kana_answer = JSON.parse(localStorage.getItem('user_true_kana_answer')) || [];
                let user_false_kana_answer = JSON.parse(localStorage.getItem('user_false_kana_answer')) || [];

                // Hapus ID dari daftar jika sebelumnya salah atau benar
                user_true_answer = user_true_answer.filter(id => id !== hiragana_id);
                user_false_answer = user_false_answer.filter(id => id !== hiragana_id);
                // user_true_kana_answer = user_true_kana_answer.filter(kana => kana !== dakuten_field);
                // user_false_kana_answer = user_false_kana_answer.filter(kana => kana !== dakuten_field);
                // Hapus kana yang terkait dengan hiragana_id dari user_true_kana_answer dan user_false_kana_answer
                user_true_kana_answer = user_true_kana_answer.filter(kana => kana !== dakuten_field);
                user_false_kana_answer = user_false_kana_answer.filter(kana => kana !== dakuten_field);

                // simpan ke localstorage agar ketika direfresh data tidak hilang sampai user menyelesaikan test-nya
                if (dakuten_field == true_answer) {
                    console.log("Jawaban kamu " + dakuten_field + " BENAR!");
                    $('#card_' + hiragana_id).removeClass('bg-white bg-danger').addClass('bg-success');

                    // tambahkan ke dalam array user_true_answer dan simpan ke localstorage
                    user_true_answer.push(hiragana_id);
                    user_true_kana_answer.push(dakuten_field);
                } else {
                    console.log("Jawaban kamu " + dakuten_field + " SALAH!");
                    $('#card_' + hiragana_id).removeClass('bg-white bg-success').addClass('bg-danger');

                    // tambahkan ke dalam array user_false_answer dan simpan ke localstorage
                    user_false_answer.push(hiragana_id);
                    user_false_kana_answer.push(dakuten_field);
                }
                localStorage.setItem('user_true_answer', JSON.stringify(user_true_answer));
                localStorage.setItem('user_false_answer', JSON.stringify(user_false_answer));
                localStorage.setItem('user_true_kana_answer', JSON.stringify(user_true_kana_answer));
                localStorage.setItem('user_false_kana_answer', JSON.stringify(user_false_kana_answer));

                // Debugging: Cek apakah data berhasil diubah
                // console.log("user_false_kana_answer: ", user_false_kana_answer);
                // console.log("user_true_kana_answer: ", user_true_kana_answer);
            })

            // Finish the test
            $(".btn-finish").on('click', function() {

                // ambil jumlah semua card/test yang sedang dikerjakan 
                // Ambil data dari localStorage
                let get_user_true_answer = JSON.parse(localStorage.getItem("user_true_answer")) || [];
                let get_user_false_answer = JSON.parse(localStorage.getItem("user_false_answer")) || [];

                // Gabungkan semua ID yang sudah dijawab
                let all_answered = [...get_user_true_answer, ...get_user_false_answer];

                // Hilangkan duplikasi untuk mendapatkan jumlah total soal
                let unique_questions = [...new Set(all_answered)];

                // Hitung jumlah soal yang dijawab benar
                let correct_count = get_user_true_answer.length;

                // Hitung jumlah total soal
                let total_questions = unique_questions.length;

                console.log(total_questions);
                console.log(count_all_kana_test);

                // cek apakah semua test sudah dikerjakan
                if (count_all_kana_test !== total_questions) {
                    alert('Make sure you do all the questions!');
                } else {
                    // Hitung persentase
                    let percentage = total_questions > 0 ? (correct_count / total_questions) * 100 : 0;
                    percentage = percentage.toFixed(2); // Format ke 2 desimal

                    alert(`Test completed!\n${correct_count} / ${total_questions}\nPercentage : ${percentage}%`);
                }
            });

        })
    </script>
</body>

</html>