<?php
namespace App\Models;

use CodeIgniter\Model;

use App\Models\usuari;
use App\Models\profes;

class turnos extends Model
{
    protected $table      = 'turnos';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['User','Medic','Día','Hora','Cobro'];

    public function listar($day,$med)
    {
      $users = new usuari();
      $profesionales = $this->db->table('turnos');
      $profesionales->where('Día',$day);
      $profesionales->where('Medic',$med);
      $profesionales->orderBy('Hora','ASC');
      $res = $profesionales->get()->getResult();
      $ret = [];
      foreach ($res as $r) {
        array_push($ret,[
          'Nombre' => $users->obtenerNombre($r->User),
          'Cobro' => $r->Cobro,
          'Hora' => $r->Hora
        ]);
      };
      return $ret;
    }

    public function listarUser($id)
    {
      $prof = new usuari();
      $profesionales = $this->db->table('turnos');
      $profesionales->where('User',$id);
      $profesionales->orderBy('Día','ASC');
      $profesionales->orderBy('Hora','ASC');
      $res = $profesionales->get()->getResult();
      $ret = [];
      foreach ($res as $r) {
        array_push($ret,[
          'Medico' => $prof->obtenerNombre($r->Medic),
          'Cobro' => $r->Cobro,
          'Día' => $r->Día,
          'Hora' => $r->Hora,
        ]);
      };
      return $ret;
    }


}
?>
