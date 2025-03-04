$(document).ready(function () {
    function loadResultTest() {
        /* function loadResultTest ini memiliki 2 alternatif pengambilan data
        1. dari localstorage karena user belum login
        2. dari database menggunakan endpoint dan result controller
        */
       let is_login_status = "";
       let check_this_session = "is_login";

        $.ajax({
            url: "/check-session/" + check_this_session,
            type: "GET",
            dataType:'json',
            success: function (response) {
                if (response.status == "active") {
                    console.log("session active");
                    is_login_status = response.status;
                } else {
                    console.log("session inactive");
                    is_login_status = response.status;
                }
            },
            error: function() {
                alert("Failed to fetch data");
            }
        })

        if (is_login_status == "active") {
            // ketika is_login active maka ambil data dari databse menggunakan ajax
            console.log("Fetch data from database");
        } else {
            console.log("Fetch data from localstorage");
            let correct_count_result = localStorage.getItem("correct_count_result");
            let total_questions_result = localStorage.getItem("total_questions_result");
            let percentage_result = localStorage.getItem('percentage_result');
            console.log(correct_count_result);
            console.log(total_questions_result);
            console.log(percentage_result);
            // let resultCard = `

            // `;

            // $("#container-card").html(resultCard);
        }

    //    if () {

    //    }
        // $.ajax({
        //     url: "/api/result",
        //     type: "GET",
        //     dataType: 'json',
        //     success: function (response) {
        //         if (response.status == 'success') {
        //             alert("berhasil diambil (DUMMY)");
        //         }
        //     },
        //     error: function() {

        //     }
        // })
    }

    loadResultTest();
})

