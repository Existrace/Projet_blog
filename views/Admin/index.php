<div class="container">
    <div class="section">
        <!--   Page Section  -->
        <div class="row">
            <div class="col m12">
                <div class="card" style="opacity: 0.85;">
                    <div class="center">
                        <span class="card-title center">
                            Bienvenue, <strong>
                                <?= /** @var array $idents */
                                $idents['login'] ?></strong> (administrateur)
                        </span>
                    </div>
                    <div class="card-content center">

                        <p>Ici vous pouvez gérer vos article et modérer les commentaires</p>

                        <div style="padding: 15px">
                            <a class="link_stylised" href="moderatecomments"> Modérer les commentaires</a>
                        </div>
                        <div style="padding: 15px">
                            <a class="link_stylised" href="create"> Création d'un nouvel article</a>
                        </div>

                        <hr/>

                        <h5> Voici les articles publiés </h5>

                        <div class="container">
                            <!-- Affichage des articles -->
                            <?php /** @var PostManager $posts */
                            foreach ($posts as $post): ?>
                                <div class="row" style="opacity: 0.79;">
                                    <div class="col m12 s12 l12">
                                        <div class="card black-text">
                                            <div class="card-content">
                                                <p><?= $post['Post_Date'] ?> </p>
                                                <span class="card-title center title_post">
                                                    <a class="title_post"
                                                      href="/post/show/<?= $post['slug'] ?>"><?= $post['title'] ?></a>
                                                </span>
                                                <hr/>
                                                <a class="title_post"
                                                   href="/admin/update/<?= $post['ID_post'] ?>"> Modifier</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <hr/>
                        <div class="center" style="padding: 15px">
                            <a class="link_stylised" href="/post/index" class="more-link">Retourner à l'accueil du site</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="center">
        <a class="waves-effect waves-light blue-grey btn" href="logout"><i class="material-icons right">directions_run</i>Se déconnecter</a>
    </div>-->

</div>
