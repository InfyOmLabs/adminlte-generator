<?php

namespace App\Queries;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class RoleDataTable.
 */
class RoleDataTable
{
    /**
     * @return Builder
     */
    public function get()
    {
        return Role::query();
    }
}
