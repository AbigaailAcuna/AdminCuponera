<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventum
 * 
 * @property int $IdVenta
 * @property string $IdCuponR
 * @property int $IdCliente
 * @property int $Cantidad
 * @property Carbon $FechaCompra
 * @property int $Estado
 *
 * @package App\Models
 */
class Ventum extends Model
{
	protected $table = 'venta';
	protected $primaryKey = 'IdVenta';
	public $timestamps = false;

	protected $casts = [
		'IdCliente' => 'int',
		'Cantidad' => 'int',
		'FechaCompra' => 'datetime',
		'Estado' => 'int'
	];

	protected $fillable = [
		'IdCuponR',
		'IdCliente',
		'Cantidad',
		'FechaCompra',
		'Estado'
	];
}
