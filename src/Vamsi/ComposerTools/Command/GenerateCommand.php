<?php

namespace Vamsi\ComposerTools\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vamsi\ComposerTools\Info;
use Twig_Loader_Filesystem;
use Twig_Environment;

Class GenerateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName("generate")
            ->setDescription("Displays the extracted info")
            ->addArgument('ipath', InputArgument::REQUIRED, 'path to composer.lock')
            ->addArgument('opath', InputArgument::REQUIRED, 'The file in which the report should be saved');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $info = new Info($input->getArgument('ipath'));
        $file = $input->getArgument('opath');
        $info->parse();
        $packages = $info->getPackages();
        $loader = new Twig_Loader_Filesystem(__DIR__ . "/../Resources/views");
        $twig = new Twig_Environment($loader);
        file_put_contents($file, $twig->render('table.html.twig', array('packages' => $packages)));
    }
}