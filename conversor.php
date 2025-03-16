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

    //DATA client

    $dateStart = date("m-d-Y", strtotime("-7 days"));
    $dateEnd = date("m-d-Y");

    // API Banco central do Brasil

    $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$dateStart.'\'&@dataFinalCotacao=\''.$dateEnd.'\'&$top=1&$format=json&$select=cotacaoCompra,dataHoraCotacao';

    //Decodificando json e fazendo o request 
    
    $data = json_decode(file_get_contents($url), true);

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