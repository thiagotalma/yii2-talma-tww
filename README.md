yii2-tww
=============
TWW wrapper for Yii2

[![Latest Stable Version](https://poser.pugx.org/thiagotalma/yii2-tww/v/stable.png)](https://packagist.org/packages/thiagotalma/yii2-tww)
[![Total Downloads](https://poser.pugx.org/thiagotalma/yii2-tww/downloads.png)](https://packagist.org/packages/thiagotalma/yii2-tww)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist thiagotalma/yii2-tww "*"
```

or add

```
"thiagotalma/yii2-tww": "*"
```

to the require section of your `composer.json` file.

Config
------
Use env vars:

`TWW_USUARIO`

`TWW_SENHA`

`TWW_URL`

`TWW_SOAP_ACTION`

`TWW_PORT`

`DEFAULT_TIMEOUT`

Usage
-----
```PHP
$api = new TWWLibrary();
```

```PHP
echo "Altera a senha de usuário. A senha pode ter no máximo 18 caracteres. Retorna um boolean indicando o sucesso da operação.";
$AlteraSenhaResult = $api->AlteraSenha("NovaSenha");
echo "AlteraSenhaResult: $AlteraSenhaResult ";
```

```PHP
echo "Retorna um Objeto chamado OutDataSet contendo uma Tabela chamada BuscaSMSAgenda com UM SMS AGENDADO ESPECIFICADO PELO CAMPO SEUNUM. Retorna Nothing em caso de erro.";
$BuscaSMSAgendaResult = $api->BuscaSMSAgenda("1231");
echo "BuscaSMSAgenda: ";
print_r($BuscaSMSAgendaResult);
```

```PHP
echo "Recebe um Objeto com os campos: SeuNum, e retorna um DataSet chamado OutDataSet contendo a tabela BuscaSMSAgendaDS com mensagens AGENDADAS. Retorna Nothing em caso de erro.";
$BuscaSMSAgendaDataSetResult = $api->BuscaSMSAgendaDataSet(array("123","124","125","126"));
echo "BuscaSMSAgendaDataSetResult: ";
print_r($BuscaSMSAgendaDataSetResult);
```

```PHP
echo "Retorna um Objeto chamado OutDataSet contendo uma Tabela chamada SMSMO com no máximo 400 linhas, com as mensagens SMS MO não lidas, recebidas nos últimos 4 dias como resposta a SMS enviados anteriormente, e marca esses MOs COMO LIDOS. Se houverem 400 linhas na tabela, podem haver mais MOs não lidos, e estes devem ser lidos usando chamadas subsequentes à função. Retorna Nothing em caso de erro.";
$BuscaSMSMONaoLidoResult = $api->BuscaSMSMONaoLido();
echo "BuscaSMSMONaoLidoResult: ";
print_r($BuscaSMSMONaoLidoResult);
```

```PHP
echo "Deleta uma mensagem agendada. Retorna OK ou NOK.";
$DelSMSAgendaResult = $api->DelSMSAgenda("2014-04-19 10:00:00", "123");
echo "DelSMSAgendaResult: $DelSMSAgendaResult";
```

```PHP
echo "Envia uma mensagem para um celular. Retorna OK, NOK, Erro ou NA (não disponível).";
$EnviaSMSResult = $api->EnviaSMS("55119999999999", "Teste Envio!");
echo "EnviaSMSResult: $EnviaSMSResult";
```

```PHP
echo "Envia uma mensagem para um celular, usando 2 campos de referência NUMÉRICOS (SeuNum1 e SeuNum2) de no máximo 24 dígitos cada. Retorna OK, NOK, Erro ou NA (não disponível).";
$EnviaSMS2SNResult = $api->EnviaSMS2SN("55119999999999", "Teste Envio!", "1000", "2000");
echo "EnviaSMS2SNResult: $EnviaSMS2SNResult";
```

```PHP
echo "Envia uma mensagem para um celular com agendamento. Retorna OK, NOK, Erro ou NA (não disponível).";
$EnviaSMSAgeResult = $api->EnviaSMSAge("55119999999999", "Teste Envio!","2014-04-19 10:00:00","123");
echo "EnviaSMSAgeResult: $EnviaSMSAgeResult";
```

```PHP
echo "Envia uma mensagem para um celular com agendamento. Se essa mensagem for mais longa que 140 caracteres, ela será dividida em várias mensagens de até 140 caracteres, com ... separando as mensagens. Retorna OK n (n é o número de SMS enviados pela operação), NOK, Erro ou NA (não disponível).";
$EnviaSMSAgeQuebraResult = $api->EnviaSMSAgeQuebra("55119999999999", "Teste Envio!","2014-04-19 10:00:00","123");
echo "EnviaSMSAgeQuebraResult: $EnviaSMSAgeQuebraResult";
```

```PHP
echo "Envia uma mensagem de texto concatenado com acento para um celular. O campo Serie deve conter um número entre 0 e 255 e deve ser único para cada SMS concatenado enviado, sendo acrescido de 1 a cada envio, e quando atinge 255, comece com 0 (zero) novamente. Se essa mensagem for mais longa que 70 caracteres, ela será dividida em várias mensagens de até 140 caracteres e enviada de forma a chegar concatenada, em uma única mensagem, no celular de destino, desde que a operadora suporte concatenação. Se não houver suporte da operadora, a mensagem será enviada separadamente com + separando as mensagens. Tamanho máximo da mensagem = 4096 caracteres. Retorna OK n (n é o número de SMS enviados pela operação), NOK (usuário ou senha inválidos, ou mensagem maior que 2048 caracteres), Erro ou NA (não disponível).";
$EnviaSMSConcatenadoComAcentoResult = $api->EnviaSMSConcatenadoComAcento("55119999999999",  "Teste Envio éúâêãõ!", 0, "123");
echo "EnviaSMSConcatenadoComAcentoResult: $EnviaSMSConcatenadoComAcentoResult";
```

```PHP
echo "Envia uma mensagem de texto concatenado sem acento para um celular. O campo Serie deve conter um número entre 0 e 255 e deve ser único para cada SMS concatenado enviado, sendo acrescido de 1 a cada envio, e quando atinge 255, comece com 0 (zero) novamente. Se essa mensagem for mais longa que 140 caracteres, ela será dividida em várias mensagens de até 140 caracteres e enviada de forma a chegar concatenada, em uma única mensagem, no celular de destino, desde que a operadora suporte concatenação. Se não houver suporte da operadora, a mensagem será enviada separadamente com + separando as mensagens. Tamanho máximo da mensagem = 4096 caracteres. Retorna OK n (n é o número de SMS enviados pela operação), NOK (usuário ou senha inválidos, ou mensagem maior que 4096 caracteres), Erro ou NA (não disponível).";
$EnviaSMSConcatenadoSemAcentoResult = $api->EnviaSMSConcatenadoSemAcento("55119999999999",  "Teste Envio éúâêãõ!", 0, "123");
echo "EnviaSMSConcatenadoSemAcentoResult : $EnviaSMSConcatenadoSemAcentoResult ";
```

```PHP
echo "Recebe um Objeto com mensagens SMS a serem enviadas, com os seguintes campos: seunum (Seu número com até 20 caracteres), celular (55DDNNNNNNNN), mensagem, agendamento (dd/mm/aaaa hh:mm:ss). Retorna OK n (n é o número de SMSs recebidos), NOK, Erro ou NA (não disponível)";
$DS = new SMSDataSet();
$DS->addRow("123", "55119999999990", "Msg 1");
$DS->addRow("124", "55119999999991", "Msg 2");
$DS->addRow("125", "55119999999992", "Msg 3");
$DS->addRow("126", "55119999999993", "Msg 4");

$EnviaSMSDataSetResult = $api->EnviaSMSDataSet($DS);
echo "EnviaSMSDataSetResult: $EnviaSMSDataSetResult";
```

```PHP
echo "Envia uma mensagem binária para um celular. Tanto o campo Header como o Data devem estar no formato OTA 8 bit, com um número par de caracteres hexadecimais. Retorna OK, NOK, Erro ou NA (não disponível).";
$EnviaSMSOTA8BitResult = $api->EnviaSMSOTA8Bit("55119999999990", "0", "0AE123A");
echo "EnviaSMSOTA8BitResult: $EnviaSMSOTA8BitResult";
```

```PHP
echo "Envia uma mensagem de texto para um celular. Se essa mensagem for mais longa que 140 caracteres, ela será dividida em várias mensagens de até 140 caracteres, com ... separando as mensagens. Tamanho máximo da mensagem = 4096 caracteres. Retorna OK n (n é o número de SMS enviados pela operação), NOK (usuário ou senha inválidos, ou mensagem maior que 4096 caracteres), Erro ou NA (não disponível).";
$EnviaSMSQuebraResult = $api->EnviaSMSQuebra("55119999999990", "Envia uma mensagem de texto para um celular. Se essa mensagem for mais longa que 140 caracteres, ela será dividida em várias mensagens de até 140 caracteres, com ... separando as mensagens.");
echo "EnviaSMSQuebraResult: $EnviaSMSQuebraResult";
```

```PHP
echo "Insere um número de celular na black list. Retorna 1 em caso de sucesso, 0 caso o celular já esteja na black list, -1 em caso de erro.";
$InsBLResult = $api->InsBL("5511988776655");
echo "InsBLResult: $InsBLResult";
```

```PHP
echo "Recebe um XML com mensagens SMS a serem enviadas, com os seguintes campos: seunum (Seu número com até 20 caracteres), celular (55DDNNNNNNNN), mensagem, agendamento (dd/mm/aaaa hh:mm:ss). Retorna OK n (n é o número de SMSs recebidos), NOK, Erro ou NA (não disponível)";
$XML = "
<lote>
        <sms>
          <seunum>1234</seunum>
          <celular>551199999999</celular>
          <mensagem>Teste TWW 01</mensagem>
          <agendamento>2010-09-28 12:15:00</agendamento>
        </sms>
        <sms>
          <seunum>1235</seunum>
          <celular>551199999999</celular>
          <mensagem>Teste TWW 02</mensagem>
          <agendamento>2010-09-28 12:15:00</agendamento>
        </sms>
        <sms>
          <seunum>1236</seunum>
          <celular>551199999999</celular>
          <mensagem>Teste TWW 03</mensagem>
          <agendamento>2010-09-28 12:15:00</agendamento>
        </sms>
        <sms>
          <seunum>1237</seunum>
          <celular>551199999999</celular>
          <mensagem>Teste TWW 04</mensagem>
          <agendamento>2010-09-28 12:15:00</agendamento>
        </sms>
</lote>
";
$EnviaSMSXMLResult = $api->EnviaSMSXML($XML);
echo "EnviaSMSXMLResult: $EnviaSMSXMLResult";
```

```PHP
echo "Reseta o status de LIDO dos SMS MO desde 1 dia atrás até o momento atual. Retorna OK ou NOK em caso de erro.<p/>";
$ResetaMOLidoResult = $api->ResetaMOLido();
echo "ResetaMOLidoResult: $ResetaMOLidoResult";
```

```PHP
echo "Reseta o status de LIDO dos Status de SMS desde 1 dia atrás até a data atual. Retorna OK ou NOK em caso de erro.";
$ResetaStatusLidoResult = $api->ResetaStatusLido();
echo "ResetaStatusLidoResult: $ResetaStatusLidoResult";
```

```PHP
echo "Retorna um Objeto chamado OutDataSet contendo a tabela StatusSMS com o status de UM SMS já transmitido. Retorna Nothing em caso de erro.";
$StatusSMSResult = $api->StatusSMS("123");
echo "StatusSMSResult: ";
//print_r( $StatusSMSResult);
echo "<table>";
echo "<tr><th>SEUNUM</th><th>CELULAR</th><th>MENSAGEM</th><th>STATUS</th><th>DATAREC</th><th>DATAENV</th><th>DATASTATUS</th><th>OP</th></tr>";
foreach($StatusSMSResult->StatusSMS as $row) {
    $linha="<tr>";
               $linha.="<td>".$row->seunum."</td>";
               $linha.="<td>".$row->celular."</td>";
               $linha.="<td>".$row->mensagem."</td>";
               $linha.="<td>".$row->status."</td>";
               $linha.="<td>".$row->datarec."</td>";
               $linha.="<td>".$row->dataenv."</td>";
               $linha.="<td>".$row->datastatus."</td>";
               $linha.="<td>".$row->op."</td>";
    $linha.="</tr>";
    echo $linha;
}
echo "</table>";
```

```PHP
echo "Retorna um Objeto chamado OutDataSet contendo a tabela StatusSMS com o status de UM SMS já transmitido. Retorna Nothing em caso de erro.";
$StatusSMS2SNResult = $api->StatusSMS2SN("1000", "2000");
echo "StatusSMS2SNResult: ";
echo "<table>";
echo "<tr><th>SEUNUM</th><th>CELULAR</th><th>MENSAGEM</th><th>STATUS</th><th>DATAREC</th><th>DATAENV</th><th>DATASTATUS</th><th>OP</th></tr>";
foreach($StatusSMS2SNResult->StatusSMS as $row){
    $linha="<tr>";
               $linha.="<td>".$row->seunum."</td>";
               $linha.="<td>".$row->celular."</td>";
               $linha.="<td>".$row->mensagem."</td>";
               $linha.="<td>".$row->status."</td>";
               $linha.="<td>".$row->datarec."</td>";
               $linha.="<td>".$row->dataenv."</td>";
               $linha.="<td>".$row->datastatus."</td>";
               $linha.="<td>".$row->op."</td>";
    $linha.="</tr>";
    echo $linha;
}
echo "</table>";
```

```PHP
echo "Retorna um DataSet chamado OutDataSet contendo a tabela StatusSMS com no máximo 400 linhas, contendo somente os status de SMS dos últimos 4 dias que ainda não tenham sido lidos, e os MARCA COMO LIDOS. Se houverem 400 linhas na tabela, podem haver mais status não lidos, e estes devem ser lidos usando chamadas subsequentes à função. Retorna Nothing em caso de erro.";
$StatusSMSNaoLidoResult = $api->StatusSMSNaoLido ("123","1236");
echo "StatusSMSNaoLidoResult : ";
echo "<table>";
echo "<tr><th>SEUNUM</th><th>CELULAR</th><th>MENSAGEM</th><th>STATUS</th><th>DATAREC</th><th>DATAENV</th><th>DATASTATUS</th><th>OP</th></tr>";
foreach($StatusSMSNaoLidoResult->StatusSMS as $row) {
    $linha="<tr>";
               $linha.="<td>".$row->seunum."</td>";
               $linha.="<td>".$row->celular."</td>";
               $linha.="<td>".$row->mensagem."</td>";
               $linha.="<td>".$row->status."</td>";
               $linha.="<td>".$row->datarec."</td>";
               $linha.="<td>".$row->dataenv."</td>";
               $linha.="<td>".$row->datastatus."</td>";
               $linha.="<td>".$row->op."</td>";
    $linha.="</tr>";
    echo $linha;
}
echo "</table>";
```

```PHP
echo "Retorna um Array com os celulares incluidos na black list. Retorna Nothing em caso de erro.";
$VerBLResult=$api->VerBL();
print_r($VerBLResult);
```

```PHP
echo "Verifica os créditos de um Usuário Pré-Pago. Retorna o número de créditos ou -1 se o Usuário não for do tipo Pré-Pago ou -2 em caso de erro nos parâmetros.";
$VerCreditoResult = $api->VerCredito();
echo "VerCreditoResult: $VerCreditoResult";
```

```PHP
echo "Retorna a data de validade dos créditos de um Usuário Pré-Pago. Retorna Nothing se o Usuário não for do tipo Pré-Pago ou caso haja erro nos parâmetros.";
$VerValidadeResult = $api->VerValidade();
echo "VerValidadeResult: $VerValidadeResult";
```
