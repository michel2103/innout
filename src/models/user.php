<?php
    //requisita o arquivo model.php para extender a classe "Model"
    //atráves da constante MODEL_PATH, definida em config.php
    require_once(realPath(MODEL_PATH . '/model.php'));

    Class User extends Model {
        protected static $tableName = 'users';
        protected static $columns = [
            'id',
            'name',
            'password',
            'email',
            'start_date',
            'end_date',
            'is_admin',
        ];
    }