<?php require_once __DIR__ . '/config.php';

if (!isset($logout)) :
    $responseUser = facebook('id,name,email,picture');
    $user = $responseUser->getGraphUser();
?>
    <div class="row d-flex align-items-center justify-content-center mb-2">
        <img src="<?= $user->getPicture()['url'] ?>" alt="Foto de Perfil" class="img-thumbnail mr-2">
        <div class="d-flex flex-column">
            <h4><?= $user->getName() ?></h4>
            <small><?= $user->getEmail() ?></small>
        </div>
        <a class="btn btn-danger btn-sm ml-4" href="<?= URL ?>index.php">
            Logout
        </a>
    </div>
<?php endif ?>

<div class="row">

    <?php
    foreach (getPosts() as $post) :
        if (isset($post['object_id'])) : ?>

            <div class="col-md-4 col-12 d-flex">
                <div class="card my-3 w-100">
                    <div class="card-header d-flex flex-column" style="height: 85px;">
                        <b class="card-title"><?= $post['name'] ?? '' ?></b>
                        <p class="card-text"><?= $post['description'] ?? '' ?></p>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <img src="<?= $post['picture'] ?>" alt="imagem post" class="img-thumbnail rounded" style="height: 100px;">
                        <div class="d-flex align-items-center justify-content-center flex-wrap mt-2" style="width: 150px;">
                            <?php foreach (getReactions($post['id']) as $reaction) : ?>
                                <div class="reaction d-flex align-items-center m-1">
                                    <small style="line-height: 1;"><?= $reaction ?></small>
                                    <i class="ml-1"></i>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div><?= $post['created_time']->format('d/m/Y') ?></div>
                        <?php if (isset($post['link'])) : ?>
                            <a class="btn btn-primary d-flex align-items-center" href="<?= $post['link'] ?>" target="_blank">
                                Facebook
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

    <?php
        endif;
    endforeach;
    ?>

</div>

<?php
require_once __DIR__ . '/components/Footer.php';
