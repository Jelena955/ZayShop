$(document).ready(function(){


   
   

   


   $(".pol").on("click", filter) // filtriranje na klik po polu
   $(document).on("click", ".proizvod", showItem) //prikazivanje pojedinacnog proizvoda na klik
   $(".kategorija").on("click", showCategory) //filtriranje po kategoriji
   $("#sortiranje").on("click", sorty) //sortiranje
   $("#pretraga").on("click", pretrazi) //pretraga
   $("#dugme").on("click", registrujse) //dohvatanje podataka za registraciju, regularni i slanje preko ajaxa
   $("#dugmel").on("click", login); //provera podataka iz logina
   $(".brisimeni").on("click", brisimeni); //funkcija za brisanje stavke u meniju preko idja
   $(".updatujmeni").on("click", editujmeni); //editocanje menija preko dohvacene vrednosti
   $(".brisiproizvod").on("click", izbrisiproizvod); //brisanje proizvoda preko prosledjenog idija
   $(".editujproizvod").on("click", editujproizvod); //editovanje proizvoda preko prosledjenog idija
   $("#insertproizvod").on("click", insertujproizvod); //prosledjivanje vrednosti i njihova provera za unete vrednosti
   $("#submitk").on("click", proverakontakt);//prosledjivanje unetog iz kontakta i provera
   $(".poruka").on("click", brisiporuku);//slanje idija poruke koja treba da se brise
   $(document).on("click", ".korpa", dodajukorpu);//prosledjivanje idija proizvoda koj se dodaje u korpu
   $(document).on("click", ".brisiizkorpe", brisiizkorpe);//prosledjivanje idja za brisanje proizvoda iz korpe
   $(document).on("click", ".promenikolicinu", promenikolicinu); //prosledjivanje idija i kolicine za menjanje kolicine
   $(document).on("click", "#kupi", kupi);//prosledjivanje svih podataka za narudzbinu


})
   
 


   function ajaxCallBack(url, method, data, datatype, result ){ //funkcija za ajax

    $.ajax({
        url: url, 
        method: method,
        data: data,
            
        
        dataType: datatype,
        success: result,
           
    
        
        
        error: function(xhr, status, statusText){
         
            
            console.error(xhr.responseText);
            
        }
    
    
    });
    



   }

   function editujmeni(e){

    e.preventDefault();
    var vr= $(this).val();
    var id= this.name;
    console.log(id)
   
   let stranica= document.getElementById("stranica."+vr).value
   let link= document.getElementById("link."+vr).value
  // console.log(stranica);
  // console.log(link);

   ajaxCallBack('models/admins/updatujmeni.php', 'POST', {stranica:stranica, link:link, id:id}, 'json', function (result){
       location.reload();
    console.warn('USPESNO DOHVACENA KATEGORIJA');
   // console.log(id);
   
    
    
 } )


   }




   function brisimeni(e){

    e.preventDefault();

  var id= this.name
  //console.log(id)

 

 
 

 ajaxCallBack('models/admins/brisi.php', 'POST', {id:id}, 'json', function (id){
    location.reload();
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(id);
    
   
    
    
 } )
 


   }


   function izbrisiproizvod(e){

    e.preventDefault();



  let id= $(this).val()
  let idps=$(this).attr('name')

  


 
  console.log(id)

  ajaxCallBack('models/admins/brisisliku.php', 'POST', {id:id, idps:idps}, 'json', function (id){
    location.reload();
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(id);
    
    
   
    
    
 } )

 

 
 

 ajaxCallBack('models/admins/brisiproizvod.php', 'POST', {id:id}, 'json', function (id){
    location.reload();
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(id);

    
   
    
    
 } )


 
 ajaxCallBack('models/admins/brisisliku.php', 'POST', {id:id, idps:idps}, 'json', function (id){
    location.reload();
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(id);
    
    
   
    
    
 } )
 


   }

   function editujproizvod(e){

    e.preventDefault();



    let id= $(this).val()
    let pol=document.getElementById('pol.'+id).value
    let kategorija=document.getElementById('kategorija.'+id).value
    let brend=document.getElementById('brend.'+id).value
    let akcija=document.getElementById('akcija.'+id).value
    let naziv=document.getElementById('naziv.'+id).value
    let opis=document.getElementById('opis.'+id).value
    let cena=document.getElementById('cena.'+id).value
    let ocena=document.getElementById('ocena.'+id).value
    console.log(pol, kategorija, brend, akcija, naziv, opis, cena, ocena)

    ajaxCallBack('models/admins/editujproizvod.php', 'POST', {id:id, pol:pol, kategorija:kategorija, brend:brend, akcija:akcija, naziv:naziv, opis:opis, cena:cena, ocena:ocena}, 'json', function (id){
        location.reload();
        console.warn('USPESNO DOHVACENA KATEGORIJA');
        console.log(id);
        
       
        
        
     } )


    
  
  
   
    //console.log(id)


   }

   function insertujproizvod(e){

    e.preventDefault();



    let id= $(this).val()
    let pol=document.getElementById('pol').value
    let kategorija=document.getElementById('kategorija').value
    let brend=document.getElementById('brend').value
    let akcija=document.getElementById('akcija').value
    let naziv=document.getElementById('naziv').value
    let opis=document.getElementById('opis').value
    let cena=document.getElementById('cena').value
    let ocena=document.getElementById('ocena').value
    let slika=$('#slika')[0].files[0]
   // let slika=$('slika')[0].files[0]
   // console.log(pol, kategorija, brend, akcija, naziv, opis, cena, ocena)


   podaciZaSlanje = new FormData();
   podaciZaSlanje.append("id",id );
   podaciZaSlanje.append("pol", pol);
   podaciZaSlanje.append("slika", slika)
   podaciZaSlanje.append("kategorija", kategorija)
   podaciZaSlanje.append("brend", brend)
   podaciZaSlanje.append("akcija", akcija)
   podaciZaSlanje.append("naziv", naziv)
   podaciZaSlanje.append("opis", opis)
   podaciZaSlanje.append("cena", cena)
   podaciZaSlanje.append("ocena", ocena)


    $.ajax({
        url:'models/admins/insertujproizvod.php', 
        method:'POST',

        data:podaciZaSlanje,
            
        
        contentType: false,
        processData:false,
        success: function (result){
            //location.reload();
            if(result="Succesfuly add Item"){

                alert(result);
                location.reload();

            }
            else{
                
            }
             console.warn('USPESNO DOHVACENA KATEGORIJA');
             console.log(id); },
           
    
        
        
        error: function(xhr, status, statusText){
           // console.error('GRESKA DOHVATANJE KATEGORIJE:');
            
            console.error(xhr.responseText);
            
        }
    
    
    });

   
    
    }

   function filter(e){
    e.preventDefault();

  var pol= this.id
  console.log(pol)
 

 ajaxCallBack('models/proizvodi/filtriraj.php', 'GET', {pol:pol}, 'json', function (pol){
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(pol);
    filtriraj(pol)
    
    
 } )
 


 
 }

 

 function pretrazi(e){
    e.preventDefault();
   

  var pretraga= document.getElementById("pretragatekst").value
  
  
  console.log(pretraga)
 

 ajaxCallBack('models/proizvodi/pretraga.php', 'POST', {pretraga:pretraga}, 'json', function (pretraga){
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(pretraga);
    filtriraj(pretraga)
    
 } )
 


 
 }

 function showCategory(e){
     e.preventDefault();
     let kat=this.id
     ajaxCallBack('models/proizvodi/filtrirajkategorije.php', 'GET', {kat:kat}, 'json', function (kat){
        console.warn('USPESNO DOHVACENA KATEGORIJA');
        console.log(kat);
        filtriraj(kat) })
    
     
}

