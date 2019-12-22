<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTodos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/4/en/phinx/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $tables = $this->table('todos');
        $tables->addColumn(
            'title', 'string', ['encoding' => 'utf8mb4']
        )->addColumn(
            'completed', 'boolean'
        )->addColumn(
            'order', 'integer'
        )->addColumn(
            'created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP']
        )->addColumn(
            'updated_at', 'timestamp',
            ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP']
        )->create();
    }
}
