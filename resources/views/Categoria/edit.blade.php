@extends('Layouts.template')

@section('title','Editando Rubro')

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
       <form role="form" action="{{route('categoria.update',$categorium->IdCategoria)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="codigo">Codigo del rubro:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="IdCategoria" id="IdCategoria" value="{{old('IdCategoria',$categorium->IdCategoria)}}"  placeholder="Ingresa el codigo de rubro" >
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
@endsection