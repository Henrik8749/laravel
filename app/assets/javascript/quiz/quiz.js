var quiz_index = 0, quiz_count, quiz_list, url = (reverse) ? 'list': 'quiz/list';

$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url : url,
    dataType: 'json',
    success : function(data){
      quiz_list = data;
      quiz_index = 0;
      quiz_count = quiz_list.length;
      displayQuiz();
    }
  });

  $('.btn-answer').click(function(){
    checkAnswer();
  });
});

function displayQuiz() {
  var quiz = quiz_list[quiz_index]
    question = (reverse) ? quiz.back : quiz.front;

  $('.quiz_container .question').html(question);
  $('.quiz_container .category').html("Category: " + quiz.category);
  // var arrAnswers = (quiz.back + ',' + quiz.back_answers).split(',');
  // arrAnswers = arrAnswers.sort(function() {
  //   return .5 - Math.random();
  // });

  // var szAnswers = "", szAnswer;
  // for (var i = 0; i < arrAnswers.length; i++) {
  //   szAnswer = arrAnswers[i];
  //   szAnswers +=
  //     '<li class="answer">'
  //     + '<input type="radio" name="answer" value="' + szAnswer + '"/>' + szAnswer
  //     + '</li>';
  // };

  // $('.answers ul').html(szAnswers);
  $('#txtAnswer').val('');
}

function checkAnswer() {
  var quiz = quiz_list[quiz_index]
    answer = (reverse) ? quiz.front : quiz.back;
  // var radio = $('.answers ul li input[type="radio"]:checked');

  // if (radio.length == 0) {
  //   bootbox.alert("Please select the answer");
  //   return false;
  // }

  var message = (answer.toLowerCase() == $('#txtAnswer').val().toLowerCase()) ?
    "Success!" : "Fail! Correct answer is " + answer;
  bootbox.alert(message, moveNextAnswer);
}

function moveNextAnswer() {
  quiz_index = Math.min(quiz_index + 1, quiz_count - 1);
  displayQuiz();
}