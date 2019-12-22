<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Todo extends Entity {
    protected $_hidden = ['created_at', 'updated_at'];
    protected $_virtual = ['url'];
    protected function _getUrl(): string
    {
        return  self::getBaseUrl().'/'. $this->id;
    }

    private static function  getBaseUrl(){

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';

    // return: http://localhost/myproject/
    return $protocol.$hostName;
}
}
