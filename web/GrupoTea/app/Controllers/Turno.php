<?php

namespace App\Controllers;

use App\Models\turnos;

class Turno extends BaseController
{
  public function create()
  {
    $user = new turnos();
    $user -> insert([
      'User' => $this->request->getPost('User'),
      'Medic' => $this->request->getPost('Medic'),
      'Día' => $this->request->getPost('Dia'),
      'Hora' => $this->request->getPost('Hora'),
      'Cobro' => $this->request->getPost('Cargo'),
    ]);
    return redirect()->to(base_url());
  }

}
