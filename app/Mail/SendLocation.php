<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;
use App\User;

class SendLocation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     
     
     */
     protected $userid;
     protected $coordinate;
     protected $contents;
     
    public function __construct($user_id,$coordinate,$contents)
    {
        //
        $this->userid= $user_id;
        $this->coordinate= $coordinate;
        $this->contents = $contents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	
    	$user_id = $this->userid;
    	$user=User::where('id',$user_id)->first();
        return $this->view('mail.sendLocation')
        	     ->with([
        	     	'firstname'=>$user->firstname,
        	     	'lastname'=>$user->lastname,
        	     	'lat'=>$this->coordinate['lat'],
        	     	'long'=>$this->coordinate['lng'],
        	     	'contents'=>$this->contents
        	     ]);
    }
}
