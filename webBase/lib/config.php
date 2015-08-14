<?php
  session_start();

  /**
  * @author [Oriol rivera] <[oriol.03@outlook.com]>
  */

   class Conection
   {

   		private $pdo;

   		private static $_instance = null;

   		public static function getInstance(){
   			if(!self::$_instance instanceof Conection){

   				self::$_instance = new self();
   			}
   			return self::$_instance;

   		}#end getInstance
      /**
       * [__construct conetion]
       */
	   	public function __construct()
	   	{

       $host = "localhost";
        $db = "db";
        $username = "user";
        $password = "user";




	   		$dns = "mysql:host=$host; dbname=$db";

	   		try {
	   			$this->pdo = new PDO($dns,$username,$password);
	   			$this->pdo->exec("SET CHARACTER SET utf8");
	   			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);


	   		}catch(PDOException $e){

	   		 	$this->pdo=null;
                error_log("Error en la conexión a la bd". $e->getMessage());
	   		 	die();

	   		}
	   	}//end construct

	   	//metodo para instancia la conexion BD
        public function getConn(){
            if ($this->pdo == null) {
                 self::getInstance();
            }

             return $this->pdo;
        }


        /*public static function cutText($string, $length=NULL)
                {
                    //Si no se especifica la longitud por defecto es 50
                    if ($length == NULL)
                        $length = 50;
                    //Primero eliminamos las etiquetas html y luego cortamos el string
                    $stringDisplay = substr(strip_tags($string), 0, $length);
                    //Si el texto es mayor que la longitud se agrega puntos suspensivos
                    if (strlen(strip_tags($string)) > $length)
                        $stringDisplay .= ' ...';
                    return $stringDisplay;
        }#end*/

           public static function cutText($string, $limit, $break=".", $pad="...") { // return with no change if string is shorter than$limit
            /* if ($limit == NULL)
                    $limit = 50;*/
            if(strlen($string) <= $limit) {
           return $string;
           }
           if(false !== ($breakpoint = strpos($string, $break, $limit))) { if($breakpoint < strlen($string) - 1)
            { $string = substr(strip_tags($string), 0, $breakpoint) . $pad; } }
            return $string;
          }

          public static function getTasaDolar($from, $to, $amount){

                   $content = file_get_contents('https://www.google.com/finance/converter?a='.$amount.'&from='.$from.'&to='.$to);

                   $doc = new DOMDocument;
                   @$doc->loadHTML($content);
                   $xpath = new DOMXpath($doc);

                   $result = $xpath->query('//*[@id="currency_converter_result"]/span')->item(0)->nodeValue;

                   return number_format(str_replace(' '.$to, '', $result),2,'.',',');


          }#end

        /**
         * [stringUrl limpiar url amigables]
         * @return [type]         [string]
         */
        public static function stringUrl($String) {
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

        /**
         * [removeIndexUrl Remove index.php using 301 redirection]
         */
        public function removeIndexUrl() {
            //if the request contains index.php redirect
            if (preg_match('#(.*)index\.(html|php)$#', $_SERVER['REQUEST_URI'], $captures)) {
              // 301 redirection
              header('HTTP/1.1 301 Moved Permanently');
              header('Location: ' . $captures[1]);
            }

        }//end removeIndexUrl




   }//end class






 ?>
