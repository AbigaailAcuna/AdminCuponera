@extends('Layouts.template')

@section('title','Editando Empleado')

@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
<div class="container">
    
    <div class="row-center">
        
       @if($errors->all())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
            </ul>
        </div>
       @endif
     <div class="col-md-7">
        <h2>Editando trabajador</h2>
        <br>
   <form role="form" action="{{route('trabajador.update',$trabajador->IdEmpleado)}}" method="POST">
        @csrf
        @meThod('PUT')
        <div class="form-group">
            <label for="codigo">Codigo de Empleado:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="IdEmpleado" id="IdEmpleado" value="{{old('IdEmpleado',$trabajador->IdEmpleado)}}" placeholder="Ingresa el codigo del Empleado" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
        </div>
        <div class="form-group">
            <label for="nombre">Código de Empresa:</label>
            <div class="input-group"> 
            <select class="form-control" name="IdEmpresaR" id="IdEmpresaR"disabled>
                <option class="form-control" id="IdCategeoria" value="{{ $EmpresaSeleccionada->IdEmpresaR }}" selected >{{ $EmpresaSeleccionada->NombreEmpresa }}</option>
                @foreach($empresas as $empresa)
                    @if($empresa->IdEmpresaR!==$EmpresaSeleccionada->IdEmpresaR)
                        <option class="form-control" value="{{ $empresa->IdEmpresaR }}" @if($empresa->IdEmpresaR == old('IdEmpresaR', $trabajador->IdCategeoria)) selected @endif>{{ $empresa->NombreEmpresa }}</option>
                    @endif   
                @endforeach
            </select>
                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
        </div>
        <div class="form-group">
            <label for="texto">Nombres:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="Nombres" name="Nombres" value="{{old('Nombres',$trabajador->Nombres)}}"  placeholder="Ingresa el nombre del Empleado">
                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
        </div>
        <div class="form-group">
            <label for="texto">Apellidos:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="{{old('Apellidos',$trabajador->Apellidos)}}"   placeholder="Ingresa el apellido del Empleado">
                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="texto">Teléfono:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{old('Telefono',$trabajador->Telefono)}}"   placeholder="Ingresa el numero de telefono">
                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
        </div>
        <div class="form-group">
            <label for="texto">Correo:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="Correo" name="Correo" value="{{old('Correo',$trabajador->Correo)}}"   placeholder="Ingresa el correo">
                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
        </div>
          
        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
        <a class="btn btn-danger" href="{{ route('trabajador.index')}}">Cancelar</a>
    </form>
            
    <?php if(session('alerta')): ?>
    <script>
        swal({
            title: "<?php echo e(session('alerta.title')); ?>",
            text: "<?php echo e(session('alerta.text')); ?>",
            icon: "<?php echo e(session('alerta.icon')); ?>",
        });
    </script>
    <?php endif; ?> 
   </div>
   </div>
   </div>
</div>
@endsection