<?php

namespace gym\Notifications;

use gym\Dieta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoticarDieta extends Notification
{
    use Queueable;
    protected $dieta;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Dieta $dieta)
    {
        $this->dieta=$dieta;
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
        return (new MailMessage)
                    ->subject('Nueva dieta')
                    ->line('Tenemos una nueva dieta que te puede interesar')
                    ->line($this->dieta->titulo)
                    ->line('Peso: '.$this->dieta->peso)
                    ->line('Altura: '.$this->dieta->altura);
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
