$(document).ready(function() {
    // simpan jawaban benar pada array
    let user_true_answer = [];
    let user_false_answer = [];
    let is_test_ongoing = "";
    let count_all_kana_test = 0;
    let char_type = localStorage.getItem('char_type');

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
        // ambil status test saat ini dan lakukan pengecekan
        is_test_ongoing = JSON.parse(localStorage.getItem("is_test_ongoing"));
        if (is_test_ongoing) {
            $('.test-ongoing').removeClass('d-none');
            $('.test-prepare').addClass('d-none');
        } else {
            $('.test-ongoing').addClass('d-none');
            $('.test-prepare').removeClass('d-none');
            return;
        }

        $.ajax({
            url: '/api/hiragana',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    count_all_kana_test = response.dataHiragana.length;
                    let cards = "";
                    let shuffled_hiragana = shuffleArray(response.dataHiragana);
                    let get_user_true_answer = JSON.parse(localStorage.getItem('user_true_answer'))?.map(String) || [];
                    let get_user_false_answer = JSON.parse(localStorage.getItem('user_false_answer'))?.map(String) || [];
                    let get_user_true_kana_answer = JSON.parse(localStorage.getItem('user_true_kana_answer')) || [];
                    let get_user_false_kana_answer = JSON.parse(localStorage.getItem('user_false_kana_answer'))?.map(String) || [];

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
                                <input type="text" class="romaji_field form-control" value="${value_kana}" id="romaji_field_${hiragana.hiragana_id}" data-hiragana_id="${hiragana.hiragana_id}">
                                <input type="hidden" class="true_answer" id="true_answer_${hiragana.hiragana_id}" value="${hiragana.romaji}">
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
    };

    // katakana test
    // function untuk meminta semua data katakana dari backend melalui endpoint
    function loadKatakanaTest() {
        // ambil status test saat ini dan lakukan pengecekan
        is_test_ongoing = JSON.parse(localStorage.getItem("is_test_ongoing"));
        if (is_test_ongoing) {
            $('.test-ongoing').removeClass('d-none');
            $('.test-prepare').addClass('d-none');
        } else {
            $('.test-ongoing').addClass('d-none');
            $('.test-prepare').removeClass('d-none');
            return;
        }

        $.ajax({
            url: '/api/katakana',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    count_all_kana_test = response.dataKatakana.length;
                    let cards = "";
                    let shuffled_katakana = shuffleArray(response.dataKatakana);
                    let get_user_true_answer = JSON.parse(localStorage.getItem('user_true_answer'))?.map(String) || [];
                    let get_user_false_answer = JSON.parse(localStorage.getItem('user_false_answer'))?.map(String) || [];
                    let get_user_true_kana_answer = JSON.parse(localStorage.getItem('user_true_kana_answer')) || [];
                    let get_user_false_kana_answer = JSON.parse(localStorage.getItem('user_false_kana_answer'))?.map(String) || [];

                    shuffled_katakana.forEach(katakana => {
                        let is_correct = get_user_true_answer.includes(katakana.katakana_id);
                        let is_wrong = get_user_false_answer.includes(katakana.katakana_id);

                        let bg_class = "bg-white";
                        let value_kana = "";
                        
                        // Cari indeks katakana_id dalam user_true_answer dan user_false_answer
                        let correctIndex = get_user_true_answer.indexOf(katakana.katakana_id);
                        let wrongIndex = get_user_false_answer.indexOf(katakana.katakana_id);

                        if (is_correct && correctIndex !== -1) {
                            bg_class = "bg-success";
                            value_kana = get_user_true_kana_answer[correctIndex] || "";
                        } else if (is_wrong && wrongIndex !== -1) {
                            bg_class = "bg-danger";
                            value_kana = get_user_false_kana_answer[wrongIndex] || "";
                        }

                        cards += `
                        <div class="card text-center ${bg_class}" style="width: 18rem;" id="card_${katakana.katakana_id}">
                            <div class="card-body">
                                <h2>${katakana.katakana_kana}</h2>
                                <input type="text" class="romaji_field form-control" value="${value_kana}" id="romaji_field_${katakana.katakana_id}" data-katakana_id="${katakana.katakana_id}">
                                <input type="hidden" class="true_answer" id="true_answer_${katakana.katakana_id}" value="${katakana.romaji}">
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
    };

    // if (char_type == 'hiragana') {
    // jalankan
    char_type == 'hiragana' ? loadHiraganaTest() : loadKatakanaTest();

    // }

    // ketika diklik class .btn-start-test" maka akan menyimpan kana_type dari select option lalu menampilkan test-ongoing dan menyembunyikan test-prepare
    $(".btn-start-test").on('click', function () {
        let char_type = $(this).attr('data-char_type');
        console.log(char_type);
        // let char_type = $('#char_type').val();
        let kana_type = $('#kana_type').val();
        if (kana_type != "Select kana type") {
            $('.test-ongoing').removeClass('d-none');
            $('.test-prepare').addClass('d-none');
            localStorage.setItem("is_test_ongoing", JSON.stringify(true));
            localStorage.setItem("char_type", char_type);
            localStorage.setItem("kana_type", kana_type);
            char_type == 'hiragana' ? loadHiraganaTest() : loadKatakanaTest();
        }
    });
    

    $(document).on('change', '.romaji_field', function() {
        // char_type di sini bisa hiragana atau katakana tergantung user memilih test yang mana
        let char_type = localStorage.getItem('char_type');
        console.log("yyyyyyy : " + char_type);
        // let hiragana_id = $(this).data("hiragana_id");
        // let romaji_field = $('#romaji_field_' + hiragana_id).val();
        // let true_answer = $('#true_answer_' + hiragana_id).val();
        let char_id = $(this).data(char_type + "_id");
        let romaji_field = $('#romaji_field_' + char_id).val();
        let true_answer = $('#true_answer_' + char_id).val();

        // Ambil data dari localStorage
        let user_true_answer = JSON.parse(localStorage.getItem('user_true_answer')) || [];
        let user_false_answer = JSON.parse(localStorage.getItem('user_false_answer')) || [];
        let user_true_kana_answer = JSON.parse(localStorage.getItem('user_true_kana_answer')) || [];
        let user_false_kana_answer = JSON.parse(localStorage.getItem('user_false_kana_answer')) || [];

        // Hapus ID dari daftar jika sebelumnya salah atau benar
        // user_true_answer = user_true_answer.filter(id => id !== hiragana_id); // versi lama
        // user_false_answer = user_false_answer.filter(id => id !== hiragana_id); // versi lama
        user_true_answer = user_true_answer.filter(id => id !== char_id);
        user_false_answer = user_false_answer.filter(id => id !== char_id);
        // user_true_kana_answer = user_true_kana_answer.filter(kana => kana !== romaji_field);
        // user_false_kana_answer = user_false_kana_answer.filter(kana => kana !== romaji_field);
        // Hapus kana yang terkait dengan hiragana_id dari user_true_kana_answer dan user_false_kana_answer
        // user_true_kana_answer = user_true_kana_answer.filter(kana => kana !== romaji_field);
        // user_false_kana_answer = user_false_kana_answer.filter(kana => kana !== romaji_field);

        // simpan ke localstorage agar ketika direfresh data tidak hilang sampai user menyelesaikan test-nya
        if (romaji_field == true_answer) {
            console.log("Jawaban kamu " + romaji_field + " BENAR!");
            $('#card_' + char_id).removeClass('bg-white bg-danger').addClass('bg-success');

            // tambahkan char_id ke dalam array user_true_answer dan simpan ke localstorage
            user_true_answer.push(char_id);
            user_true_kana_answer.push(romaji_field);
        } else {
            console.log("Jawaban kamu " + romaji_field + " SALAH!");
            $('#card_' + char_id).removeClass('bg-white bg-success').addClass('bg-danger');

            // tambahkan ke dalam array user_false_answer dan simpan ke localstorage
            user_false_answer.push(char_id);
            user_false_kana_answer.push(romaji_field);
        }
        localStorage.setItem('user_true_answer', JSON.stringify(user_true_answer));
        localStorage.setItem('user_false_answer', JSON.stringify(user_false_answer));
        localStorage.setItem('user_true_kana_answer', JSON.stringify(user_true_kana_answer));
        localStorage.setItem('user_false_kana_answer', JSON.stringify(user_false_kana_answer));
    });

    // Finish the test
    $(".btn-finish").on('click', function() {
        // Ambil semua data test yang dikerjakan dari localStorage
        let get_user_true_answer = JSON.parse(localStorage.getItem("user_true_answer")) || [];
        let get_user_false_answer = JSON.parse(localStorage.getItem("user_false_answer")) || [];

        // Gabungkan semua id yang sudah dijawab
        let all_answered = [...get_user_true_answer, ...get_user_false_answer];

        // Hilangkan duplikasi untuk mendapatkan jumlah total soal
        let unique_questions = [...new Set(all_answered)];

        // Hitung jumlah soal yang dijawab benar
        let correct_count = get_user_true_answer.length;

        // Hitung jumlah total soal
        let total_questions = unique_questions.length;
        console.log(count_all_kana_test);
        console.log(total_questions);

        // cek apakah semua test sudah dikerjakan
        if (count_all_kana_test != total_questions) {
            Swal.fire({
                title: "Make sure you do all the questions!",
                icon: 'warning',
                confirmButtonText: 'Oke'
            })
        } else {
            // Hitung persentase
            let percentage = total_questions > 0 ? (correct_count / total_questions) * 100 : 0;
            percentage = percentage.toFixed(2); // Format ke 2 desimal
            
            // ketika user belum login maka simpan hasil ke dalam localstorage saja, namun ketika sudah login maka masukkan haisl test ke database
            localStorage.setItem('correct_count_result', correct_count);
            localStorage.setItem('total_questions_result', total_questions);
            localStorage.setItem('percentage_result', percentage);
            // set testSaved pada session untuk mengetahui data sudah disimpan atau belum jika user sudah login
            sessionStorage.setItem('testSaved', "false");
            window.location.href = "/hiragana-test/result";
        }
    });

})