<?php

    //
    // CRIADO POR github.com/douglasendrew
    //
    // O QUE ESSE SCRIPT FAZ ?
    // R: Esse é um sistema básico que gera nomes aleatórios.
    //

    error_reporting(0);

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'http://gerador-nomes.herokuapp.com/nome/aleatorio', //SITE USADO PARA GERAR OS NOMES
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => 'gzip',
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_HTTPHEADER => array( //PARA PEGAR ESSA PARTE, USE F12 E CLIQUE EM NETWORK. (OBS: EM ALGUNS SITES, PODE SER QUE N TENHA ALGUM DOS ITENS ABAIXO)
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
            'Accept-Encoding: gzip, deflate',
            'Accept-Language: pt-BR,pt;q=0.9',
            'Connection: keep-alive',
            'Host: gerador-nomes.herokuapp.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
        ),
    ));
    $aletoryName = curl_exec($ch); //FECHAMENTO DO CURL, NESSA PARTE, O NOME ESTARÁ NO FORMATO JSON, OU SEJA, ['Nome A', 'Nome B', 'Nome C']
    
    $aletoryNameJson = json_decode($aletoryName, true); //DECODIFICA O JSON

    //ATENÇÃO: NO SITE PEGADO COMO EXEMPLO, FOI RETORNADO OS NOMES COM AS VARIAVEIS 0,1,2. 
    //PODE SER QUE EM OUTROS SITES RETORNEM UM VALOR DIFERENTE.

    $PrimeiroNome = $aletoryNameJson["0"];
    $SegundoNome = $aletoryNameJson["1"];
    $TerceiroNome = $aletoryNameJson["2"];

    //RESULTADO FINAL
    echo $nome = $PrimeiroNome.' '.$SegundoNome.' '.$TerceiroNome;

?>