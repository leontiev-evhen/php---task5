<?php
class Cookie implements iWorkData
{
    public function saveData($key, $val)
    {
        setcookie($key, $val);
        $_COOKIE[$key, $val];
    }

    public function getData($key)
    {
        if($this->checkExistCookie($key))
        {
             return $_COOKIE[$key];
        }
    }

    public function deleteData($key)
    {
        if($this->checkExistCookie($key))
        {
            unset($_COOKIE[$key]);
        }
    }

    private function checkExistCookie($key)
    {
        if(isset($_COOKIE[$key]))
        {
            return true;
        }
        else
        {
            throw new Exception('COOKIE is not exist');
        }
    }
}
?>
