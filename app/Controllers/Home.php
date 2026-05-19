<?php namespace App\Controllers;
use App\Models\ServiceModel;
use App\Models\ReservationModel;

class Home extends BaseController {
    
    public function index() {
        $model = new ServiceModel();
        $data['services'] = $model->findAll();
        // Mengirim data harga untuk slider pricing
        $data['pricing'] = $data['services']; 
        return view('landing_page', $data);
    }

    public function book() {
        $model = new ReservationModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'reservation_time' => $this->request->getPost('time'),
            'people' => $this->request->getPost('people'),
            'service_name' => $this->request->getPost('service')
        ];
        $model->save($data);
        return redirect()->to('/')->with('success', 'Booking Confirmed! We will contact you shortly.');
    }
}