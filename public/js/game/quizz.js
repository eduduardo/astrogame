var currentQuestion = 0;
var correctAnswers = 0;
var quizOver = false;

$(document).ready(function () {

    // Display the first question
    displayCurrentQuestion();
    $(this).find(".quizMessage").hide();

    // On clicking next, display the next question
    $(this).find(".nextButton").on("click", function () {
        if (!quizOver) {

            value = $("input[type='radio']:checked").val();

            if (value == undefined) {
                $(document).find(".quizMessage").show();
            } else {
                // TODO: Remove any message -> not sure if this is efficient to call this each time....
                $(document).find(".quizMessage").hide();

                if (value == questions[currentQuestion].correctAnswer) {
                    correctAnswers++;
                    $(document).find(".quizMessage").show().removeClass().addClass('uk-alert uk-alert-success quizMessage');

                    $(document).find(".message").html('Você acertou!');
                } else {
                  $(document).find(".quizMessage").show().removeClass().addClass('uk-alert uk-alert-danger quizMessage');

                  $(document).find(".message").html('Você errou :/');
                }

                currentQuestion++; // Since we have already displayed the first question on DOM ready
                if (currentQuestion < questions.length) {
                    displayCurrentQuestion();
                } else {
                    displayScore();
                    //                    $(document).find(".nextButton").toggle();
                    //                    $(document).find(".playAgainButton").toggle();
                    // Change the text in the next button to ask if user wants to play again
                    $(document).find(".nextButton").text("Jogar de novo?");
                    quizOver = true;
                    if(correctAnswers == questions.length){
                        var event = new Event('quizOver');
                        window.dispatchEvent(event);
                    } else {
                      $(document).find(".quizMessage").show().removeClass().addClass('uk-alert uk-alert-warning quizMessage');

                      $(document).find(".message").html('É preciso acertar todas as questões para completar a missão!');
                    }
                }
            }
        } else { // quiz is over and clicked the next button (which now displays 'Play Again?'
            quizOver = false;
            $(document).find(".nextButton").text("Próxima Pergunta");
            resetQuiz();
            displayCurrentQuestion();
            hideScore();
        }
    });


    if(complete_quest_on_quiz_completed){
      window.addEventListener('quizOver', function(){
        complete_quest(quest);
      });
    }

});

// This displays the current question AND the choices
function displayCurrentQuestion() {
    var question = questions[currentQuestion].question;
    var questionClass = $(document).find(".quizContainer > .question");
    var choiceList = $(document).find(".quizContainer > .choiceList");
    var numChoices = questions[currentQuestion].choices.length;

    // Set the questionClass text to the current question
    $(questionClass).text(question);

    // Remove all current <li> elements (if any)
    $(choiceList).find("li").remove();

    var choice;
    for (i = 0; i < numChoices; i++) {
        choice = questions[currentQuestion].choices[i];
        $('<li><input type="radio" value=' + i + ' name="dynradio" id="dynradio'+ i +'"><label for="dynradio'+ i +'">' + choice + '</label></li>').appendTo(choiceList);
    }
}

function resetQuiz() {
    currentQuestion = 0;
    correctAnswers = 0;
    hideScore();
}

function displayScore() {
    $(document).find(".quizContainer > .result").text("Você acertou: " + correctAnswers + " de: " + questions.length);
    $(document).find(".quizContainer > .result").show();
}

function hideScore() {
    $(document).find(".result").hide();
}
