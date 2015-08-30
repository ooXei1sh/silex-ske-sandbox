<?php

namespace Dev\Command;

use Silex\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class PasswordEncodeCommand extends Command
{
    protected $encoder;

    public function getEncoder()
    {
        return $this->encoder;
    }

    public function setEncoder(PasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    protected function configure()
    {
        $this
            ->setName('security:crypt')
            ->setDescription('Encode a password')
            ->addOption('encode', null, InputOption::VALUE_REQUIRED, 'Password to encode')
            ->addOption('salt', null, InputOption::VALUE_REQUIRED, 'Password salt')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $verbose = ($input->getOption('verbose')) ? true : false;
        $passwordRaw = $input->getOption('encode');
        $salt = ($input->getOption('salt')) ? $input->getOption('salt') : false;

        $encoder = $this->getEncoder();

        if ($verbose) {
            $output->writeln(sprintf('Encoder: <info>%s</info>', print_r(get_class($encoder),1)));
            $output->writeln(sprintf('Methods: <info>%s</info>', print_r(get_class_methods($encoder),1)));
        }

        $password = $encoder->encodePassword($passwordRaw, $salt);
        $output->writeln(sprintf('<info>password:</info> %s', $password));
    }
}
