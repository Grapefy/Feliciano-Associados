<?php 

if ($_SESSION['tipoCliente'] == 1 or $_SESSION['tipoCliente'] == 2){
    $id_responsavel = $_SESSION['id'];
} else if ($_SESSION['tipoCliente'] == 3){
    $id_responsavel = $_SESSION['idFunc'];
} else if ($_SESSION['tipoCliente'] == 4){
    $id_responsavel = $_SESSION['idAdministrador'];
}

$tipo = $_SESSION['tipoCliente'];
                
$query = sprintf("SELECT * FROM pastas WHERE id_responsavel = $id_responsavel AND tipoCliente = $tipo");

$dados = mysqli_query($conn,$query);

$linha = mysqli_fetch_assoc($dados);

$total = mysqli_num_rows($dados);

?>