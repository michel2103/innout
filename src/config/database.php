<?php
//Arquivo com funções para realizar a conexão com o banco de dados e realizar as consultas,
//outras partes do código solicitarão os métodos contidos na classe Database

    class Database {
        //função para fazer conexão com o banco de dados
        public static function getConnection() {
            //__FILE__ pega o diretório onde ela está localizada
            $envPath = realPath(dirName(__FILE__) . '/../env.ini');
            //Mostra o caminho que a pasta env.ini está, através do parâmetro
            $env = parse_ini_file($envPath);
            //Parâmetros para realizar a conexão através das chaves na pasta env.ini
            $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);
            //verifica se houve algum erro na conexão
            if($conn->connect_error) {
                //Para o processo de renderização e mostra o erro na tela
                die("Erro: " . $conn->connect_error);
            }
            //caso não tenha erro, retorna a conexão
            return $conn;
        }
        //função para pegar o resultado da consulta no banco de dados
        public static function getResultFromQuery($sql) {
            //armazena na variável $conn o retorno da função de conexão da própria classe
            //usando o Self:: para acessar um atributo de classe (estático)
            $conn = self::getConnection();
            //executa a consulta através do método Query com o parâmetro $sql (definido no getResultQuery())
            $result = $conn->query($sql);
            //fecha a conexão com o banco de dados
            $conn->close();
            //retorna o resultado da consulta ao banco de dados
            return $result;
        }
    }

