<div class="table-responsive">
    <table class="table" id="socios-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Fecha Nacimiento</th>
        <th>Ocupacion</th>
        <th>Correo Electronico</th>
        <th>Tipo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($socios as $socios)
            <tr>
                <td>{{ $socios->nombre }}</td>
            <td>{{ $socios->telefono }}</td>
            <td>{{ $socios->direccion }}</td>
            <td>{{ $socios->fecha_nacimiento }}</td>
            <td>{{ $socios->ocupacion }}</td>
            <td>{{ $socios->correo_electronico }}</td>
            <td>{{ $socios->tipo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['socios.destroy', $socios->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('socios.show', [$socios->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('socios.edit', [$socios->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
