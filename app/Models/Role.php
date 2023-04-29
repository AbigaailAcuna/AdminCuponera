<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $IdRol
 * @property string $NombreRol
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'IdRol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IdRol' => 'int'
	];

	protected $fillable = [
		'NombreRol'
	];
}
