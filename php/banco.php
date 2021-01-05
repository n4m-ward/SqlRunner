<?php
ini_set("memory_limit", "50M");
session_start();

$query = $_POST['query'];
$banco = $_POST['banco'];
$conn = oci_connect("/", "", 'USR_ORG_20', "AL32UTF8", OCI_CRED_EXT);
if (!$conn)
{
    $_SESSION['erro'] = "Falha ao tentar conectar ao banco de dados";
    header('Location: ../index.php');
}

$stmt = oci_parse($conn, $query);
$exec = oci_execute($stmt);

if ($exec)
{
    $row = oci_fetch_all($stmt, $res);
    $_SESSION['row'] = $res;
    $_SESSION['erro'] = 'sem erro';
    $_SESSION['texto'] = $query;
    header('Location: ../index.php');
}
else
{
    $erro = oci_error($stmt);
    $offset = $erro["offset"];
    $sqlText = $erro["sqltext"];
    $sqlText = substr_replace($sqlText, '  <br>  𝕖𝕣𝕣𝕠 ⟹', $offset, 0);
    $erro = $erro['message'] .' na posição: '. $offset;
    $erro = $erro . '<br><br>' . $sqlText;
    $_SESSION['row'] = '';
    $_SESSION['erro'] = $erro;
    $_SESSION['texto'] = $query;
    header('Location: ../index.php');
}

