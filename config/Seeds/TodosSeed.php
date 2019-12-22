<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Todos seed.
 */
class TodosSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'get milk'],
            ['title' => 'get bacon'],
            ['title' => 'get coffee']
        ];
        $todos = $this->table('todos');
        $todos->insert($data)
            ->save();
    }
}
