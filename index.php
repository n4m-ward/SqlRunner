<?php
include('./php/validacao.php');
include('./php/head.php');
?>

<body id="main" class="divMain1">
    
<div class="container">
    
<form action="./php/banco.php" method="post">
    <textarea name="query" id="queryInput" data-editor="xml" data-gutter="1" rows="15" style="width: 100%"></textarea><br>
    <div id="aceEditor" style="height: 400px; width:100%;"></div>
    <br>
    <input type=submit class="btn btn-dark" onclick="setLocalStorage()" id="submitButton">
</form>

<br>
<?php
if (isset($_SESSION['erro'])) {
    if ($erro == 'sem erro') {
        
    } else {
?>
       <div class="alert alert-danger" role="alert"><?= $erro ?>
           </div>
    <?php
    }
}

?>
<br>
<div class="list-group">
<?php
if (is_array($row)) {
    $arrayHeader = array();
    foreach ($row as $key => $item) {
        array_push($arrayHeader, $key);
    }
    ;
    
?>
      <div id="tabela">
       <table class='table table-dark' id="table">
                <thead>
                    <tr>
                    <th scope='col'>#</th>
                    <?php
    foreach ($arrayHeader as $headerItem) {
        
        if ($headerItem) {
?>
           <th scope='col' style='text-align: center'><?= $headerItem ?>  </th>
        <?php
        } else {
?>
       
            <th scope='col' style='text-align: center'> NULL </th>
            
        <?php
        }
    }
?>
   </thead>
    <tbody> <tr>

<?php
    $sizeRow = 0;
    
    for ($i = 0; $i <= $sizeRow; $i++) {
        echo "<td>" . $i . "</td>";
        
        foreach ($row as $item) {
            $sizeRow = sizeof($item);
            if (isset($item[$i])) {
?>
               <td scope='col' style='text-align: center'> <?= $item[$i] ?> </td>
            <?php
            } else {
?>
               <td scope='col' style='text-align: center'> -- </td>
            <?php
            }
        }
        
?>
       </tr>
    <?php
    }
?>
   </thead>
    </table>
<?php
}
;
?>

</tr>
  </tbody>
  </table>
</div>
</div>
</body>

<?php
include('./php/scripts.php');
?>