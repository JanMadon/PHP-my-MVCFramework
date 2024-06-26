<?php

use janm\phpmvc\Aplication;

class m0001_initial
{
    public function up( )
    {
        $db = Aplication::$app->db;
        $query = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Aplication::$app->db;
        $query = "DROP TABLE users;";
        $db->pdo->exec($query);
    }

}