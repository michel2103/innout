<?php
//Arquivo responsável por realizar configurações básicas do código,
//definindo constantes e caminhos de pastas, setando a localidade, fuso horário,
//e requisição da conexão com o banco que será feita pelo index e passará por esta pasta
//pois ela define os caminhos dos arquivos.

    //define o fuso horário usado em São Paulo (horário de brasília)
    date_default_timezone_set('America/Sao_Paulo');
    //seta a localidade, língua para a data e 
    //padrão utf-8 de codificação (representa qualquer caractere)
    setLocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

    //Define a pasta models como constante através de __FILE__
    define('MODEL_PATH', realPath(dirName(__FILE__) . '/../models'));
    //faz a requisição do arquivo do banco de dados que será requisitada pelo index
    require_once(realPath(dirName(__FILE__) . '/database.php'));
