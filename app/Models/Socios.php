<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Socios
 * @package App\Models
 * @version July 8, 2023, 2:50 pm UTC
 *
 * @property string $nombre
 * @property string $telefono
 * @property string $direccion
 * @property string $fecha_nacimiento
 * @property string $ocupacion
 * @property string $correo_electronico
 * @property string $tipo
 */
class Socios extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'socios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'ocupacion',
        'correo_electronico',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'fecha_nacimiento' => 'string',
        'ocupacion' => 'string',
        'correo_electronico' => 'string',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'telefono' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|string|max:255',
        'ocupacion' => 'required|string|max:255',
        'correo_electronico' => 'required|string|max:255',
        'tipo' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
