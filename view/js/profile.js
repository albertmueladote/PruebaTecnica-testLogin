$('#logout').click(function(e) {
    $.ajax({
        url : '../controller/ajax/logout.ajax.php',
        data : {},
        type : 'POST',
        dataType : 'json',
        success : function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if(result.result){
                window.location.replace(result.redirect);
            }else{
                $('.error').html(result.message);
            }
        },
        error : function(xhr, status) {
            
        },
        complete : function(xhr, status) {
            
        }
    });
});
