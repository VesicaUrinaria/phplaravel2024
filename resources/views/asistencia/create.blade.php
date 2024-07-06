@extends('layouts.app')

@section('content')
    <h1>Marcar asistencia</h1>
    <form action="{{ route('asistencias.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="estudiante_id" class="form-label">Pin</label>
                <input type="text" class="form-control" id="estudiante_id" name="estudiante_id" required>
            </div>
            <div class="col-md-4">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('y-m-d');?>" required>
            </div>
            <div class="col-md-4">
                <label for="HoraEntrada" class="form-label">Hora</label>
                <input type="time" class="form-control" id="HoraEntrada" name="HoraEntrada" value="<?php echo date('H:i:s');?>" required>
            </div>
            
        </div>               
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Marcar</button>
                <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>

    </form>
@endsection