<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\RESTful\ResourceController;

class EventController extends ResourceController
{
    protected $modelName = 'App\Models\EventModel';
    protected $format    = 'html'; // Change to 'json' if you plan to return JSON responses.

    // GET /events
    public function index()
    {
        $data['events'] = $this->model->orderBy('created_at', 'DESC')->findAll();
        return view('events/index', $data);
    }
    
    public function eventRutin()
    {
        $data['events'] = $this->model->where('category', 'Rutin')->orderBy('created_at', 'DESC')->findAll();
        return view('event/rutin', $data);
    }

    public function eventSpesial()
    {
        $data['events'] = $this->model->where('category', 'Spesial')->orderBy('created_at', 'DESC')->findAll();
        return view('event/spesial', $data);
    }
    // GET /events/new
    public function new()
    {
        return view('events/new');
    }

    // POST /events
    public function create()
    {
        $data = [
            'name'        => $this->request->getPost('name'),
            'date'        => $this->request->getPost('date'),
            'location'    => $this->request->getPost('location'),
            'description' => $this->request->getPost('description'),
            'user_id'     => session()->get('user_id') // or retrieve the logged in user id
        ];

        if (! $this->model->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->to('/events')->with('message', 'Event created successfully!');
    }

    // GET /events/{id}
    public function show($id = null)
    {
        $event = $this->model->find($id);
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Event with id $id not found.");
        }

        return view('events/show', ['event' => $event]);
    }

    // GET /events/{id}/edit
    public function edit($id = null)
    {
        $event = $this->model->find($id);
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Event with id $id not found.");
        }

        return view('events/edit', ['event' => $event]);
    }

    // PUT/PATCH /events/{id}
    public function update($id = null)
    {
        $event = $this->model->find($id);
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Event with id $id not found.");
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'date'        => $this->request->getPost('date'),
            'location'    => $this->request->getPost('location'),
            'description' => $this->request->getPost('description'),
            // Usually, user_id remains unchanged
        ];

        if (! $this->model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->to('/events')->with('message', 'Event updated successfully!');
    }

    // DELETE /events/{id}
    public function delete($id = null)
    {
        $event = $this->model->find($id);
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Event with id $id not found.");
        }

        $this->model->delete($id);
        return redirect()->to('/events')->with('message', 'Event deleted successfully!');
    }
}
