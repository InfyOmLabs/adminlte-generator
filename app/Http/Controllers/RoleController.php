<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Laracasts\Flash\Flash;
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
     * Display a listing of the Post.
     *
     * @param  RoleDataTable  $roleDataTable
     * @return JsonResponse|View
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('roles.index');
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
     * Display the specified Sop.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Role $role */
        $roles = Role::whereId($id)->first();
        $permissions = $this->permissionRepository->permissionList();
        $data = array(
            'roles'       => $roles,
            'permissions' => $permissions,
        );
        if (empty($roles)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with($data);
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
