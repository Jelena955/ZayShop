<?php 

if(isset($_SESSION['ime'])){ 

	$imese=$_SESSION['ime'];
	$mailse=$_SESSION['mejl'];}
    //var_dump($imese);}
    else{
        $imese="Name";
        $mailse="Mail";
    }

?>

<?php  if(isset($_SESSION['korisnik'])){

echo("<!-- Start Content Page -->
<div class='container-fluid bg-light py-5'>
    <div class='col-md-6 m-auto text-center'>
        <h1 class='h1'>Contact Us</h1>
        
    </div>
</div>

<!-- Start Map -->



<!-- Ena Map -->

<!-- Start Contact -->
<div class='container py-5'>
    <div class='row py-5'>
        <form class='col-md-9 m-auto' method='post' role='form'>
            <div class='row'>
                <div class='form-group col-md-6 mb-3'>
                    <label for='inputname'>Name</label>
                    <input type='text' class='form-control mt-1' id='ime' name='name' value='$imese'>
                    <div class='help-block with-errors' id='Imegr'></div>
                </div>
                <div class='form-group col-md-6 mb-3'>
                    <label for='inputemail'>Email</label>
                    <input type='email' class='form-control mt-1' id='mejl' name='email' value='$mailse'>
                    <div class='help-block with-errors' id='Mejlgr'></div>
                </div>
            </div>
    
                <label for='inputmessage'>Message</label>
                <textarea class='form-control mt-1' id='poruka' name='poruka' placeholder='Message' rows='8'></textarea>
               <div class='help-block with-errors' id='Porukagr'></div>
            </div>
            <div class='row'>
                <div class='col text-end mt-2'>
                    <button type='submit' id='submitk' class='btn btn-success btn-lg px-3'>Let’s Talk</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact -->"); }

else{
    echo("<div class='container py-5'>
    <div class='row py-5'>
    <h1>You must be loged to send a message</h1>
    </div>
    </div>");
}
   

    
?>

    