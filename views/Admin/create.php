<div class="container">
    <div class="section">

        <!--   Page Section  -->
        <div class="row">
            <div class="col m12">
                <div class="card" style="opacity: 0.85;">
                    <div class="center">
                        <span class="card-title">
                            Connexion administrateur
                        </span>
                    </div>
                    <div class="card-content">

                          <textarea>
                            Welcome to TinyMCE!
                            </textarea>

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

<script>
    tinymce.init({
        selector: 'textarea',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script>
