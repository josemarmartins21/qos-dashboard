<?php

namespace App\Http\Controllers;

use App\factorys\company_info\InputValidatorFactory;
use App\Models\CompanyInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\company_info\StoreCompanyInfoRequest;
use App\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyInfoController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $companyInfos = $this->getAll($request->search);

        return view('company_info.index', compact('companyInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()    
    {
        return view('company_info.create');
    }


    public function createWithImage(?string $type = null)    
    {
        return view('company_info.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input = InputValidatorFactory::create($request->key);
    
            $validator = $input->validate($request);

            $validated = $validator->validated();

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            if ($this->isImage($request)) {
                $this->generateName($request->file('value'));

                $this->save($request->file('value'), 'images/company_images/');

                $validated['value'] = $this->getImageName();
            }


            CompanyInfo::create([
                'key' => $validated['key'],
                'value' => $validated['value'],
                'user_id' => Auth::user()->id,
            ]);




            return redirect()->route('company_infos.index');
    
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyInfo $companyInfo)
    {
        $company_infos = CompanyInfo::all('key'); 

        return view('company_info.edit', compact('companyInfo', 'company_infos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyInfo $companyInfo)
    {
        try {

            $input = InputValidatorFactory::create($companyInfo->key);
    
            $validator = $input->validate($request);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $validated = $validator->validated();

            if ($this->isImage($request)) {
                $this->generateName($request->file('value'));
                $this->save($request->file('value'), 'images/company_images/');
                $validated['value'] = $this->getImageName();
            }


            $companyInfo->update([
                'key' => $validated['key'],
                'value' => $validated['value'],
                'user_id' => $request->user()->id,
            ]);
    
            return redirect()->route('company_infos.index');

        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyInfo $companyInfo)
    {
        try {
            $companyInfo->delete();

            return redirect()->route('company_infos.index');
        } catch (\Throwable $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

    private function getAll(?string $key = ''): LengthAwarePaginator
    {
        $companyInfos = [];
        $attributes = [
            'key', 
            'id', 
            'value', 
            'is_active',
        ];

        if (empty($key)) {
            $companyInfos = CompanyInfo::select($attributes)->orderByDesc('id')->paginate(5);
            
            return $companyInfos;
        } 

        $companyInfos = CompanyInfo::select($attributes)
        ->where('key', 'like', '%'. $key . '%')
        ->paginate(5);

        return $companyInfos;
    }

     /**
     *  Checa se o que foi enviado é uma imagem.
     */
    private function isImage(Request $request): bool
     {
        if ($request->hasFile('value')) {
            return true;
        }
        return false;
     }

/*      private function checkIfIsImage(Request $request, &$validated = []): void
    {
        if ($request->hasFile('value')) {

            $requestImage = $request->file('value');
            $this->generateName($requestImage);

            $validated['value'] = $this->getImageName();
            $requestImage->move(public_path('images/company_images/'), $validated['value']);

            return;
        }

        throw new \Exception("Imagem inválida!");
        
    } */
    /* private function checkIfIsImage(Request $request, &$validated = []): void
    {
        if ($request->hasFile('value')) {

            $requestImage = $request->file('value');
            $this->generateName($requestImage);

            $validated['value'] = $this->getImageName();
            $requestImage->move(public_path('images/company_images/'), $validated['value']);

            return;
        }

        throw new \Exception("Imagem inválida!");
        
    } */
}
