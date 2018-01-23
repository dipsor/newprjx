(function($){

    console.log('#login-modal init')
    $('#login-modal').modal();

    $('#login-modal-button').on('click', function(){
        console.log('click');
        $(this).css({'z-index':1});
    })

    $(function(){
        $('.button-collapse').sideNav();
        $('.parallax').parallax();
    }); // end of document ready
})(jQuery); // end of jQuery name space