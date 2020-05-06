<div class="container">
    <div class="section">

        <!--   Page Section  -->
        <div class="row">
            <div class="col m12 center">
                <div class="card" style="opacity: 0.85;">
                    <div class="center">
                        <span class="card-title">
                            <?php /** @var PostEntity $post */ ?>
                            <?= $post->getTitle(); ?>
                        </span>
                    </div>
                    <div class="card-content">
                        <p class="black-text"> Publié par Admin le <?= $post->getDate(); ?> </p><br>
                        <img height="80%" width="80%" src="/public/images/<?= $post->getImage(); ?>"><hr/>
                        <p> <?= $post->getContent(); ?></p>

                        <hr>
                        <h5> Commentaires</h5>
                        <!-- Formulaire de création d'un commentaire -->
                        <div class="row">
                            <div class="col m12 s12 center">
                                <form action="/comment/createcomments/<?= $post->getSlug() ?>/<?= $post->getId() ?>" method="post">
                                    <div class="input-field col m12 s12">
                                        Pseudo*
                                        <input type="text" name='nickname' required maxlength="40"/>
                                    </div>
                                    <div class="input-field col m12 s12">
                                        Commentaire
                                        <textarea class="materialize-textarea" name="content" required maxlength="4"></textarea>
                                    </div>
                                    <div class="col m12 s12">
                                        <button class="btn waves-effect waves-light blue-grey" type="submit"
                                                name="submit">
                                            Soumettre
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- AFFICHAGE DES COMMENTAIRES -->
                        <?php /** @var array $comments */
                        foreach ($comments as $comment): ?>
                            <div class="card tiny">
                                <div class="card-content">
                                    <p>Soumis par <strong><?= $comment['Nickname'] ?></strong>,
                                        le <?= $comment['Comment_Date'] ?>  </p>
                                    <p>  <?= $comment['Comment_Content'] ?></p>
                                    <p class="red-text">
                                        <?php if ($comment['flag_reporting'] == 1) {
                                            echo "Ce commentaire a été signalé";
                                        }
                                        ?>
                                    </p>
                                    <?php if ($comment['flag_reporting'] == 0) { ?>
                                        <a  href="/post/show/<?= $post->getSlug()?>/<?= $comment['ID_comment'] ?>">Signaler ce commentaire</a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endforeach; ?>


                        <hr/>
                        <?php if(!$_SESSION) {?>
                        <p>
                            <a class="black-text text-lighten-3" href="/post/index"> <i class="tiny material-icons">keyboard_return</i>
                                Retour aux articles </a>
                        </p>
                        <?php } ?>
                        <?php if($_SESSION) {?>
                        <p>
                            <a class="black-text text-lighten-3" href="/admin/index"> <i class="tiny material-icons">keyboard_return</i>
                                Retour au panneau d'administration</a>
                        </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
