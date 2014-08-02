<?php

$mysqli = new mysqli("localhost", "luiz", "123", "luiz_recursao");

/* check connection */
if ($mysqli->connect_errno) {
   printf("Connect failed: %s\n", $mysqli->connect_error);
   exit();
}

// Devolve o id de um novo grupo criado
function novo_grupo() {
   global $mysqli;
   $mysqli->query("INSERT INTO Grupo VALUES ()");
   return $mysqli->insert_id;
}

function associa_cliente($contanum, $grupoid) {
   global $mysqli;
   $clientecc = $mysqli->query("SELECT * FROM ClienteCC WHERE cc = $contanum");
   while($row = $clientecc->fetch_assoc()) {
      echo $row['cc'] . " => " . $row['cliente'];
      echo "<br/>";
   }
}

$mysqli->query("TRUNCATE Grupo");
$mysqli->query("UPDATE CC SET id_Grupo = NULL");
$mysqli->query("UPDATE Cliente SET id_Grupo = NULL");

$contas = $mysqli->query("SELECT * FROM CC");

while ($conta = $contas->fetch_assoc()) {
   if ($conta['id_Grupo'] == NULL) {
      $grupo = novo_grupo();
      associa_cliente($conta['num'], 1);
   }
}






