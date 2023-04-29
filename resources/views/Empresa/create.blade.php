@extends('Layouts.template')

@section('title','Guardando Empresa')

@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
  
<div class="row">
    <div class=" col-md-7">
       @if($errors->all())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
            </ul>
        </div>
       @endif

       <style>
        
       </style>
       <div class="container">
        <div class="row">
            <div class="col-md-7">
       <form role="form" action="{{route('empresa.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codigo">Codigo de la empresa:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="IdEmpresaR" id="IdEmpresaR" value="{{old('IdEmpresaR')}}" placeholder="Ingresa el codigo de la empresa" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="codigo">Codigo de rubro:</label>
                <div class="input-group"> 
                <select class="form-control" name="IdCategeoria" id="IdCategeoria">
                    <option value="">Seleccione un rubro</option>
                    @foreach($categoria as $cate)
                        <option class="form-control" value="{{ $cate->IdCategoria }}">{{ $cate->NombreCategoria }}</option>
                    @endforeach
                </select>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre de la empresa:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="NombreEmpresa" id="NombreEmpresa"  value="{{old('NombreEmpresa')}}"    placeholder="Ingresa el nombre de la empresa" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Direccion:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Direccion" name="Direccion" value="{{old('Direccion')}}"  placeholder="Ingresa la direccion">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">NombreContacto:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="NombreContacto" name="NombreContacto" value="{{old('NombreContacto')}}"   placeholder="Ingresa el nombre del contacto">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nacionalidad">Telefono:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{old('Telefono')}}"   placeholder="Ingresa el numero de telefono">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Correo:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Correo" name="Correo" value="{{old('Correo')}}"   placeholder="Ingresa el correo">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Comision:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Comision" name="Comision" value="{{old('Comision')}}"  placeholder="Ingresa la comision">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            
            
                        
            <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
            <a class="btn btn-danger" href="{{ route('empresa.index')}}">Cancelar</a>
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