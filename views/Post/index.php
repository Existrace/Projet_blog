<?php include("views/entete.html"); ?>

<?php /** @var PostManager $posts */
foreach ($posts as $post): ?>
    <h2> <?= $post['title'] ?></h2>
    <p> <?= $post['Post_Content'] ?> </p>
    <p> <?= $post['Post_Date'] ?> </p>
<?php endforeach; ?>



<?php include("views/footer.html"); ?>