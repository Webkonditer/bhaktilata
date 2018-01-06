<?php

namespace App\View\Admin\News;

use App\Domain\News\News;
use App\View\TableEditor\Form;
use App\View\TableEditor\FormField;
use Illuminate\Http\Request;

class NewsEditForm
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

    public function fill(News $newsItem)
    {
        foreach($this->form()->fields() as $field) {
            if ($field->code() == 'published') {
                $field->setValue($newsItem->isPublished());
            } else {
                $field->fill($newsItem);
            }
        }
        $this->form()->setAction(route('admin.news.store', ['newsItem' => $newsItem]));
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
        $form->addField(new FormField\StringFormField('slug', 'Код', [
            'rules' => ['string|max:191|required'],
        ]));
        $form->addField(new FormField\StringFormField('title', 'Заголовок', [
            'rules' => ['string|max:191|required'],
        ]));
        $form->addField(new FormField\DateFormField('date', 'Дата публикации', [
            'rules' => ['date|date_format:d.m.Y|required']
        ]));
        $form->addField(new FormField\ContentFormField('content', 'Содержимое', [
            'rules' => ['string|required'],
        ]));
        $form->addField(new FormField\FileFormField('small_image', 'Картинка для списка', [
            'rules' => ['file|mimes:jpeg,png,gif,jpg'],
        ]));
        $form->addField(new FormField\FileFormField('medium_image', 'Картинка для страницы новости', [
            'rules' => ['file|mimes:jpeg,png,gif,jpg'],
        ]));
        $form->addField(new FormField\FileFormField('full_image', 'Оригинальное изображение', [
            'rules' => ['file|mimes:jpeg,png,gif,jpg'],
        ]));

        return $form;
    }
}
