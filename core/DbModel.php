<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string;

    abstract public function attributes(): array;

    abstract static public function primaryKey(): string;
    public function save(): true
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr)=>":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName(".implode(',', $attributes).") 
                    VALUES(".implode(',', $params).")");

        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

        return true;
    }

    static public function findOne($where) // []
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode('AND', array_map(fn($attr) => "$attr = :$attr", $attributes));

        // SELECT * FROM $tableName WHERE email = :email And firstName =:firstName
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item ){
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
//        dd($statement->fetchObject(static::class));
//        exit();
        // TODO: // tu nieby jest to przestażały sposób  i się pruje
        // coś trzba pedzie polyśleć pewnie jakieś setery i getery ustawić
        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql)
    {

        return Aplication::$app->db->pdo->prepare($sql);
    }


}