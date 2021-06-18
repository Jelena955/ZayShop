<?php

//Skidanje word dokumenta sa podacima autora
    if(isset($_GET['id'])){

        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment; filename=authorInfo.doc");
        
        
        $fakultet="Visoka ICT Skola - IT - Web Programiranje";
        $ime="Jelena Naumovski 262/18";
       
       echo("<html>");
       echo("<meta http-equiv=\"ContentType\" content=\"text/html; charset=Windows-1252\">");
       echo("body");
       echo("<h4> Student:$ime</h4>");
       echo("<h4> Skola:$fakultet</h4>");
       echo("</body>");

       
    }
    else{
        header("location: ../404Page.php?notFound");
        $code=404;
        $msg="Page not found.";
    }
?>