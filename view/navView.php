<?php function nav($array)
{ ?>

   <body>
      <div class="container">
         <div class=" py-3">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 justify-content-left">
                     <span class="d-flex text-uppercase entete "> mfdev-news</span>
                  </div>
                  <div class="col-md-6 d-flex flex-row-reverse ">
                     <?php if(!@$_SESSION['user']){ ?>
                        <span class=" text-uppercase entete ">client</span>
                     <?php }else{ ?>
                        <span class="text-uppercase entete "><?=$_SESSION['user']->role?></span>
                     <?php } ?>
                  </div>
               </div>

            </div>
         </div>

         <nav id="navbar_top"style="margin-bottom: 0px" class=" navbar  navbar-expand-lg navbar-dark bg-primary flex-grow" >
            <div class="container ">
               <a class="navbar-brand justify-content-left" href="index.php">Actualite</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse " id="main_nav">
                  <ul class="navbar-nav ms-auto ">
                     <li class="nav-item"><a class="nav-link text-white" href="index.php">Accueil </a></li>
                     <?php foreach ($array as $values){ ?>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?categorie=<?=$values->nom?>"><?=$values->getNom()?></a></li>
                     <?php } ?>
                     <?php if(!@$_SESSION['valid']){ ?>
                        <li class="nav-item"><a class="nav-link text-white" href="./view/login.php"><span class="material-icons">login</span></a></li>
                     <?php }else{ ?>
                        <li class="nav-item"><a class="nav-link text-white" href="./view/Logout.php" alt="Logout"><span class="material-icons">logout</span></a></li>
                     <?php } ?>
                  </ul>
               </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
         </nav>
         <main class="main">
         <?php } ?>