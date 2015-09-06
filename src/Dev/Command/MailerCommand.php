<?php

namespace Dev\Command;

use Silex\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MailerCommand extends Command
{
    protected $mailer;

    public function getMailer()
    {
        return $this->mailer;
    }

    public function setMailer($mailer)
    {
        $this->mailer = $mailer;
    }

    protected function configure()
    {
        $this
            ->setName('mailer:send')
            ->setDescription('Send an email.')
            ->addOption('to', null, InputOption::VALUE_REQUIRED, 'To email address')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $verbose = ($input->getOption('verbose')) ? true : false;

        $to = ($input->getOption('to')) ? $input->getOption('to') : null;
        if (!$to) {
            $output->writeln(sprintf('<error>fail</error> %s', '--to option is required'));
            exit();
        }

        $mailer = $this->getMailer();

        if ($verbose) {
            $output->writeln(sprintf('Mailer: <info>%s</info>', print_r(get_class($mailer),1)));
            $output->writeln(sprintf('Methods: <info>%s</info>', print_r(get_class_methods($mailer),1)));
        }

        $mailer->From = 'noreply@acme.com';
        $mailer->FromName = $mailer->From;
        $mailer->isHTML(false);
        $mailer->AddAddress($to);
        $mailer->Subject = 'Mailer Test';
        $mailer->Body = 'Testing 1, 2, 3';

        if ($mailer->Send()){
            $output->writeln(sprintf('<info>sent:</info> %s', 'success'));
        }
        else {
            $app['monolog']->addError(sprintf('Failed email. ErrorInfo: %s %s %s', $mailer->ErrorInfo, __FILE__, __LINE__));
            $output->writeln(sprintf('<error>fail:</error> %s', $mailer->ErrorInfo));
        }
    }
}
