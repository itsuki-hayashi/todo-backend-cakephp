<?php
declare(strict_types=1);
namespace App\Controller;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

class TodosController extends AppController {
    public function getAll(): Response
    {
        $todos = TableRegistry::getTableLocator()->get('Todos');
        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($todos->find()));
        return $response;
    }

    public function get(string $id): Response
    {
        $todos = TableRegistry::getTableLocator()->get('Todos');
        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($todos->findById($id)->first()));
        return $response;
    }

}
