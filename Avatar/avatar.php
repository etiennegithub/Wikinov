<?php

function create($string, $blocks = 5, $size = 400){

    $togenerate = ceil($blocks / 2);/*arondie supereure*/
    $hash = md5($string);
    $hashsize = $blocks * $togenerate;
    $hash = str_pad($hash, $hashsize, $hash);/*rajouter des caractére*/
    $color = substr($hash, 0, 6);/*recuperation des 6 permiers caracter*/
    $blocksize = $size / $blocks;
    $image = imagecreate($size,$size);/*longeur et largeur*/
    //Couleur de fond
    $bg = imagecolorallocate($image, 255, 255, 255);/*coleur de fond 255, 0, 127*/
    $color = imagecolorallocate($image, hexdec(substr($color, 0, 2)), hexdec(substr($color, 2, 2)), hexdec(substr($color, 4, 2)));
    /*hexdec deconde lhex en deciaml*/

    for($x = 0; $x < $blocks; $x++){

        for ($y = 0; $y < $blocks; $y++){

            if ($x < $togenerate){
                $pixel = hexdec($hash[$x * $blocks + $y]) % 2 == 0;
            }else{
                $pixel = hexdec($hash[(($blocks - 1) - $x) * $blocks + $y]) % 2 == 0;
                /*symetrique ma gueule*/
            }

            $pixelColor = $bg;

            if ($pixel){
                $pixelColor = $color;
            }

            imagefilledrectangle($image, $x * $blocksize, $y * $blocksize, ($x + 1) * $blocksize, ($y + 1) * $blocksize, $pixelColor);
        }
    }

    header('content-type: image/png');
    imagepng($image);
}

?>