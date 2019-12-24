<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Response;

/**
 * @property \Cake\Datasource\RepositoryInterface $Todos
 */
class TodosController extends AppController
{
    public function options(): Response
    {
        $response = $this->response->withStatus(200);
        return $response;
    }

    public function getAll(): Response
    {
        $todos = $this->Todos->find()->all();
        return $this->responseWithJson($todos);
    }

    public function get(string $id): Response
    {
        $todo = $this->Todos->get($id);
        return $this->responseWithJson($todo);
    }

    public function create(): Response
    {
        $jsonData = $this->request->input('json_decode', true);
        $todo = $this->Todos->save($this->Todos->newEntity($jsonData));
        return $this->responseWithJson($this->Todos->get($todo->id));
    }

    public function deleteAll(): Response
    {
        $this->Todos->deleteAll([]);
        return $this->getAll();
    }

    public function delete(string $id): Response
    {
        $this->Todos->deleteAll(['id' => $id]);
        return $this->getAll();
    }

    public function modify(string $id): Response
    {
        $todo = $this->Todos->get($id);
        $jsonData = $this->request->input('json_decode', true);
        $this->Todos->patchEntity($todo, $jsonData);
        return $this->responseWithJson($this->Todos->save($todo));
    }

    private function responseWithJson($value): Response
    {
        return $this
            ->response
            ->withType('application/json')
            ->withStringBody(json_encode($value, JSON_UNESCAPED_SLASHES));
    }
}
