<?php include("views/entete.html"); ?>


<div class="container">
    <div class="section">

        <!--   Page Section  -->
        <div class="row">

            <div class="col m12">

                <div class="card">
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
                        <p class="subheader"> Commentaires</p> <br>
                        <!-- Formulaire de création d'un commentaire -->
                        <?php /** @var CommentManager $comments */
                        foreach ($comments as $comment): ?>
                            <div class="card tiny">
                                <div class="card-content">
                                    <span class="card-title">Soumis par  <?= $comment['Comment_Email'] ?>  Le  <?= $comment['Comment_Date'] ?>  </span>
                                    <p>  <?= $comment['Comment_Content'] ?> </p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <hr/>
                        <p>
                            <a class="black-text text-lighten-3"  href="/post/index"> <i class="tiny material-icons">keyboard_return</i> Retour aux articles </a>
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>