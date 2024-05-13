function changeBg(counter_quiz) {
  const cardQuiz = document.getElementById("card-quiz-" + counter_quiz);
  cardQuiz.style.backgroundColor = "#0d6efd";
}

let btnStart = document.getElementById("btn-start");

// trigger content main kana
function mainKana() {
  let contentMainKana = document.getElementById("content-main-kana");
  let btnMainKana = document.getElementById("btn-main-kana");
  // let mainKanaIsSelect;
  if (contentMainKana.style.display != "block") {
    contentMainKana.style.display = "block";
    btnMainKana.classList.remove("btn-red");
    btnMainKana.classList.add("active-btn-red");
    // mainKanaIsSelect = 1;
  } else {
    contentMainKana.style.display = "none";
    btnMainKana.classList.remove("active-btn-red");
    btnMainKana.classList.add("btn-red");
    // mainKanaIsSelect = 0;
  }
}

// let mainKanaIsSelect = mainKana(mainKanaIsSelect);
// console.log(mainKanaIsSelect);

// console.log(mainKanaIsSelect);
// if (mainKanaIsSelect == 1) {
//   btnStart.style.display = "block";
// } else {
//   btnStart.style.display = "none";
// }

// trigger content dakuten
// let dakutenIsSelect = 0;
function dakuten() {
  let contentDakuten = document.getElementById("content-dakuten");
  let btnDakuten = document.getElementById("btn-dakuten");
  if (contentDakuten.style.display != "block") {
    contentDakuten.style.display = "block";
    btnDakuten.classList.remove("btn-red");
    btnDakuten.classList.add("active-btn-red");
    // dakutenIsSelect = 1;

    // if (dakutenIsSelect == 1) {
    //   btnStart.style.display = "block";
    // } else {
    //   btnStart.style.display = "none";
    // }
  } else {
    contentDakuten.style.display = "none";
    btnDakuten.classList.remove("active-btn-red");
    btnDakuten.classList.add("btn-red");
    // dakutenIsSelect = 0;
  }
}
// console.log(dakutenIsSelect);

// trigger content combination
function combination() {
  let combinationContent = document.getElementById("content-combination");
  if (combinationContent.style.display != "block") {
    combinationContent.style.display = "block";
  } else {
    combinationContent.style.display = "none";
  }
}

// show btn 'start quiz' if main kana or dakuten selected
// if (mainKanaIsSelect == true || dakutenIsSelect == 1) {
//   let btnStart = document.getElementById("btn-start");
//   btnStart.style.display = "block";
// }
