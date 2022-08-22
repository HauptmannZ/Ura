<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($data)
    {
        $this->alamat = $data['alamat'];
    }

    public function build()
    {
        return $this->markdown('templateEmail') //pass here your email blade file
            ->with('alamat', $this->alamat);
    }
}
