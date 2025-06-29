document.addEventListener('DOMContentLoaded', function() {
    document.body.insertAdjacentHTML('beforeend', '<div id="progress-reading"></div>');
    var readingProgress = document.querySelector("#progress-reading");
    var footerHeight = 660;
    document.addEventListener("scroll", function() {
        var w = (document.body.scrollTop || document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight - footerHeight) * 100;
        readingProgress.style.setProperty("width", w + "%");
    });
});