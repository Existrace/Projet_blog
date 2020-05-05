<div class="container" style="display: flex">

    <!-- Affichage des articles -->
    <div class="row" style="opacity: 0.79;">
        <div class="col m12 center">
            <h5 class="header col s12 light">Le roman en exclusivité : "Billet simple pour l'Alaska"</h5>
            <p> Un chapitre par semaine...</p>
        </div>

        <?php /** @var PostManager $posts */
        foreach ($posts as $post): ?>
            <div class="col m6 s12 center">
                <div class="card big hoverable">
                    <div class="card-image">
                        <img class="image_article" src="/public/images/<?= $post['image'] ?>" alt="image_article">
                        <a class="link_stylised"
                           href="/post/show/<?= $post['slug'] ?>"><?= $post['title'] ?></a>
                        <p style="padding: 10px;"> <?= $post['Post_Date'] ?>
                            <i class="material-icons tiny" style="padding-left: 10px">comment</i> <?= $post['nb_comments'] ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col m12 center">
            <a class="link_stylised"
               href="/admin/login"> Partie administration</a>
        </div>
    </div>




