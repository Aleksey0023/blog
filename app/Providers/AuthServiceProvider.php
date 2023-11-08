<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
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
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Подтвердите адрес электронной почты')
                ->greeting('Привет!')
                ->line('Пожалуйста, нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты.')
                ->action('Подтвердите адрес электронной почты', $url)
                ->line('Если вы не создавали учётную запись, проигнорируйте это письмо.')
                ->salutation('С уважением, администрация сайта "Блог | Английский для ваших целей"');
        });

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            return (new MailMessage)
                ->subject('Уведомление о сбросе пароля')
                ->greeting('Привет!')
                ->line('Пожалуйста, нажмите кнопку ниже, чтобы сбросить пароль от вашей учётной записи.')
                ->action('Сброс пароля', url(config('app.url').route('password.reset', $token, false)))
                ->line('Срок действия этой ссылки истекает через ' . config('auth.passwords.'.config('auth.defaults.passwords').'.expire') . ' минут.')
                ->line('Если вы не запрашивали сброс пароля, проигнорируйте это письмо.')
                ->salutation('С уважением, администрация сайта "Блог | Английский для ваших целей"');
        });
    }
}
