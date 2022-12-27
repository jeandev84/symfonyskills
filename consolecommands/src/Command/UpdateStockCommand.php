<?php
namespace App\Command;

use App\Entity\StockItem;
use App\Repository\StockItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class UpdateStockCommand extends Command
{

    const INVENTORY_DIRECTORY = "/public/supplier-inventory-files/supplier1/";


    /**
     * @var string
    */
    protected static $defaultName = 'app:update-stock';


    /**
     * @var string
    */
    private $projectDir;



    /**
     * @var EntityManagerInterface
    */
    private $entityManager;


    /**
     * @param $projectDir
     * @param EntityManagerInterface $entityManager
    */
    public function __construct($projectDir, EntityManagerInterface $entityManager)
    {
        $this->projectDir    = $projectDir;
        $this->entityManager = $entityManager;

        parent::__construct();
    }

     protected function configure()
     {
         $this->setDescription('Update stock records')
              ->addArgument('markup', InputArgument::OPTIONAL, 'Percentage markup', 20)
              ->addArgument('process_date', InputArgument::OPTIONAL, 'Date of the process', date_create()->format('Y-m-d'));
     }


     protected function execute(InputInterface $input, OutputInterface $output)
     {
           $processDate = $input->getArgument('process_date');
           $markUp      = ($input->getArgument('markup') / 100) + 1;

           // Convert csv file content into iterable php
           $supplierProducts = $this->getCsvRowsAsArrays($processDate);

           /** @var StockItemRepository $stockItemRepo */
           $stockItemRepo = $this->entityManager->getRepository(StockItem::class);

           $existingCount = 0;
           $newCount = 0;

           // Loop over records
           foreach ($supplierProducts as $supplierProduct) {

               // Update IF matching records found in DB
               /** @var StockItem $existingStockItem */
               if($existingStockItem = $stockItemRepo->findOneBy(['itemNumber' => $supplierProduct['item_number']])) {

                   $this->updateStockItem($existingStockItem, $supplierProduct, $markUp);

                   $existingCount++;

                   continue;
               }


               // Create new records if matching records not found in the DB
               $this->createNewStockItem($supplierProduct, $markUp);

               $newCount++;
           }


           $this->entityManager->flush();

           //
           $io = new SymfonyStyle($input, $output);

           $io->success("$existingCount existing items have been updated. $newCount items have been added.");

           return Command::SUCCESS;

     }




     /**
      * @param $processDate
     * @return array
     */
     public function getCsvRowsAsArrays($processDate): array
     {
         // $inputFile = $this->projectDir . self::INVENTORY_DIRECTORY. $processDate .".csv";

         $inputFile = $this->projectDir . '/public/supplier-inventory-files/supplier1/2020-09-24.csv';

         $decoder = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);

         return $decoder->decode(file_get_contents($inputFile), 'csv');
     }




      /**
       * @param StockItem $existingStockItem
       * @param array $supplierProduct
       * @param int $markUp
       * @return StockItem
      */
      public function updateStockItem(StockItem $existingStockItem, array $supplierProduct, int $markUp): StockItem
      {
           $existingStockItem->setSupplierCost($supplierProduct['cost']);
           $existingStockItem->setPrice($supplierProduct['cost'] * $markUp);
           $this->entityManager->persist($existingStockItem);

           return $existingStockItem;
       }




        /**
         * @param $supplierProduct
         * @param $markUp
         * @return StockItem
       */
       public function createNewStockItem($supplierProduct, $markUp): StockItem
       {
          $newStockItem = new StockItem();
          $newStockItem->setItemNumber($supplierProduct['item_number']);
          $newStockItem->setItemName($supplierProduct['item_name']);
          $newStockItem->setItemDescription($supplierProduct['description']);
          $newStockItem->setSupplierCost($supplierProduct['cost']);
          $newStockItem->setPrice($supplierProduct['cost'] * $markUp);
          $this->entityManager->persist($newStockItem);

          return $newStockItem;
     }

}