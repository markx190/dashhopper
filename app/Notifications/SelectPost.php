<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use App\Post;
use App\Sparejam;
use Auth;

class SelectPost extends Notification
{
    use Queueable;

	protected $sparejam;
	
    public function __construct(Sparejam $sparejam)
    {
        $this->sparejam = $sparejam;
    }

    public function via($notifiable)
    {
        return ['database'];
    }
   
    public function toArray($notifiable)
    {
        return [
            'data' => 'You have new Sparetimer ' . $this->sparejam->title . " <br> Added By " . auth()->user()->firstname
			
        ];
    }
}
