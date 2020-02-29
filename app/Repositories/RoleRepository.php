<?php

namespace App\Repositories;

use App\Models\Role;

/**
 * Class RoleRepository.
 */
class RoleRepository extends BaseRepository
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
        return Role::class;
    }

    /**
     * @return mixed
     */
    public function getRolesList()
    {
        return Role::orderBy('name')->pluck('name', 'id');
    }

    /**
     * @param array $input
     *
     * @return Role
     */
    public function store($input)
    {
        /** @var Role $roles */
        $role = Role::create($input);
        $this->attachPermissions($role, $input);

        return $role->fresh();
    }

    /**
     * @param array $input
     * @param int   $id
     *
     * @return Role
     */
    public function update($input, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($input);

        $this->attachPermissions($role, $input);

        return $role->fresh();
    }

    /**
     * @param Role  $role
     * @param array $input
     *
     * @return bool
     */
    public function attachPermissions($role, $input)
    {
        if (isset($input['permissions']) && !empty($input['permissions'])) {
            $role->syncPermissions($input['permissions']);
        }

        return true;
    }
}
