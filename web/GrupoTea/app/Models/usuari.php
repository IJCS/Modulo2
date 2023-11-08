<?php
namespace App\Models;

use CodeIgniter\Model;

class usuari extends Model
{
    protected $table      = 'usuarios';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['Nombre','Apellido','Mail','Pass','Tipo'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function comprobar($ce,$ps)
    {
      $usuario = $this->db->table('usuarios');
      $usuario->where(['Mail'=> $ce]);
      $dato = $usuario->get()->getRow('Pass');
      if(password_verify($ps,$dato)){
        return true;
      }else{
        return false;
      }
    }

    public function obtenerDatos($ce)
    {
      $usuario = $this->db->table('usuarios');
      $usuario->where(['Mail'=> $ce]);
      $dato= $usuario->get()->getRow();
      return [
        'ID'=>$dato->ID,
        'Tipo'=>$dato->Tipo,
        'logged_in' => TRUE
      ];
    }

    public function obtenerNombre($id)
    {
      $usuario = $this->db->table('usuarios');
      $usuario->where(['ID'=> $id]);
      $dato= $usuario->get()->getRow();
      return $dato->Nombre." ".$dato->Apellido;
    }

    public function listarUsers()
    {
      $usuario = $this->db->table('usuarios');
      $usuario->where(['Tipo'=> 'User']);
      $dato= $usuario->get()->getResult();
      $ret = [];
      foreach ($dato as $dat) {
        array_push($ret,[
          'ID'=>$dat->ID,
          'Nombre'=>$this->obtenerNombre($dat->ID),
        ]);
      }
      return $ret;
    }

    public function cambiarTipo($id,$nt)
    {
      $usuario = $this->db->table('usuarios');
      $usuario->set('Tipo',$nt);
      $usuario->where(['ID'=> $id]);
      $usuario->update();
    }
}
?>
