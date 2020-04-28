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
                        <h5> Gestion des commentaires </h5>
                        <div class="container">
                            <!-- Affichage des articles -->
                            <?php /** @var array $comments */
                            foreach ($comments as $comment): ?>
                                <div class="row" style="opacity: 0.79;">
                                    <div class="col m12 s12 l12">
                                        <div class="card black-text">
                                            <div class="card-content">
                                                <!--<p><?/*= $comment['Post_Date'] */?> </p>-->
                                                <span class="center title_post">
                                                    Soumis par <strong><?= $comment['Comment_Email'] ?></strong>, le <?= $comment['Comment_Date'] ?><br/>
                                                    Article concerné : <strong><?= $comment['title'] ?></strong>
                                                </span>
                                                <hr/>
                                                <p>
                                                    <?= $comment['Comment_Content'] ?>
                                                </p>
                                                <p class="red-text">
                                                    <?php if ($comment['flag_reporting'] == 1) {
                                                        echo "Ce commentaire a été signalé";
                                                    }
                                                    ?>
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <p>
                                <a class="black-text text-lighten-3" href="index"> <i class="tiny material-icons">keyboard_return</i>
                                    Retour à l'accueil administrateur </a>
                            </p>
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
