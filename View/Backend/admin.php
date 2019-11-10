<?php 

$title = "Administration";
$metaDescription = "Depuis cette page vous pourrez administer votre site";
$ogUrl = "https://jeanforterocheleblog.com/index.php?action=admin";
$ogTitle = "Administration";
$ogDescription = "Depuis cette page vous pourrez administer votre site";

ob_start();

?>

<header id="header_admin">
    <div class="container">
        <div class="text-center">
            <h2>Bienvenue sur la page d'administration de votre site</h2>
            <p>Depuis cette page vous pouvez modifiez vos articles, les supprimer, voir vos articles, supprimer et accepter un commentaire</p>
        </div>
    </div>
</header>

<section id="section_admin">
    <div class="container">
        <h2 id="admin-title-article" class="mb-4 mr-4 d-inline-block">Vos articles</h2><a href="index.php?action=newArticle" class="d-inline-block btn btn-secondary mb-2" role="button">Ajouter</a>
        <div class="table-responsive">
            <table id="table-blogspots" class="table table-striped table-admin">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Voir</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // on affiche chaque entrée une à une dans une boucle, avec htmlspecialchars pour les données publiées
                    foreach ($articles as $article) {
                        ?>
                        <!-- on ferme PHP car ce qui suit est long (pour rappel, on est dans le tbody) -->
                        <tr>
                            <th scope="row"><?= $article->getTitle() ?></th>
                            <td>
                                <a href="index.php?action=viewarticle&id=<?= $article->getId() ?>" title="Voir l'article" class="btn btn-secondary"><span class="far fa-eye" role="button"></span></a>
                            </td>
                            <td>
                                <a href="index.php?action=updateArticle&id=<?= $article->getId() ?>" title="Modifier l'article" class="btn btn-info mb-2" role="button"><span class="fas fa-pen"></span></a> 

                                <button type="button" title="Supprimer l'article" class="btn btn-danger mb-2" data-toggle="modal" data-target="#article<?= $article->getId() ?>"><span class="fas fa-trash-alt"></span></button>
                            </td>
                            <td>
                            	<p>Publié le <?= date_format(date_create($article->getCreation_date()), 'd/m/Y'); ?></p> 
                        </tr>
                        <!-- Modal du bouton supprimer -->
                        <div class="modal fade" id="article<?= $article->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_un_article" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="supprimer_un_article">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDeleteArticle">Êtes-vous certain(e) de supprimer cet article ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <a href="index.php?action=admin&article=<?= $article->getId() ?>&event=delete" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php // on réouvre PHP avant de finir la boucle
                }
                ?>
                </tbody>
            </table>
        </div>

        <h2 id="admin-title-comment" class="mb-4">Vos commentaires</h2>
        <div class="table-responsive">
            <table id="table-comments" class="table table-striped table-admin">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Date</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col">Voir</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    // on affiche chaque entrée dans une boucle, avec du htmlspecialchars sur les données publiées
                    foreach ($comments as $comment) { ?>
                        <!-- on ferme PHP pour la clarté du code -->
                        <tr <?php if ($comment->getReport() > 0 ){ ?> class="bg-danger" <?php } ?>>
                            <th scope="row"><?= $comment->getPseudo(); ?></th>

                            <td>Publié le <?= date_format(date_create($comment->getComment_date()), 'd/m/Y à H:i:s'); ?></td>

                            <td><?= substr($comment->getComment(), 0, 50); ?><span class="text-muted">[...]</span></td>


                            <td>
                            	<a href="index.php?action=viewarticle&id=<?= $comment->getArticle_id(); ?>#comment<?= $comment->getId(); ?>" title="Voir le commentaire" class="btn btn-secondary" role="button"><span class="far fa-eye"></span></a>
                            </td>

                            <td><?php if ($comment->getReport() > 0) { ?>
                            	<a href="index.php?action=admin&comment=<?= $comment->getId(); ?>&event=accept" title="Accepter le commentaire" class="btn btn-success mb-2" role="button"><span class="fas fa-check"></span></a>
                            	 <?php } ?>
                            	 <button type="button" title="Supprimer le commentaire" class="btn btn-danger mb-2" data-toggle="modal" data-target="#comment<?= $comment->getId(); ?>"><span class="fas fa-trash-alt"></span></button>
                            </td>
                        </tr>
                        <!-- Modal du bouton supprimer -->
                        <div class="modal fade" id="comment<?= $comment->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="supprimer_un_commentaire" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" id="supprimer_un_commentaire">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDeleteComment">Êtes-vous certain(e) de supprimer ce commentaire ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <a href="index.php?action=admin&comment=<?= $comment->getId(); ?>&event=delete" title="Supprime le commentaire" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php // on réouvre PHP avant de finir la boucle
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<?php 

$content = ob_get_clean();
require('backendtemplate.php');

?>