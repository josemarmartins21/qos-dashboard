<?php

namespace App\Http\Controllers;

use App\factorys\ActivateDisableFatory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as Validate;
use InvalidArgumentException;
use UnhandledMatchError;

class ActivateDisableController extends Controller
{
    private readonly ActivateDisableFatory $activateDisableFactory;

    public function __construct()
    {
        $this->activateDisableFactory = new ActivateDisableFatory;
    }

    public function activate(Request $request)
    {

        try {
            $validator = $this->validate($request->all());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            $type = $validator->safe(['type']);
            
            $resourceId = $validator->safe(['id']);
            $activateOrDisable = $this->activateDisableFactory->create($type['type']); 

            $activateOrDisable->active($resourceId['id']);

            return redirect()->back()->with('success', 'Testemunuho desactivado com sucesso');

        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function disable(Request $request)
    {
        try {
            $validator = $this->validate($request->all());
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
    
            $type = $validator->safe(['type']);
            
            $resourceId = $validator->safe(['id']);

            $activateOrDisable = $this->activateDisableFactory->create($type['type']); 
    
            $activateOrDisable->disable($resourceId['id']);
    
            return redirect()->back()->with('success', 'Testemunuho activado com sucesso');

        } catch (UnhandledMatchError $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    private function validate($data = []): Validate
    {
        $validator = Validator::make($data, [
                'type' => ['required','string','max:40',Rule::in(["pergunta frequente","depoimento","prova social"])],
                'id' => ['required','integer','numeric','min:1'],
            ], [
                "type.required" => "O :attribute é obrigatório",
                "type.in" => "O :attribute deve ser FAQ, depoimento ou prova social",
            ], [
                "type" => "tipo de publicação",
            ]); 

        return $validator;    
    }
}
