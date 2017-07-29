<?php
class PostgreSql extends Sql implements iWorkData
{
    private $dbh;
    private $typeDb = 'postgresql';

    public function __construct ()
    {
        if ($this->dbh = new PDO('pgsql:host='.HOST.'; dbname='.DB.'; user='.USER_PG.'; password='.PASSWORD_PSQL))
        {
            return $this->dbh;
        }
        else
        {
            throw new Exception('Postgresql database error');
        }
    }

    public function saveData ($key, $val)
    {
        $sql = parent::insert($this->typeDb, $key, $val);
        if ($this->dbh->query($sql))
        {
            return SUCCESS_MESAGE;
        }
        else
        {
            throw new Exception('Postgresql insert error');
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
            throw new Exception('Postgresql select error');
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
            throw new Exception('Postgresql delete error');
        }
    }

}