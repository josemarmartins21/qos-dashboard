<?php

namespace App\Http\Controllers\web_page;


use App\Http\Controllers\Controller;
use App\strategys\company_infos\CompanyInfoSearcher;
use App\strategys\page_resources\ClienteRenomadoResource;
use App\strategys\page_resources\PageResources;
use App\strategys\page_resources\QuestionResource;
use App\strategys\page_resources\TestimonyResource;

class IndexController extends Controller
{

    public readonly CompanyInfoSearcher $companyInfo;
    private PageResources $pageResources;
    
    public function __construct()
    {
        $this->companyInfo = new CompanyInfoSearcher();
        $this->pageResources = new PageResources();
    }

    /**
     * Retorna todas as consultas para a página.
     */
    public function index()
    {
        $companyInfos = $this->companyInfo->getCompanyInfos();

        $this->pageResources->addResource(new ClienteRenomadoResource);
        $this->pageResources->addResource(new TestimonyResource);
        $this->pageResources->addResource(new QuestionResource);

        $resources = $this->pageResources->getResource();

        $querys = [
            'clientes_renomados' => $resources['clientes_renomados'],
            'testimonies' => $resources['testimonies'],
            'questions' => $resources['questions'],
        ];

        return view('web_page.index', compact('querys', 'companyInfos'));
    }

}
