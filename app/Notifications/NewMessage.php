<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Client;

class NewMessage extends Notification implements ShouldQueue
{
    use Queueable;
	public $fromUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Client $user)
    {
        $this->fromUser = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = sprintf('%s: You\'ve got a new message from %s!', config('app.name'), $this->fromUser->name);
        $greeting = sprintf('Hello %s!', $notifiable->name);
 
        return (new MailMessage)
                    ->subject($subject)
					->from('test@example.com', 'Example')
                    ->greeting($greeting)
                    ->salutation('Yours Faithfully')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
