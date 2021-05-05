<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function (User $user, string $verificationUrl) {
            return (new MailMessage)
                ->subject(Lang::get('Подтверждение вашей почты'))
                ->line(Lang::get('Пожалуйста нажмите кнопку нижу, чтобы подтвердить почту'))
                ->action(Lang::get('Подтвердить'), $verificationUrl)
                ->line(Lang::get('Если вы не создавали аккаунт, то ничего не делайте'));
        });
    }

}
