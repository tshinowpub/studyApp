<?php

namespace StudyApp\CoreBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class GnaviImportCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gnavi:import');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('test');
    }

}
