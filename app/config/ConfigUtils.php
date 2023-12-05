<?php

namespace Config;

use Exception;
use Http;

class ConfigUtils
{
    private static $token;

    public static function token_crf()
    {
        self::$token = bin2hex(uniqid(random_bytes(10)));
        return self::$token;
    }

    public static function verifyToken()
    {
        if (!$_SESSION['authenticated'])
            Http::redirect('home');
    }

    public static function postMapping(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_SERVER['REQUEST_METHOD'] == 'POST'))
            return true;
        return false;
    }

    public static function getMapping(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_SERVER['REQUEST_METHOD'] == 'GET')) {
            extract($_GET);
            return true;
        }
        return false;
    }

    public static function message(string $message, string $type)
    {
        $outPut = "<div class='alert alert-" . $type . " alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h5><i class='icon fa fa-info'></i> Message</h5>";

        if (isset($_SESSION['messageList'])) {
            foreach ($_SESSION['messageList'] as $key => $value) {
                $outPut .= "<ul class='nav flex-column'>
                                <li class='nav-item'> <?= $value ?> <li>
                            </ul>
                        </div>";
            }
            unset($_SESSION['messageList']);
        } elseif (isset($_SESSION['message'])) { ?>
            <div class='alert alert-warning alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h5><i class='icon fa fa-info'></i> Message</h5>
                <?= $_SESSION['message']; ?>
            </div>
<?php unset($_SESSION['message']);
        }
    }
}
