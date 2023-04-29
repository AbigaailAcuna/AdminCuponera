<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $IdCliente
 * @property string $Nombres
 * @property string $Apellidos
 * @property string $Dui
 * @property string $Telefono
 * @property string $Correo
 * @property string $Direccion
 * @property string $Clave
 * @property string $Estado
 * @property string $Token
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'IdCliente';
	public $timestamps = false;

	protected $fillable = [
		'Nombres',
		'Apellidos',
		'Dui',
		'Telefono',
		'Correo',
		'Direccion',
		'Clave',
		'Estado',
		'Token'
	];
}
