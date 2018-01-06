<?php

namespace App\View\TableEditor\FormField;

use App\View\TableEditor\FormField;
use Illuminate\Http\Request;

class FileFormField extends FormField
{
    public function render()
    {
        return view('table-editor.fields.file', [
            'field' => $this,
        ]);
    }

    public function fillFromRequest(Request $request)
    {
        $this->setValue($request->file('edit.' . $this->code()));
    }
}
