<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $socios->nombre }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $socios->telefono }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $socios->direccion }}</p>
</div>

<!-- Fecha Nacimiento Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    <p>{{ $socios->fecha_nacimiento }}</p>
</div>

<!-- Ocupacion Field -->
<div class="col-sm-12">
    {!! Form::label('ocupacion', 'Ocupacion:') !!}
    <p>{{ $socios->ocupacion }}</p>
</div>

<!-- Correo Electronico Field -->
<div class="col-sm-12">
    {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
    <p>{{ $socios->correo_electronico }}</p>
</div>

<!-- Tipo Field -->
<div class="col-sm-12">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $socios->tipo }}</p>
</div>

