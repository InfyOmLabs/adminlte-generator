<?php

namespace App\Repositories;

use App\Models\Permission;
use Illuminate\Support\Collection;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'display_name',
        'description',
    ];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Permission::class;
    }

    /**
     * @return Collection
     */
    public function permissionList()
    {
        return Permission::pluck('display_name', 'id');
    }
}
