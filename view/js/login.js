$('#frmLogin').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url : '../controller/ajax/login.ajax.php',
        data : {'email': $('input[name="email"]').val(), 'password': $('input[name="password"]').val()},
        type : 'POST',
        dataType : 'json',
        success : function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if(result.result){
                window.location.replace(result.redirect);
            }else{
                $('.error').html(result.message);
                $('.error').show();
                setTimeout(function (){
                  $( ".error" ).fadeOut( "slow", function() {
                  });
                }, 3000)
            }
        },
        error : function(xhr, status) {
            console.log('error');
        },
        complete : function(xhr, status) {
            console.log('complete');
        }
    });
});
