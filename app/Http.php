<?php

class Http
{
    public static function redirect($path)
    {
        header("Location:index.php?controller=" . $path);
    }
}
