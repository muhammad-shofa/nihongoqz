function changeBg(counter_quiz) {
  const cardQuiz = document.getElementById("card-quiz-" + counter_quiz);
  cardQuiz.style.backgroundColor = "#0d6efd";
}

// trigger content main kana
// let mainKanaIsSelect = false;
function mainKana() {
  let contentMainKana = document.getElementById("content-main-kana");
  if (contentMainKana.style.display != "block") {
    contentMainKana.style.display = "block";
    // mainKanaIsSelect = true;
  } else {
    contentMainKana.style.display = "none";
    // mainKanaIsSelect = false;
  }
}
// console.log(mainKanaIsSelect);

// trigger content dakuten
// let dakutenIsSelect = false;
function dakuten() {
  let contentDakuten = document.getElementById("content-dakuten");
  if (contentDakuten.style.display != "block") {
    contentDakuten.style.display = "block";
    // return (dakutenIsSelect = true);
  } else {
    contentDakuten.style.display = "none";
    // return (dakutenIsSelect = false);
  }
}
// console.log(dakutenIsSelect);

// show btn 'start quiz' if main kana or dakuten selected
// if (mainKanaIsSelect == true || dakutenIsSelect == true) {
//   let btnStart = document.getElementById("btn-start");
//   btnStart.style.display = "block";
// }
