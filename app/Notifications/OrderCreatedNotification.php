<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreatedNotification extends Notification
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
        \Log::debug('Email enviado');
        return (new MailMessage)
        ->subject('Pedido criado')
        ->line('Olá, '.$this->order->user->name.'!')
        ->line('Seu pedido foi criado com sucesso, segue os detalhes:')
        ->line('ID: '.$this->order->id)
        ->line('Produto: '.$this->order->product->name)
        ->line('Preço unitário: '.$this->order->price_unity_br)
        ->line('Quantidade: '.$this->order->quantity)
        ->line('Total: '.$this->order->total_br)
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
