<?php
namespace App\Command;

use App\Message\SendNotificationMessage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;


#[AsCommand(name: 'app:send-notification')]
class SendNotificationCommand extends Command
{
      private MessageBusInterface $bus;

      public function __construct(MessageBusInterface $bus, string $name = null)
      {
          parent::__construct($name);
          $this->bus = $bus;
      }


      /**
       * @param InputInterface $input
       * @param OutputInterface $output
       * @return int
      */
      protected function execute(InputInterface $input, OutputInterface $output): int
      {
            $this->bus->dispatch(new SendNotificationMessage('Hello from CLI!'));

            return Command::SUCCESS;
      }
}