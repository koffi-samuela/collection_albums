<?php ob_start() ?>
<div class="container-fluid">

<div class="container">
    <div class="mt-5">
        <a class="btn btn-primary btn-sm lh-1" href="?path=/">
            <span class="material-symbols-outlined">
                keyboard_return
            </span>
        </a>
    </div>
    <h1 class="display-4 mb-4 mt-3">Album</h1>

    <div class="row">
        <div class="col-md-8 bg-secondary  p-4">
            <div class="card h-100">
                <div class="row">
                    <div class="col">
                        <img class="card-img-top" src="./assets/img/placeholder.png" alt="Card image cap">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title"><?= $one_album -> title ?></h5>
                            <p class="card-text text-muted text-uppercase"><?= $one_album -> artist ?></p>
                            <p class="card-text text-muted text-uppercase"><?= date('d/m/Y à h:m ', strtotime($one_album -> release_date)) ?></p>
                            <hr>
                            <h3>Tubes</h3>
                            <p><?= $one_album -> name ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <!-- Add comment button #1 -->
            <div class="comments_actions mt-3 mb-3">
                <a href="?path=note.add&album_id=<?= $one_album -> album_id ?>" class="btn btn-primary">Nouvelle note</a>
            </div>
            
            <!-- List of comments -->
            <?php foreach ($comments as $comment) : ?>               
            <div class="card mb-3 comment">
                <div class="card-header d-flex">
                    <p class="mb-0"><?= date('d/m/Y à h:m ', strtotime($comment -> created_at)) ?></p>
                </div>
                <div class="card-body">
                    <p>
                    <?= $comment -> content ?>
                    </p>
                    <p>
                    <p>
                        <a href="?path=note.edit&comment_id=<?= $comment -> comment_id ?>" class="btn btn-outline-primary btn-sm">Modifier</a>
                        <form action="" method="post" id="form_id_<?= $comment -> comment_id ?>">
                            <button type="button" class="btn delete btn btn-outline-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-comment_id="<?= $comment -> comment_id ?>">Supprimer</button>
                            <input type="hidden" name="comment_id" value="<?= $comment -> comment_id ?>">                              
                        </form>
                    </p>
                </div>
            </div>

            <?php endforeach; ?>
            <?php if (!$commented) { ?>
                <h6> Aucun commentaire pour cet album </h6>
                <?php } ?>
        </div>
    </div>
</div>
</div>
<?php require __DIR__.'/../_deleteModal.php' ?>
<?php $content = ob_get_clean() ?>
