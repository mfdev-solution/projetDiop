<?php 
      session_start();
      if(!$_SESSION['user'])
        header('Location:login.php');
      require_once "/var/www/html/projetDiop/view/head.php";
      require_once "/var/www/html/projetDiop/model/dao/CategorieDao.php";
      $categorieDao = new CategorieDao();
      $categories = $categorieDao->getCategorie();
?>


<body>
 <main class="container">
    <div class=" blogs content">
            
        <nav  class="p-2 m-2 border border-primary rounded ">
            <div class="row justify-content-between">
                <form class="col-md-2" >
                    <button  type="button" data-bs-toggle="modal"data-bs-target="#add" class="btn btn-outline-primary" name="add">
                        Nouvelle categorie
                    </button>
                </form>
                <form action="../index.php" method="post" class="col-md-2 d-flex flex-row-reverse">
                        <button type="submit" name="admin"  class="btn btn-outline-primary  ">
                            Accueil
                        </button>
                </form>
            </div>
    
        </nav>
        <!--Add categorie -->
        <div class="modal" id="add">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter Categorie</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <form action="../index.php" method="post">
                        <div class="modal-body">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="categName">Nom categorie</label>
                                <input type="text" id="categName" name="categName"class="form-control" />
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="addCateg">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end add categorie -->

        <!--Edit categorie -->
        <div class="modal" id="edit">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Editer Categorie</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="categName">Nom categorie</label>
                            <input type="text" id="categName" name="categName"class="form-control" />
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <form action="../index.php" method="post">
                            <button type="submit" class="btn btn-success" name="editCateg">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end edit categorie -->
        <div class="card"  >
            <div class="card-header">Liste des catégories</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th><th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie){?>
                        <tr>
                            <td><?=$categorie->id ?></td>
                            <td><?=$categorie->nom ?></td>
                            <td>
                                <a href="../index.php?action=editcat&id=<?=$categorie->id?>" style="border-left: 0px ">
                                    <span class=" align-self-center">
                                        <img src="../assets/imgs/edit.png" alt="">
                                    </span>
                                </a>
                            </td>
                            <td>
                                <a href="../index.php?action=deletecat&id=<?=$categorie->id?>" style="border-left:0px"
                                    onclick="return confirm('Are you sure you want to delete this categorie?')">
                                    <span class=" align-self-center">
                                        <img src="../assets/imgs/delete.png" alt="">
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
 </main>
</body>