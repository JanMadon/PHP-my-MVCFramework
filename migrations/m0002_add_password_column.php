<?php

use janm\phpmvc\Aplication;

class m0002_add_password_column
{
    public function up( )
    {
        $db = Aplication::$app->db;
        $query = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Aplication::$app->db;
        $query = "ALTER TABLE users DROP COLUMN password;";
        $db->pdo->exec($query);
    }

}