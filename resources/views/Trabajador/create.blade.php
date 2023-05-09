@extends('Layouts.template')

@section('title','Guardando Empleado')


@section('content')
<head>
    @section('title2','Creando Empleado')
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
       <form role="form" action="{{route('trabajador.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codigo">Codigo de Empleado:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="IdEmpleado" id="IdEmpleado" value="{{old('IdEmpleado')}}" placeholder="Ingresa el codigo del Empleado" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Código de Empresa:</label>
                <div class="input-group"> 
                <select class="form-control" name="IdEmpresaR" id="IdEmpresaR">
                    <option value="">Seleccione una empresa</option>
                    @foreach($empresas as $empresa)
                        <option class="form-control" value="{{$empresa->IdEmpresaR}}">{{ $empresa->NombreEmpresa }}</option>
                    @endforeach
                </select>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Nombres:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Nombres" name="Nombres" value="{{old('Nombres')}}"  placeholder="Ingresa el nombre del Empleado">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Apellidos:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Apellidos" name="Apellidos" value="{{old('Apellidos')}}"   placeholder="Ingresa el apellido del Empleado">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="texto">Teléfono:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{old('Telefono')}}"   placeholder="Ingresa el numero de telefono">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Correo:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Correo" name="Correo" value="{{old('Correo')}}"   placeholder="Ingresa el correo">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Rubro:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Rubro" name="Rubro" value="{{old('Rubro')}}"  placeholder="Ingresa el Rubro">
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
