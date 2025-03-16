$(document).ready(function () {
    let is_test_ongoing = JSON.parse(localStorage.getItem("is_test_ongoing")) === true;
    let test_type = localStorage.getItem("char_type");
    let current_page = window.location.pathname; // Ambil URL saat ini

    if (is_test_ongoing) {
        if (test_type === "hiragana" && current_page !== "/hiragana-test") {
            window.location.href = "/hiragana-test";
        } 
        else if (test_type === "katakana" && current_page !== "/katakana-test") {
            window.location.href = "/katakana-test";
        }
    }
});