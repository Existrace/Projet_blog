<div class="container">
    <div class="section">

        <!--   Page Section  -->
        <div class="row">
            <div class="col m12 center">
                <div class="card" style="opacity: 0.85;">
                    <div class="center">
                        <span class="card-title">
                            <?php /** @var PostManager $post */ ?>
                            <?= $post['title'] ?>
                        </span>
                    </div>
                    <div class="card-content">
                        <p class="black-text"> Publié par Admin le <?= $post['Post_Date'] ?> </p><br>
                        <img height="80%" width="80%" src="/public/images/<?= $post['image'] ?>"><hr/>
                        <p> <?= $post['Post_Content'] ?></p>

                        <hr>
                        <h5> Commentaires</h5>
                        <!-- Formulaire de création d'un commentaire -->
                        <br/>
                        <div class="row">
                            <div class="col m12 s12 center">
                                <form action="/comment/createcomments/<?= $post['slug'] ?>/<?= $post['ID_post'] ?>" method="post">
                                    <div class="input-field col m12 s12">
                                        Veuillez renseigner votre e-mail*
                                        <input type="text" name='email'/>
                                    </div>
                                    <div class="input-field col m12 s12">
                                        Commentaire
                                        <textarea class="materialize-textarea" name="content"></textarea>
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

                        <?php /** @var CommentManager $comments */
                        foreach ($comments as $comment): ?>
                            <div class="card tiny">
                                <div class="card-content">
                                    <p>Soumis par <strong><?= $comment['Comment_Email'] ?></strong>,
                                        le <?= $comment['Comment_Date'] ?>  </p>
                                    <p>  <?= $comment['Comment_Content'] ?></p>
                                    <p class="red-text">
                                        <?php if ($comment['flag_reporting'] == 1) {
                                            echo "Ce commentaire a été signalé";
                                        }
                                        ?>
                                    </p>
                                    <?php if ($comment['flag_reporting'] == 0) { ?>
                                    <a  href="/post/show/<?= $post['slug'] ?>/<?= $comment['ID_comment'] ?>">Signaler ce commentaire</a>
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
