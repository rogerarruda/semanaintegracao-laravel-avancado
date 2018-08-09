<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderUpdatedNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Pedido atualizado')
        ->line('Olá, '.$this->order->user->name.'!')
        ->line('Seu pedido foi atualizado, segue os detalhes:')
        ->line('ID: '.$this->order->id)
        ->line('Status: '.$this->order->status)
        ->line('Data: '.$this->order->status_date_br)
        ->action('Ver pedidos', route('user.orders.index'))
        ->line('Obrigado!');
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
