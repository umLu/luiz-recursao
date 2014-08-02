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

//
function associa_cliente($contanum, $grupoid) {
   global $mysqli;
   $clientecc = $mysqli->query("SELECT * FROM ClienteCC WHERE cc = '$contanum'");
   while($row = $clientecc->fetch_assoc()) {
      $cliente = $mysqli->query("SELECT * FROM Cliente WHERE nome = '{$row['cliente']}'");
      $cliente = $cliente->fetch_assoc();
      if ($cliente['id_Grupo'] == NULL) {
         $mysqli->query("UPDATE Cliente SET id_Grupo = $grupoid WHERE nome = '{$cliente['nome']}'");
         associa_cc($cliente['nome'], $grupoid);
      }
   }
}

function associa_cc($clientenome, $grupoid) {
   global $mysqli;
   $clientecc = $mysqli->query("SELECT * FROM ClienteCC WHERE cliente = '$clientenome'");
   while($row = $clientecc->fetch_assoc()) {
      $cc = $mysqli->query("SELECT * FROM CC WHERE num = '{$row['cc']}'");
      $cc = $cc->fetch_assoc();
      if ($cc['id_Grupo'] == NULL) {
         $mysqli->query("UPDATE CC SET id_Grupo = $grupoid WHERE num = '{$cc['num']}'");
         associa_cliente($cc['num'], $grupoid);
      }
   }
}



// Reinicia tabelas
$mysqli->query("TRUNCATE Grupo");
$mysqli->query("UPDATE CC SET id_Grupo = NULL");
$mysqli->query("UPDATE Cliente SET id_Grupo = NULL");

//
$contas = $mysqli->query("SELECT * FROM CC");
while ($conta = $contas->fetch_assoc()) {
   $c = $mysqli->query("SELECT * FROM CC WHERE num = {$conta['num']}");
   $c = $c->fetch_assoc();
   if ($c['id_Grupo'] == NULL) {
      $grupo = novo_grupo();
      $mysqli->query("UPDATE CC SET id_Grupo = $grupo WHERE num = {$c['num']}");
      associa_cliente($c['num'], $grupo);
   }
}






