<?php
function conectar_pdo($host, $usuario, $password, $db)
{
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

function insertarCampos($pdo, $tabla)
{
    //$pdo = conectar_pdo("localhost", "umg", "t8>)XkRHZSq@L8*4", "db_diplomas");

    try {
        $sql = "INSERT INTO personas (nombres, apellidos, fecha_nacimiento, telefono, email, fecha) 
                VALUES(:campo1, :campo2, :campo3, :campo4, :campo5, CURRENT_TIMESTAMP())";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo1', $_POST['nombres']);
        $stmt->bindParam(':campo2', $_POST['apellidos']);
        $stmt->bindParam(':campo3', $_POST['fecha_nacimiento']);
        $stmt->bindParam(':campo4', $_POST['telefono']);
        $stmt->bindParam(':campo5', $_POST['email']);
        $stmt->execute();
        //return $pdo->lastInsertId();
        return true;
    } catch (PDOException $e) {
        die("Error al insertar registro: " . $e->getMessage());
        return false;
    }
}
?>