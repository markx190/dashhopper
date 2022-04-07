<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use App\Post;
use Auth;

class ReplyPost extends Notification
{
    use Queueable;

	protected $post;
	
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database'];
    }
   
    public function toArray($notifiable)
    {
        return [
            'data' => 'You have new post ' . $this->post->title . " <br> Added By " . auth()->user()->firstname
			
        ];
    }
}
