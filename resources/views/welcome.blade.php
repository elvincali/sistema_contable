<form action="{{ route('subir-imagen') }}" method="POST" enctype="multipart/form-data">
  <!--Método que permite ingresar datos-->
  @csrf
  <div class="row">
    <img src="{{ asset('/img/admin.jpg') }}" alt="admin.jpg">
    <div class="form-group col-md-6">
      <label>Imagen</label>
      <input type="file" name="imagen" class="form-control">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Registrar</button>
</form>