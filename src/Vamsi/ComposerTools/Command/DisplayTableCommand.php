<?php

namespace Vamsi\ComposerTools\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vamsi\ComposerTools\Info;
use Symfony\Component\Console\Helper\Table;

class DisplayTableCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName("display")
            ->setDescription("Displays the extracted info")
            ->addArgument('path', InputArgument::REQUIRED, 'The directory where composer.lock can be found');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $info = new Info($input->getArgument('path'));
        $info->parse();
        $packages = $info->getPackages();
        $tdata = [];
        foreach ($packages as $package) {
            $tdata[] = array($package->getName(), $package->getTime()->format('Y-m-d H:i:s'));
        }

        $table = new Table($output);

        $table
            ->setHeaders(array('Name', 'Release Time'))
            ->setRows($tdata);

        $table->render();
    }
}