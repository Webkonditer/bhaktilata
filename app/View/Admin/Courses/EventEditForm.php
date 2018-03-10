<?php

namespace App\View\Admin\Courses;

use App\Domain\Courses\CourseEvent;
use App\View\TableEditor\Form;
use App\View\TableEditor\FormField;
use Illuminate\Http\Request;

class EventEditForm
{
    /** @var Form */
    private $form;

    public function render()
    {
        return view('table-editor.form-page', [
            'form' => $this->form(),
        ]);
    }

    public function form(): Form
    {
        return $this->form ?: $this->form = $this->createForm();
    }

    public function getRules(): array
    {
        return $this->form()->getRules();
    }

    public function fill(CourseEvent $courseEvent)
    {
        foreach($this->form()->fields() as $field) {
            if ($field->code() == 'published') {
                $field->setValue($courseEvent->isPublished());
            } elseif ($field->code() == 'is_opened') {
                $field->setValue($courseEvent->isOpened());
            } elseif ($field->code() == 'dates_confirmed') {
                $field->setValue($courseEvent->datesConfirmed());
            } else {
                $field->fill($courseEvent);
            }
        }
        $this->form()->setAction(route('admin.courses.events.store', ['courseEvent' => $courseEvent]));
    }

    public function process(Request $request)
    {
        foreach ($this->form()->fields() as $field) {
            $field->fillFromRequest($request);
        }
    }

    public function values()
    {
        $values = [];
        foreach ($this->form()->fields() as $field) {
            $values[$field->code()] = $field->value();
        }
        return $values;
    }

    private function createForm(): Form
    {
        $form = new Form();

        $form->addField(new FormField\CheckboxFormField('published', 'Отображается на сайте'));
        $form->addField(new FormField\StringFormField('title', 'Название', [
            'rules' => ['string|max:191|required'],
        ]));
        $form->addField(new FormField\DateFormField('date_start', 'Дата начала', [
            'rules' => ['date_format:d.m.Y|required']
        ]));
        $form->addField(new FormField\DateFormField('date_end', 'Дата окончания', [
            'rules' => ['nullable|date_format:d.m.Y']
        ]));
        $form->addField(new FormField\CheckboxFormField('dates_confirmed', 'Даты подтверждены'));
        $form->addField(new FormField\CheckboxFormField('is_opened', 'Запись открыта'));
        $form->addField(new FormField\StringFormField('location', 'Место проведения', [
            'rules' => ['string|max:191|required'],
        ]));
        $form->addField(new FormField\StringFormField('teacher', 'Ведущий', [
            'rules' => ['nullable|string|max:191'],
        ]));
        $form->addField(new FormField\StringFormField('course_link', 'Ссылка на страницу курса', [
            'rules' => ['string|max:191|required'],
        ]));
        $form->addField(new FormField\FileFormField('image', 'Картинка', [
            'rules' => ['file|mimes:jpeg,png,gif,jpg'],
        ]));

        return $form;
    }
}
