<?php namespace App\Models;
use CodeIgniter\Model;

class ReservationModel extends Model {
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'phone', 'reservation_time', 'people', 'service_name', 'status'];
}