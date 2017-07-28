<?php
class MySql extends Sql implements iWorkData
{
    private $dbh;

    public function __construct ()
    {
        if ($this->dbh = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSWORD_SQL))
        {
           return $this->dbh;
        } 
        else
        {
             throw new Exception('Database error');
        }
    }

    public function saveData ($key, $val)
    {
        $sql = parent::insert($key, $val);
        if ($this->dbh->query($sql))
        {
            return SUCCESS_MESAGE;
        }
        else
        {
            throw new Exception('Insert error');
        }
    }

    public function getData ($key)
    {
        $sql = parent::select($key);
        $result = $this->dbh->prepare($sql);
        if ($result->execute())
        {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            throw new Exception('Select error');
        }
    }

    public function deleteData ($key)
    {
        $sql = parent::delete($key);
        if ($this->dbh->query($sql))
        {
            return SUCCESS_MESAGE;
        }
        else
        {
            throw new Exception('Delete error');
        }
    }


}
?>
