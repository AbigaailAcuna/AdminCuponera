<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresar
 * 
 * @property string $IdEmpresaR
 * @property int $IdCategeoria
 * @property string $NombreEmpresa
 * @property string $Direccion
 * @property string $NombreContacto
 * @property string $Telefono
 * @property string $Correo
 * @property string $Rubro
 * @property float $Comision
 *
 * @package App\Models
 */
class Empresar extends Model
{
	protected $table = 'empresar';
	protected $primaryKey = 'IdEmpresaR';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdCategeoria' => 'int',
		'Comision' => 'float'
	];

	protected $fillable = [
		'IdCategeoria',
		'NombreEmpresa',
		'Direccion',
		'NombreContacto',
		'Telefono',
		'Correo',
		'Rubro',
		'Comision'
	];

	public function cuponr()
	{
		return $this->hasMany(Cuponr::class, 'IdEmpresaR');
	}
}
