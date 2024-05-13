function changeBg(counter_quiz) {
  const cardQuiz = document.getElementById("card-quiz-" + counter_quiz);
  cardQuiz.style.backgroundColor = "#0d6efd";
}

// var mainKanaIsSelect = 0;
// // var dakutenIsSelect = false;
// // let btnStartMainKana = document.getElementById("btn-start-main-kana");
// let btnStartDakuten = document.getElementById("btn-start-dakuten");

// // trigger content main kana
// function mainKana() {
//   let contentMainKana = document.getElementById("content-main-kana");
//   let btnMainKana = document.getElementById("btn-main-kana");
//   let btnStartMainKana = document.getElementById("btn-start-main-kana");
//   if (contentMainKana.style.display != "block") {
//     contentMainKana.style.display = "block";
//     btnMainKana.classList.remove("btn-red");
//     btnMainKana.classList.add("active-btn-red");
//     mainKanaIsSelect = 1;
//   } else {
//     contentMainKana.style.display = "none";
//     btnMainKana.classList.remove("active-btn-red");
//     btnMainKana.classList.add("btn-red");
//     mainKanaIsSelect = 0;
//   }

//   // Memeriksa dan mengubah tampilan btnStartMainKana
//   if (mainKanaIsSelect === 1) {
//     btnStartMainKana.style.display = "block";
//   } else {
//     btnStartMainKana.style.display = "none";
//   }
// }

// mainKana();
// console.log(mainKanaIsSelect);
// // if (mainKanaIsSelect === 1) {
// //   let btnStartMainKana = document.getElementById("btn-start-main-kana");
// //   btnStartMainKana.style.display = "block";
// // }

// // trigger content dakuten
// var dakutenIsSelect = 0;
// function dakuten() {
//   let contentDakuten = document.getElementById("content-dakuten");
//   let btnDakuten = document.getElementById("btn-dakuten");
//   let btnStartDakuten = document.getElementById("btn-start-dakuten");
//   if (contentDakuten.style.display != "block") {
//     contentDakuten.style.display = "block";
//     btnDakuten.classList.remove("btn-red");
//     btnDakuten.classList.add("active-btn-red");
//     dakutenIsSelect = 1;
//   } else {
//     contentDakuten.style.display = "none";
//     btnDakuten.classList.remove("active-btn-red");
//     btnDakuten.classList.add("btn-red");
//     dakutenIsSelect = 0;
//   }

//   if (dakutenIsSelect === 1) {
//     btnStartDakuten.style.display = "block";
//   } else {
//     btnStartDakuten.style.display = "none";
//   }
// }

var mainKanaIsSelect = 0;
var dakutenIsSelect = 0;
let btnStartMainKana = document.getElementById("btn-start-main-kana");

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

  // Memeriksa dan mengubah tampilan btnStartMainKana
  if (mainKanaIsSelect === 1 || dakutenIsSelect === 1) {
    btnStartMainKana.style.display = "block";
  } else {
    btnStartMainKana.style.display = "none";
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
    btnStartMainKana.style.display = "block";
  } else {
    btnStartMainKana.style.display = "none";
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
