<?php

require __DIR__ . '/../vendor/autoload.php';

echo phpinfo();

use LasseRafn\InitialAvatarGenerator\InitialAvatar;

$avatar = new InitialAvatar();

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$image = $avatar
    ->name('Lasse Rafn')
    ->fontSize(0.5)
    ->size(96)
    ->background('#' . random_color())
    ->color('#' . random_color())
    ->generate();

$imageName = __DIR__ . '/images/' . 'demo' . '.png';

$image->save($imageName);
?>

<img src="images/demo.png"/>
