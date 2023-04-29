<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuponr
 * 
 * @property string $IdCuponR
 * @property string $IdEmpresaR
 * @property string $Titulo
 * @property float $PrecioRegular
 * @property float $PrecioOferta
 * @property float $PrecioCupon
 * @property Carbon $FechaInicio
 * @property Carbon $FechaFin
 * @property Carbon $FechaLimiteUso
 * @property string $Descripcion
 * @property string $OtrosDetalles
 * @property int $Disponibilidad
 * @property string $imagen
 * @property int $CantidadVendido
 * @property int $Estado
 *
 * @package App\Models
 */
class Cuponr extends Model
{
	protected $table = 'cuponr';
	protected $primaryKey = 'IdCuponR';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PrecioRegular' => 'float',
		'PrecioOferta' => 'float',
		'PrecioCupon' => 'float',
		'FechaInicio' => 'datetime',
		'FechaFin' => 'datetime',
		'FechaLimiteUso' => 'datetime',
		'Disponibilidad' => 'int',
		'CantidadVendido' => 'int',
		'Estado' => 'int'
	];

	protected $fillable = [
		'IdEmpresaR',
		'Titulo',
		'PrecioRegular',
		'PrecioOferta',
		'PrecioCupon',
		'FechaInicio',
		'FechaFin',
		'FechaLimiteUso',
		'Descripcion',
		'OtrosDetalles',
		'Disponibilidad',
		'imagen',
		'CantidadVendido',
		'Estado'
	];

	public function empresar()
	{
		return $this->hasMany(Empresar::class, 'IdEmpresaR');
	}
}


