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
  <!-- <tr> -->
    <!-- A imagem esperada é o sprite do Pokémon, pode ser tanto o chamado front_default quanto o front_female -->
    <!-- É esperado que o alt da imagem seja o nome do Pokémon -->
    
    <!--  <td><img alt=""></td>
    <td><strong>Nome</strong></td>
    <td><span>12</span> unidade de medida</td>
    <td><span>320</span> unidade de medida</td> -->

    <!-- Dentro de tipo colocar dentro do mesmo TD todos os tipos que o Pokémon pode ter -->
    <!-- <td>Tipo do Pokémon</td> -->
  <!-- /tr> -->

  <?php
    $url = 'https://pokeapi.co/api/v2/pokemon/';//endereço base da api
    $index = 1;//TODO atualmente o programa requisita do primeiro ao décimo pokemon em ordem crescente. Implementar aleatoriedade, ou campo para definição (offset)

    while($index < 10) {//O desafio especifica 9 dos pokemons, logo criamos o laço que corre até a décima iteração, acessando a pokeapi e os dados dos pokemons, convertemos o json em objeto e acessamos suas propriedades para printar a tabela com as devidas conversões.

      $pokeData = file_get_contents($url.$index); //armazenamos os dados recebidos através da requisição feita à api, utilizando a url mais o número do pokemon
      
      $pokemon = json_decode($pokeData); //dados sao devidadmente convertidos de json para um objeto que podemos acessar
      
      $tipos = $pokemon->types; //type, diferente das outras propriedades, é um array de tamanho variável, implementamos um laço para adicionar todos
      $pokeTipo = ""; //iniciamos vazio
      foreach ($tipos as $t) {
        $pokeTipo .= ucfirst($t->type->name).", "; //concatenamos o tipo, primeira letra em caixa alta, adicionamos vírgula e espaço.
      }
      $pokeTipo = substr($pokeTipo, 0, -2);//remove ultima vírgula

      /*Imprimos por fim toda a linha da tabela com as informações coletadas da api; em html*/
      echo "<tr>"
      ."<td><img src=".$pokemon->sprites->front_default." alt=".$pokemon->name."></td>"
      ."<td><strong>".ucfirst($pokemon->name)."</strong></td>"
      ."<td><span>".($pokemon->height/10)."</span>m</td>"
      ."<td><span>".($pokemon->weight/10)."</span>Kg</td>"
      ."<td>".$pokeTipo."</td>"
      ."</tr>";

      $index++;
    }
  ?>

</table>
</body>
</html>