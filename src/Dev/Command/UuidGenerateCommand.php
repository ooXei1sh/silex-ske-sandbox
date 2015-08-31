<?php

namespace Dev\Command;

use Silex\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Rhumsaa\Uuid\Uuid;

class UuidGenerateCommand extends Command
{
    protected $generator;

    public function getGenerator()
    {
        return $this->generator;
    }

    public function setGenerator(Uuid $generator)
    {
        $this->generator = $generator;
    }

    protected function configure()
    {
        $this
            ->setName('security:uuid')
            ->setDescription('Generate uuid')
            ->addOption('dashes', null, InputOption::VALUE_NONE, 'Use dashes')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $verbose = ($input->getOption('verbose')) ? true : false;
        $dashes = ($input->getOption('dashes')) ? true : false;

        $generator = $this->getGenerator();

        if ($verbose) {
            $output->writeln(sprintf('Generator: <info>%s</info>', print_r(get_class($generator),1)));
            $output->writeln(sprintf('Methods: <info>%s</info>', print_r(get_class_methods($generator),1)));
        }

        $uuid = $generator->toString();

        if (!$dashes)
            $uuid = str_replace('-', '', $uuid);

        $output->writeln(sprintf('<info>uuid:</info> %s', $uuid));
    }
}
