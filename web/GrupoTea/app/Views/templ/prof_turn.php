{Profs}
<div class="modal fade" id="Turno{ID}" tabindex="-1" aria-labelledby="Truno{ID}">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Pedir Turno para {Nombre}</h5>
      </div>
      <div class="modal-body">
        <form class="form-control" action="{URL}" method="post">
          <input type="text" name="User" value="{User}" hidden>
          <input type="text" name="Medic" value="{ID}" hidden>
          <select class="form-select my-1" name="Dia">
            <option selected hidden>Día</option>
            <option value="2023-11-21">21/11/2023</option>
            <option value="2023-11-22">22/11/2023</option>
            <option value="2023-11-23">23/11/2023</option>
            <option value="2023-11-24">24/11/2023</option>
            <option value="2023-11-25">25/11/2023</option>
          </select>
          <select class="form-select my-1" name="Hora">
            <option selected hidden>Hora</option>
            <option value="8:00">8:00</option>
            <option value="9:00">9:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
          </select>
          <select class="form-select my-1" name="Cargo">
            <option selected hidden>Forma de Pago</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
            <option value="Obra Social">Obra Social</option>
          </select>

          <button class="btn btn-primary w-100"type="submit" name="button">Reservar Turno</button>
        </form>
      </div>
    </div>
  </div>
</div>
{/Profs}
