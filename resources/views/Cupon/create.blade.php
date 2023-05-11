@extends('Layouts.template')

@section('title','Guardando Cupon')

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
        <h2>Agregando cupon</h2>
       <form role="form" action="{{route('cupon.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codigo">Codigo del cupon:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="IdCuponR" id="IdCuponR" value="{{old('IdCuponR')}}"  placeholder="Ingresa el codigo cupon">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Código de Empresa:</label>
                <div class="input-group"> 
                <select class="form-control" name="IdEmpresaR" id="IdEmpresaR">
                    <option value="">Seleccione una empresa</option>
                    @foreach($empresas as $empresa)
                        <option class="form-control" value="{{ $empresa->IdEmpresaR }}">{{ $empresa->NombreEmpresa }}</option>
                    @endforeach
                </select>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Titulo:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="Titulo" id="Titulo"   value="{{old('Titulo')}}"    placeholder="Ingresa el titulo del cupon" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Precio Regular:</label>
                <div class="input-group">
                    <input type="text"  class="form-control" id="PrecioRegular" name="PrecioRegular" value="{{old('PrecioRegular')}}"   placeholder="Ingresa el precio regular" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" min=1 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Precio Oferta:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="PrecioOferta" name="PrecioOferta" value="{{old('PrecioOferta')}}"   placeholder="Ingresa el precio de oferta" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" min=1 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="texto">Precio Cupon:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="PrecioCupon" name="PrecioCupon" value="{{old('PrecioRegular')}}"   placeholder="Ingresa el precio del cupon" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" min=1 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Fecha de inicio:</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="FechaInicio" name="FechaInicio" value="{{old('FechaInicio')}}"   placeholder="Ingresa la fecha de inicio">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Fecha Fin:</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="FechaFin" name="FechaFin"  value="{{old('FechaFin')}}"  placeholder="Ingresa la fecha de fin">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Fecha Limite de Uso:</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="FechaLimiteUso" name="FechaLimiteUso" value="{{old('FechaLimiteUso')}}"   placeholder="Ingresa la fecha limite de uso">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Descripcion:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{old('Descripcion')}}"   placeholder="Ingresa la descripcion">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Otros Detalles:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="OtrosDetalles" name="OtrosDetalles" value="{{old('OtrosDetalles')}}"   placeholder="Ingresa otros detalles">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Disponibilidad:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="Disponibilidad" name="Disponibilidad" value="{{old('Disponibilidad')}}"   placeholder="Ingresa la cantidad disponible" step="1"  min=1 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="texto">Imagen:</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}"   placeholder="Ingresa la imagen" accept="image/*">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="hidden" class="form-control" id="CantidadVendido" name="CantidadVendido" value="0"   placeholder="Ingresa la cantidad de cupones vendidos">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="hidden" class="form-control" id="Estado" name="Estado" value="4"   placeholder="Ingresa el estado">
                </div>
            </div>            
            <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
            <a class="btn btn-danger" href="/cupon">Cancelar</a>
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
@endsection