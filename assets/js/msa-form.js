$("#registrationForm").submit(function (e) {
    e.preventDefault();
    let validForm = true;
    let msaForm = new FormData(this);

    $('#name, #branch, #year, #admissionId, #phone, #email').each(function () {
        $(this).next('.text-danger').remove();
        if (validateField(this.id) == 0) {
            validForm = false;
        }
    });

    if ($('input[name="culturalEvents[]"]:checked').length === 0) {
        validForm = false;
        new Notify({
            title: 'Validation Error',
            text: 'Please select at least one cultural event.',
            status: 'error',
            position: 'right bottom',
        });
    }

    if (validForm) {
        $(':input[type="submit"]').prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "config/api.php",
            data: msaForm,
            contentType: false,
            processData: false,
            success: function (response) {
                // --- MODIFIED SECTION ---
                if (response.trim() === "success") {
                    // Instead of showing a notification, redirect to the success page.
                    window.location.href = 'success.php';
                } else {
                    // If there's an error, show the notification as before.
                    new Notify({
                        title: 'Form Status',
                        text: response, // Display the error message from api.php
                        status: 'error',
                        position: 'right bottom',
                    });
                    $(':input[type="submit"]').prop('disabled', false); // Re-enable button on error
                }
                // --- END OF MODIFIED SECTION ---
            },
            error: function () {
                new Notify({
                    title: 'Error',
                    text: 'An error occurred during submission.',
                    status: 'error',
                    position: 'right bottom',
                });
                $(':input[type="submit"]').prop('disabled', false);
            }
        });
    }
});