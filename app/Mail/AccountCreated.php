<?php

namespace App\Mail;

use App\Users\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $pwd;

    /**
     * AccountCreated constructor.
     * @param User $user
     */
    public function __construct(User $user, string $pwd)
    {
        $this->user = $user;
        $this->pwd = $pwd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Účet '. $this->user->name.' vytvořen')
            ->markdown('mails.account.created')
            ->with('user', $this->user)
            ->with('pwd', $this->pwd);
    }
}
