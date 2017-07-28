<?php
class Sql
{
    protected function select ($key)
    {
        return 'SELECT mt.key, mt.data FROM '.TABLE.' mt WHERE `key` = "'.$key.'"';
    }


     protected function insert ($key, $val)
    {
        return 'INSERT INTO '.TABLE.' (`key`, `data`) SELECT * FROM (SELECT "'.$key.'", "'.$val.'") AS mt WHERE NOT EXISTS ( SELECT `key` FROM '.TABLE.' WHERE `key`="'.$key.'")';
    }

     protected function delete ($key)
    {
        return 'DELETE FROM '.TABLE.' WHERE `key` = "'.$key.'"';
    }





}
?>
