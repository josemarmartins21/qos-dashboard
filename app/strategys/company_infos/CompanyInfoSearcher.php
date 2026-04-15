<?php


namespace App\strategys\company_infos;

use App\enums\company_infos\CompanyInfoEnum;
use App\Models\CompanyInfo;
use App\strategys\company_infos\contracts\CompanyInfoInterface;

class CompanyInfoSearcher implements CompanyInfoInterface
{
    private CompanyInfo $repository;
    private $companyInfos = [];

    public function __construct()
    {
        $this->repository = new CompanyInfo();
        $this->search();
    }

    private function search(): void
    {
        foreach (CompanyInfoEnum::cases() as $case) {
            $this->companyInfos[$case->name] = $this->repository->where(
                'key',
                $case->value,
            )->first();
        }
    }

    public function getCompanyInfos()
    {
        return $this->companyInfos;
    }


}