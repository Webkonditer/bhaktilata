<?php

namespace App\Mail;

use App\Forms\FormInterface;
use App\Forms\SimpleFormResult;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormSubmittedClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var FormInterface
     */
    private $form;
    /**
     * @var SimpleFormResult
     */
    private $result;

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
        return $this->subject('Ваше обращение принято!')
                    ->view('mail.form-client');
    }
}
