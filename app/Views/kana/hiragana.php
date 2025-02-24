<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nihongoqz | Hiragana</title>
</head>

<body>
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
            // function untuk meminta semua data hiragana dari backend melalui endpoint
            function loadHiraganaTest() {
                $.ajax({
                    url: '/api/hiragana',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            let cards = "";

                            response.dataHiragana.forEach(hiragana => {
                                cards += `
                                <div class="card text-center" style="width: 18rem;" id="card_${hiragana.hiragana_id}">
                                    <div class="card-body">
                                        <h2>${hiragana.hiragana_kana}</h2>
                                        <input type="text" class="dakuten_field form-control" id="dakuten_field_${hiragana.hiragana_id}" data-hiragana_id="${hiragana.hiragana_id}">
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

                // console.log(hiragana_id);
                // console.log(dakuten_field);
                // console.log(true_answer);

                // fitur lanjutan, simpan ke localstorage agar ketika direfresh data tidak hilang sampai user menyelesaikan test-nya
                if (dakuten_field == true_answer) {
                    console.log("Jawaban kamu " + dakuten_field + " BENAR!");
                    $('#card_' + hiragana_id).addClass('bg-success');

                    status_answer = true;
                    // loadHiraganaTest();
                    // jika sesuai maka masukkan data dakute_field dan true answer ke localstorage dengan key "is_true"
                } else {
                    console.log("Jawaban kamu " + dakuten_field + " SALAH!");
                    $('#card_' + hiragana_id).addClass('bg-danger');
                    // jika tidak sesuai maka masukkan data dakute_field dan true answer ke localstorage dengan key "is_false"
                }
            })
        })
    </script>
</body>

</html>