<?php

namespace App\Http\Controllers;

use App\Models\Editar;
use App\Models\Pessoa;
use App\Models\EditModel;
use App\Server\Edita\Edit;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function show(string $id)
    {
        return Pessoa::find($id);
    }

    public function editOld(Request $request)
    {
        Editar::table(Pessoa::class)->values($request->all())->run();
        return Pessoa::find($request->id);
    }
    public function edit(Request $request)
    {
        // return EditModel::table(Pessoa::class)->values($request->all())->run();
        return Pessoa::edit($request->all())->run();


        // return Pessoa::find($request->id);

        // return Pessoa::edit($request->all())->run();

        // return Pessoa::edit()->teste();

        // return Edit::notChange()->valor()->run();
        // return Pessoa::edit()->valor(['teste'=> 123])->run();
    }
}
