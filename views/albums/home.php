<?php ob_start() ?>
<div class="container-fluid">
            <div class="container">
                <h2 class="text-center display-4 mb-4 mt-2">Collection d'albums</h2>
                <div class="row">
                    <?php foreach ($album_list as $album) :  ?>
                    <div class="col-md-4 bg-secondary  p-4">
                        <a class="nav-link h-100" href="?path=albums.details&album_id=<?= $album->album_id ?>">
                            <div class="card h-100">
                                <img class="card-img-top" src="./assets/img/placeholder.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $album->title ?></h5>
                                    <p class="card-text text-muted text-uppercase"><?= $album->artist ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ; ?>
        
                                </div>
    
        
                <!-- btn fab -->
                <a class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center text-uppercase position-fixed bottom-0 end-0 me-4 mb-4 fab"
                    href="">
                    <span class="material-symbols-outlined lh-1">
                        add
                    </span>
                </a>
            </div>
        </div>
<?php $content = ob_get_clean() ?>