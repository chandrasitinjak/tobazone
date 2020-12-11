<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class jadwalPaket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pakets)
    {
        $this->pakets = $pakets;
        $this->subject('Jadwal Paket Wisata');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $paket = $this->pakets;
        return $this->view('paket-wisata.jadwalPaket',compact('paket'));
    }
}
