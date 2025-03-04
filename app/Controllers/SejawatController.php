<?php

namespace App\Controllers;

use App\Models\CadreProfileModel;
use CodeIgniter\Controller;

class SejawatController extends Controller
{
 //   protected $SejawatModel;
   // public function __construct()
 //  {
     // $this->SejawatModel = new CadreProfileModel();
   //}


    public function index()
   {
     // $data['Cadres'] = $this->SejawatModel->findAll();
      return view('front/jejakkabar/sejawat');
   }

   
}
