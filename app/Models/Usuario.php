<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $Id
 * @property int $rol
 * @property string $Email
 * @property string $Password
 * @property int $Password_c
 * 
 * @package App\Models
 */

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'Id';
    public $incrementing = false;
	public $timestamps = false;

    protected $casts = [
		'Rol' => 'int'
	];
    protected $fillable = [
		'Rol',
		'Email',
		'Password',
		'Password_c'
	];

}

