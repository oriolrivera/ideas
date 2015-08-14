<?php 

    /**
         * [stringUrl limpiar url amigables]
         * @return [type]         [string]
         */
        function stringUrl($String) {
                    $String = trim($String);

                     $stringArray = array(
                                  'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c',
                                  'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                                  'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                                  'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'S',
                                  'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                                  'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                                  'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                                  'ÿ'=>'y', 'R'=>'R', 'r'=>'r', ','=>''
                                  );
                    $String = strtr($String, $stringArray);
                    $String = strtr($String,"ABCDEFGHIJKLMNOPQRSTUVWXYZ","abcdefghijklmnopqrstuvwxyz");
                          $String = preg_replace('#([^.a-z0-9]+)#i', '-', $String);
                          $String = preg_replace('#-{2,}#','-',$String);
                          $String = preg_replace('#-$#','',$String);
                          $String = preg_replace('#^-#','',$String);
                          $String = preg_replace('/[.]/','',$String);
                    return $String;
        }

        function cutText($string, $limit, $break=".", $pad="...") { // return with no change if string is shorter than$limit
            /* if ($limit == NULL)
                    $limit = 50;*/
            if(strlen($string) <= $limit) {
           return $string;
           }
           if(false !== ($breakpoint = strpos($string, $break, $limit))) { if($breakpoint < strlen($string) - 1)
            { $string = substr(strip_tags($string), 0, $breakpoint) . $pad; } }
            return $string;
        }


  