<?php
class MySql extends Sql implements iWorkData
{
    private $dbh;
    private $typeDb = 'mysql';

    public function __construct ()
    {
        if ($this->dbh = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD_SQL))
        {
           return $this->dbh;
        } 
        else
        {
             throw new Exception('Mysql database error');
        }
    }

    public function saveData ($key, $val)
    {
        $sql = parent::insert($this->typeDb, $key, $val);
        if (empty($this->getData($key)))
        {
             if ($this->dbh->query($sql))
             {
                 return SUCCESS_MESAGE;
             }
             else
             {
                 throw new Exception('Mysql insert error');
             }
        }
    }

    public function getData ($key)
    {
        $sql = parent::select($this->typeDb, $key);
        $result = $this->dbh->prepare($sql);
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            throw new Exception('Mysql select error');
        }
    }

    public function deleteData ($key)
    {
        $sql = parent::delete($this->typeDb, $key);
        if ($this->dbh->query($sql))
        {
            return SUCCESS_MESAGE;
        }
        else
        {
            throw new Exception('Mysql delete error');
        }
    }


}
?>
