<?php function showArticles($arrayOfArticle ,$page ,$nbPages)
{ ?>
    <div class="blogs content">
        <?php if(@$_SESSION['user']->role=='admin' || @$_SESSION['user']->role=='editeur') { ?>
            <nav  class="p-2 m-2 border border-primary rounded">
                <form action="index.php" method="post">
                    <button  class="btn btn-outline-primary" type="submit" name="add">
                        Nouvel article
                    </button>
                </form>
                <form action="./view/editeur.php" method="post">
                    <button type="submit" name="admin"  class="btn btn-outline-primary d-flex flex-row-reverse ">
                        Gestion Categorie
                    </button>
                </form>
                <?php if( @$_SESSION['user']->role=='admin'){?>
                    <form action="./view/admin.php" method="post">
                        <button type="submit" name="admin"  class="btn btn-outline-primary d-flex flex-row-reverse ">
                            Gestion utilisateurs
                        </button>
                    </form>
                <?php } ?>

            </nav>
        <?php }?>
        <?php if ($arrayOfArticle) { ?>

            
                <?php foreach ($arrayOfArticle as $article) { ?>
                    <div class="row " >
                        <div class="col-md-10 justify-content-left">
                            <a class="single nav-link " href="index.php?categorie=<?= $article->nom ?>&id=<?= $article->id ?>">
                                <h3 class="title"><?= $article->titre ?></h3>
                            </a>
                        </div>
                        <?php if(@$_SESSION['user']->role == 'admin'||@$_SESSION['user']->role == 'editeur'){?>
                            <div class="col-md-1 h-auto d-flex flex-row-reverse ">
                                <a href="index.php?action=edit&id=<?=$article->id?>" style="border-left: 0px ">
                                    <span class=" align-self-center">
                                        <img src="./assets/imgs/edit.png" alt="">
                                    </span>
                                </a>
                            </div>
                            <div class="col-md-1 h-auto d-flex flex-row-reverse ">
                                    <a href="index.php?action=delete&id=<?=$article->id?>"style="border-left: 0px " onclick="return confirm('Are you sure you want to delete this article?')">
                                        <span class=" align-self-center">
                                            <img src="./assets/imgs/delete.png" alt="" />
                                        </span>
                                    </a>
                            </div>
                        <?php } ?>
                    </div>
                    
                <?php } ?>
                <div class="row justify-content-between mb-15">
                    <div class="col-2">
                        <a style="border-left: 0px;margin-left:0px;padding-left:0px;display:<?=$page<=0?'none':'block'?>;text-decoration: none"
                         href="index.php?page=<?=$page-1?>">
                         <!-- <i class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:#0d6ef'></i> -->
                         <i class='far fa-hand-point-left' style='font-size:40px;color:#0d6ef'></i>
                        </a>
                    </div>
                    <div class="col-2 d-flex flex-row-reverse" >
                        <a style="border-left: 0px;display:<?=$page>=$nbPages?'none':'block'?>;text-decoration: none;" 
                        href="index.php?page=<?=$page+1?>" >
                        <i class='far fa-hand-point-right' style='font-size:40px;color:#0d6ef'></i>
                         <!-- <i class='fas fa-arrow-alt-circle-right' style='font-size:48px;color:#0d6ef'></i> -->
                        </a>
                    </div>
                </div>
        <?php } else { ?>
            <div class="empty">
                <h2>Aucun article n'a ete publie</h2>
            </div>
        <?php } ?>
    </div>
<?php } ?>
<!-- -->
<?php function showArticleById($artObject)
{ ?>
    <div class="details content">
        <?php if (!$artObject) { ?>
            <div class="empty">
                <h2>aucun article </h2>
            </div>
        <?php } else { ?>
            <?php foreach ($artObject as $article) { ?>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h2><?= $article->titre ?></h2>
                        <div class="content">
                            <p><?= $article->contenu ?></p>
                        </div>
                    </div>
                    
                    
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>
<!-- -->
<?php function editForm($articles) { ?>
    <div class="content">
        <form  method="post" action="index.php">
            <?php foreach ($articles as $article){?>
                
                
                    <input type="hidden"   name="id" value="<?= $article->id?>">
                <div class="mb-3">
                    <label for="Titre" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="titre"name="titre" value="<?=$article->titre ?>">
                </div>
                <div class="mb-3">
                    <label for="Titre" class="form-label">Id categorie</label>
                    <input type="text" class="form-control" id="idCateg"name="idCateg" value="<?=$article->id_cat ?>">
                </div>
                <div class="mb-3">
                    <label class="visually-hidden" for="categorie">Categorie</label>
                    <select class="form-select" name="categorie" id="categorie">
                        <option value="sport" selected >sport</option>
                        <option value="sante">sante</option>
                        <option value="tech">tech</option>
                        <option value="politique">politique</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="contenu" class="form-label">Contenu</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="3"><?= $article->contenu?></textarea>
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary " name="update" >Update</button>
                </div>
            <?php } ?>
        </form>

    </div>
<?php }?>
<!-- -->
<?php function addForm() { ?>
    <div class="content">
        <form  method="post" action="index.php">
                
            <div class="mb-3">
                <label for="Titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" >
            </div>
            <div class="mb-3">
                <label class="visually-hidden" for="categorie">Categorie</label>
                <select class="form-select" name="categorie" id="categorie">
                    <option value="sport" selected >sport</option>
                    <option value="sante">sante</option>
                    <option value="tech">tech</option>
                    <option value="politique">politique</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3"></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary " name="save" >Save</button>
            </div>
        </form>

    </div>
<?php }?>

<?php function updateUser($user) { ?>
    <div class="modal" id="addUser">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Ajout utilisateur</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="../index.php" method="post">
                        <div class="mb-3 mt-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" class="form-control" id="nom" placeholder="Enter your name nom" name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom:</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Enter your second name" name="prenom">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="login" class="form-label">Login:</label>
                            <input type="text" class="form-control" id="login" placeholder="Enter login" name="login">
                        </div>
                        <div class="mb-3">
                            <label for="passwd" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="passwd" placeholder="Enter password" name="passwd">
                        </div>
                        <div class="mb-3">
                            <label class="visually-hidden" for="role">Role</label>
                            <select class="form-select" name="role" id="role">
                                <option value="admin" selected >Admin</option>
                                <option value="editeur" >Editeur</option>
                            </select>
                        </div>
                        <div class="mb-3 justify-content-between">
                            <button type="submit" class="btn btn-primary justify-content-reverse" name="adduser">Ajouter</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>   
<?php }?>