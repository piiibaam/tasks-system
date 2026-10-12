<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', $data);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => trim($this->request->getPost('title')),
            'status' => 'Pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('message', 'Task created successfully.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to(site_url('tasks'))
                ->with('error', 'Task not found.');
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to(site_url('tasks'))
                ->with('error', 'Task not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title' => trim($this->request->getPost('title')),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('message', 'Task updated successfully.');
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to(site_url('tasks'))
                ->with('error', 'Task not found.');
        }

        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to(site_url('tasks'))
            ->with('message', 'Task archived successfully.');
    }

    public function archives()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 1)
            ->orderBy('task_date', 'DESC')
            ->findAll();

        return view('tasks/archives', $data);
    }
        public function unarchive($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 1)
            ->find($id);

        if (!$task) {
            return redirect()->to(site_url('archives'))
                ->with('error', 'Archived task not found.');
        }

        $taskModel->update($id, [
            'is_archived' => 0
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('message', 'Task restored to All Tasks successfully.');
    }
}