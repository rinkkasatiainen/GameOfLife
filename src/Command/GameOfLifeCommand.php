<?php
/**
 * Created by PhpStorm.
 * User: niklase
 * Date: 08/11/2016
 * Time: 14.10
 */

namespace GameOfLife\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GameOfLifeCommand extends Command
{
    public function fooBar() {

    }

    protected function configure()
    {
        parent::configure(); // TODO: Change the autogenerated stub
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output); // TODO: Change the autogenerated stub
    }
}