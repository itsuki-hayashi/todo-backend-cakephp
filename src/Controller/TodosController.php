<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * @property \Cake\Datasource\RepositoryInterface $Todos
 */
class TodosController extends AppController
{

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
        $jsonData = $this->request->input('json_decode', true);
        $todo = $this->Todos->newEntity($jsonData);
        $this->Todos->save($todo);
        return $this->getAll();
    }

    public function deleteAll(): Response
    {
        $rowDeleted = $this->Todos->deleteAll();
        return $this->getAll();
    }

    public function delete(string $id): Response
    {
        $rowDeleted = $this->Todos->deleteAll(['id' => $id]);
        return $this->getAll();
    }

    public function modify(string $id): Response
    {
        $todo = $this->Todos->get($id);
        $jsonData = $this->request->input('json_decode', true);
        $this->Todos->patchEntity($todo, $jsonData);
        $this->Todos->save($todo);
        return $this->getAll();
    }

}
