jQuery(document).ready(function($) {
    // Tab switching logic
    $('.trad-tab-link').on('click', function(e) {
        e.preventDefault();

        // Remove active class from all tabs and content
        $('.trad-tab-link').removeClass('active');
        $('.trad-tab-content').removeClass('active');

        // Add active class to the clicked tab and corresponding content
        $(this).addClass('active');
        $('#' + $(this).data('tab')).addClass('active');

        // Set the current tab in the hidden input field
        $('#current_tab').val($(this).data('tab'));
        
    });

    // On page load, set the active tab from the hidden input value (if exists)
    var savedTab = $('#current_tab').val();
    console.log(savedTab);
    if (savedTab) {
        // Remove active class from all tabs and content
        $('.trad-tab-link').removeClass('active');
        $('.trad-tab-content').removeClass('active');

        // Add active class to the saved tab and corresponding content
        $('.trad-tab-link[data-tab="' + savedTab + '"]').addClass('active');
        $('#' + savedTab).addClass('active');
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("turbo-dashboard-navbar");
    const contentDetails = document.getElementById("turbo-addons-content-details");
    const sidebarMenu = document.getElementById("turbo-addons-sidebar-menu");
    const toggleInput = document.getElementById("turbo-dashboard-navbar-theme-input");
    const storedTheme = localStorage.getItem("dashboardNavbarTheme");

    // Function to set text color based on background color
    function updateTextColor(element, backgroundColor) {
        if (backgroundColor === "dark") {
            element.style.color = "#eeeeee"; // White text for dark background
        } else {
            element.style.color = "#444444"; // Black text for light background
        }
    }

    // Function to update background and text color for all elements
    function updateColors(backgroundColor) {
        const bgColor = backgroundColor === "dark" ? "#333" : "#ffffff"; // Set background color
        navbar.style.backgroundColor = bgColor;
        contentDetails.style.backgroundColor = bgColor;
        const sidebgColor = backgroundColor === "dark" ? "#101112" : "#d7d7d761";
        sidebarMenu.style.backgroundColor = sidebgColor;

        // Update the text color for the navbar and content details
        updateTextColor(navbar, backgroundColor);
        updateTextColor(contentDetails, backgroundColor);

        // Update the text color for all anchor tags in the sidebar menu
        const anchors = sidebarMenu.querySelectorAll("a");
        anchors.forEach(anchor => updateTextColor(anchor, backgroundColor));

        // Update text color for <h1> and <p> tags in content details
        const headings = contentDetails.querySelectorAll("h1, p, a");
        headings.forEach(heading => updateTextColor(heading, backgroundColor));
    }

    // Apply the stored background color and text color on page load
    if (storedTheme) {
        updateColors(storedTheme); // Apply colors based on stored theme
        toggleInput.checked = storedTheme === "dark";
    }

    // Event listener for toggle change
    toggleInput.addEventListener("change", function () {
        if (toggleInput.checked) {
            // Set dark theme
            localStorage.setItem("dashboardNavbarTheme", "dark");
            updateColors("dark"); // Update colors for dark theme
        } else {
            // Set light theme
            localStorage.setItem("dashboardNavbarTheme", "light");
            updateColors("light"); // Update colors for light theme
        }
    });
});

jQuery(document).ready(function($) {
    $('.trad-alert-dismiss-button').on('click', function() {
        $(this).closest('.trad-alert-updated-div').fadeOut();
    });
});




