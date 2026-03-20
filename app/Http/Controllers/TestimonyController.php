<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Validation\Validator as Validate;

class TestimonyController extends Controller
{
    public function __construct(
        private TestimonyServiceInterface $testimonyService,
    )
    {
        
    }

    public function index()
    {
        try {

            $testimonies = $this->testimonyService->getAll();

            return view('testimonies.index', compact('testimonies'));

        } catch (\Throwable $e) {
            return view('errors.500', ['menssage' => $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('testimonies.create');
    }

    public function store(Request $request)
    {
        try {

            $validator = $this->validate($request->all());
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'messages' => $validator->errors(),
                ], 400);
            }  

            $testimony = $this->testimonyService->save($validator->validated());

            return response()->json([
                'status' => true,
                'data' => $testimony,
            ], 201);

            return redirect()->route('testimonies.show', ['testimony' => $testimony['id']]);

        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        
    }

    public function show(Testimony $testimony)
    {
        try {

            $testimony = $this->testimonyService->get($testimony->id);

            return view('testimonies.show', compact('testimony'));

        } catch (\Throwable $e) {
            return view('errors.404');
        }
    }

    public function update(Request $request, Testimony $testimony)
    {
        try {

            $validator = $this->validate($request->all());

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'messages' => $validator->errors(),
                ], 400);
            }  

            $updatedTestimony = $this->testimonyService->update($testimony->id, $validator->validated());

            return redirect()->route('testimonies.show', ['testimony' => $testimony['id']])->with('success', 'depoimento atualizado com sucesso!');

        } catch (\Throwable $e) {
            return view('errors.400');
        }
    }

    public function destroy(Testimony $testimony)
    {
        try {
            
            $this->testimonyService->delete($testimony->id);

            return redirect()->route('testimonies.index')->with('success', 'depoimento eliminado com sucesso!');

        } catch (Exception $e) {
            return view('errors.404');
        }
    }

    public function validate($data = []): Validate
    {
        $validator = Validator::make($data, [
                        'client_id' => ['required', 'integer', 'exists:clients,id', 'min:1', 'numeric'],
                        'testimony' => ['required', 'string',],
                        'is_active' => ['boolean', 'min:0', 'max:1',],

                        ],  [
                            'testimony.required' => 'O :attribute é obrigatório.',
                        ], [
                            'testimony' => 'depoimento',
                    ]);

        return $validator;
    }
}
