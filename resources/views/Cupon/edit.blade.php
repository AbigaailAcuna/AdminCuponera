@extends('Layouts.template')

@section('title','Editando Cupon')

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
       <form role="form" action="{{route('cupon.update',$cupon->IdCuponR)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="codigo">Codigo del cupon:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="IdCuponR" id="IdCuponR" value="{{old('IdCuponR',$cupon->IdCuponR)}}"  placeholder="Ingresa el codigo cupon" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="codigo">Codigo de la empresa:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="IdEmpresaR" id="IdEmpresaR" value="{{old('IdEmpresaR',$cupon->IdEmpresaR)}}"  placeholder="Ingresa el codigo de la empresa" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre">Titulo:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="Titulo" id="Titulo"  value="{{old('Titulo',$cupon->Titulo)}}"    placeholder="Ingresa el titulo del cupon" >
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Precio Regular:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="PrecioRegular" name="PrecioRegular" value="{{old('PrecioRegular',$cupon->PrecioRegular)}}"   placeholder="Ingresa el precio regular">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Precio Oferta:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="PrecioOferta" name="PrecioOferta" value="{{old('PrecioOferta',$cupon->PrecioOferta)}}"   placeholder="Ingresa el precio de oferta">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nacionalidad">Precio Cupon:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="PrecioCupon" name="PrecioCupon" value="{{old('PrecioCupon',$cupon->PrecioCupon)}}"   placeholder="Ingresa el precio del cupon">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Fecha de inicio:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="FechaInicio" name="FechaInicio" value="{{old('FechaInicio',$cupon->FechaInicio)}}"   placeholder="Ingresa la fecha de inicio">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Fecha Fin:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="FechaFin" name="FechaFin" value="{{old('FechaFin',$cupon->FechaFin)}}"   placeholder="Ingresa la fecha de fin">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Fecha Limite de Uso:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="FechaLimiteUso" name="FechaLimiteUso" value="{{old('FechaLimiteUso',$cupon->FechaLimiteUso)}}"   placeholder="Ingresa la fecha limite de uso">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Descripcion:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{old('Descripcion',$cupon->Descripcion)}}"   placeholder="Ingresa la descripcion">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Otros Detalles:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="OtrosDetalles" name="OtrosDetalles" value="{{old('OtrosDetalles',$cupon->OtrosDetalles)}}"   placeholder="Ingresa otros detalles">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Disponibilidad:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="Disponibilidad" name="Disponibilidad" value="{{old('Disponibilidad',$cupon->Disponibilidad)}}"   placeholder="Ingresa la cantidad disponible" step="1"  min=1 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Imagen:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="imagen" name="imagen" value="{{old('imagen',$cupon->imagen)}}"   placeholder="Ingresa la imagen">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Cantidad Vendido:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="CantidadVendido" name="CantidadVendido" value="{{old('CantidadVendido',$cupon->CantidadVendido)}}"   placeholder="Ingresa la cantidad de cupones vendidos" step="1"  min=0 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="nacionalidad">Estado:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="Estado" name="Estado" value="{{old('Estado',$cupon->Estado)}}"  placeholder="Ingresa el estado" step="1"  min=1 oninput="validity.valid||(value='');">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
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
       </div>
    </div>
@endsection