<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Todo extends Entity {
    protected $_hidden = ['id', 'created_at', 'updated_at'];
}
