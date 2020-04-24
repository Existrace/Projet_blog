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
                            <form class="col s12">
                                <div class="row">
                                    <form action="index.php?action=show" method="post">
                                        <div class="input-field col s6">
                                            <label for="email">E-mail</label>
                                            <input id="email" type="email" name="email" class="validate" placeholder="Ecrivez votre email...">
                                        </div>
                                        <div class="input-field col s8">
                                            <label for="textarea">Votre commentaire</label>
                                            <textarea id="textarea" name="content" class="materialize-textarea" required
                                                      placeholder="Ecrivez votre commentaire...">
                                            </textarea>
                                        </div>
                                        <div class="input-field col s8">
                                            <button class="btn waves-effect waves-light" id="submit" type="submit" name="submit">Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </form>
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
