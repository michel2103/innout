<?php
//Arquivo responsável pelas políticas de negócio, todas as regras de acesso a banco de dados
//e funções para obter estes dados estão presentes na classe principal "Model". Esta classe
//irá herdar suas funções para outros métodos em outros locais do código onde sejam necessárias.

    class Model  {
        //atributos que fazem o mapeamento do banco
        //com o nome da tabela, coluna e valor
        protected static $tableName = '';
        protected static $columns = [];
        //não é estático porque vai pertencer a cada instância criada
        protected $values = [];
        //vai chamar a função loadFromArray para carregar os valores definidos no array
        //($arr) para a variável $values
        function __construct($arr) {
            $this->loadFromArray($arr);
        }
        //
        public function loadFromArray($arr) {
            //testa se o array está setado
            if($arr) {
                //para cada chave que o array ($arr) percorrer passa o valor dela para a variável $values
                foreach($arr as $key => $value) {
                    //$value vai reter todos os valores passados pelo construtor ou pela chamada direta do método
                    $this->$key = $value;
                }
            }
        }
        //método mágico para ler dados em propriedades inacessíveis
        //caso o array esteja inacessível, o get e chamado
        public function __get($key) {
            return $this->values[$key];
        }
        //será chamado ao tentar alterar o valor de uma posição do array que não está acessível
        public function __set($key, $value) {
            $this->values[$key] = $value;
        }

        //
        public static function get($filters = [], $columns = '*') {
            $objects = [];
            //$result recebe o valor da função getResult com os parâmetros filters e columns
            $result = static::getResultSetFromSelect($filters, $columns);
            //se retornar resultado (setado)
            if($result) {
                //$class recebe a classe que foi chamada
                $class = get_called_class();
                //enquanto $row recebe um array associativo (combinação das colunas e valores) do DB armazenado
                //em $result.
                while($row = $result->fetch_assoc()) {
                    //Vai criar objetos do tipo da classe que chamou o método "get", passando o $row (DB)
                    //como o parâmetro do construtor da classe "Model" chamado pela classe que extends a "Model"
                    array_push($objects, new $class($row));
                }
            }//retorna os objeto criados no array_push com os atributos do array $row 
            return $objects;
        }
        //método para retornar o resultado do select que será feito no banco de dados
        public static function getResultSetFromSelect($filters = [], $columns = '*') {
            //armazena em $sql a concatenação do select com as colunas (parâmetro de getResult)
            $sql = "SELECT ${columns} FROM " 
            //o nome da tabela definido em "user.php" através do atributo da classe "User" (static::)
            . static::$tableName 
            //função dos filtros (WHERE) definidas abaixo (parâmetro de getResult)
            . static::getFilters($filters);

            //armazena resultado do select no banco de dados com o parâmetro $sql
            $result = Database::getResultFromQuery($sql);
            //verifica se o número de linhas retornado da consulta é zero
            //retorna nulo ou o valor do 4result
            if($result->num_rows === 0) {
                return null;
            } else {
                return $result;
            }
        }
        //função para filtrar o select do banco de dados
        private static function getFilters($filters) {
            $sql = '';
            if(count($filters) > 0) {
                //obriga colocar um "AND" antes do próximo filtro ser passado
                $sql .= " WHERE 1 = 1";
                //para cada coluna e valor passado é gerado um WHERE personalizado
                foreach($filters as $column => $value) {
                    //concatena as condições que forem passadas com a coluna e o valor
                    //função getFormat trata o valor para saber qual o tipo que está vindo
                    $sql .= " AND ${column} = " . static::getFormatedValue($value);
                }
            }
            return $sql;
        }
        //função para tratar os valores passados das colunas no select do banco de dados
        private static function getFormatedValue($value) {
            //se o valor for nulo, retorna nulo
            if(is_null($value)) {
                return "null";
            //se o valor for uma string, retorna o valor entre 'aspas' (necessário para o sql no banco)
            } elseif(getType($value) === 'string') {
                return "'${$value}'";
            //se não for nenhum retorna o próprio valor
            } else {
                return $value;
            }
        }
    }
