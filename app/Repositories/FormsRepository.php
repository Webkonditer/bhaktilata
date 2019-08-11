<?php

namespace App\Repositories;

use App\Factories\FormsFactory;

class FormsRepository
{
    /**
     * @var FormsFactory
     */
    private $formsFactory;

    public function __construct(FormsFactory $formsFactory)
    {

        $this->formsFactory = $formsFactory;
    }

    public function find($code)
    {
        $config = config('forms.' . $code, []);
        return $this->formsFactory->fromConfig($code, $config);
    }

    public function all()
    {
        $config = config('forms');

        $forms = [];
        foreach ($config as $code => $parameters) {
            if ($form = $this->formsFactory->fromConfig($code, $parameters)) {
                $forms[$code] = $form;
            }
        }
        return $forms;
    }
}