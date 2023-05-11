@extends('Layouts.template')

@section('title','Editando Rubro')

@section('content')
<head>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
</head>
@if(session('user'))
@if(session('user')->Rol == 1)
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
        <h2>Editando rubro</h2>
        <br>
       <form role="form" action="{{route('categoria.update',$categorium->IdCategoria)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="codigo">Codigo rubro:</label>
                <div class="input-group">
                    <input type="text" class="form-control" readonly name="IdCategoria" id="IdCategoria" value="{{old('NombreCategoria',$categorium->IdCategoria)}}"  placeholder="Ingresa el nombre del rubro" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="codigo">Rubro:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="NombreCategoria" id="NombreCategoria" value="{{old('NombreCategoria',$categorium->NombreCategoria)}}"  placeholder="Ingresa el nombre del rubro" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
                        
            <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
            <a class="btn btn-danger" href="/categoria">Cancelar</a>
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
    @else
<h3>Inicia sesión para ver el contenido</h3>
<p>La página de Administración de la cuponera no puede mostrarte nada porque no has iniciado sesión.</p>
@endif
@endif
@endsection