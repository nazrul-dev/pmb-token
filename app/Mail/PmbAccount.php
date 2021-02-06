<?php
namespace App\Mail;
use App\Models\Token;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class PmbAccount extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public function __construct(Token $token)
    {
        $this->token = $token;
    }
    public function build()
    {
        $token = $this->token;
        return $this->from('pmbunipo@gmail.com')
                   ->view('email.account', compact('token'));
    }
}
