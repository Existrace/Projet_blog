<div class="container">
    <div class="section">
        <!--   Page Section  -->
        <div class="row">
            <div class="col m12">
                <div class="card" style="opacity: 0.85;">
                    <div class="center">
                        <span class="card-title">
                            Modification d'un article
                        </span>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <form method="post">
                                <div class="input-field col m8 s12">
                                    Nom de l'article
                                    <input type="text" name='title' value=" <?= /** @var PostManager $post */
                                    $post['title'] ?>"/>
                                </div>
                                <div class="input-field col m12 s12">
                                    <textarea name='content'>
                                        <?= $post['Post_Content'] ?>
                                    </textarea>
                                </div>
                                <div class="col m12 s12 center">
                                    <button class="btn waves-effect waves-light blue-grey" type="submit" name="submit">
                                        Modification
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <hr/>
                        <p>
                            <a class="black-text text-lighten-3" href="/admin/index"> <i class="tiny material-icons">keyboard_return</i>
                                Retour à l'accueil administrateur </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    tinymce.init({
        selector: 'textarea',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });
</script>
