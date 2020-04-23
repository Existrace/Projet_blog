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
                                    <span class="card-title center title_post" >
                                        <a class="title_post" href="/post/show/<?= $post['slug'] ?>"><?= $post['title'] ?></a></span>
                                    <hr/>
                                    <p> <?= $post['Post_Date'] ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>






<?php /*include("views/footer.html"); */?>