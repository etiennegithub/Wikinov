<?php

class Avatar{

    private

        public function__construct($string, $blocks = 5, $size = 400){
        $togenerate = ceil($blocks / 2);

        $hash = md5($string);
        $hashsize = $blocks * $togenerate;
        $hash = str_pad($hash, $hashsize, $hash);
        $color = substr($hash, 0, 6);
        $blocksize = $size / $blocks;

        $image = imagecreate($size, $size);
        //Couleur de fond
        $bg = imagecolorallocate($image, 255, 255, 255);
        $color = imagecolorallocate($image, hexdec(substr($color, 0, 2)), hexdec(substr($color, 2, 2)))

            for($x =0; $x < $blocks; $x++){

            for($y - 0; $y < $blocks ; $y++)

                if($x < $togenerate){

                $pixel = hexdec($hash[$x * $blocks + $y] % 2 == 0;
                                }
                                else{
                                    $pixel = hexdec($hash[($blocks - 1) - $X) * $blocks +$Y]) % 2 == 0;
                                }

                                $pixelColor = $bg;
                                if($pixel){
                                    $pixelColor = $color;
                                }

                                imagefilledrectangle($image, $x * $blocksize, $y * $blocksize, ($x+1) * $blocksize, ($y + 1) * blocksize, $pixelColor);

                            }
                        }
                        ob_start();
                                imagepng($image);
                                $this->image = ob_get_contents();
                                ob_end_clean();
                    }
               
                                public function display () {
                                    
                                    header('Content-type: image/png');
                                    echo $this->image;
                                
                                }
                                
                                public function base64(){
                                
                                    return 'data:image/png;base64, ' . base64_endcode($this->image);
                                    
                                }
                                







?>