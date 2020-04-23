<?php include("views/entete.html"); ?>


    <div class="container">

        <br><br>
        <div class="row center">
            <h5 class="header col s12 light">Naviguez...</h5>
        </div>

        <!-- Affichage des articles -->
        <?php /** @var PostManager $posts */
        foreach ($posts as $post): ?>

            <div class="row">
                <div class="col m12">
                    <div class="row">
                        <div class="col s12">
                            <div class="card black-text" style="background-image: url('/public/images/mountain-4021090_1280.jpg');
         background-repeat: no-repeat; background-size: cover">
                                <div class="card-content">
                                    <span class="card-title center"> <?= $post['title'] ?> </span>
                                    <hr/>
                                    <p> <?= $post['Post_Date'] ?> </p>
                                </div>
                                <div class="card-action">
                                    <a href="#">This is a link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>






<?php /*include("views/footer.html"); */?>