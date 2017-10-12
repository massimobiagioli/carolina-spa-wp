$ = jQuery.noConflict();

$(document).ready(function() {
    // Fixed Menu
    var mainNavHeight = $('.navigation').innerHeight();
    var mainNavOffset = $('.navigation').offset();
    var realDistance = mainNavOffset.top + mainNavHeight;
    
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > realDistance) {
            $('.navigation').addClass('fixed-top').removeClass('mt-4');
            $('body').css({ 'margin-top': mainNavHeight + 'px'});
        } else {
            $('.navigation').removeClass('fixed-top').addClass('mt-4');
            $('body').css({ 'margin-top': '0'});
        }
    });
    
    // Contact Form
    $('#contact_form').on('submit', function(event) {
        event.preventDefault();
        
        var errors = [];
        
        // Name
        var name = $('#name').val();
        var nameField = $('#name');
        var nameDiv = nameField.parent();
        if (name.length < 2) {    
            nameField.addClass('form-control-danger').removeClass('form-control-success');
            nameDiv.addClass('has-danger').removeClass('has-success').find('small').html('Error!');
            nameDiv.find('label').addClass('col-form-label');
            errors.push("1");
        } else {
            nameField.addClass('form-control-success').removeClass('form-control-danger');
            nameDiv.addClass('has-success').removeClass('has-danger').find('small').html('Valid!');
            nameDiv.find('label').addClass('col-form-label');            
        }
        
        // Email
        var email = $('#email').val();
        var emailField = $('#email');
        var emailDiv = emailField.parent();
        if (email.length < 2) {    
            emailField.addClass('form-control-danger').removeClass('form-control-success');
            emailDiv.addClass('has-danger').removeClass('has-success').find('small').html('Error!');
            emailDiv.find('label').addClass('col-form-label');
            errors.push("2");
        } else {
            emailField.addClass('form-control-success').removeClass('form-control-danger');
            emailDiv.addClass('has-success').removeClass('has-danger').find('small').html('Valid!');
            emailDiv.find('label').addClass('col-form-label');            
        }
        
        // Message
        var message = $('#message').val();
        var messageField = $('#message');
        var messageDiv = messageField.parent();
        if (message.length < 2) {    
            messageField.addClass('form-control-danger').removeClass('form-control-success');
            messageDiv.addClass('has-danger').removeClass('has-success').find('small').html('Error!');
            messageDiv.find('label').addClass('col-form-label');
            errors.push("3");
        } else {
            messageField.addClass('form-control-success').removeClass('form-control-danger');
            messageDiv.addClass('has-success').removeClass('has-danger').find('small').html('Valid!');
            messageDiv.find('label').addClass('col-form-label');            
        }
        
        if (errors.length === 0) {
            var contact_form = $('#contact_form');
            $.ajax({
                type: contact_form.attr('method'),
                url: contact_form.attr('action'),
                data: contact_form.serialize()
            }).done(function(data) {
                var response = JSON.parse(data);
                $('#output').append(response.message).removeClass('d-none').fadeIn();
            });
        }
        
    });
});