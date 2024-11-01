(function($) {
    $(document).ready(function() {
        $('.trad-text-animation-widget .trad-text').each(function() {
            var $this = $(this);

            // Get data attributes
            var strings = JSON.parse($this.attr('data-strings'));
            var typeSpeed = parseInt($this.attr('data-type-speed')) || 100;
            var backSpeed = parseInt($this.attr('data-back-speed')) || 40;
            var loop = $this.attr('data-loop') === 'true';

            // Debugging (remove these after checking if everything works)
            console.log('Strings:', strings);
            console.log('Type Speed:', typeSpeed);
            console.log('Back Speed:', backSpeed);
            console.log('Loop:', loop);

            // Initialize Typed.js
            var options = {
                strings: strings,
                typeSpeed: typeSpeed,
                backSpeed: backSpeed,
                loop: loop,
            };

            new Typed(this, options);
        });
    });
})(jQuery);
