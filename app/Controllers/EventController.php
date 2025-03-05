<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\EventScheduleModel;
use CodeIgniter\Controller;

class EventController extends Controller
{
    protected $eventModel;
    protected $eventScheduleModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->eventScheduleModel = new EventScheduleModel();
    }

    public function index()
    {
        $specialEvents = $this->eventModel->where('event_type', 'special')->findAll();

        foreach ($specialEvents as &$event) {
            $schedule = $this->eventScheduleModel->where('event_id', $event['id'])->first();
            $event['event_date'] = $schedule['event_date'] ?? null; // Pastikan ada event_date
        }

        $recurringEvents = $this->eventModel->where('event_type', 'recurring')->findAll();

        foreach ($recurringEvents as &$event) {
            $event['schedules'] = $this->eventScheduleModel->where('event_id', $event['id'])->findAll();
        }
        // dd($recurringEvents);

        return view('events/index', [
            'specialEvents' => $specialEvents,
            'recurringEvents' => $recurringEvents
        ]);
    }


    public function new()
    {
        return view('events/form');
    }

    public function create()
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'event_type' => $this->request->getPost('event_type'),
        ];

        $this->eventModel->insert($data);
        $eventId = $this->eventModel->insertID();

        if ($data['event_type'] == 'special') {
            $this->eventScheduleModel->insert([
                'event_id' => $eventId,
                'event_date' => $this->request->getPost('event_date'),
            ]);
        } else {
            $this->eventScheduleModel->insert([
                'event_id' => $eventId,
                'recurrence_type' => $this->request->getPost('recurrence_type'),
                'recurrence_day' => $this->request->getPost('recurrence_day'),
                'recurrence_week' => $this->request->getPost('recurrence_week'),
            ]);
        }

        return redirect()->to('/events')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = $this->eventModel->find($id);
        $schedule = $this->eventScheduleModel->where('event_id', $id)->first();

        return view('events/form', [
            'event' => $event,
            'schedule' => $schedule
        ]);
    }

    public function update($id)
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'location' => $this->request->getPost('location'),
            'event_type' => $this->request->getPost('event_type'),
        ];

        $this->eventModel->update($id, $data);
        $this->eventScheduleModel->where('event_id', $id)->delete();

        if ($data['event_type'] == 'special') {
            $this->eventScheduleModel->insert([
                'event_id' => $id,
                'event_date' => $this->request->getPost('event_date'),
            ]);
        } else {
            $this->eventScheduleModel->insert([
                'event_id' => $id,
                'recurrence_type' => $this->request->getPost('recurrence_type'),
                'recurrence_day' => $this->request->getPost('recurrence_day'),
                'recurrence_week' => $this->request->getPost('recurrence_week'),
            ]);
        }

        return redirect()->to('/events')->with('success', 'Event berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->eventScheduleModel->where('event_id', $id)->delete();
        $this->eventModel->delete($id);

        return redirect()->to('/events')->with('success', 'Event berhasil dihapus!');
    }
}
