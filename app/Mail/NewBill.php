<?php

namespace App\Mail;

use App\Account;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBill extends Mailable
{
    use Queueable, SerializesModels;

    public $account;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Account $account)
    {
        $this->account = $account;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hussain@techsolme.com','Hussain')
                    ->to('bhhussain@gmail.com','Hameed')
                    ->subject($this->account->th_comp_name)
                    ->view('email.newbill.added');
    }
}
