<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333;
    }
    h1, h2, h3 {
        margin-top: 0;
        margin-bottom: 10px;
        text-align: center;
        font-weight: bold;
    }
    h1 {
        font-size: 36px;
        color: #207c68;
    }
    h2 {
        font-size: 24px;
        color: #000;
    }
    h3 {
        font-size: 18px;
        color: #666;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }
    table thead tr th {
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #207c68;
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
    }
    table tbody tr td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
    }
    table tbody tr td img {
        max-width: 150px;
        max-height: 150px;
    }
</style>
<h1>LA CUPONERA</h1>
<h3>Fecha: {{date('Y-m-d')}}</h3>
<h2>Detalle de cliente</h2>
<table>
    <thead>
        <tr>
            <th>Codigo de cliente</th>
            <th>Nombre cliente</th>
            <th>Apellido cliente</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $ventas->IdCliente }}</td>
            <td>{{ $ventas->Nombres }}</td>
            <td>{{ $ventas->Apellidos}}</td>

        </tr>
    </tbody>
</table>
<h2>Detalle de venta</h2>
<table>
    <thead>
        <tr>
            <th>Codigo de venta</th>
            <th>Codigo de cupon comprado</th>
            <th>Cantidad</th>
            <th>Fecha de compra</th>
 
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $ventas->IdVenta }}</td>
            <td>{{ $ventas->Titulo }}</td>
            <td>{{ $ventas->Cantidad}}</td>
            <td>{{ $ventas->FechaCompra->format('Y-m-d')}}</td>

        </tr>
    </tbody>
</table>
