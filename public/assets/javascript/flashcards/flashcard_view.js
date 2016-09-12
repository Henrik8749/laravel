// console.log(flashcards);
var card_index = 0, card_count = 0, flashcards;

$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url : 'flashcards',
    dataType: 'json',
    success : function(data){
      flashcards = data;
      card_count = flashcards.length;
      displayCard();
    }
  });

  $('#flashcard').swipe( {
    //Generic swipe handler for all directions
    swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
      if (direction == 'up' || direction == 'down') {
        if ($(this).hasClass('transformed')) {
          $(this).removeClass('transformed');
        } else {
          $(this).addClass('transformed');
        }
        return;
      }

      var card_count = flashcards.length;

      if (direction == 'left') {
        card_index = Math.max(0, card_index - 1);
      } else {
        card_index = Math.min(card_count - 1, card_index + 1);
      }
      displayCard();
    },
    //Default is 75px, set to 0 for demo so any distance triggers swipe
     threshold:0
  });

  $('#flashcard .btn.next').click(function(){
    card_index = Math.min(card_count - 1, card_index + 1);
    displayCard();
    return false;
  });
  $('#flashcard .btn.prev').click(function(){
    card_index = Math.max(0, card_index - 1);
    displayCard();
    return false;
  });
  $('#flashcard .btn.flip').click(function(){
    if ($('#flashcard').hasClass('transformed')) {
      $('#flashcard').removeClass('transformed');
      $('.description .side').html("Front");
    } else {
      $('#flashcard').addClass('transformed');
      $('.description .side').html("Back");
    }
    return false;
  });
});

function displayCard() {
  var flashcard = flashcards[card_index];
  $('#flashcard .front .text').html(flashcard.front);
  $('#flashcard .back .text').html(flashcard.back);
  $('.description .card_index').html(card_index + 1);
  $('.description .card_count').html(flashcards.length);
}