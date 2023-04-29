<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estadocupon
 * 
 * @property int $IdEstado
 * @property string $NombreEstado
 *
 * @package App\Models
 */
class Estadocupon extends Model
{
	protected $table = 'estadocupon';
	protected $primaryKey = 'IdEstado';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdEstado' => 'int'
	];

	protected $fillable = [
		'NombreEstado'
	];
}
