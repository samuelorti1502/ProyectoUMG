<?php
function conectar()
{
    $host = "localhost";
    $user = "umg";
    $pass = "t8>)XkRHZSq@L8*4";

    $bd = "db_diplomas";

    $con = mysqli_connect($host, $user, $pass);

    mysqli_select_db($con, $bd);

    return $con;
}

function conectar_pdo($host, $usuario, $password, $db)
{
    /*$host = "localhost";
    $user = "umg";
    $pass = "t8>)XkRHZSq@L8*4";
    $db = "db_diplomas";*/

    try {
        $cnx = new PDO(
            "mysql:host=$host;dbname=$db",
            $usuario,
            $password
        );
        return $cnx;
    }catch ( PDOException $error ){
        //var_dump($error->getMessage());
        die("Error al conectar a la base de datos: " . $error->getMessage());
    }
}
?>