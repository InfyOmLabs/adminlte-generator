<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Queries\RoleDataTable;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use DataTables;
use Exception;
use Flash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class RoleController.
 */
class RoleController extends AppBaseController
{
    /** @var RoleRepository */
    private $rolesRepository;

    /** @var PermissionRepository */
    private $permissionRepository;

    /**
     * RoleController constructor.
     *
     * @param RoleRepository       $rolesRepo
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $rolesRepo, PermissionRepository $permissionRepository)
    {
        $this->rolesRepository = $rolesRepo;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the Roles.
     *
     * @param Request $request
     *
     * @throws Exception
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new RoleDataTable())->get())->make(true);
        }

        return view('roles.index');
    }

    /**
     * Show the form for creating a new Roles.
     *
     * @return Response
     */
    public function create()
    {
        /** @var Permission $permissions */
        $permissions = $this->permissionRepository->permissionList();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $this->rolesRepository->store($input);
        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Show the form for editing the specified Roles.
     *
     * @param Role $role
     *
     * @return Response
     */
    public function edit(Role $role)
    {
        /** @var Permission $permissions */
        $permissions = $this->permissionRepository->permissionList();

        return view('roles.edit')->with(['roles' => $role, 'permissions' => $permissions]);
    }

    /**
     * @param Role              $role
     * @param UpdateRoleRequest $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $input = $request->all();

        $this->rolesRepository->update($input, $role->id);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * @param Role $role
     *
     * @throws Exception
     *
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function destroy(Role $role)
    {
        if ($role->users()->count() > 0) {
            throw new BadRequestHttpException(
                'This user role could not be deleted, because it’s assigned to a user.',
                null,
                \Illuminate\Http\Response::HTTP_BAD_REQUEST
            );
        }
        $role->delete();

        return $this->sendSuccess('Role deleted successfully.');
    }
}
