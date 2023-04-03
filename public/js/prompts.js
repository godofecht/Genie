$(document).ready(function () {
    // Hide "Remove" button if there's only one question
    checkQuestionCount();

    // Add question button
    $('#add-question').click(function() {
        var questionRow = $('.question-row').first().clone();
        questionRow.find('select').val('');
        questionRow.appendTo('#question-container');
        checkQuestionCount();
    });

    // Remove question button
    $(document).on('click', '.remove-question', function() {
        var questionRow = $(this).closest('.question-row');
        questionRow.remove();
        checkQuestionCount();
    });

    // Function to check question count
    function checkQuestionCount() {
        var questionCount = $('.question-row').length;
        var removeButtons = $('.remove-question');
        if (questionCount === 1) {
            removeButtons.hide();
        } else {
            removeButtons.show();
            removeButtons.first().hide();
        }
    }
});
