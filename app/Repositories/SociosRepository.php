<?php

namespace App\Repositories;

use App\Models\Socios;
use App\Repositories\BaseRepository;

/**
 * Class SociosRepository
 * @package App\Repositories
 * @version July 8, 2023, 2:50 pm UTC
*/

class SociosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'ocupacion',
        'correo_electronico',
        'tipo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Socios::class;
    }
}
