<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * 
 * @property string $IdEmpleado
 * @property string $IdEmpresaR
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $Telefono
 * @property string $Correo
 * @property string $Clave
 * @property int $Rol
 * @property string $Rubro
 *
 * @package App\Models
 */
class Empleado extends Model
{
	protected $table = 'empleado';
	protected $primaryKey = 'IdEmpleado';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Rol' => 'int'
	];

	protected $fillable = [
		'IdEmpresaR',
		'Nombres',
		'Apellidos',
		'Telefono',
		'Correo',
		'Clave',
		'Rol',
		'Rubro'
	];
}
