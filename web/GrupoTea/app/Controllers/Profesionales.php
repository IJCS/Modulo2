<?php

namespace App\Controllers;

use App\Models\usuari;

use App\Models\profes;

class Profesionales extends BaseController
{
  public function create()
  {
    $prof = new profes();
    $UID =  $this->request->getPost('UID');
    $prof -> insert([
      'User_ID' => $UID,
      'Descripción' => $this->request->getPost('Desc'),
    ]);
    $user = new usuari();
    $user->cambiarTipo($UID,'Medic');
    return redirect()->to(base_url());
  }

}
