<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //esta opcion modifica el titulo que se envia en por correo de verificación
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
            ->subject("verificar cuenta")
            ->line("Tú cuenta ya esta casi lista, solo debes presionar el enlace a continuación")
            ->action('Confirmar cuenta', $url )
            ->line('Si no creaste esta cuenta, ignora este mensaje');
        });
    }
}
