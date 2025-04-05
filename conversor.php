<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conversor</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main>
    <header>
      <h1>Valor Convertido</h1>
    </header>
    <?php 
    require __DIR__ ."api.php";

    //Conversão e coleta de dados

    $valueClient = $_GET["valueClient"] ?? 0;

    $cotacao = $data["value"][0]["cotacaoCompra"];
    
    $conversion = $valueClient / $cotacao;
    echo "<ul><li>Valor em Real <strong>R$".number_format($valueClient, 2, ",", ".")."</strong></li>";
    echo "<br><li>Valor convertido <strong>US$".number_format($conversion, 2,",",".")."</strong></li></ul>";
    echo "<p>Cotação atual <strong>R$".number_format($cotacao, 2, ",", ".")."</strong>" ;

    
    ?>
    segundo o <strong><a href="https://www.bcb.gov.br/">Banco Central do Brasil</a></strong></p>
    <button onclick="javascript:document.location.href='index.html'">Voltar</button>
  </main>
</body>
</html>