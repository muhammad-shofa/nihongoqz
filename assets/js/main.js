function changeBg(counter_quiz) {
  const cardQuiz = document.getElementById("card-quiz-" + counter_quiz);
  cardQuiz.style.backgroundColor = "#0d6efd";
}

let mainKanaIsSelect = 0;
let dakutenIsSelect = 0;
let btnStart = document.getElementById("btn-start");

// trigger content main kana
function mainKana() {
  let contentMainKana = document.getElementById("content-main-kana");
  let btnMainKana = document.getElementById("btn-main-kana");

  if (contentMainKana.style.display != "block") {
    contentMainKana.style.display = "block";
    btnMainKana.classList.remove("btn-red");
    btnMainKana.classList.add("active-btn-red");
    mainKanaIsSelect = 1;
  } else {
    contentMainKana.style.display = "none";
    btnMainKana.classList.remove("active-btn-red");
    btnMainKana.classList.add("btn-red");
    mainKanaIsSelect = 0;
  }

  // Memeriksa dan mengubah tampilan btnStart
  if (mainKanaIsSelect === 1 || dakutenIsSelect === 1) {
    btnStart.style.display = "block";
  } else {
    btnStart.style.display = "none";
  }
}

// trigger content dakuten
function dakuten() {
  let contentDakuten = document.getElementById("content-dakuten");
  let btnDakuten = document.getElementById("btn-dakuten");

  if (contentDakuten.style.display != "block") {
    contentDakuten.style.display = "block";
    btnDakuten.classList.remove("btn-red");
    btnDakuten.classList.add("active-btn-red");
    dakutenIsSelect = 1;
  } else {
    contentDakuten.style.display = "none";
    btnDakuten.classList.remove("active-btn-red");
    btnDakuten.classList.add("btn-red");
    dakutenIsSelect = 0;
  }

  if (mainKanaIsSelect === 1 || dakutenIsSelect === 1) {
    btnStart.style.display = "block";
  } else {
    btnStart.style.display = "none";
  }
}

// trigger content combination
function combination() {
  let combinationContent = document.getElementById("content-combination");
  if (combinationContent.style.display != "block") {
    combinationContent.style.display = "block";
  } else {
    combinationContent.style.display = "none";
  }
}
