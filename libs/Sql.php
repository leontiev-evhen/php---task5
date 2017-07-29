<?php
class Sql
{
    private $arrayTypeDb = [
        'mysql',
        'postgresql'
    ];
    
    protected function select ($typeDb, $key)
    {
        if ($this->checkTypeDb($typeDb))
        {
            if ($typeDb == 'mysql') 
            {
                return 'SELECT mt.key, mt.data FROM '.TABLE.' mt WHERE `key` = "'.$key.'" LIMIT 1';
            }
            else
            {
                return 'SELECT mt.key, mt.data FROM "'.TABLE_PG.'" mt WHERE key = \''.$key.'\' LIMIT 1';
            }
            
        }
        
    }


     protected function insert ($typeDb, $key, $val)
    {
        if ($this->checkTypeDb($typeDb)) 
        {
            if ($typeDb == 'mysql')
            {
                return 'INSERT INTO ' . TABLE . ' (`key`, `data`) SELECT * FROM (SELECT "' . $key . '", "' . $val . '") AS mt WHERE NOT EXISTS ( SELECT `key` FROM ' . TABLE . ' WHERE `key`="' . $key . '")';
            }
            else
            {
                return 'INSERT INTO "' . TABLE_PG . '" (key, data) SELECT * FROM (SELECT \'' . $key . '\', \'' . $val . '\') AS mt WHERE NOT EXISTS ( SELECT key FROM "' . TABLE_PG . '" WHERE key=\'' . $key . '\')';
            }
        }
    }

    protected function delete ($typeDb, $key)
    {
        if ($this->checkTypeDb($typeDb)) 
        {
            if ($typeDb == 'mysql')
            {
                return 'DELETE FROM ' . TABLE . ' WHERE `key` = "' . $key . '"';
            }
            else
            {
                return 'DELETE FROM "' . TABLE_PG . '" WHERE key = \'' . $key . '\'';
            }
         }
    }

    private function checkTypeDb($typeDb)
    {
        if (in_array($typeDb, $this->arrayTypeDb)) 
        {
            return true;
        } 
        else 
        {
            throw new Exception('Undefined type DB - '.$typeDb);
        }
    }


}
?>
