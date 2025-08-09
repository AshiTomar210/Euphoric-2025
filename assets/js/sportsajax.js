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

    if ($('input[name="sportsEvents[]"]:checked').length === 0) {
        validForm = false;
        new Notify({
            title: 'Validation Error',
            text: 'Please select at least one sports event.',
            status: 'error',
            position: 'right bottom',
        });
    }

    if (validForm) {
        $(':input[type="submit"]').prop('disabled', true);

        $.ajax({
            type: "POST",
            url: "config/sportsapi.php", // Make sure this points to the correct API file
            data: msaForm,
            contentType: false,
            processData: false,
            success: function (response) {
                // --- MODIFIED SECTION ---
                if (response.trim() === "success") {
                    // Redirect to the success page
                    window.location.href = '/Euphoric-2025/success.php';
                } else {
                    // If there's an error, show it
                    new Notify({
                        title: 'Form Status',
                        text: response,
                        status: 'error',
                        position: 'right bottom',
                    });
                    $(':input[type="submit"]').prop('disabled', false);
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