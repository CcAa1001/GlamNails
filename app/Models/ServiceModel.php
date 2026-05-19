<?php namespace App\Models;
use CodeIgniter\Model;

class ServiceModel extends Model {
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'category', 'price', 'description', 'image_url', 'material_cost', 'depreciation_cost', 'commission_rate'];
}