<?php 

include "conn.php";

$load = $_POST['load'];

if ($load == "C"){
    $id_controle = $_POST['idRelatorioCliente'];
    $download = "arquivos/Clientes/";

    $query = sprintf("SELECT * FROM arquivos_clientes WHERE relatorio_id = '$id_controle' ");

} else if ($load == "F") {
    $id_controle = $_POST['idRelatoriofunc'];
    $download = "arquivos/Funcionarios/";

    $query = sprintf("SELECT * FROM arquivos_func WHERE relatorio_id = '$id_controle' ");

}

$dados = mysqli_query($conn,$query);

$linha = mysqli_fetch_assoc($dados);

$total = mysqli_num_rows($dados);

?>