(function ($) {
    'use strict';

    var form = $('.contact__form'),
        message = $('.contact__msg'),
        form_data;

    // Success function
    function done_func(response) {
        message.fadeIn().removeClass('alert-danger').addClass('alert-success');
        message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
        form.find('input:not([type="submit"]), textarea').val('');
    }

    // fail function
    function fail_func(data) {
        message.fadeIn().removeClass('alert-success').addClass('alert-success');
        message.text(data.responseText);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
    }
	
	
	  // processing
  
    
    form.submit(function (e) {
        e.preventDefault();
        form_data = $(this).serialize();
        $.ajax({
            url: form.attr('action'),
			beforeSend:   function processing(){
        message.fadeIn().removeClass('alert-success').addClass('alert-success');
        message.text('Email is sending...');
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
    },
			type: 'POST',
            data: form_data
        })
        .done(done_func)
        .fail(fail_func);
    });
    
})(jQuery);

	