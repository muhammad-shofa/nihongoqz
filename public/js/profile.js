$(document).ready(() => {
    $('.coming-soon').on('click', () => {
        Swal.fire({
            title: "Coming Soon",
            icon: 'info',
            confirmButtonText: 'Oke'
        })
    })

    // minta semua data history/result berdasarkan user yang sedang login (session tersimpan pada backend)
    $.ajax({
        url: '/api/history',
        type: 'GET',
        dataType: 'json',
        success: (response) => {
            if (response.status = "success") {
                // debug
                console.log(response.message);
                console.log(response.dataHistory);
                let rowDataHistory = "";
                let no = 1;

                if (response.dataHistory.length > 0) {
                    

                response.dataHistory.forEach(history => {
                    // ubah string array dari database menjadi array asli menggunakan JSON.parse
                    let true_answer_length = JSON.parse(history.true_answer).length;
                    let false_answer_length = JSON.parse(history.false_answer).length;
                    // perlu mengambil jumlah total soal berdasarkan true dan false answer yang sudah dijawab (user harus sudah menyelesaikan semua soal sebelum menekan tombol 'finish')
                    let total_questions = true_answer_length + false_answer_length;
                    // Hitung persentase
                    let percentage = total_questions > 0 ? (true_answer_length / total_questions) * 100 : 0;
                    percentage = percentage.toFixed(2); // Format ke 2 desimal
                    
                    // debug
                    // console.log("panjang true answer" + true_answer_length);
                    // console.log("panjang false answer" + false_answer_length);
                    // console.log("panjang total question" + total_questions);
                
                    rowDataHistory += `
                    <tr>
                    <td>${no++}</td>
                    <td>${history.char_type}</td>
                    <td>${history.kana_type}</td>
                        <td>${true_answer_length + "/" + total_questions}</td>
                        <td>${percentage} %</td>
                    </tr>`;
                })
                } else {
                    rowDataHistory += `
                    <tr>
                        <td colspan="5"><p><b>You haven't done any tests yet!</b></p></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>`;
            }

                $('#body_data_history').html(rowDataHistory);
            }
        },
        error: (xhr, status, error) => {
            alert(error);
        }
    })
})

