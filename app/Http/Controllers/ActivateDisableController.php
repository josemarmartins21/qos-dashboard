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
                return response()
                        ->json([
                            'status' => false,
                            'messages' => $validator->errors(),
                        ]);
            }

            $type = $validator->safe(['type']);
            $resourceId = $validator->safe(['id']);
            $activateOrDisable = $this->activateDisableFactory->create($type['type']); 

            $activated = $activateOrDisable->active($resourceId['id']);

            return response()->json([
                'status' => $activated,
                'message' => ucfirst($type['type'])  . " foi activado(a) com sucesso",
            ]);
          

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }

    }

    public function disable(Request $request)
    {
        try {
            $validator = $this->validate($request->all());
    
            if ($validator->fails()) {
                return response()
                        ->json(['status' => false,'messages' => $validator->errors()]);
            }
    
            $type = $validator->safe(['type']);
            
            $resourceId = $validator->safe(['id']);
            $activateOrDisable = $this->activateDisableFactory->create($type['type']); 
    
            $activated = $activateOrDisable->disable($resourceId['id']);
    
            return response()->json([
                'status' => $activated,
                'message' => ucfirst($type['type']) . " desctivada(a) com sucesso",
            ]);

        } catch (UnhandledMatchError $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
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
