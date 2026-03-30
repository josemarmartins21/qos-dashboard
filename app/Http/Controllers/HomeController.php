<?php

namespace App\Http\Controllers;

use App\Models\ClientProveSocial;
use App\Models\Question;
use App\Models\Testimony;
use App\services\visitors\contracts\VisitorServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private VisitorServiceInterface $visitorService,
    )
    {
        
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $datas = [
            'prove_social_active' => ClientProveSocial::getQuantityActive(),
            'testimonies_active' => Testimony::getQuantityActive(),
            'questions_active' => Question::getQuantityActive(),
        ];

        $visitors = $this->visitorService->getAll();

        return view('home', compact('datas', 'visitors'));
    }
}
