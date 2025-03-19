//Modal
var modal = $(".modal");
var overlay = $(".overlay");
var openModal = $("#info-icon");
var closeModal = $(".info-icon-close");

openModal.click(function () {
    modal.removeClass("hidden");
    overlay.removeClass("hidden");
});

closeModal.click(function () {

    modal.addClass("hidden");
    overlay.addClass("hidden");
    
    $(".modal-info").removeClass("hidden");
    $(".modal-question").addClass("hidden");

});
