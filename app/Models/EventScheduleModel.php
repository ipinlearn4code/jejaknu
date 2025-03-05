<?php

namespace App\Models;

use CodeIgniter\Model;

class EventScheduleModel extends Model
{
    protected $table = 'event_schedules';
    protected $primaryKey = 'id';
    protected $allowedFields = ['event_id', 'event_date', 'recurrence_type', 'recurrence_day', 'recurrence_week'];
}
