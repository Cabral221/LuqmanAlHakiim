<?php

namespace App\Http\Controllers\Admin\Programms;
use App\Models\Niveau;
use App\Models\Diplome;
use App\Models\Filiere;
use \App\Models\Program;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $programms = Program::All();
        $fil = Filiere::notDraft()->get();
        $diplome = Diplome::All();
        $niv = Niveau::All();

        $newfil = Filiere::draft();

        return view('admin.programms.programms.index',compact(['programms','fil', 'newfil','niv','diplome']));
    }


    public function update(Request $request)
    {
        // dd($request->all());
        $validator = validator::make($request->all(),[
            'program_edit_libele' => 'required|min:2',
            'program_edit_img' => 'required|image|max:5000',
            'program_edit_desc' => 'required|min:10'
        ]);

        // Valider L'image
        if ($request->hasFile('program_edit_img')) {
            // Supprimer l'ancien si y en a
            // ...
            // Sinon enregistrer directement
            $path = $request->file('program_edit_img')->storePublicly('uploads/programs', ['disk' => 'public']);
        }

        if ($validator->fails()) {

            Flashy::error($validator->messages()->first());
            return response()->json($validator->messages(), 422);
        }

        $program = Program::findOrFail($request->prog);
        $program->libele = $request->input('program_edit_libele');
        $program->description = $request->input('program_edit_desc');
        if ($path) $program->image = $path;
        $program->save();

        Flashy::success('Your program has been successfully changed');
        return response()->json($program, 200);
    }

    public function store(Request $request)
    {
        // Validate request
        $this->validate($request, [
            'program_libele' => 'required',
            'program_img' => 'required|image|max:5000',
            'program_desc' => 'required',
        ]);

        // Upload File to Database
        $path = $request->file('program_img')->storePublicly('uploads/programs', ['disk' => 'public']);

        // Create the program on passed validatiion
        Program::create([
            'libele' => $request->program_libele,
            'image' => $path,
            'description' => $request->program_desc,
        ]);

        Flashy::success('Your program has been successfully added');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $delete_prog = Program::find($id);
        if($delete_prog)
        $delete_prog->delete();
        Flashy::success('Your program has been successfully deleted');
        return redirect()->back();
    }
}
