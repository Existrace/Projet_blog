<div class="container">

    <div class="row center">
        <h5 class="header col s12 light">Naviguez...</h5>
    </div>

    <div class="container">
        <!-- Affichage des articles -->
        <?php /** @var PostManager $posts */
        foreach ($posts as $post): ?>
            <div class="row" style="opacity: 0.79;">
                <div class="col m12 s12 l12">
                    <div class="card black-text">
                        <div class="card-content">
                            <span class="card-title center title_post">
                                <a class="title_post"
                                   href="/post/show/<?= $post['slug'] ?>"><?= $post['title'] ?></a>
                            </span>
                            <hr/>
                            <p> <?= $post['Post_Date'] ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

