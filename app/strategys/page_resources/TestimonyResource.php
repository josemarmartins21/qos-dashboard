<?php

namespace App\strategys\page_resources;

use App\strategys\page_resources\contracts\PageResourceInterface;
use Illuminate\Support\Facades\DB;

class TestimonyResource implements PageResourceInterface 
{
    private string $informationKey;

    public function __construct()
    {
        $this->informationKey = 'testimonies';
    }

    public function get()
    {
        $testimonies = DB::table('clients')
        ->join('testimonies', 'testimonies.client_id', '=', 'clients.id')
        ->select('clients.name', 'testimonies.testimony')
        ->where('is_active', 1)
        ->limit(5)
        ->get();

        return $testimonies;
    }

    public function getInformationKey(): string
    {
        return $this->informationKey;
    }

}