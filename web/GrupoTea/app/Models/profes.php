<?php
namespace App\Models;

use CodeIgniter\Model;

use App\Models\usuari;

class profes extends Model
{
    protected $table      = 'medicos';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['User_ID','Descripción'];

    public function listar()
    {
      $users = new usuari();
      $profesionales = $this->db->table('medicos');
      $res = $profesionales->get()->getResult();
      $ret = [];
      foreach ($res as $r) {
        array_push($ret,[
          'ID' => $r->ID,
          'Nombre' => $users->obtenerNombre($r->User_ID),
          'Desc' => $r->Descripción
        ]);
      };
      return $ret;
    }

    public function obtenerNombre($id){
    $users = new usuari();
    $profesionales = $this->db->table('medicos');
    $profesionales->where('ID',$id);
    $res = $profesionales->get()->getRow();
    return $users->obtenerNombre($res->User_ID);
    }
}
?>
