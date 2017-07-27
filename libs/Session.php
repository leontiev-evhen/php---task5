<?php
class Session implements iWorkData
{
    public function saveData($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public function getData($key)
    {
        if($this->checkExistSession($key))
        {
             return $_SESSION[$key];
        }
    }

    public function deleteData($key)
    {
        if($this->checkExistSession($key))
        {
            unset($_SESSION[$key]);
        }
    }

    private function checkExistSession($key)
    {
        if(isset($_SESSION[$key]))
        {
            return true;
        }
        else
        {
            throw new Exception('SESSION is not exist');
        }
    }
}
?>
