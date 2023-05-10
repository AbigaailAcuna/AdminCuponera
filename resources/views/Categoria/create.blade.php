@extends('Layouts.template')

@section('title','Guardando Rubro')

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
        <h2>Agregando rubro</h2>
        <br>
       <form role="form" action="{{route('categoria.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codigo">Codigo de rubro:</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="IdCategoria" id="IdCategoria" value="{{old('IdCategoria')}}"  placeholder="Ingresa el codigo de rubro"  step="1"  min=1 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="codigo">Rubro:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="NombreCategoria" id="NombreCategoria" value="{{old('NombreCategoria')}}"  placeholder="Ingresa el nombre del rubro" >
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

@endsection