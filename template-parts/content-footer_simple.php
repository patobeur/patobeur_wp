<?php
$noms = get_theme_mod('user_names');
$street = get_theme_mod('user_street');
$city = get_theme_mod('user_city');
$zip = get_theme_mod('user_zip');
$land = get_theme_mod('user_country');
$email = get_theme_mod('user_mail');
$date = date('Y m d');
?>
<div class="row-footer">
    <div class="logo-footer">
        <a href="#">
            <?= get_custom_logo() ?>
        </a>
    </div>
    <p><?= $noms ?></p>
    <p>
        <?= $street ?><br />
        <?= $city ?> <?= $zip ?><br />
        <?= $land ?>
    </p>
    <?= $email ?></p>
</div>