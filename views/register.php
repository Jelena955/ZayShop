<?php ?>




<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Register</h1>
       
    </div>
</div>

<!-- Start Map -->



<!-- Ena Map -->

<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="inputname">Frst Name</label>
                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                    <div class="help-block with-errors Imegr" id="Imegr"></div>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="inputname">Last Name</label>
                    <input type="text" class="form-control mt-1" id="lastname" name="lastname" placeholder="Last Name">
                    <div class="help-block with-errors Prezimegr" id="Prezimegr"></div>
                    
                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="inputemail">Password</label>
                    <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Password">
                    <div class="help-block with-errors Sifragr" id="Sifragr"></div>
                </div>
                
            
                <div class="form-group col-md-6 mb-3">
                <label for="inputsubject">Password again</label>
                <input type="password" class="form-control mt-1" id="passwordagain" name="passwordagain" placeholder="Password">
                <div class="help-block with-errors Sifraopetgr" id="Sifraopetgr"></div>
            </div>
            </div>

            <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputsubject">Email</label>
                <input type="text" class="form-control mt-1" id="email" name="email" placeholder="Email">
                <div class="help-block with-errors Mejlgr" id="Mejlgr"></div>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="inputsubject">Username</label>
                <input type="text" class="form-control mt-1" id="username" name="username" placeholder="Username">
                <div class="help-block with-errors Usernamegr" id="Usernamegr"></div>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-md-6 mb-3">
            <label for="inputsubject">Gender</label>
                   <select id="pol">
                   <option value="Empty">Choose </option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>

                   </select>
                   <div class="help-block with-errors Polgr" id="Polgr"></div>
                </div>

            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" id="dugme" class="btn btn-success btn-lg px-3">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact -->






