<?php
session_start();
if (isset($_SESSION['row']))
{
    $row = $_SESSION['row'];
}
else
{
    $row = '';
}


if (isset($_SESSION['erro']))
{
    $erro = $_SESSION['erro'];
}else{
    $erro = '';
}

if (isset($_SESSION['texto']))
{
    $texto = $_SESSION['texto'];
}else{
    $texto = '';
}
