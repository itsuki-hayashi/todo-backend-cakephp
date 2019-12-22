<?php
declare(strict_types=1);
namespace App\Controller;
use Cake\Http\Response;
/**
 * @property \Cake\Datasource\RepositoryInterface $Todos
 */
class TodosController extends AppController {

    public function getAll(): Response
    {
        $todos = $this->Todos->find()->all();
        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($todos, JSON_UNESCAPED_SLASHES));
        return $response;
    }

    public function get(string $id): Response
    {
        $todo = $this->Todos->get($id);
        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($todo, JSON_UNESCAPED_SLASHES));
        return $response;
    }

    public function create(): Response
    {
        $todos = TableRegistry::getTableLocator()->get('Todos');

    }

    public function deleteAll(): Response
    {
        $rowDeleted = $this->Todos->deleteAll();
    }
    public function delete(string $id): Response
    {
        $rowDeleted = $this->Todos->deleteAll(['id' => $id]);
    }

}
