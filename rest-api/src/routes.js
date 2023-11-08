import { Router } from 'express';
import { usuarios } from './controller.js';
import { turnos } from './controller.js';

export const router = Router();

router.get('/usuarios', usuarios.getAll);
router.get('/usuario', usuarios.getOne);
router.put('/usuario', usuarios.modify);
router.post('/usuario', usuarios.add);
router.delete('/usuario', usuarios.remove);
router.get('/turnos', turnos.getAll);
router.get('/turno', turnos.getOne);
router.put('/turno', turnos.modify);
router.post('/turno', turnos.add);
router.delete('/turno', turnos.remove);
