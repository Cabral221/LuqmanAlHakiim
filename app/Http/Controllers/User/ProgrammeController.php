<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Info;
use App\Models\Neew;
use App\Models\Slide;
use App\Models\Filiere;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = $this->recapdata();
        $info['current_page'] = 'programs';
        $info['programs'] = Program::all();
        $info['news'] = Neew::limit(10)->get();
        // dd($info);
        return view('program.index',$info);
    }


    /**
     *
     * @param  Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $info = $this->recapdata();
        $info['program'] = $program;

        return view('program.show',$info);
    }

}
