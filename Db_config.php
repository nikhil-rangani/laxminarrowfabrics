
<?php
//Error Reporting (0 off|1 On)
error_reporting(E_ALL);
@ini_set("display_errors", 1);
session_start();
//date_default_timezone_set('UTC');
date_default_timezone_set('Asia/Kolkata');
//Define TimeZone
//define('TMZ','Asia/kolkata');
//define('PREFIX','t_');
define('ADMINEMAIL', 'devangtailor30@gmail.com');
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $domian_url = "https://";
}
else{
    $domian_url = "http://";
}
$domian_url .= $_SERVER['HTTP_HOST'];

define('DOMAIN_URL', $domian_url);

if($_SERVER['SERVER_ADDR'] == "127.0.0.1" or $_SERVER['SERVER_ADDR'] == "::1" ){
    define('MOE',0);
}
else{
    define('MOE',1);
}


//DB CONNECTION
function Db_connect() {
    if(MOE==0)
    {
        $username	= "root";
        $password	= "";
        $dbname		= "laxmi";
        $servername	= "localhost";
    }
    else
    {
        $servername="localhost";
        $username="cybe_fir";
        $password="gL6D4Ogq7FH!s90u";
        $dbname="laxmi";
    }
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!$con) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }else{
        return $con;
    }
}

function db_query($query,$module=NULL,$opp=NULL) {
    $connection = db_connect();
    mysqli_set_charset($connection,'utf8');
    $result = mysqli_query($connection,$query);
    if($result == false){
       // $err_msg = mysqli_error($connection);
      //  make_errorlog($_SESSION['bid'],$module,$opp,$err_msg);
        echo "something get wrong" ;
    }
    else {
        echo "Thank you for your inquiry, one of our executive will get in touch with you. We look forward for a lasting relationship with you."  ;

    }
    die();
}
function db_select($query,$module=NULL,$opp=NULL) {
    $connection = db_connect();
    mysqli_set_charset($connection,'utf8');
    $result = mysqli_query($connection,$query);
    if($result == false){
        //$err_msg = mysqli_error($connection);
        return  "data";
    }
    else {
        return $result;
    }
}


//enc dec
function encryptor($action, $string) {

    $secret_key = 'h4z]UONyLf9Y]br,[F_09+#h@-]wX]dJ[6}N:qt3Q}h<T~c-a|9Et6.O^0C+ViiS';
    $secret_iv = '^+39(N|Seocu,O:zV-<[O/Ni)kX%v,<kQsk}5J336.D(|cZj-]9UY1am{-|/^WP2';

    $output = false;
    $encrypt_method = "AES-256-CBC";
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'e' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'd' ){
        //decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

if (!isset($_SESSION['token'])) {
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    $_SESSION['token_time'] = time();
}else{
    $token = $_SESSION['token'];

}
?>
