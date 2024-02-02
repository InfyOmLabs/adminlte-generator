<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSociosRequest;
use App\Http\Requests\UpdateSociosRequest;
use App\Repositories\SociosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SociosController extends AppBaseController
{
    /** @var SociosRepository $sociosRepository*/
    private $sociosRepository;

    public function __construct(SociosRepository $sociosRepo)
    {
        $this->sociosRepository = $sociosRepo;
    }

    /**
     * Display a listing of the Socios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $socios = $this->sociosRepository->all();

        return view('socios.index')
            ->with('socios', $socios);
    }

    /**
     * Show the form for creating a new Socios.
     *
     * @return Response
     */
    public function create()
    {
        return view('socios.create');
    }

    /**
     * Store a newly created Socios in storage.
     *
     * @param CreateSociosRequest $request
     *
     * @return Response
     */
    public function store(CreateSociosRequest $request)
    {
        $input = $request->all();

        $socios = $this->sociosRepository->create($input);

        Flash::success('Socios saved successfully.');

        return redirect(route('socios.index'));
    }

    /**
     * Display the specified Socios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $socios = $this->sociosRepository->find($id);

        if (empty($socios)) {
            Flash::error('Socios not found');

            return redirect(route('socios.index'));
        }

        return view('socios.show')->with('socios', $socios);
    }

    /**
     * Show the form for editing the specified Socios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $socios = $this->sociosRepository->find($id);

        if (empty($socios)) {
            Flash::error('Socios not found');

            return redirect(route('socios.index'));
        }

        return view('socios.edit')->with('socios', $socios);
    }

    /**
     * Update the specified Socios in storage.
     *
     * @param int $id
     * @param UpdateSociosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSociosRequest $request)
    {
        $socios = $this->sociosRepository->find($id);

        if (empty($socios)) {
            Flash::error('Socios not found');

            return redirect(route('socios.index'));
        }

        $socios = $this->sociosRepository->update($request->all(), $id);

        Flash::success('Socios updated successfully.');

        return redirect(route('socios.index'));
    }

    /**
     * Remove the specified Socios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $socios = $this->sociosRepository->find($id);

        if (empty($socios)) {
            Flash::error('Socios not found');

            return redirect(route('socios.index'));
        }

        $this->sociosRepository->delete($id);

        Flash::success('Socios deleted successfully.');

        return redirect(route('socios.index'));
    }
}
