<?php

namespace App\Server\Edita;

use App\Server\Edita\Edit;

trait HasEdit
{
    public static function edit($values=null)
    {
        return new Edit(get_called_class(), $values);
    }
}
