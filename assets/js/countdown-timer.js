document.addEventListener('DOMContentLoaded', function () {
    const countdownContainers = document.querySelectorAll('.trad-countdown-main');

    countdownContainers.forEach(function (container) {
        // Get target date and message (already sanitized on the server side)
        const targetDate = new Date(container.getAttribute('data-target-date')).getTime();
        const messageWhenDone = container.getAttribute('data-message-when-done');

        // Create a new <p> element for the message
        const messageP = document.createElement('p');
        messageP.className = 'trad-countdown-over-message';
        messageP.style.display = 'none'; // Hide it initially
        messageP.textContent = messageWhenDone;
        container.appendChild(messageP); // Add it to the container

        // Set up the countdown interval
        const countdownInterval = setInterval(function () {
            const now = new Date().getTime();
            const timeLeft = targetDate - now;

            // Calculate time components
            const months = Math.floor(timeLeft / (1000 * 60 * 60 * 24 * 30));
            const days = Math.floor((timeLeft % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            // Update the countdown display
            container.querySelector('.trad-months').innerHTML = months < 10 ? '0' + months : months;
            container.querySelector('.trad-days').innerHTML = days < 10 ? '0' + days : days;
            container.querySelector('.trad-hours').innerHTML = hours < 10 ? '0' + hours : hours;
            container.querySelector('.trad-minutes').innerHTML = minutes < 10 ? '0' + minutes : minutes;
            container.querySelector('.trad-seconds').innerHTML = seconds < 10 ? '0' + seconds : seconds;

            // If countdown is over
            if (timeLeft < 0) {
                clearInterval(countdownInterval);

                // Hide the countdown and show the message
                container.querySelector('.trad-countdown').style.display = 'none';
                messageP.style.display = 'block';

                // Apply the padding and border-radius from the countdown over message
                const timerMessage = document.getElementById("trad-timer-closed"); 
                if (timerMessage) {
                    messageP.style.padding = timerMessage.style.padding;
                    messageP.style.borderRadius = timerMessage.style.borderRadius;
                }
            }
        }, 1000);
    });
});
