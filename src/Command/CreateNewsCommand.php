<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateNewsCommand extends Command
{
    protected function configure()
    {
        $this
            // имя команды (часть после "bin/console")
            ->setName('app:create-news')

            // краткое описание, отображающееся при запуске "php bin/console list"
            ->setDescription('Creates news.');

        $this
            // создать аргумент
            ->addArgument('head', InputArgument::REQUIRED, 'The head of the news.')
            ->addArgument('text', InputArgument::REQUIRED, 'The text of the news.')
            ->addArgument('date', InputArgument::REQUIRED, 'The date of the news.');
    }

    protected function execute(InputInterface $input)
    {
        $pdo = new PDO('sqlite:news.db');
        $pdo->query("INSERT INTO news VALUES ($input->getArgument('head'), $input->getArgument('text'), $input->getArgument('date'))");

    }
}
