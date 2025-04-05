<?php
    //DATA client

    $dateStart = date("m-d-Y", strtotime("-7 days"));
    $dateEnd = date("m-d-Y");

    // API Banco central do Brasil

    $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$dateStart.'\'&@dataFinalCotacao=\''.$dateEnd.'\'&$top=1&$format=json&$select=cotacaoCompra,dataHoraCotacao';

    //Decodificando json e fazendo o request 
    
    $data = json_decode(file_get_contents($url), true);