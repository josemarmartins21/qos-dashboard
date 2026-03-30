<?php

namespace App\Http\Controllers;

use App\Http\Requests\testimonies\TestimonyRequest;
use App\Http\Requests\testimonies\TestimonyUpdateRequest;
use App\Models\Testimony;
use App\services\clients\contracts\ClientServiceInterface;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function __construct(
        private TestimonyServiceInterface $testimonyService,
        private ClientServiceInterface $clientService,
    )
    {
        
    }

    public function index(Request $request)
    {
        try {
            if (! $request->searched) {
                $testimonies = $this->testimonyService->getAll();
                return view('testimonies.index', compact('testimonies'));
            } else {
                $testimonies = $this->testimonyService->getBySearch($request->searched);
                return view('testimonies.index', compact('testimonies'));
            }


        } catch (\Throwable $e) {
            dd($e->getMessage());
            return view('errors.500', ['menssage' => $e->getMessage()]);
        }
    }

    public function create()
    {
        $clients = $this->clientService->getAll();

        return view('testimonies.create', compact('clients'));
    }

    public function store(TestimonyRequest $request)
    {
        try {

            $validated = $request->validated(); 

            $this->testimonyService->save($validated);

            return redirect()->route('testimonies.index');

        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
        
    }

    public function show(Testimony $testimony)
    {
        try {

            $testimony = $this->testimonyService->get($testimony->id)[0];
            
            Carbon::setLocale('pt_BR');

            $created_at = Carbon::parse($testimony->data_criacao);
            
            $created_at = $created_at->diffForHumans();

            return view('testimonies.show', compact('testimony', 'created_at'));

        } catch (\Throwable $e) {
            return view('errors.404');
        }
    }

    public function edit(Testimony $testimony)
    {
        $clients = $this->clientService->getAll();

        return view('testimonies.edit', compact('testimony', 'clients'));
    }

    public function update(TestimonyUpdateRequest $request, Testimony $testimony)
    {
        try {

            $validated = $request->validated();

            $this->testimonyService->update($testimony->id, $validated);

            return redirect()->route('testimonies.show', ['testimony' => $testimony['id']])->with('success', 'depoimento atualizado com sucesso!');

        } catch (\Throwable $e) {
            return view('400');
        }
    }

    public function destroy(Testimony $testimony)
    {
        try {
            
            $this->testimonyService->delete($testimony->id);

            return redirect()
                    ->route('testimonies.index')
                        ->with('success', 'Depoimento eliminado com sucesso!');

        } catch (Exception $e) {
            return redirect()
                    ->back()
                        ->with('error', $e->getMessage());
            
        }
    }
}
