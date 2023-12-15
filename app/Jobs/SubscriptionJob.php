<?php

namespace App\Jobs;

use App\Mail\SubscriptionMail;
use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

     protected $mailable;


     public function __construct(  $data)
     {
         $this->mailable = $data;
     }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $newsletters =  Newsletter::all();
        foreach($newsletters as $key=>$news){

            Mail::to($news->adresse_mail)->send(new SubscriptionMail($this->mailable) );
        }


    }


}
