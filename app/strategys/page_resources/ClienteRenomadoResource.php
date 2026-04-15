<?php

namespace App\strategys\page_resources;

use App\strategys\page_resources\contracts\PageResourceInterface;
use Illuminate\Support\Facades\DB;

class ClienteRenomadoResource implements PageResourceInterface 
{
    public function get()
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
}