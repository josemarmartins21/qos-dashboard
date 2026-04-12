<?php

namespace App\Http\Controllers\web_page;

use App\enums\company_infos\CompanyInfoEnum;
use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public readonly CompanyInfo $companyInfo;
    
    public function __construct()
    {
        $this->companyInfo = new CompanyInfo();
    }

    /**
     * Retorna todas as consultas para a página.
     */
    public function index()
    {
        $companyInfos = $this->getCompanyInfos();

        $querys = [
            'clientes_renomados' => $this->getClientesRenomados(),
            'testimonies' => $this->getTestimonies(),
            'questions' => $this->getQuestions(),
        ];
        return view('web_page.index', compact('querys', 'companyInfos'));
    }

    private function getClientesRenomados()
    {
        $clientesRenomados = DB::table('clients')
        ->join('client_prove_socials', 'client_prove_socials.client_id', '=', 'clients.id')
        ->select(
            'client_prove_socials.logo as image', 
            'client_prove_socials.url',
            'clients.company_role as name', 
        )
        ->where('is_active', 1)
        ->limit(4)
        ->get();

        return $clientesRenomados;
    }

    private function getTestimonies()
    {
        $testimonies = DB::table('clients')
        ->join('testimonies', 'testimonies.client_id', '=', 'clients.id')
        ->select('clients.name', 'testimonies.testimony')
        ->where('is_active', 1)
        ->limit(5)
        ->get();

        return $testimonies;
    }
    
    private function getQuestions()
    {
        $questions = Question::select('question', 'response')
        ->where('is_active', 1)
        ->limit(6)
        ->get();

        return $questions;
    }

    private function getCompanyInfos()
    {
        return [
            'telefone' => $this->companyInfo
            ->where(
                'key', 
                CompanyInfoEnum::Phone->value
            )
            ->first(),

            'whatsapp' => $this->companyInfo->where(
                'key',
                CompanyInfoEnum::Whatsapp->value,
            )->first(),
                        
            'sobre' => $this->companyInfo->where(
                'key',
                CompanyInfoEnum::Sobre->value,
            )->first(),

            'logotipo' => $this->companyInfo->where(
                'key',
                CompanyInfoEnum::Logotipo->value,
            )->first(),

            'hero_image' => $this->companyInfo->where(
                'key',
                CompanyInfoEnum::HeroImage->value,
            )->first(),          
        ];
    }

}
