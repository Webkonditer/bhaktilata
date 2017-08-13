<?php

namespace App\Forms;

class FormsInsertion
{
    public static function process($text)
    {
        $formsRepository = app()->make('\App\Repositories\FormsRepository');
        $forms = $formsRepository->all();

        foreach ($forms as $code => $form) {
            if (mb_strpos($text, '%form:' . $code) !== false) {
                $text = str_replace('%form:' . $code, $form->render(), $text);
            }
        }

        return $text;
    }
}
