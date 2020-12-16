<?php //metodo para encryptar y desencryptar cadenas de texto
if (!isset($_POST['texto'])) {
    header("Location: ./");
}
define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$charlie86@2020');
define('SECRET_IV', '909090');
class SHA1
{
    //encriptacion
    static function _encryptacion($cadena)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($cadena, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    //desencriptacion
    static function _desencryptacion($cadena)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($cadena), METHOD, $key, 0, $iv);
        return $output;
    }
}
