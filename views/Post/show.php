<div class="container">
    <div class="section">

        <!--   Page Section  -->
        <div class="row">
            <div class="col m12">
                <div class="card" style="opacity: 0.85;">
                    <div class="center">
                        <span class="card-title">
                            <?php /** @var PostManager $post */ ?>
                            <?= $post['title'] ?>
                        </span>
                    </div>
                    <div class="card-content">

                        <p class="black-text"> Publié par Admin le <?= $post['Post_Date'] ?> </p><br>
                        <p> <?= $post['Post_Content'] ?></p>

                        <hr>
                        <p class="subheader"> Commentaires</p>
                        <!-- Formulaire de création d'un commentaire -->
                        <br/>
                        <div class="row">
                            <div class="col s12">
                                <form action="" method="post">
                                    <div class="input-field col m6 s12">
                                        Veuillez renseigner votre e-mail*
                                        <input type="text" name='email'/>
                                    </div>
                                    <div class="input-field col m7 s12">
                                        Commentaire
                                       <textarea class="materialize-textarea" name="content"></textarea>
                                    </div>
                                    <div class="col m12 s12">
                                        <button class="btn waves-effect waves-light blue-grey" type="submit" name="submit">
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
                                    <p>  <?= $comment['Comment_Content'] ?> </p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <hr/>
                        <p>
                            <a class="black-text text-lighten-3" href="/post/index"> <i class="tiny material-icons">keyboard_return</i>
                                Retour aux articles </a>
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
