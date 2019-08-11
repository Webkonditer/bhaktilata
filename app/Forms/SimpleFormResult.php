<?php
declare(strict_types=1);

namespace App\Forms;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SimpleFormResult
 *
 * @package App\Forms
 *
 * @property array $values
 */
class SimpleFormResult extends Model
{
    use Uuids;

    protected $table = 'forms_results';

    public $incrementing = false;

    protected $fillable = [
        'date',
        'values',
    ];

    protected $dates = [
        'date',
    ];

    protected $casts = [
        'values' => 'array',
    ];

    /** @var FormInterface */
    private $form;

    public function setForm(FormInterface $form)
    {
        $this->form = $form;
        $this->attributes['form_code'] = $form->getCode();

        return $this;
    }
}
