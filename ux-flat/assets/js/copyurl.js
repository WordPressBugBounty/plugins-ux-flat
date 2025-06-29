document.addEventListener("DOMContentLoaded", function () {
    const isMobileDevice = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    const copyButtons = document.querySelectorAll(".copyurl");

    copyButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            const link = this.getAttribute("href");
            const title = this.getAttribute("data-title") || 'Share this link';
            const text = this.getAttribute("data-text") || 'Check out this link';

            if (isMobileDevice && navigator.share) {
                navigator.share({
                    title: title,
                    text: text,
                    url: link
                })
                .then(() => console.log('Shared successfully'))
                .catch((error) => console.error('Error:', error));
            } else {
                const tempInput = document.createElement("input");
                tempInput.value = link;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
                alert("URL Copied: " + link);
            }
        });
    });
});
