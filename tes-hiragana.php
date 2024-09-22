<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Japanese Quiz</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <!-- <div class="col-md-6"> -->
      <!-- <div class="card"> -->
      <!-- <div class="card-body"> -->
      <!-- <h5 class="card-title">Hiragana Quiz</h5> -->
      <!-- all card hiragana start -->
      <form action="" method="post">
        <div id="all-card-hiragana" class="all-card-hiragana d-flex flex-wrap justify-content-center">

          <!-- hiragana card start -->
          <!-- <div id="card-hiragana" class="text-center">
          <div class="form-group mt-3">
            <input type="text" id="romaji-input" class="form-control" placeholder="Enter Romaji">
          </div>
        </div> -->
          <!-- hiragana card end -->
        </div>
      </form>
      <!-- all card hiragana end -->
      <!-- </div> -->
      <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      // $.ajax({
      //   url: 'php/search.php',
      //   type: 'GET',
      //   data: { keyword: keyword },
      //   success: function (data) {
      //     var datasiswa = JSON.parse(data);
      //     var html = '';

      //     if (datasiswa.length > 0) {
      //       let nomorUrut = 1;
      //       datasiswa.forEach(function (siswa) {
      //         html += '<tr>';
      //         html += '<td>';
      //         html += nomorUrut; // Gunakan nomor urut
      //         html += '</td>';
      //         html += '<td>';
      //         html += siswa.nis;
      //         html += '</td>';
      //         html += '<td>';
      //         html += siswa.nama;
      //         html += '</td>';
      //         html += '<td>';
      //         html += siswa.kelas;
      //         html += '</td>';
      //         html += '<td>';
      //         html += siswa.jurusan;
      //         html += '</td>';
      //         html += '<td>';
      //         html += siswa.alamat;
      //         html += '</td>';
      //         html += '<td>';
      //         html += '<button class="edit btn btn-primary" data-id="' + siswa.id_siswa + '"><i class="fa-solid fa-pen"></i></button> ';
      //         html += '<button class="delete btn btn-danger" data-id="' + siswa.id_siswa + '"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></button>';
      //         html += '</td>';
      //         html += '</tr>';

      //         nomorUrut++;
      //       });
      //     } else {
      //       html += '<td>';
      //       html += 'Tidak ada data yang ditemukan';
      //       html += '</td>';
      //     }

      //     $('#result').html(html);
      //   },
      //   error: function (xhr, status, error) {
      //     console.error('Error: ' + status + ' - ' + error);
      //     console.log(xhr.responseText);
      //   }
      // });

      // function untuk menampilkan data pada tabel
      function loadData() {
        $.ajax({
          url: 'service/ajax/ajax-hiragana.php',
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            var data = response.data;
            var allCardHiragana = $('#all-card-hiragana');
            allCardHiragana.empty();

            $.each(data, function (index, item) {
              var html = $('<div class="card">');
              var html = $('<div class="card-body">');
              var html = $('<div id="" class="card-hiragana text-center border border-3 p-5 m-3">');
              html.append(item.hiragana);
              html.append('<div class="form-group mt-3"><input type="text" id="romaji-input-' + item.hiragana_id + '" class="form-control" placeholder="Enter Romaji"><input type="hidden" name="card-hiragana-id">' + item.hiragana_id + '</div>');
              html.append('<div class="form-group mt-3">' + item.check + '</div>');
              html.append('</div>');
              html.append('</div>');
              html.append('</div>');
              allCardHiragana.append(html);
            });
          },
          error: function (xhr, status, error) {
            console.error('Error: ' + status + ' - ' + error);
            console.log(xhr.responseText);
          }
        });
      }

      loadData(); // tampilkan data terkini

      // check hiragana true / false
      // $('#simpanTambah').click(function () {
      //   var table = $('#tabel_siswa');
      //   var data = $('#formTambah').serialize(); // ambil value form lalu simpan pada variable data
      //   $.ajax({
      //     url: 'php/ajax.php',
      //     type: 'POST',
      //     data: data,
      //     success: function (response) {
      //       alert(response);
      //       $('#formTambah')[0].reset();
      //       loadData();
      //     },
      //     error: function (xhr, status, error) {
      //       console.error('Error: ' + status + ' - ' + error);
      //       console.log(xhr.responseText);
      //     }
      //   });
      // });



    });
  </script>
</body>

</html>