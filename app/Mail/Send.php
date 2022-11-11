<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Send extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */

     
    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        try {
            return $this->from('certificacao@ibape-nacional.com.br')
                        ->subject('Recuperação de senha IBAPE NACIONAL')
                        ->to($this->data['email'],$this->data['name'])
                        ->markdown('mail.send',[
                                'nome' => $this->data['name'],
                                'link' => $this->data['link'],
                                'email' => $this->data['email'],
                    ]);

            } catch (\Exception $e) {
                ddd($e);
            }
    }
}
