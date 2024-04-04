<?php

namespace App\Models;

use Meunik\Edit\Edit;

class Edition extends Edit
{
    public $deleteMissingObjectInObjectArrays = true;
    public $columnsCannotChange_defaults = ['id'];
    public $relationshipsCannotChangeCameCase_defaults = [];

    // public function before()
    // {
    //     dd(
    //         'EditModel - before',
    //         // $this->laravelEdit->table,
    //         $this->laravelEdit->values,
    //     );
    // }

    // public function after()
    // {
    //     dd(
    //         'EditModel - after',
    //         // $this->laravelEdit->table,
    //         $this->laravelEdit->values,
    //         $this->laravelEdit->before,
    //     );
    // }

    // public function exception()
    // {
    //     // dd('EditModel');
    //     dd(
    //         'EditModel - exception',
    //         // $this->laravelEdit->table,
    //         $this->laravelEdit->values,
    //         $this->laravelEdit->camelCase,
    //         $this->laravelEdit->create,
    //     );
    // }
}
