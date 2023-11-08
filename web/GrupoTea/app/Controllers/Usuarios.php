<?php

namespace App\Controllers;

use App\Models\usuari;

class Usuarios extends BaseController
{
  public function create()
  {
    $user = new usuari();
    if($this->validate('register')){
      $user -> insert([
        'Nombre' => $this->request->getPost('NN'),
        'Apellido' => $this->request->getPost('NA'),
        'Pass' => password_hash($this->request->getPost('Passr'), PASSWORD_DEFAULT),
        'Mail' => $this->request->getPost('CEr'),
        'Tipo' => 'User'
      ]);
      return redirect()->to(base_url());
    }else{
      return redirect()->to(base_url())->with('errors', $this->validator->getErrors());
    }
  }

  public function modify()
  {
    $user = new usuari();
    $user -> Set([
        'Nombre' => $this->request->getPost('Nombre'),
        'Apellido' => $this->request->getPost('Apellido'),
        'Mail' => $this->request->getPost('Mail')
      ]);
      $user->where('ID',$this->request->getPost('ID'));
      $user->update();
      return redirect()->to(base_url());
    }

  public function login()
  {
    $user = new usuari();
    $session = session();
    $corr = $this->request->getPost('CE');
    $pass = $this->request->getPost('Pass');
    if($user->comprobar($corr,$pass))
    {
      $session->set($user->obtenerDatos($corr));
      return redirect()->to(base_url())->withInput();
    }else{
      return redirect()->to(base_url())->with('message', "Credenciales Incorrectas"); ;
    };
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to(base_url());
  }

}
