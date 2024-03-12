<?php
$texte = "Un petit pop-up qui disparait.";
$date = date('Y m d');
?>
<div id="cookie_popup" class="pop-cookie">
    <?= $texte; ?> [<?= $date; ?>]
    <span id="cookie_close" class="close-btn">❎</span>
</div>