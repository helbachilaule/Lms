<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAp1aulac1m1Request;
use App\Http\Requests\UpdateAp1aulac1m1Request;
use App\Repositories\Ap1aulac1m1Repository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use storage;
use store;


class Ap1aulac1m1Controller extends AppBaseController
{
    /** @var  Ap1aulac1m1Repository */
    private $ap1aulac1m1Repository;

    public function __construct(Ap1aulac1m1Repository $ap1aulac1m1Repo)
    {
        $this->ap1aulac1m1Repository = $ap1aulac1m1Repo;
    }

    /**
     * Display a listing of the Ap1aulac1m1.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ap1aulac1m1s = $this->ap1aulac1m1Repository->all();

        return view('ap1aulac1m1s.index')
            ->with('ap1aulac1m1s', $ap1aulac1m1s);
    }

    /**
     * Show the form for creating a new Ap1aulac1m1.
     *
     * @return Response
     */
    public function create()
    {
        return view('ap1aulac1m1s.create');
    }

    /**
     * Store a newly created Ap1aulac1m1 in storage.
     *
     * @param CreateAp1aulac1m1Request $request
     *
     * @return Response
     */
    public function store(CreateAp1aulac1m1Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('aula')) {
            $input['aula'] = $request->store('ap1aulac1m1s/'.$request->aula);
           /* $destination_path= 'public/ApaAulas/ap1aulac1m1s';
            $aula= $input['aula'];
            $aula_nome= $aula->getClientOriginalName();
            $path = $request->file('aula')->storeAs($destination_path,$aula_nome);

            $input['aula']=$aula_nome;*/
            # code...
        }

        $ap1aulac1m1 = $this->ap1aulac1m1Repository->create($input);

        Flash::success($input['aula'].' saved successfully.');

        return redirect(route('ap1aulac1m1s.index'));
    }

    /**
     * Display the specified Ap1aulac1m1.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ap1aulac1m1 = $this->ap1aulac1m1Repository->find($id);

        if (empty($ap1aulac1m1)) {
            Flash::error('Ap1Aulac1M1 not found');

            return redirect(route('ap1aulac1m1s.index'));
        }

        return view('ap1aulac1m1s.show')->with('ap1aulac1m1', $ap1aulac1m1);
    }

    /**
     * Show the form for editing the specified Ap1aulac1m1.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ap1aulac1m1 = $this->ap1aulac1m1Repository->find($id);

        if (empty($ap1aulac1m1)) {
            Flash::error('Ap1Aulac1M1 not found');

            return redirect(route('ap1aulac1m1s.index'));
        }

        return view('ap1aulac1m1s.edit')->with('ap1aulac1m1', $ap1aulac1m1);
    }

    /**
     * Update the specified Ap1aulac1m1 in storage.
     *
     * @param int $id
     * @param UpdateAp1aulac1m1Request $request
     *
     * @return Response
     */
    public function update($id, UpdateAp1aulac1m1Request $request)
    {
        $ap1aulac1m1 = $this->ap1aulac1m1Repository->find($id);

        if (empty($ap1aulac1m1)) {
            Flash::error('Ap1Aulac1M1 not found');

            return redirect(route('ap1aulac1m1s.index'));
        }

        $ap1aulac1m1 = $this->ap1aulac1m1Repository->update($request->all(), $id);

        Flash::success('Ap1Aulac1M1 updated successfully.');

        return redirect(route('ap1aulac1m1s.index'));
    }

    public function download($id)
    {
        if (empty($ap1aulac1m1s)) {
            Flash::error('Ap1Aulac1M1 not found');

            return redirect(route('ap1aulac1m1s.index'));
        }

        $ap1aulac1m1s = $this->ap1aulac1m1Repository->find($id);
        return view('download.show', compact($ap1aulac1m1));

        //response()->download($ap1aulac1m1->filepath, $ap1aulac1m1->name, ['Content-Type:' . $ap1aulac1m1->filemimetype]);
        //ap1aulac1m1 = $this->ap1aulac1m1Repository->find($id);
    }

    /**
     * Remove the specified Ap1aulac1m1 from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ap1aulac1m1 = $this->ap1aulac1m1Repository->find($id);

        if (empty($ap1aulac1m1)) {
            Flash::error('Ap1Aulac1M1 not found');

            return redirect(route('ap1aulac1m1s.index'));
        }

        $this->ap1aulac1m1Repository->delete($id);

        Flash::success('Ap1Aulac1M1 deleted successfully.');

        return redirect(route('ap1aulac1m1s.index'));
    }
}
