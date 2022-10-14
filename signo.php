<!DOCTYPE html>
<html>
<head>
	<title>Seu signo - Resposta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
  <h1>Seu signo</h1>
</header>
  <section class="container">
  	<?php
      $xml = simplexml_load_file('index.xml');
      $birthday = strtotime($_GET['birthday']);
  		foreach($xml->signo as $gap):
        list($diaInicio, $mesInicio) = explode("/", $gap->dataInicio);
        list($diaFinal, $mesFinal) = explode("/", $gap->dataFim);
        $diaInicio = strtotime("{$mesInicio}/{$diaInicio}");
        $diaFinal = strtotime("{$mesFinal}/{$diaFinal}");
        if (($birthday >= $diaInicio) && ($birthday <= $diaFinal) || ($gap->signoNome == 'Capricornus' && (($birthday >= $diaInicio) || ($birthday <= $diaFinal)))) {
          echo '<p><b>Signo:</b> ' . $gap->signoNome . '</p>';
          echo '<p><b>Período entre: </b>' . $gap->dataInicio . ' e ' . $gap->dataFim . '</p>';
          echo '<p><b>Descrição:</b> ' . $gap->descricao . '</p>';
          echo '</div>';
        }
  		endforeach;
  	?>
  </section>
</body>

<style>
  body {
    text-align: center;
    display: flex;
    flex-direction: column;
    background-color: bisque;
    color: darkslategray;
  }
</style>
</html>
