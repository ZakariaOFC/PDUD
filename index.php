<?php session_start();
    $usernameAccount = "root";
    $passwordAccount = "";

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=pdud_aumetz', $usernameAccount, $passwordAccount);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>PDUD - Aumetz</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-main.css">

        <link rel="stylesheet" href="fullcalendar/core/main.css">
        <link rel="stylesheet" href="fullcalendar/daygrid/main.css">
        <link rel="stylesheet" href="fullcalendar/timegrid/main.css">

        <link rel="stylesheet" href="datetimepicker/jquery.datetimepicker.min.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2@2.0.0/dist/spectrum.min.css">

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    </head>

    <body>
        <?php
        
            if(isset($_GET['page'])){
                $page=$_GET['page'];
            }
        
            else {
                $page = 1;
            }
        
            // PAGE D'ACCUEIL
            if($page==1){
                include('include/header.php');
                include('include/carousel.php');
                include('include/body.php');
                include('include/footer.php');
            }
            if($page=="connexion"){
                include('include/header.php');
                include('container/connexion.php');
                include('include/footer.php');
            }
            if($page=="deconnexion"){
                include('include/header.php');
                include('container/deconnexion.php');
                include('include/footer.php');
            }
            if($page=="inscription"){
                include('include/header.php');
                include('container/inscription.php');
                include('include/footer.php');
            }
            if($page=="administration"){
                include('include/header.php');
                include('container/administration.php');
                include('include/footer.php');
            }
            if($page=="blog"){
                include('include/header.php');
                include('container/blog.php');
                include('include/footer.php');
            }
            if($page=="agenda"){
                include('include/header.php');
                include('container/agenda.php');
                include('include/footer.php');
            }
        ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.visible.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/sizeDownHeader.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="datetimepicker/jquery.datetimepicker.full.min.js"></script>

    <script src="fullcalendar/core/main.js"></script>
    <script src="fullcalendar/daygrid/main.js"></script>
    <script src="fullcalendar/timegrid/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2@2.0.0/dist/spectrum.min.js"></script>
    
    <script>
        $(window).scroll(function(){
            $(".sr-animation").each(function(){
                    if($(window).width()>700){
                        var e=$(this).visible(true);
                        var t=$(this).attr("data-delay");
                        if(!t){t=0}
                        if($(this).hasClass("animated")){}
                        else if(e){
                            $(this).delay(t).queue(function(){
                                $(this).addClass("animated")
                            })
                        }
                    }
                    else{
                        $(this).addClass("animated")
                    }
                });
        })

        $(document).ready(function(){
            $(".nav a, .primary-button a, backtotop a").on('click', function(event) {
                    console.log(event);
                if (this.hash !== "") {
                    console.log(this.hash);
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    window.location.hash = hash;
                });
                }
            });
        });
    </script>

    <script>
        $('#color-picker').spectrum({
            type: "text",
            showPalette: "false",
            showPaletteOnly: "true",
            showInput: "true",
            showInitial: "true",
            showAlpha: "false",
            allowEmpty: "false"
        });
    </script>
    
    </body>
</html>