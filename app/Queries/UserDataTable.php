<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UserDataTable
 * @package App\Queries
 */
class UserDataTable
{
    /**
     * @return User|Builder
     */
    public function get()
    {
        /** @var User $query */
        $query = User::query();

        return $query;
    }
}