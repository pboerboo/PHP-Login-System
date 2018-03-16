$(document)
.on("submit", "form.js-register", function(event) {
    event.preventDefault();
    
    var _form = $(this);
    var _error = $(".js-error", _form);
    
    var  data = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
        };
    //var b = alert ("hoi");
    if (data.email.length < 6) {
        _error
            .text("Please enter a valid email address")
            .show();
        return false;
    } else if (data.password.length < 8) {
        _error
            .text("Please use a password with minimal 8 characters")
            .show();
        return false;
    }
    // if the code comes so far as this point, all the checks are valid and we can start adding the rest of the code
    
    _error.hide();
    
    return false;
})