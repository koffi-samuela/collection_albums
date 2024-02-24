<?php ob_start() ?>
<div class="row">
            <div class="col-md-6">
                <div class="d-flex align-items-center justify-content-between">
                    <h1>Ajouter une note</h1> <span>(<a href="?path=/">Retour</a>)</span>
                </div>
                <form class="card mt-3" method="post">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="comment-text" class="form-label">Votre note</label>
                            <textarea class="form-control" id="comment-text" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
<?php $content = ob_get_clean() ?>

