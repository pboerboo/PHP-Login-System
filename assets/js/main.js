$(document)
.on("submit", "form.js-register", function(event) {
    event.preventDefault();
    
    var _form = $(this);
    var _error = $(".js-error", _form);
    
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
        };
    //var b = alert ("hoi");
    if (dataObj.email.length < 6) {
        _error
            .text("Please enter a valid email address")
            .show();
        return false;
    } else if (dataObj.password.length < 8) {
        _error
            .text("Please use a password with minimal 8 characters")
            .show();
        return false;
    }
    // if the code comes so far as this point, all the checks are valid and we can start adding the rest of the code
    
    _error.hide();
    
    $.ajax({
        type: 'POST',
        url: 'PHP-Login-System/ajax/register.php',
        data: dataObj,
        DataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data) {
        //code when done
        console.log(data)
        alert("data.redirect")
        if (data.redirect !== undefined) {
            window.location = data.redirect;
        }
        if (data.error !== undefined) {
            _error
                .html(data.error)
                .show();
        }
        
    })
    .fail(function ajaxFail(e) {
        // code when fail
        console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data) {
        //code when finished
    })
    
    return false;
}) 

$(document)
.on("submit", "form.js-login", function(event) {
    event.preventDefault();
    
    var _form = $(this);
    var _error = $(".js-error", _form);
    
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
        };
    
    if (dataObj.email.length < 6) {
        _error
            .text("Please enter a valid email address")
            .show();
        return false;
    } else if (dataObj.password.length < 8) {
        _error
            .text("Please use a password with minimal 8 characters")
            .show();
        return false;
    }
    // if the code comes so far as this point, all the checks are valid and we can start adding the rest of the code
    
    _error.hide();
    
    $.ajax({
        type: 'POST',
        url: 'PHP-Login-System/ajax/login.php',
        data: dataObj,
        DataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data) {
        //code when done
        console.log(data)
        if (data.redirect !== undefined) {
            window.location = data.redirect;
        }
        if (data.error !== undefined) {
            _error
                .html(data.error)
                .show();
        }
        
    })
    .fail(function ajaxFail(e) {
        // code when fail
        console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data) {
        //code when finished
    })
    
    return false;
}) 