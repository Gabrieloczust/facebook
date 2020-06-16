<?php

$logout = false;
require_once __DIR__ . '/config.php';
session_destroy();

$helper = $fb->getRedirectLoginHelper();

$loginUrl = $helper->getLoginUrl(URL . "fb-callback.php", $permissions);

?>

<div style="    
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);">
    <a class="btn btn-primary" href="<?= $loginUrl ?>">
        Logar com o Facebook!
    </a>
</div>

<?php
require_once __DIR__ . '/components/Footer.php';
