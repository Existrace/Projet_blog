<?php include("views/entete.html"); ?>


<div class="container">
    <div class="section">

        <!--   Page Section  -->
        <div class="row">

            <div class="col m12">

                <div class="card">
                    <div class="center">
                        <span class="card-title">
                          <?= $post['title'] ?>
                        </span>
                    </div>
                    <div class="card-content">

                        <p class="black-text" > Publié par Admin le <?= $post['Post_Date'] ?> </p><br>
                        <p> <?= $post['Post_Content'] ?></p>


                        <hr>
                        <p class="subheader"> Commentaires</p> <br>
                        <!-- Formulaire de création d'un commentaire -->

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>