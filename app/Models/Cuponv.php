<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuponv
 * 
 * @property string $IdCuponV
 * @property string $IdVenta
 * @property string $IdCupon
 * @property string $IdCliente
 * @property string $Estado
 *
 * @package App\Models
 */
class Cuponv extends Model
{
	protected $table = 'cuponv';
	protected $primaryKey = 'IdCuponV';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'IdVenta',
		'IdCupon',
		'IdCliente',
		'Estado'
	];
}
