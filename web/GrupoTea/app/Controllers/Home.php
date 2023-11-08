<?php

namespace App\Controllers;

use App\Models\profes;
use App\Models\usuari;
use App\Models\turnos;


class Home extends BaseController
{
    public function index(): string
    {
      $prof = new profes();
      $public = [
        'Título' => 'Grupo Tea: Atención Oftalmológica'
      ];
      $home = [
        'Profs'=> $prof->listar(),
      ];
      echo view('public/head',$public);
      return view('public/home',$home);
    }

    public function somos()
    {
      $public = [
        'Título' => 'Grupo Tea: ¿Quiénes somos?'
      ];
      echo view('public/head',$public);
      return view('public/somos');
    }

    public function acerca()
    {
      $public = [
        'Título' => 'Grupo Tea: Acerca de'
      ];
      echo view('public/head',$public);
      return view('public/acerca');
    }

    public function perfil()
    {
      $public = [
        'Título' => 'Grupo Tea: Acerca de'
      ];
      $prof = new profes();
      $user = new usuari();
      $turn = new turnos();
      $Admin = [
        'Profs'=> $prof->listar(),
        'Users'=> $user->listarUsers(),
      ];
      $Medic = [
        'Turnos' =>[
          $turn->listar('2023-11-20',session()->get('ID')),
          $turn->listar('2023-11-21',session()->get('ID')),
          $turn->listar('2023-11-22',session()->get('ID')),
          $turn->listar('2023-11-23',session()->get('ID')),
          $turn->listar('2023-11-24',session()->get('ID')),
          $turn->listar('2023-11-25',session()->get('ID')),
        ],
      ];

      $Client = [
        'User' => $turn->listarUser(session()->get('ID')),
      ];
      echo view('public/head',$public);
      if(session()->get('Tipo') == 'Admin'){
        return view('admin/room',$Admin);
      }elseif(session()->get('Tipo') == 'Medic'){
        return view('admin/medic',$Medic);
      }elseif(session()->get('Tipo') == 'User'){
        return view('admin/client',$Client);
      }else{
        return redirect()->to(base_url());
      }
    }
}
