<?php
namespace App\Mail;
use App\Models\Token;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class PmbToken extends Mailable
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
                   ->view('email.token', compact('token'));
    }
}
