<?php

namespace App\Models;

use Meunik\Edit\Edit;

class Editar extends Edit
{
    protected $deleteMissingObjectInObjectArrays = true;
    protected $createMissingObjectInObjectArrays = true;
    protected $columnsCannotChange_defaults = ['id'];
    protected $relationshipsCannotChangeCameCase_defaults = [];
}
