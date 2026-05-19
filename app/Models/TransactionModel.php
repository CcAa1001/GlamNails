<?php namespace App\Models;
use CodeIgniter\Model;

class TransactionModel extends Model {
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['service_id', 'employee_id', 'payment_type', 'customer_name', 'amount', 'material_cost', 'depreciation_cost', 'commission_amount', 'transaction_date'];

    public function getFinancialReport() {
        $db = \Config\Database::connect();
        $revenue = $this->selectSum('amount')->first()['amount'] ?? 0;
        
        $cogsQuery = $this->selectSum('material_cost')->selectSum('depreciation_cost')->selectSum('commission_amount')->first();
        $cogs = ($cogsQuery['material_cost'] ?? 0) + ($cogsQuery['depreciation_cost'] ?? 0) + ($cogsQuery['commission_amount'] ?? 0);
        
        $op_expense = $db->table('expenses')->selectSum('amount')->get()->getRow()->amount ?? 0;

        return [
            'revenue' => $revenue,
            'cogs' => $cogs,
            'op_expense' => $op_expense,
            'net_profit' => $revenue - $cogs - $op_expense
        ];
    }
}