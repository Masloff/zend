$(document).ready(function () {

    $("#submit").click(function(){

        var login = $("#email").val();
        var password = $("#password").val();

        if(login && password){
            $("#logForm").submit();
        }

        else {
            if(!login){

                $("#email").val("No e-mail");
                $("#email").css("color","red");

            }
            if(!password){

                $("#password").val("No password");
                $("#password").css("color","green");
            }
            return false;
        }
    });

    $("#submitButton").click(function(){

        var login = $("#email").val();
        var password = $("#password").val();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();

        if(login && password && first_name && last_name){
            $("#regForm").submit();
        }

        else {
            if(!login){

                $("#email").val("No e-mail");
                $("#email").css("color","red");
            }
            if(!password){

                $("#password").val("No password");
                $("#password").css("color","green");
            }
            if(!first_name){

                $("#first_name").val("Введи ім'я, УЙОБОК!");
                $("#first_name").css("color","red");
            }
            if(!last_name){

                $("#last_name").val("Введи прізвище, тварь!");
                $("#last_name").css("color", "red");
            }
            return false;
        }

    });

    $("#submitComment").click(function(){

        var comment = $("#comment").val();

        if(comment){
            $("#comForm").submit();
        }
        else {
            if(!comment){

                $("#comment").val("Коментар напиши, ГАВНО!");
                $("#comment").css("color","red");

            }
            return false;
        }

    });

    $("#submitArticle").click(function(){

        var name = $("#name").val();
        var short_text = $("#short_text").val();
        var full_text = $("#full_text").val();

        if(name && short_text && full_text){
            $("#artForm").submit();
        }

        else {
            if(!name){

                $("#name").val("Ім'я статті напиши, бля!");
                $("#name").css("color","red");
            }
            if(!short_text){

                $("#short_text").val("А це для кого??");
                $("#short_text").css("color","green");
            }
            if(!full_text){

                $("#full_text").val("Ахуєть, стаття без тексту...");
                $("#full_text").css("color","red");
            }

            return false;
        }
    })

});





