<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorium
 * 
 * @property int $IdCategoria
 * @property string $NombreCategoria
 *
 * @package App\Models
 */
class Categorium extends Model
{
	protected $table = 'categoria';
	protected $primaryKey = 'IdCategoria';
	public $timestamps = false;

	protected $fillable = [
		'NombreCategoria'
	];
}
