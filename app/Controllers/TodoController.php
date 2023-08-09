<?php

namespace App\Controllers;

use App\Models\TodoModel;

class TodoController extends BaseController
{
    public function index()
    {
        $todoModel = new TodoModel();
        $data = [
            'user' => $this->user, // Assuming $this->user contains the user data
            'title' => 'Agenda RW',
            'todos' => $todoModel->findAll(), // Fetching the organizations data from the model
        ];
        return view('todo/index', $data);
    }

    public function create()
    {
        $todoModel = new TodoModel();
        $data = [
            'user' => $this->user, // Assuming $this->user contains the user data
            'title' => 'Agenda RW',
            'todos' => $todoModel->findAll(), // Fetching the organizations data from the model
        ];
        return view('todo/create', $data);
    }

    public function store()
    {
        $todoModel = new TodoModel();

        $task = $this->request->getPost('task');
        $todoModel->insert(['task' => $task]);

        return redirect()->to(base_url('TodoController'));
    }

    public function update($id)
    {
        $todoModel = new TodoModel();

        // Get the updated task and completed status from the form
        $task = $this->request->getPost('task');
        $completed = $this->request->getPost('completed') === 'on' ? 1 : 0;

        // Prepare the data to be updated
        $data = [
            'task' => $task,
            'completed' => $completed
        ];

        // Perform the update operation
        $todoModel->update($id, $data);

        return redirect()->to(base_url('TodoController'));
    }

    public function edit($id)
    {
        {
            // Load the model and get the data for the specific todo item with the given ID
            $todoModel = new TodoModel();
            $todo = $todoModel->find($id);
    
            // If the $todo variable is not found, you may want to handle that case appropriately
            if (!$todo) {
                // For simplicity, let's just redirect to a 404 page
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
    
            $data = [
                'user' => $this->user, // Assuming $this->user contains the user data
                'title' => 'Agenda RW',
                'todos' => $todoModel->findAll(), // Fetching the todos data from the model
                'todo' => $todo, // Pass the $todo variable to the view
            ];
    
            // Pass the $data array to the view
            return view('todo/edit', $data);
        }
    
    }

    public function delete($id)
    {
        $todoModel = new TodoModel();
        $todoModel->delete($id);

        return redirect()->to(base_url('TodoController'));
    }



    private function bubbleSort($array)
    {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if (strcmp($array[$j]['title'], $array[$j + 1]['title']) > 0) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
}
