$(document).ready(function () {
    function loadResultTest() {
        /* function loadResultTest ini memiliki 2 alternatif pengambilan data
        1. dari localstorage karena user belum login
        2. dari database menggunakan endpoint dan result controller ketika user sudah login

        Mencoba menerapkan AJAX Chaining pada kode agar lebih mudah untuk dibaca
        */
       let is_login_status = "";
       let check_this_session = "is_login";
       let is_test_ongoing = localStorage.getItem('is_test_ongoing');

        // cek apakah test sedang berjalan, jika tidak maka kembalikan user ke halaman hiragana-test
       if (!is_test_ongoing) {
        window.location.href = "/";
       }
       
       // cek dan dapatkan session dari backend
       function checkSession() {
        return $.ajax({
            url: '/get-session',
            type: 'GET',
            dataType: 'json'
        })
       }

       // ambil data dari localstorage lalu masukkan kedalam database
       function saveResultTest() {
        // AMBIL DATA DARI YANG DIPERLUKAN LOCALSTORAGE MASUKKAN KEDALAM VARIABLE
        let char_type = localStorage.getItem('char_type');
        let kana_type = localStorage.getItem('kana_type');
        let true_answer = localStorage.getItem('user_true_answer');
        let false_answer = localStorage.getItem('user_false_answer');
        return $.ajax({
            url: '/save-result-test',
            type: 'POST',
            data: {
                char_type: char_type,
                kana_type: kana_type,
                true_answer: true_answer,
                false_answer: false_answer
            },
            dataType: 'json'
        })
       }

        // ambil data dari localstorage lalu tampilkan pada halaman
       function showResultTest() {
        let correct_count_result = localStorage.getItem("correct_count_result");
        let total_questions_result = localStorage.getItem("total_questions_result");
        let percentage_result = localStorage.getItem('percentage_result');
        let proficiency = "";
        let summary= "";

        switch (true) {
            case (percentage_result <= 45) :
                proficiency = "Low";
                summary = `Your score is ${correct_count_result} out of ${total_questions_result}, with a percentage of ${percentage_result}%. Your proficiency level is ${proficiency}, indicating that you might need more practice. Don't be discouraged keep learning and improving, and you'll see progress soon!`;
                break;
            case (percentage_result <= 80) :
                proficiency = "Moderate";
                summary = `You did well, scoring ${correct_count_result} out of ${total_questions_result}, achieving a solid ${percentage_result}%. Your proficiency is at a ${proficiency} level, which means you have a good understanding but still have room for improvement. Keep practicing, and you’ll reach a higher level soon!`;
                break;
            default:
                proficiency = "High";
                summary = `Excellent work! You scored ${correct_count_result} out of ${total_questions_result}, reaching an impressive ${percentage_result}%. Your proficiency level is ${proficiency}, showing a strong grasp of the material. Keep up the great work and strive for perfection!`;
                break;
        }
        
        // debug
        // console.log(correct_count_result);
        // console.log(total_questions_result);
        // console.log(percentage_result);

        // tampilkan data pada card 
        $('#score-v').text(correct_count_result + "/" + total_questions_result);
        $('#percentage-v').text(percentage_result + "%");
        $('#proficiency-v').text(proficiency);
        $('#summary-v').text(summary);
       }

        // Ajax Chaining
        // tangkap response dari checkSession
       checkSession().then((response) => {
        if (response.is_login) {
            let testSaved = sessionStorage.getItem('testSaved');
            console.log('test saved : ' + testSaved);
            // jika test belum pernah disimpan sebelumnya
            if (testSaved == "false") {
                // ambil data dari localstorage lalu masukkan kedalam database
                saveResultTest().then((response) => {
                    console.log(response.status)
                    console.log(response.message)
                    // berikan 
                    // alert(response.message)
                    sessionStorage.setItem('testSaved', 'true');
                    return showResultTest();
                })
            } else {
                return showResultTest();
            }
        } else {
            // ambil data dari localstorage dan tampilkan tanpa menyimpannya kedalam database
            return showResultTest();
        }
       })
    }

    // load result test
    loadResultTest();

    // ketika tombol restart diklik
    $('.btn-restart').on('click', function () {
        localStorage.clear();
        window.location.href = "/hiragana-test";
    });
})

