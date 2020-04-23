<?php
    //__FILE__ pega o diretório atual do arquivo; 2, volta um nível na árvore
    //passando o valor 1 permace na mesma pasta. Requisita o arquivo config.php
    require_once(dirname(__FILE__, 2) . '/src/config/config.php');
    //requisita o arquivo user.php da pasta models
    require_once(dirName(__FILE__, 2) . '/src/models/user.php');

    //array associativo que vem do construtor da classe "Model"
    $user = new User(['name' => 'Lucas', 'email' => 'lucas@cod3r.com.br']);
    
    //print_r(User::get(['id' => 1], 'name, email'));
    print_r(User::get([], 'name'));
    //foreach(User::get([], 'name') as $users) {
    //    echo $users->name . '<br>';
    //}