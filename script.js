$(document).ready(function() {
    // Handle form submission via AJAX
    $('#contactForm').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: 'submit_contact.php', // The PHP script to handle form submission
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response === 'success') {
                    // Success message
                    $('#responseMessage').html('<p style="color: green;">Thank you for your message! We will get back to you soon.</p>');
                } else {
                    // Error message
                    $('#responseMessage').html('<p style="color: red;">There was an error, please try again later.</p>');
                }
            },
            error: function() {
                // Handle AJAX request error
                $('#responseMessage').html('<p style="color: red;">Something went wrong. Please try again later.</p>');
            }
        });
    });
});
