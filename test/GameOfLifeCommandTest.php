<?php
require __DIR__ . '/../vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: akis
 * Date: 15/11/16
 * Time: 14:22
 */
class GameOfLifeCommandTest extends PHPUnit_Framework_TestCase
{
    private $prophet;

    private $gameOfLifeCommand;

    private $gameOfLifeCommand1;

    private $input;

    private $output;

    private $stuff;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass(); // TODO: Change the autogenerated stub
        $loader = new \Symfony\Component\ClassLoader\Psr4ClassLoader();
        $loader->addPrefix('GameOfLife', __DIR__ . '/../src');
        $loader->addPrefix('Test', __DIR__ );
        $loader->register();
    }

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->prophet = new Prophecy\Prophet;

        $stuff = $this->prophet->prophesize();
        $stuff->willExtend('\GameOfLife\Stuff');
        $this->stuff = $stuff;

        $this->gameOfLifeCommand = new \Test\GameOfLifeCOmmandStubb($stuff->reveal());
        $input = $this->prophet->prophesize();
        $input->willImplement('\Symfony\Component\Console\Input\InputInterface');
        $input->getOption('width')->willReturn(300);
        $input->getOption('height')->willReturn(100);
        $this->input = $input->reveal();

        $output = $this->prophet->prophesize();
        $output->willImplement('\Symfony\Component\Console\Output\OutputInterface');
        $this->output = $output->reveal();
    }


    public function test() {
        // Arrange
        $this->stuff->generateBoard($this->input->getOption('width'), $this->input->getOption('height'))->shouldBeCalled();

        // Act
        $this->gameOfLifeCommand->testExecute($this->input, $this->output);

        // Assert
        $this->prophet->checkPredictions();
    }
}
