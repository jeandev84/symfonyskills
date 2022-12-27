<?php
namespace App\Controller;

use App\Cache\PromotionCache;
use App\DTO\LowestPriceEnquiry;
use App\Filter\Contracts\PromotionsFilterInterface;
use App\Repository\ProductRepository;
use App\Service\Serializer\DTOSerializer;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ProductsController extends AbstractController
{


     /**
      * @param ProductRepository $productRepository
      * @param EntityManagerInterface $entityManager
     */
     public function __construct(
         private ProductRepository $productRepository,
         private EntityManagerInterface $entityManager
     )
     {
     }


    /**
     * @throws InvalidArgumentException
     */
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: 'POST')]
     public function lowestPrice(
         Request $request,
         int $id,
         DTOSerializer $serializer,
         PromotionsFilterInterface $promotionsFilter,
         PromotionCache $promotionCache
     ): Response
     {


          if ($request->headers->has('force_fail')) {
               return new JsonResponse(
                   ['error' => 'Promotions Engine failure message'],
                   $request->headers->get('force_fail')
               );
          }


          /** @var LowestPriceEnquiry $lowestPriceEnquiry */
          $lowestPriceEnquiry = $serializer->deserialize($request->getContent(), LowestPriceEnquiry::class, 'json');


          $product = $this->productRepository->findOrFail($id);

          $lowestPriceEnquiry->setProduct($product);


          // Caching specific Promotions data
          $promotions = $promotionCache->findValidForProduct($product, $lowestPriceEnquiry->getRequestDate());

          $modifiedEnquiry = $promotionsFilter->apply($lowestPriceEnquiry, ...$promotions);

          $responseContent = $serializer->serialize($modifiedEnquiry, 'json');

          return new JsonResponse(data: $responseContent, status: Response::HTTP_OK, json: true);


          /*
          return new Response($responseContent, Response::HTTP_OK, [
              'Content-Type' => 'application/json'
          ]);
          */
     }




     #[Route('/products/{id}/promotions', name: 'promotions', methods: 'GET')]
     public function promotions()
     {

     }
}