 <!-- Main content -->
 <section class="content">

     <?php

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>

     <div class="card shadow col-md-4 mx-auto" style="margin-top: 150px;">
         <div class="card-body">
             <h5 class="text-center text-dark">Connexion</h5>
             <hr>
             <form action="index.php?controller=home&task=login" method="post">
                 <div class="form-group mb-3">
                     <label for="userName">Nom d'utilisateur</label>
                     <input type="text" name="userName" id="userName" class="form-control"
                         placeholder="Ex : admin OU admin@gmail.com ">
                 </div>
                 <div class="form-group mb-3">
                     <label for="motdepasse">Mot de passe</label>
                     <input type="password" name="motdepasse" id="motdepasse" class="form-control"
                         placeholder="Ex : Admin01234">
                 </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-outline-info btn-block">
                         <i class="fa fa-sign-in"></i> Se connecter
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- /.content -->