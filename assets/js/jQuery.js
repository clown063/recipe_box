$(function(){
    $('.input.one').change(function(){
        if (this.value === ""){
            $('.username-success').css('visibility', 'hidden');
        } else {
            $('.username-success').css('visibility', 'visible');
        }
    });
    $('.input.two').change(function(){
        if (this.value === ""){
            $('.email-success').css('visibility', 'hidden');
        } else {
            $('.email-success').css('visibility', 'visible');
        }
    });
    $('.input.three').change(function(){
        if (this.value === ""){
            $('.password-success').css('visibility', 'hidden');
        } else {
            $('.password-success').css('visibility', 'visible');
        }
    });
    $('.input.four').change(function(){
        if (this.value === ""){
            $('.password2-success').css('visibility', 'hidden');
        } else {
            $('.password2-success').css('visibility', 'visible');
        }
    });
    $('.input.login-one').change(function(){
        if (this.value === ""){
            $('.email-success').css('visibility', 'hidden');
        } else {
            $('.email-success').css('visibility', 'visible');
        }
    });
    $('.input.login-two').change(function(){
        if (this.value === ""){
            $('.password-success').css('visibility', 'hidden');
        } else {
            $('.password-success').css('visibility', 'visible');
        }
    });
    // Open the profile.php and close it
    $(document).ready(function(){	
        $(document).on('click',function(e){
            if($(e.target).closest('#profile-logo-btn').length) {
                $('.profile').toggleClass('on');
            }
            else {
                $('.profile').removeClass('on');
            }
        });
    });
    // Open the Notifi.php and close it
    $(document).ready(function(){	
        $(document).on('click',function(e){
            if($(e.target).closest('#notifi-logo-btn').length) {
                $('.notifi').toggleClass('on');
            }
            else {
                $('.notifi').removeClass('on');
            }
        });
    });
});