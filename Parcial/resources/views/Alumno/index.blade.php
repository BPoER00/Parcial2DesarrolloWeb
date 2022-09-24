@extends('Layouts._Layout')

@section('content')
    <br><br><br>
    <a class="btn btn-warning" href="{{ route('Alumno.create') }}">IR A LOS REGISTROS</a>
    <br><br>
    <h1>Registro De Alumnos</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DPI</th>
                <th>EMAIL</th>     
                <th>ROL</th>
                <th>FACULTAD</th>     
                <th>OPERACIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumno as $data)
                <tr>
                    <td>{{ $data->nombre }}</td>
                    <td>{{ $data->apellido }}</td>
                    <td>{{ $data->dpi }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->rol->nombre }}</td>
                    <td>{{ $data->facultad->nombre }}</td>
                    <td>
                            <div class="col-1">
                                <form action="{{ route('Alumno.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>     
                            </div>                           
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>    
    </table>
@endsection