function sorty(){
   let sort=this.value
   console.log(sort)
   ajaxCallBack('models/proizvodi/sortiranje.php', 'GET', {sort:sort}, 'json', function (sort){
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(sort);
    filtriraj(sort) })
}
 function showItem(e){

    e.preventDefault();

  var id=  $(this).data('id');
  console.log(id)
 

  ajaxCallBack('models/proizvodi/prikazpojedinacno.php', 'GET', {id:id}, 'json', function (proiz){
    console.warn('USPESNO DOHVACENA KATEGORIJA');
    console.log(proiz);
    Item(proiz)
   
 } )}




    //prikazivanje proizvoda koj je isfiltriran/sortiran itd

 function filtriraj(pol){
    let proizvodii=document.getElementById('proizvodi')
 var ispis=""
    for(p of pol){
        console.log(p.glavna);

        if(p.glavna=='Yes'){
 
    
 
     ispis+=`<div class='col-md-4 '>
     <div class='card mb-4 product-wap rounded-0'>
         <div class='card rounded-0'>
             <img class='card-img rounded-0 img-fluid' src='assets/img/mala${p.src}'>
             <div class='card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center'>
                 <ul class='list-unstyled'>
                     
                     <li><a class='btn btn-success text-white mt-2 proizvod'  data-id='${p.idproizvod}'><i class='far fa-eye'></i></a></li>
                     
                 </ul>
             </div>
         </div>
         <div class='card-body'>
             <a href='shop-single.html' class='h3 text-decoration-none'>${p.naziv}</a>
             <ul class='w-100 list-unstyled d-flex justify-content-between mb-0'>
                 
                 <li class='pt-2'>
                     <span class='product-color-dot color-dot-red float-left rounded-circle ml-1'></span>
                     <span class='product-color-dot color-dot-blue float-left rounded-circle ml-1'></span>
                     <span class='product-color-dot color-dot-black float-left rounded-circle ml-1'></span>
                     <span class='product-color-dot color-dot-light float-left rounded-circle ml-1'></span>
                     <span class='product-color-dot color-dot-green float-left rounded-circle ml-1'></span>
                 </li>
             </ul>
             <ul class='list-unstyled d-flex justify-content-center mb-1'>
                 <li>`
                 let m=0
                 for( m=0;m<p.ocena;m++){
                     ispis+=`<i class='text-warning fa fa-star'></i>` 
                 }
                     
             ispis+=`    </li>
             </ul>
             <p class='text-center mb-0'>$${p.cena}</p>
         </div>
     </div>
 </div>

 `}
 console.log($(".proizvod"))
 $(".proizvod").on("click", uradi)
 function uradi(){
   //  alert("dcd")
 }
    

 
 }

     console.log(pol)
     proizvodii.innerHTML=ispis
   // var proiz=document.getElementById("proizvodd")
    proizvodii.innerHTML+=`<section class='bg-light' id='proiz' style='visibility:hidden'>
               
     </section>`

    
     $(".proizvod").on("click", showItem) //prikazivanje pojedinacnog proizvoda na klik
     $(".proizvod").on("click", showSize) //prikazivanje velicina za pojedinacan proizvod
     $(".proizvod").on("click", showImage)
     
 
 }




 

 //prikazivanje pojedinacnog proizvoda

 function Item(proiz){
    var ispis="";
   // for(p of proiz){
//var niz=proiz.ime;}
    //console.log(niz);
    //for(p of podaci){

    console.log(proiz)

        var div=document.getElementById("proiz");
        let ulogovan=document.getElementById("ulogovan").value
        console.log(ulogovan)
       
        ispis=`
        <div id='iks'> <a id='klikiks'><p>X</p></a> </div>
        <div class='container pb-5'>
            <div class='row'>
                <div class='col-lg-5 mt-5'>
                    <div class='card mb-3' id='active'>`
                    

                    for(p of proiz){
                        if(p.glavna=="Yes"){
                            ispis+=`<img class='card-img img-fluid' src='assets/img/${p.src}' alt='Card image cap' id='product-detail'>`
                        }

                    }


                       
                 ispis+=  ` </div>

                  
                    
                   <div class='row'>

                
                        
                        <!--Start Carousel Wrapper-->
                        <div id='multi-item-example' class='col-10 carousel slide carousel-multi-item' data-bs-ride='carousel'>
                            <!--Start Slides-->
                            <div class='carousel-inner product-links-wap   d-flex justify-content-between' role='listbox' id='noactive'>`

                            for(p of proiz){
                                if(p.glavna=="No"){
                                    ispis+=` <div class="col-3">
                                    <a href="#">
                                        <img class="card-img img-fluid" src="assets/img/${p.src}" alt="Product Image 4">
                                    </a>
                                </div>`
                                }
        
                            }

                                
                               
                         ispis+=   ` </div>
                            
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class='col-lg-7 mt-5'>
                    <div class='card'>
                        <div class='card-body'>
                            <h1 class='h2'>${p.naziv}</h1>
                            <p class='h3 py-2'>${p.cena}$</p>
                            <p class='py-2' id='ocena'>
                                
                                
                            </p>
                            <span class='list-inline-item text-dark'>Rating ${p.ocena}</span>
                            <ul class='list-inline'>
                                <li class='list-inline-item'>
                                    <h6>Brand:</h6>
                                </li>
                                <li class='list-inline-item'>
                                    <p class='text-muted'><strong>${p.brend}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>${p.opis}</p>
                            <ul class='list-inline'>
                                <li class='list-inline-item'>
                                  
                            </ul>

                        

                            <form action='' method='GET'>
                                <input type='hidden' name='product-title' value='Activewear'>
                                <div class='row'>`
                                   
                                if(ulogovan==1){
                                    ispis+=`  <div class='col-auto'>
                                       
                                    </div>
                                </div>
                                <div class='row pb-3'>

                               <div class='col d-grid'>
                                    <button type='submit' class='korpa btn btn-success btn-lg ' name='submit' value='${p.idproizvod}'>Add To Cart</button>
                                </div>`
                                }
                                   
                                    
                            ispis+=`     </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    `
   

  

    
   console.log(div)
   div.innerHTML=ispis;
   
   //prikazivanje prozora sa pojedinacnim proizvodom
document.getElementById("proiz").style.visibility="visible";
document.getElementById("klikiks").addEventListener("click", ugasi)

  

    
}

  
//sklanjanje prozora za pojedinacni proizvod kada se klikne na iks

function ugasi(){
    document.getElementById("proiz").style.visibility="hidden";
}









function registrujse(e){
    e.preventDefault();
    
    
    var greske=[];
        let ime, prezime, username, mejl, password, password2;
        ime=document.getElementById("name").value;
        prezime=document.getElementById("lastname").value;
        username=document.getElementById("username").value;
        password=document.getElementById("password").value;
        password2=document.getElementById("passwordagain").value;
        dugme=document.getElementById("dugme").value;
        mejl=document.getElementById("email").value
        pol=document.getElementById("pol").value


        let imegr, prezimegr, usernamegr, passwordgr, password2gr, mejlgr, bmigr;
        imegr=document.getElementById("Imegr");
        prezimegr=document.getElementById("Prezimegr");
      
        usernamegr=document.getElementById("Usernamegr");
        mejlgr=document.getElementById("Mejlgr");
        passwordgr=document.getElementById("Sifragr");
        password2gr=document.getElementById("Sifraopetgr");
       
    
        //console.log(imegr, prezimegr,vrsedenjagr, brosobagr, mejlgr);
    
        let reIme, rePrezime, reUsername, rePassword, reBmi, reMejl
    
        reIme = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
        rePrezime = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/; 
        reUsername = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/
        rePassword=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
        reMejl=/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/;

        console.log(pol)
        
       
    
       
        
    
    
    
        if(ime == ""){
            
            imegr.innerHTML = "Field name is empty."
            document.getElementById("name").style.borderColor="red"
             greske.push("ime nije ok");
        }
        else{
            if(!reIme.test(ime)){
              
                imegr.innerHTML = "Name is not in good format (etc Ana or Ana Marija)";
                document.getElementById("name").style.borderColor="red"
              greske.push("ime nije ok");
                
            }else{
                imegr.innerHTML = "";
                document.getElementById("name").style.borderColor="black"
               
                
            }
        }
    
        if(prezime == ""){
            
            prezimegr.innerHTML = "Field Last Name is empty."
            document.getElementById("lastname").style.borderColor="red"
            greske.push("e-mail nije ok");
        }
        else{
            if(!rePrezime.test(prezime)){
                
                prezimegr.innerHTML = "Last Name is not in good format (etc Peric or Peric Jovanovic)";
                document.getElementById("lastname").style.borderColor="red"
                greske.push("prezime nije ok");
            }else{
                prezimegr.innerHTML = "";
                document.getElementById("lastname").style.borderColor="black"
    
                
                
            }
        }
        if(mejl == ""){
            
            mejlgr.innerHTML = "Field Email is empty."
            document.getElementById("email").style.borderColor="red"
            greske.push("e-mail nije ok");
        }
        else{
            if(!reMejl.test(mejl)){
                
                mejlgr.innerHTML = "Email is not in good format (etc pera@gmail.com)";
                document.getElementById("email").style.borderColor="red"
                greske.push("e-mail nije ok");
            }else{
                mejlgr.innerHTML = "";
                document.getElementById("email").style.borderColor="black"
    
                
                
            }
        }

        if(username == ""){
            
            usernamegr.innerHTML = "Field Username is empty"
            document.getElementById("username").style.borderColor="red"
            greske.push("username nije ok");

        }
        else{
            if(!reUsername.test(username)){
                
                usernamegr.innerHTML = "Username is not in good format";
                document.getElementById("username").style.borderColor="red"
                
                greske.push("username nije ok");
            }else{
                usernamegr.innerHTML = "";
                document.getElementById("username").style.borderColor="black"
    
                
                
            }
        }
        if(password == ""){
            
            passwordgr.innerHTML = "Field Password is empty."
            document.getElementById("password").style.borderColor="red"
            greske.push("username nije ok");
        }
        else{
            if(!rePassword.test(password)){
                
                passwordgr.innerHTML = "Password is not in good format (must include at list one letter, number and simbol)";
                document.getElementById("password").style.borderColor="red"
                greske.push("Password nije ok");
            }else{
               passwordgr.innerHTML = "";
               document.getElementById("password").style.borderColor="black"
    
                
                
            }
        }
        if(password2 == ""){
            
            password2gr.innerHTML = "Field Password again is empty."
            document.getElementById("passwordagain").style.borderColor="red"
            greske.push("password nije ok");
        }
        else{
            if(password2!=password){
                
                password2gr.innerHTML = "Password again must be the same as password";
                document.getElementById("passwordagain").style.borderColor="red"
                greske.push(" password2 nije ok");
            }else{
                password2gr.innerHTML = "";
                document.getElementById("passwordagain").style.borderColor="black"
    
                
                
            }

            
        }
       if(pol=="Empty"){
           Polgr.innerHTML="You must choose a gender"
           document.getElementById("pol").style.borderColor="red"
           greske.push("pol nije ok");

       }
       else{
        Polgr.innerHTML = "";
        document.getElementById("pol").style.borderColor="black"

       }


        if (greske.length==0){


  

    ajaxCallBack('models/accaunts/uspesnaregistracija.php', 'POST', {dugme:dugme, ime:ime, prezime:prezime, username:username, password:password, password2:password2, mejl:mejl, pol:pol}, 'json', function (result){
      console.warn('USPESNO DOHVACENA KATEGORIJA');
      if(result=="You have not register"){

              

        passwordgr.innerHTML=result;}

        else{

           alert("You are register succesfuly");
           window.location.href="index.php?pages=login.php"
          

        }

        
         
           
          // console.log(velicina);
           }) }
     

      
  }

  function login(e){
      e.preventDefault()

    let username, password, dugme
    var greske=[];

    username=document.getElementById("username").value;
        password=document.getElementById("password").value;
        dugme=document.getElementById("dugmel").value;

        let reUsername, rePassword

        reUsername = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/
        rePassword=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/

        let usernamegr, passwordgr

        usernamegr=document.getElementById("Usernamegr");
        passwordgr=document.getElementById("Passwordgr");


        if(username == ""){
            
            usernamegr.innerHTML = "Field Username is empty"
            document.getElementById("username").style.borderColor="red"
            greske.push("username nije ok");

        }
        else{
            if(!reUsername.test(username)){
                
                usernamegr.innerHTML = "Username is not in good format";
                document.getElementById("username").style.borderColor="red"
                
                greske.push("username nije ok");
            }else{
                usernamegr.innerHTML = "";
                document.getElementById("username").style.borderColor="black"
    
                
                
            }
        }
        if(password == ""){
            
            passwordgr.innerHTML = "Field Password is empty."
            document.getElementById("password").style.borderColor="red"
            greske.push("username nije ok");
        }
        else{
            if(!rePassword.test(password)){
                
                passwordgr.innerHTML = "Password is not in good format (must include at list one letter, number and simbol)";
                document.getElementById("password").style.borderColor="red"
                greske.push("Password nije ok");
            }else{
               passwordgr.innerHTML = "";
               document.getElementById("password").style.borderColor="black"
    
                
                
            }
        }

        if (greske.length==0){


  

            ajaxCallBack('models/accaunts/uspesanlogin.php', 'POST', {dugme:dugme, password:password, username:username}, 'json', function (result){
                console.warn('USPESNO DOHVACENA KATEGORIJA');

              console.log(result);
              if(result=="Invalid password or username"){

              

             passwordgr.innerHTML=result;}

             else{

                alert("Uspesno ste se ulogovali")
                window.location.href="index.php"
               

             }

             
              
                
               // console.log(velicina);
                }) }
        
              
          }


          function proverakontakt(e){
            e.preventDefault()
    
            let greske=[];
    let ime, mejl, poruka, dugme
    
        ime=document.getElementById("ime").value;
            mejl=mejl=document.getElementById("mejl").value;
            poruka=document.getElementById("poruka").value;
            dugme=document.getElementById("submitk").value;
    
    
            let imegr, mejlgr, porukagr
    
           imegr=document.getElementById("Imegr");
            mejlgr=document.getElementById("Mejlgr");
                porukagr=document.getElementById("Porukagr");
    
            let reIme, reMejl, rePoruka
    
            reIme = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
            reMejl=/^[a-z][a-z\d\_\.\-]+\@[a-z\d]+(\.[a-z]{2,4})+$/;
            rePoruka=/^[A-Za-z0-9.,\s]{5,1000}$/; 
    
            if(ime == ""){
                
                imegr.innerHTML = "Name is empty."
                 greske.push("ime nije ok");
            }
            else{
                if(!reIme.test(ime)){
                  
                    imegr.innerHTML = "Name is not in right format (etc Nikola ili Nikola Jovanovic)";
                  greske.push("ime nije ok");
                    
                }else{
                    imegr.innerHTML = "";
                   
                    
                }
            }
    
    
            if(mejl == ""){
                
                mejlgr.innerHTML = "Email is empty."
                greske.push("e-mail nije ok");
            }
            else{
                if(!reMejl.test(mejl)){
                    
                    mejlgr.innerHTML = "Email is not in right format (npr pera@gmail.com)";
                    greske.push("e-mail nije ok");
                }else{
                    mejlgr.innerHTML = "";
        
                    
                    
                }
            }
    
            if(poruka == ""){
                
                porukagr.innerHTML = " Message is empty."
                greske.push("e-mail nije ok");
            }
            else{
                if(!rePoruka.test(poruka)){
                    
                    porukagr.innerHTML = "Message is not in right format (You have to start with Uppercase simbol)";
                    greske.push("message nije ok");
                }else{
                    porukagr.innerHTML = "";
        
                    
                    
                }
            }
    
    
            if (greske.length==0){
    
                ajaxCallBack('models/accaunts/uspesnaporuka.php', 'POST', {ime:ime, mejl:mejl, dugme:dugme, poruka:poruka}, 'json', function (result){
                    location.reload();
                 console.warn('USPESNO DOHVACENA KATEGORIJA');
                console.log(result);
                if(result=="Message not sent"){

              

                    porukagr.innerHTML=result;}
       
                    else{
       
                       alert("Message sent");

                     location.reload();
                      
       
                    }
       
                
                 
                 
              } )
                       // let odgovor=JSON.parse(message.responseText)
    
                        //console.log(errorMsg)
                       // console.log(JSON.parse(message))
                        //alert(odgovor.message)
                        //$("#Usernamegr").html(odgovor);
                    }
                
    
    
    
                
            
    
            else {
    
                return false
            }
    
        }

        function brisiporuku(e){
            e.preventDefault()
            let id=$(this).val()
            console.log(id)

            ajaxCallBack('models/admins/brisiporuku.php', 'POST', {id:id}, 'json', function (result){
                location.reload();
             console.warn('USPESNO DOHVACENA KATEGORIJA');
            console.log(result);})
        }



        function dodajukorpu(e){
            e.preventDefault();
           
        
          var idproizvod= $(this).val()
          console.log(idproizvod)
         
        
         ajaxCallBack('models/proizvodi/dodajukorpu.php', 'POST', {idproizvod:idproizvod}, 'json', function (result){
             alert(result)
            console.warn('USPESNO DOHVACENA KATEGORIJA');
          
           
            
            
         } )
         
        
        
         
         }

         function brisiporuku(e){
            e.preventDefault()
            let id=$(this).val()
            console.log(id)

            ajaxCallBack('models/admins/brisiporuku.php', 'POST', {id:id}, 'json', function (result){
                location.reload();
             console.warn('USPESNO DOHVACENA KATEGORIJA');
            console.log(result);})
        }



        function brisiizkorpe(e){
            e.preventDefault();
           
        
          let idproizvod= $(this).val()
          console.log(idproizvod)
          let idnarudzbina=document.getElementById("skriveno."+idproizvod).value
          console.log(idnarudzbina)
         
        
        ajaxCallBack('models/proizvodi/brisiizkorpe.php', 'POST', {idnarudzbina:idnarudzbina}, 'json', function (id){
            location.reload();
            console.warn('USPESNO DOHVACENA KATEGORIJA');
            console.log(id);
           
            
            
         } )
        }

        function promenikolicinu(e){
            e.preventDefault();
           
        
          let idnarudzbina= $(this).val()
         
          let kolicina=document.getElementById("kolicina."+idnarudzbina).value
          console.log(idnarudzbina)
          let idproizvod=document.getElementById("proizvod."+idnarudzbina).value
          let idkorpa=document.getElementById("korpa."+idnarudzbina).value
          let poslato=document.getElementById("poslato."+idnarudzbina).value
         
        
        ajaxCallBack('models/proizvodi/promenikolicinu.php', 'POST', {idnarudzbina:idnarudzbina, kolicina:kolicina, idproizvod:idproizvod, idkorpa:idkorpa, poslato:poslato}, 'json', function (result){

            location.reload();
            console.warn('USPESNO DOHVACENA KATEGORIJA');
            console.log(id);
           
            
            
         } )
        }

        
        function kupi(e){
            e.preventDefault();
           
        
          let idkorpa= $(this).val()
         
        
        
        
        ajaxCallBack('models/proizvodi/zakljuciporudzbinu.php', 'POST', { idkorpa:idkorpa}, 'json', function (result){
            alert(result);
            location.reload();
            console.warn('USPESNO DOHVACENA KATEGORIJA');
           
            
           
            
            
         } )
        }


            


  










  
