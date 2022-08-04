document.addEventListener( 'wpcf7submit', function( event ) {
    if ( event.detail.contactFormId == 'form_cart' && event.detail.status=='mail_sent') { //Thay 1 thành ID của form
        location = '../NewWS_Technology/order.php'; //Thay thành link cần chuyển hướng
    }
}, false );