$(document).ready(function() {
    $('#signup_form').submit(
        function validate(event) {
            var name = document.getElementById("name").value;
            var age = document.getElementById("age").value;
            var email = document.getElementById("email").value;
            var address = document.getElementById("address").value;
            var city = document.getElementById("city").value;
            var phone = document.getElementById("phone").value;


            var atposition = email.indexOf("@");
            var dotposition = email.lastIndexOf(".");

            if (name.length === 0) {
                alert("You must enter a name.");
                event.preventDefault();
                return false;
            }

            if (age.length === 0) {
                alert("You must enter a age.");
                event.preventDefault();
                return false;
            }
            if (email.length === 0) {
                alert("You must enter a age.");
                event.preventDefault();
                return false;
            }
            if (address.length === 0) {
                alert("You must enter a age.");
                event.preventDefault();
                return false;
            }
            if (city.length === 0) {
                alert("You must enter a age.");
                event.preventDefault();
                return false;
            }
            if (phone.length === 0) {
                alert("You must enter a age.");
                event.preventDefault();
                return false;
            }

            event.preventDefault(); // Prevent Default Submission
            $.ajax({
                    url: 'include/submit.php',
                    type: 'POST',
                    data: $(this).serialize(), // it will serialize the form data
                    dataType: 'html'
                })
                .done(function(data) {
                    $('.form_add').fadeOut('slow', function() {
                        $('.form_add').fadeIn('slow').html(data);
                    });
                })
                .fail(function() {
                    alert('Ajax Submit Failed ...');
                });
        });

});