<?php

namespace Dev\Pub\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class MailerServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['mailer'] = $app->share(function () use ($app) {

            $mailer = new \PHPMailer(true);
            $mailer->isSMTP();

            $mailer->SMTPAuth   = $app['mailer.options']['smtpauth'];
            $mailer->SMTPSecure = $app['mailer.options']['smtpsecure'];
            $mailer->Host       = $app['mailer.options']['host'];
            $mailer->Port       = $app['mailer.options']['port'];
            $mailer->Username   = $app['mailer.options']['username'];
            $mailer->Password   = $app['mailer.options']['password'];

            return $mailer;
        });
    }

    public function boot(Application $app)
    {
    }
}
