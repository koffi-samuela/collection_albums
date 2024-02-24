<?php ob_start() ?>
<div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-between">
                    <h1>Modifier un commentaire</h1> <span>(<a href="album-details.html">Retour</a>)</span>
                </div>
                <form class="mt-3" method="post">
                    <div class="mb-3">
                        <label for="comment-text" class="form-label">Votre commentaire</label>
                        <textarea class="form-control" id="comment-text" rows="3" name="comment" "><?= $one_note ->content ?? '' ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
<?php $content = ob_get_clean() ?>
