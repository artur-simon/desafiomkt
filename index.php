<?php

  $url_base = 'https://pokeapi.co/api/v2/pokemon/';//endereço base da api
  $index = 1;
  while($index < 10)//O desafio especifica 9 dos pokemons
  {
    $pokeData = file_get_contents($url_base.$index);
    $pokeObject = json_decode($pokeData);
    console_log($pokeData);
    $index++;
  }
?>

<!--  Logging (estou testando as coisas) -->
<?php
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>

<script type="text/javascript">
</script>

<!DOCTYPE html>
<html lang="pt">
<head>
  <!-- Meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3, user-scalable=no">
  <meta name="author" content="mobLee">
  <meta name="theme-color" content="#ed1164">

  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Title -->
  <title>Desafio 1</title>
</head>
<body>

<h1>A tabela Pokémon</h1>

<table id="tabela-pokedex">
  <tr>
    <th colspan="2"><a href="#" class="is-selected">Pokémon</a></th>
    <th><a href="#" >Altura</a></th>
    <th><a href="#" >Peso</a></th>
    <th><a href="#" >Tipo</a></th>
  </tr>
  <tr>
    <!-- A imagem esperada é o sprite do Pokémon, pode ser tanto o chamado front_default quanto o front_female -->
    <!-- É esperado que o alt da imagem seja o nome do Pokémon -->
    <td><img alt=""></td>
    <td><strong>Nome</strong></td>
    <td><span>12</span> unidade de medida</td>
    <td><span>320</span> unidade de medida</td>
    <!-- Dentro de tipo colocar dentro do mesmo TD todos os tipos que o Pokémon pode ter -->
    <td>Tipo do Pokémon</td>
  </tr>
</table>
</body>
</html>