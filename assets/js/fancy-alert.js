document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function (event) {
        if (event.target.classList.contains('trad-fancy-alert-close-button')) {
            const alertContainer = event.target.closest('.trad-fancy-alert-container');
            if (alertContainer) {
                alertContainer.style.display = 'none';
            }
        }
    });
});
