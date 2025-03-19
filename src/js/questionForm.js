function saveAnswer() {
    var answeredOption = $(".modal-question .options input:checked").val();
    var courseId = $("#courseId").val();
    var emailValue = $("#email").val();
    var valoration = $("#ratingValue").html();
    
    var postDir = $("#postDir").val();

    $.ajax({
        url: postDir,
        type: 'POST',
        data: {
            action: "saveAnswer",
            courseId: courseId,
            answeredOption: answeredOption,
            emailValue: emailValue,
            valoration: valoration
        }
    })
        .done(function (data) {
            var dataObject = JSON.parse(data);
            console.log(dataObject);
            if (dataObject.code == 200) {
                $(".form").addClass("hidden");
                $(".correctlySaved").removeClass("hidden");
            } else if (dataObject.code > 400) {
                alert("Barkatu eragozpenak, errore bat gertatu da. Birkargatu orria eta saiatu berriz, mesedez.");
            }


        })
        .fail(function () {
            alert("Barkatu eragozpenak, errore bat gertatu da. Birkargatu orria eta saiatu berriz, mesedez.");
        })
        .always(function () { });

}

