<?php

class  Avatar{

    private $image;

    public function __construct($string, $blocks = 5, $size = 400){
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

        /*
         * elle nous retourn que true et false donc obstrart et clean
         * */
        ob_start();
        imagepng($image);
        $this->image = ob_get_contents();
        ob_end_clean();
    }

    /*
     *ELle affiche directement l'image
     * $avatar->display();
     * pas tres pratique
     * */
    public function display(){
        header('content-type: image/png');
        echo $this->image;
    }

    /*
     * cette fonction retourn la base 64 de l'image
     *
     * */

    public function base64(){
        return 'data:image/png;base64,' . base64_encode($this->image);
    }

    /*
     * cette fontion permet de sauvegarder l'image
     *penser a mettre un chemin de sauvegard de l'image
     *
     * */

    public function save($filename){
        if (file_put_contents($filename, $this->image)){
            return $filename;
        }
    }

}

?>