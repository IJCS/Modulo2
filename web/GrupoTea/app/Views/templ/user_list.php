{users}
<tr>
  <th scope="row">{ID}</th>
  <td>{Nombre}</td>
  <td>{Apellido}</td>
  <td>{Mail}</td>
  <td>{Tipo}</td>
  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{ID}">
    Editar
  </button>
</td>
</tr>

<div class="modal fade" id="edit{ID}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar ID = {ID}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{URL_UPDATE}" method="post">
          <input type="hidden" name="ID" value="{ID}">
          <input type="hidden" name="Tipo" value="{Tipo}">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="Mail" value="{Mail}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="Nombre" value="{Nombre}">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="Apellido" value="{Apellido}">
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
{/users}
