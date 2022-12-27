<?php

namespace App\Command;

use App\Entity\Stock;
use App\Http\FinanceApiClientInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class RefreshStockProfileCommand extends Command
{

    protected static $defaultName = 'app:refresh-stock-profile';

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var FinanceApiClientInterface
     */
    private FinanceApiClientInterface $financeApiClient;

    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;



    /**
     * @var LoggerInterface
    */
    private LoggerInterface $logger;




    /**
     * @param EntityManagerInterface $entityManager
     * @param FinanceApiClientInterface $financeApiClient
     * @param SerializerInterface $serializer
     * @param LoggerInterface $logger
    */
    public function __construct(
        EntityManagerInterface $entityManager,
        FinanceApiClientInterface $financeApiClient,
        SerializerInterface $serializer,
        LoggerInterface $logger
    )
    {
        $this->entityManager = $entityManager;

        $this->financeApiClient = $financeApiClient;

        $this->serializer = $serializer;

        $this->logger = $logger;

        parent::__construct();
    }


    /**
     * @return void
    */
    protected function configure()
    {
        $this
            ->setDescription('Retrieve a stock profile from the Yahoo Finance API. Update the record in the DB')
            ->addArgument('symbol', InputArgument::REQUIRED, 'Stock symbol e.g. AMZN for Amazon')
            ->addArgument('region', InputArgument::REQUIRED, 'The region of the company e.g. US for United States');
    }





    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
    */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        try {

            # 1. Ping Yahoo API and grab the response ( a stock profile )
            $stockProfile = $this->financeApiClient->fetchStockProfile($input->getArgument('symbol'), $input->getArgument('region'));


            # 2.a Use the stock profile to create a record if it doesn't exist
            if ($stockProfile->getStatusCode() !== 200) {

                $output->writeln($stockProfile->getContent());

                return Command::FAILURE;
            }


            # 2.b Use response to reate a record if doesn't exist
            // Attempt to find a record in the DB using the $stockProfile symbol
            $symbol = json_decode($stockProfile->getContent())->symbol ?? null;


            if ($stock = $this->entityManager->getRepository(Stock::class)->findOneBy(['symbol' => $symbol])) {

                // Update if found

            } else {

                // Create a new stock record if not found
                /** @var Stock $stock */
                $stock = $this->serializer->deserialize($stockProfile->getContent(), Stock::class, 'json', [
                    Stock::class => [AbstractNormalizer::OBJECT_TO_POPULATE => $stock]
                ]);

            }


            $this->entityManager->persist($stock);

            $this->entityManager->flush();

            // dd($output);

            $output->writeln($stock->getShortName() . ' has been saved / updated.');

            return Command::SUCCESS;

        } catch (\Exception $exception) {

             // Log everything and learn
             $this->logger->warning(
                 get_class($exception) . ': ' .
                 $exception->getMessage() .' in ' .
                 $exception->getFile() . ' on line '.
                 $exception->getLine() . ' using [symbol/region] ' .
                 '[' .  $input->getArgument('symbol'). '/'. $input->getArgument('region'). ']'
             );

             return Command::FAILURE;
        }
    }
}