<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $content;
    public $description;
    public $picture;

    public function __construct($data)
    {
         $this->subject = $data['title'];
         $this->content = $data['content'];
         $this->description = $data['description'];
         $this->picture = $data['picture'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("adingranarcisse2@gmail.com")
         ->subject($this->subject)
        ->view('mail.subscriptionmail')->with([
            'content' => $this->content,
            'description' => $this->description,
            'picture' => $this->picture,
        ]);;
    }
}
