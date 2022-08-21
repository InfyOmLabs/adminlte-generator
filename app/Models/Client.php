<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @package App\Models
 * @version August 21, 2022, 2:59 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $statut_payment
 * @property integer $amount
 */
class Client extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone',
        'statut_payment',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'statut_payment' => 'string',
        'amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'created_at' => '',
        'updated_at' => '',
        'deleted_at' => '',
        'statut_payment' => 'string|max:255',
        'amount' => 'integer'
    ];


}
