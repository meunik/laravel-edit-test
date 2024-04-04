<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function show(string $id)
    {
        return Pessoa::find($id);
    }

    public function editOld(Request $request)
    {
        Edition::table(Pessoa::class)->values($request->all())->run();
        return Pessoa::find($request->id);
    }

    public function edit(Request $request)
    {
        // return Edition::table(Pessoa::class)->values($request->all())->run();
        return Pessoa::edit($request)->notChange('rua')->run();
    }
}
