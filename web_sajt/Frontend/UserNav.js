document.addEventListener('DOMContentLoaded', function() {
    var VisibleElements = document.querySelectorAll('.user_visible');

    VisibleElements.forEach(function(element) {
        element.style.display = 'block';
    });

    var InvisibleElements = document.querySelectorAll('.user_invisible');

    InvisibleElements.forEach(function(element) {
        element.style.display = 'none';
    });


});
