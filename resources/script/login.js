/**
 * Created by Grinalda Soares 01/05/2017.
 */

$("#log").click(function () {

    // if(validation1($('#email, #pass'))){

        $.ajax({
            url:"../php/controler/login.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data:{intent : "Login", email: $("#email").val(), pass: $("#pass").val()},
            success: function (e) {
                if (e.result)
                    window.location.href = "noticia.html";

            }
        });
    // }
});
//email: $('#email').val(), pass: $('#pass').val()