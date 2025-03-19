function sendForm(valoration, emailValue, course) {

    var postDir = $("#postDir").val();

    $.ajax({
        url: postDir,
        type: 'POST',
        data: {
            action: "checkInput",
            valoration: valoration,
            emailValue: emailValue,
            course: course
        }
    })
        .done(function (data) {
            var dataObject = JSON.parse(data);

            if (dataObject.code == 401) {
                if (dataObject.errors == "both") {
                    wrongEmail();
                    wrongValoration();
                } else if (dataObject.errors == "email") {
                    correctValoration();
                    wrongEmail();
                } else if (dataObject.errors == "valoration") {
                    correctEmail();
                    wrongValoration();
                }
            } else if (dataObject.code == 402) {
                $(".form").addClass("hidden");
                $(".alreadyAnswered").removeClass("hidden");
            } else if (dataObject.code == 200) {

                $(".modal-info").addClass("hidden");
                $(".modal-question").removeClass("hidden");
                $("#info-icon").click();

            }

        })
        .fail(function () {
            alert("Barkatu eragozpenak, errore bat gertatu da. Birkargatu orria eta saiatu berriz, mesedez.");
        })
        .always(function () { });

}
function checkResultsAndSend() {

    correctValoration();
    correctEmail();

    var valoration = $("#ratingValue").html();

    var emailPattern = $("#email").attr('pattern');
    var emailValue = $("#email").val();

    var course = $("#courseId").val();

    var regex = new RegExp('^' + emailPattern + '$');

    if (regex.test(emailValue) && isValidValoration(valoration)) {
        sendForm(valoration, emailValue, course);
    } else if (!regex.test(emailValue) && !isValidValoration(valoration)) {
        wrongEmail();
        wrongValoration();
    } else if (!regex.test(emailValue)) {
        correctValoration();
        wrongEmail();
    } else if (!isValidValoration(valoration)) {
        correctEmail();
        wrongValoration();
    }
}

function wrongEmail() {
    $("#email").addClass("red-border");
    $("#emailError").removeClass("hidden");
}

function wrongValoration() {
    $(".rating").addClass("red-border");
    $("#valorationError").removeClass("hidden");
}

function correctEmail() {
    $("#email").removeClass("red-border");
    $("#emailError").addClass("hidden");
}

function correctValoration() {
    $(".rating").removeClass("red-border");
    $("#valorationError").addClass("hidden");
}

function isValidValoration(valoration) {
    return (valoration == 1 || valoration == 2 || valoration == 3 || valoration == 4 || valoration == 5);
}