<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Slide;
use App\Models\Partner;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function recapdata()
    {
        $info = Info::first();
        $partners = Partner::all();
        $slides = Slide::limit(3)->get();
        return compact(['info','partners','slides']);
    }
}
