@extends('Layouts._Layout')

@section('content')

    <br>
    <h1>INGRESO DE DATOS DEL ALUMNO</h1>
    <hr>
    <br>
    <form action="{{ route('Alumno.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Seleccione Facultad</label>
      <select name="idFacultad" class="form-control">
        @foreach ($facultad as $data)
          <option value="{{ $data->id }}">{{ $data->nombre }}</option>
        @endforeach
      </select>
    </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">Seleccione Rol</label>
            <select name="idRol" class="form-control">
              @foreach ($rol as $data)
                <option value="{{ $data->id }}">{{ $data->nombre }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">Carne</label>
            <input type="text" name="carne" class="form-control" placeholder="INGRESE SU CARNE">
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="INGRESE SU NOMBRE...">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">Apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="INGRESE SU APELLIDO...">
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">DPI</label>
            <input type="text" name="dpi" class="form-control" placeholder="INGRESES SU DPI...">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">Nit</label>
            <input type="text" name="nit" class="form-control" placeholder="INGRESE SU NIT...">
          </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" placeholder="INGRESE SU EMAIL...">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="exampleInputEmail1">Telefono</label>
            <input type="text" name="telefono" class="form-control" placeholder="INGRESE SU TELEFONO...">
          </div>
        </div>
      </div><br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection