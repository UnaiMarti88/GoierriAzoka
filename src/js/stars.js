
// Izarren gestioa

var ratedIndex = -1,
    resultDiv = $('#ratingResult'),
    resultValueDiv = $('#ratingValue'),
    stars = $('.star');

stars.on('click', function () {
    ratedIndex = parseInt($(this).data('value'));
    resultDiv.html('Balorazioa: ' + ratedIndex + ' izar.');
    resultValueDiv.html(ratedIndex);
    highlightStars(ratedIndex);
});

stars.on('mouseover', function () {
    var currentIndex = parseInt($(this).data('value'));
    highlightStars(currentIndex);
});

stars.on('mouseleave', function () {
    removeHighlight();
    highlightStars(ratedIndex);
});

function highlightStars(index) {
    removeHighlight();
    for (var i = 0; i < index; i++) {
        stars.eq(i).addClass('highlight');
    }
}

function removeHighlight() {
    stars.removeClass('highlight');
}