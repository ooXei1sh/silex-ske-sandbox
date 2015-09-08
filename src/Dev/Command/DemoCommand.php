<?php

namespace Dev\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DemoCommand extends Command
{
    protected $output;

    protected function configure()
    {
        $this
            ->setName('demo:command')
            ->setDescription('Demo console helpers.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        $this->output = $output;

        $items = array(
            'progress',
            'table',
            'formatter',
            'dialog',
        );

        $sel = $this->getHelper('dialog')->select($output, 'Select by key number: ', $items, '0');
        $formatter = $this->getHelper('formatter');

        switch ($items[$sel])
        {
            case 'progress':
                $formatted = $formatter->formatBlock('Progress', 'info', true);
                $output->writeln($formatted);

                $progress = $this->getHelper('progress');
                $progress->start($output, 25);
                $i = 0;
                while ($i++ < 25) {
                    usleep(50000);
                    $progress->advance();
                }
                $progress->finish();
                break;

             case 'table':
                $formatted = $formatter->formatBlock('Table', 'info', true);
                $output->writeln($formatted);

                $table = $this->getHelper('table');
                $table
                    ->setHeaders(array('1','2','3'))
                    ->setRows(array(array('a','a','a'),array('b','b','b'),array('c','c','c')))
                    ->setLayout($table::LAYOUT_DEFAULT)
                ;
                $table->render($output);
                break;

            case 'formatter':
                //$formatter = $this->getHelper('formatter');
                $formatted = $formatter->formatBlock('Formatter', 'info', true);
                $output->writeln($formatted);

                $formatted = $formatter->formatSection('Info', 'Format section info text.');
                $output->writeln($formatted);
                $output->writeln('');

                $array = array('Format block error', 'Foo bar baz qux');
                array_walk($array, function(&$v,$k){ $v = '* '.$v; });

                $formatted = $formatter->formatBlock($array, 'error');
                $output->writeln($formatted);
                $output->writeln('');

                $formatted = $formatter->formatBlock('Format block error with space', 'error', true);
                $output->writeln($formatted);
                $output->writeln('');

                $formatted = $formatter->formatBlock('Format block info with space', 'info', true);
                $output->writeln($formatted);
                break;

            case 'dialog':
                $dialog = $this->getHelper('dialog');

                $formatted = $formatter->formatBlock('Dialog', 'info', true);
                $output->writeln($formatted);

                $opts = array('ask', 'autocomplete', 'hidden', 'confirm', 'validator', 'shy');
                $sel = $dialog->select($output, 'Which dialog would you like to demo?', $opts, '0');

                $formatted = $formatter->formatBlock(ucfirst($opts[$sel]), 'info', true);
                $output->writeln($formatted);

                switch($opts[$sel])
                {
                    case 'ask':
                        $time = $dialog->ask($output, 'What time is it? ', '2PM');
                        $output->writeln("The time now is $time.");
                        break;

                    case 'autocomplete':
                        $bundles = array('AcmeDemoBundle', 'AsseticBundle', 'SecurityBundle', 'FooBundle');
                        $selection = $dialog->ask($output, 'Please select a bundle: ', 'FrameworkBundle', $bundles);
                        $output->writeln("You selected $selection");
                        break;

                    case 'hidden':
                        $response = $dialog->askHiddenResponse($output, 'What time is it? ');
                        $output->writeln("The time now is $response");
                        break;

                    case 'confirm':
                        $confirm = $dialog->askConfirmation($output, 'Do you like French fries? ', true);

                        if ($confirm)
                            $output->writeln('You like French fries.');
                        else
                            $output->writeln('You do not like French fries.');
                        break;

                    case 'validator':
                        $question ='What color was the white horse of Henry IV? ';
                        $error = 'This is not a color!';

                        $validator = function ($color) use ($error) {
                            if (!in_array($color, array('white', 'black'))) {
                                throw new \InvalidArgumentException($error);
                            }
                            return $color;
                        };

                        try {
                            $answer = $dialog->askAndValidate($output, $question, $validator, 3, 'white');
                            $output->writeln("You answered $answer");
                        }
                        catch (\InvalidArgumentException $e) {
                            $output->writeln(sprintf('<error>fail</error> %s', 'Only 3 chances to answer correctly.'));
                            $output->writeln(sprintf('<info>message</info> %s', $e->getMessage()));
                        }
                        break;

                    case 'shy':
                        $input->setInteractive(false);
                        $dialog->setInput($input);
                        $dialog->ask($output, 'Do you have a job? ', 'not yet');
                        break;
                }
                break;
        }
    }
}
