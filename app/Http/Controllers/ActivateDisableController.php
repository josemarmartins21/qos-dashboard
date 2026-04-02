<?php

namespace App\Http\Controllers;

use App\factorys\ActivateDisableFatory;
use App\Http\Requests\activatedisable\ActivateDisableRequest;
use InvalidArgumentException;
use UnhandledMatchError;

class ActivateDisableController extends Controller
{
    public function activate(ActivateDisableRequest $request)
    {

        try {

            $request->validated();

            $datas = $request->safe()->only(['id', 'type']);
            $id = (int) $datas['id'];

            $activateOrDisable = ActivateDisableFatory::create($datas['type']); 

            $activateOrDisable->active($id);

            return redirect()->back()->with('success', 'Testemunuho desactivado com sucesso');

        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());

        }

    }

    public function disable(ActivateDisableRequest $request)
    {
        try {

            $request->validated();
    
            $datas = $request->safe()->only(['id', 'type']);
            $id = (int) $datas['id'];

            $activateOrDisable = ActivateDisableFatory::create($datas['type']); 
            $activateOrDisable->disable($id);
    
            return redirect()->back()->with('success', 'Testemunuho activado com sucesso');

        } catch (UnhandledMatchError $e) {
            return redirect()->back()->with('error', $e->getMessage());

        } catch (InvalidArgumentException $e) {
            return redirect()->back()->with('error', $e->getMessage());

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());

        }
        
    }

}
