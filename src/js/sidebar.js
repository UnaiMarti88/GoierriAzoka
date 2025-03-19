// Sidebar estiloak

$(".offcanvas .course").hover(function () {
    sidebarSelectedGiveStyles(this, false);
},
    function () {
        sidebarSelectedRemoveStyles(this);
    });

$(".offcanvas .course").click(function () {
    sidebarSelectedGiveStyles(this, true);
});

function sidebarSelectedGiveStyles(elem, click) {
    $(elem).css("background-color", "white");
    $(elem).find("a").css("font-weight", "bold");
    $(elem).find("a").css("color", "#024e93");

    if (click) {
        $(function () {
            setTimeout(function () {
                sidebarSelectedRemoveStyles(elem);
            }, 500);
        });
    }
}

function sidebarSelectedRemoveStyles(elem) {
    $(elem).css("background-color", "");
    $(elem).find("a").css("font-weight", "");
    $(elem).find("a").css("color", "white");
}