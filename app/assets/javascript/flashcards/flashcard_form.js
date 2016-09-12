$(document).ready(function() {
  // The maximum number of answers
  var MAX_OPTIONS = 5;

  $('#flashcardForm').bootstrapValidator({
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      front: { validators: {
        notEmpty: { message: 'The front required and cannot be empty' }
      }},
      back: { validators: {
        notEmpty: { message: 'The back required and cannot be empty' }
      }},
      category: { validators: {
        notEmpty: { message: 'The category required and cannot be empty' }
      }},
      'front_answers[]': {
        validators: {
          notEmpty: {
            message: 'The front answer required and cannot be empty'
          },
          stringLength: {
            max: 100,
            message: 'The front answer must be less than 100 characters long'
          }
        }
      },
      'back_answers[]': {
        validators: {
          notEmpty: {
            message: 'The back answer required and cannot be empty'
          },
          stringLength: {
            max: 100,
            message: 'The back answer must be less than 100 characters long'
          }
        }
      }
    }
  })
  // Add button click handler
  .on('click', '.addButton', function() {
    var $template = $('#' + $(this).attr('rel') + 'Template'),
      $clone  = $template
              .clone()
              .removeClass('hide')
              .removeAttr('id')
              .insertBefore($template),
      $answer = $clone.find('[name="' + $(this).attr('rel') + '[]"]');

    // Add new field
    $('#flashcardForm').bootstrapValidator('addField', $answer);
  })
  // Remove button click handler
  .on('click', '.removeButton', function() {
    var $row    = $(this).parents('.form-group'),
        $answer = $row.find('[name="' + $(this).attr('rel') + '[]"]');

    // Remove element containing the answer
    $row.remove();

    // Remove field
    $('#flashcardForm').bootstrapValidator('removeField', $answer);
  })
  // Called after adding new field
  .on('added.field.bv', function(e, data) {
    // data.field   --> The field name
    // data.element --> The new field element
    // data.answers --> The new field answers

    if (data.field === $(this).attr('rel') + '[]') {
      if ($('#flashcardForm').find(':visible[name="' + $(this).attr('rel') + '[]"]').length >= MAX_OPTIONS) {
        $('#flashcardForm').find('.addButton').attr('disabled', 'disabled');
      }
    }
  })
  // Called after removing the field
  .on('removed.field.bv', function(e, data) {
   if (data.field === $(this).attr('rel') + '[]') {
      if ($('#flashcardForm').find(':visible[name="' + $(this).attr('rel') + '[]"]').length < MAX_OPTIONS) {
          $('#flashcardForm').find('.addButton').removeAttr('disabled');
      }
    }
  });
});