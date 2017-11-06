<?php

namespace App\Mail;

use App\Forms\FormInterface;
use App\Forms\SimpleFormResult;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormSubmittedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var FormInterface
     */
    public $form;
    /**
     * @var SimpleFormResult
     */
    public $result;

    /**
     * Create a new message instance.
     *
     * @param FormInterface    $form
     * @param SimpleFormResult $result
     */
    public function __construct(FormInterface $form, SimpleFormResult $result)
    {
        $this->form = $form;
        $this->result = $result;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заполнена форма: ' . $this->form->getTitle())
                    ->view('mail.form-admin.html')
                    ->text('mail.form-admin.text');
    }
}
