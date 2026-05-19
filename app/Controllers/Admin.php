<?php namespace App\Controllers;
use App\Models\TransactionModel;

class Admin extends BaseController {
    
    public function index() {
        // Cek Login
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login');
        }

        $transModel = new TransactionModel();
        // Fungsi getFinancialReport sudah kita buat di Model sebelumnya
        $data = $transModel->getFinancialReport();
        
        return view('admin/dashboard', $data);
    }

    public function add_transaction() {
        $db = \Config\Database::connect();
        
        // 1. Ambil detail service dari DB untuk menghitung biaya
        $serviceId = $this->request->getPost('service_id');
        $service = $db->table('services')->where('id', $serviceId)->get()->getRowArray();
        
        if(!$service) return redirect()->back()->with('error', 'Service tidak ditemukan!');

        // 2. Hitung Komisi (Harga * % Komisi)
        $commissionAmount = $service['price'] * ($service['commission_rate'] / 100);

        // 3. Simpan data (Snapshot harga saat ini agar aman dari perubahan harga di masa depan)
        $data = [
            'service_id' => $serviceId,
            'employee_id' => $this->request->getPost('employee_id'),
            'payment_type' => $this->request->getPost('payment_type'),
            'customer_name' => $this->request->getPost('customer_name'),
            'amount' => $service['price'],
            'material_cost' => $service['material_cost'],
            'depreciation_cost' => $service['depreciation_cost'],
            'commission_amount' => $commissionAmount,
            'transaction_date' => date('Y-m-d H:i:s')
        ];

        $db->table('transactions')->insert($data);

        return redirect()->to('/admin/dashboard')->with('success', 'Transaksi Berhasil Disimpan!');
    }
}