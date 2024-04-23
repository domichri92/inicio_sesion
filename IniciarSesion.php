<?php
    session_start();
    include('Conexion.php');

if (isset($_POST['Usuario']) && isset($_POST['Clave']))  {
    
    function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
        header("Location: index.php?error=El Usuario es Requerido");
        exit();
    }elseif (empty($Clave)) {
        header("Location: index.php?error=La Clave es Requerida");      
        exit();
    }else {
        
        //$Clave = md5($Clave);

        $Sql = "SELECT * FROM usuarios WHERE Usuario='$Usuario' AND Clave='$Clave'";
        $result = mysqli_query($conexion, $Sql);

        if (mysqli_num_rows($result) === 1) {
           $row = mysqli_fetch_assoc($result);
           if ($row['Usuario'] === $Usuario && $row['Clave'] === $Clave) {
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['id'] = $row['id'];
                header("Location: Inicio.php");
                exit();
            } else {
                header("Location: index.php?error=El usuario o clave son incorrectas");
                exit();
            }
            } else {
            header("Location: index.php?error=El usuario o clave son incorrectas");
                exit();    
            }
    }
}else{
    header("Location: index.php");
        exit();

}

