$(document).ready(function() {
    $('.toggle-btn').click(function() {
        var answer = $(this).parent().next('.faq-answer');
        var buttonText = $(this).text();

        if (buttonText === '+') {
            answer.slideDown();
            $(this).text('-');
        } else {
            answer.slideUp();
            $(this).text('+');
        }
    });
});
