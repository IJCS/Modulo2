import {pool} from './db.js';

class UsuariosController{
  async getAll(req, res){
    const [result] = await pool.query('SELECT * FROM usuarios');
    res.json(result);
  }

  async getOne(req, res){
    try {
      const carga = req.body;
      if(!carga.ID){
        throw new Error("ID Requerido");
      }
      const [result] = await pool.query(`SELECT * FROM usuarios WHERE id=(?)`,[carga.ID]);
      res.json(result);
    } catch (e) {
      res.json({"Error":e.message});
      console.log("Error:" + e.message);
    }
  }



  async add(req, res){
    try {
      const carga = req.body;

      if(!carga.Nombre || !carga.Apellido || !carga.Tipo || !carga.Mail || !carga.Pass){
        throw new Error("Datos Requeridos");
      }
      const [result] = await pool.query(`INSERT INTO usuarios (Nombre , Apellido , Mail , Pass , Tipo ) VALUES (?, ?, ?, ?, ?)`,[carga.Nombre,carga.Apellido,carga.Mail,carga.Pass,carga.Tipo]);
      res.json({"ID Insertado":result.insertId});
    } catch (e) {
      res.json({"Error":e.message});
      console.log("Error:" + e.message);
    }
  }



  async modify(req, res){
   try {
     const carga = req.body;
     if(!carga.ID){
       throw new Error("ID Requerido");
     }

     if(!carga.Nombre || !carga.Apellido || !carga.Tipo || !carga.Mail){
       throw new Error("Datos Requeridos");
     }

     const [result] = await pool.query(`UPDATE usuarios SET Nombre = (?), Apellido=(?), Mail=(?), Tipo= (?) WHERE ID = (?)`, [carga.Nombre,carga.Apellido,carga.Mail,carga.Tipo,carga.ID]);
     res.json({"Registros modificados":result.affectedRows});
   } catch (e) {
     res.json({"Error":e.message});
     console.log("Error:" + e.message);
   }
 }

 async remove(req, res){
    try{
      const carga = req.body;
      if(!carga.ID){
        throw new Error("ID Requerido");
      }
      const [result] = await pool.query(`DELETE FROM usuarios WHERE id =(?)`,[carga.ID]);
      res.json({"Registros eliminados":result.affectedRows});
    } catch (e) {
      res.json({"Error":e.message});
      console.log("Error:" + e.message);
    }

  }

}

class TurnosController{
  async getAll(req, res){
    const [result] = await pool.query('SELECT * FROM turnos');
    res.json(result);
  }

  async getOne(req, res){
    try {
      const carga = req.body;
      if(!carga.ID){
        throw new Error("ID Requerido");
      }
      const [result] = await pool.query(`SELECT * FROM turnos WHERE id=(?)`,[carga.ID]);
      res.json(result);
    } catch (e) {
      res.json({"Error":e.message});
      console.log("Error:" + e.message);
    }
  }



  async add(req, res){
    try {
      const carga = req.body;

      if(!carga.User || !carga.Medic || !carga.Día || !carga.Hora || !carga.Cobro){
        throw new Error("Datos Requeridos");
      }
      const [result] = await pool.query(`INSERT INTO turnos (User , Medic , Día , Hora , Cobro ) VALUES (?, ?, ?, ?, ?)`,[carga.User,carga.Medic,carga.Día,carga.Hora,carga.Cobro]);
      res.json({"ID Insertado":result.insertId});
    } catch (e) {
      res.json({"Error":e.message});
      console.log("Error:" + e.message);
    }
  }



  async modify(req, res){
   try {
     const carga = req.body;
     if(!carga.ID){
       throw new Error("ID Requerido");
     }

     if(!carga.User || !carga.Medic || !carga.Día || !carga.Hora || !carga.Cobro){
       throw new Error("Datos Requeridos");
     }

     const [result] = await pool.query(`UPDATE turnos SET User = (?), Medic=(?), Día=(?), Hora= (?), Cobro = (?) WHERE ID = (?)`, [carga.User,carga.Medic,carga.Día,carga.Hora,carga.Cobro,carga.ID]);
     res.json({"Registros modificados":result.affectedRows});
   } catch (e) {
     res.json({"Error":e.message});
     console.log("Error:" + e.message);
   }
 }

 async remove(req, res){
    try{
      const carga = req.body;
      if(!carga.ID){
        throw new Error("ID Requerido");
      }
      const [result] = await pool.query(`DELETE FROM turnos WHERE id =(?)`,[carga.ID]);
      res.json({"Registros eliminados":result.affectedRows});
    } catch (e) {
      res.json({"Error":e.message});
      console.log("Error:" + e.message);
    }

  }

}
export const usuarios = new UsuariosController();
export const turnos = new TurnosController();
