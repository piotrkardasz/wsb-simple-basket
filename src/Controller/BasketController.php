<?php

namespace App\Controller;

use App\Entity\Basket;
use App\Entity\BasketElement;
use App\Entity\Order;
use App\Entity\OrderElement;
use App\Entity\Product;
use App\Repository\BasketRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    public const BASKET_KEY = '_security.basket_hash';
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var Basket|null
     */
    private $basket;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * BasketController constructor.
     */
    public function __construct(SessionInterface $session, BasketRepository $basketRepository,
                                EntityManagerInterface $entityManager)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;

        $basket = null;
        if ($session->has(self::BASKET_KEY)) {
            $basket = $basketRepository->findOneBy(['hash' => $session->get(self::BASKET_KEY)]);
        }
        //Create new basket if not exist
        if (!$basket instanceof Basket) {
            $basket = new Basket();
            $entityManager->persist($basket);
            $entityManager->flush();
            $session->set(self::BASKET_KEY, $basket->getHash());
        }
        $this->basket = $basket;

    }

    /**
     * @Route("/basket", name="basket")
     */
    public function index()
    {
        return $this->render('basket/index.html.twig', [
            'controller_name' => 'BasketController',
            'basket' => $this->basket,
            'total' => $this->basketValue()
        ]);
    }

    /**
     * @Route("/basket/clear", name="clear")
     */
    public function clear()
    {
        $this->entityManager->remove($this->basket);
        $this->entityManager->flush();
        return $this->redirectToRoute('basket');
    }

    /**
     * @Route("/basket/add/{product}", name="basket_add", defaults={"quantity": 1})
     * @Route("/basket/add/{product}/{quantity}", name="basket_add_qty")
     */
    public function add(Product $product, int $quantity)
    {
        $basketElement = new BasketElement($product);
        $basketElement->setQuantity($quantity);

        $this->basket->addElement($basketElement);
        $this->entityManager->persist($basketElement);
        $this->entityManager->flush();
        $this->addFlash('basket', sprintf('Product: %s added in quantity: %s', $product->getName(), $quantity));
        return $this->redirectToRoute('basket');
    }

    /**
     * @Route("/baskiet/add", name="basket_add_post")
     */
    public function addToBasket(Request $request, ProductRepository $productRepository){
        $quantity = $request->get('quantity') ?? 1;
        $product = $productRepository->findOneBy(['id' => $request->get('product')]);

        if (!$product instanceof Product)
        {
            $this->addFlash('basket.error', 'Product not found!');
            return $this->redirect('/');
        }

        $basketElement = new BasketElement($product);
        $basketElement->setQuantity($quantity);

        $this->basket->addElement($basketElement);
        $this->entityManager->persist($basketElement);
        $this->entityManager->flush();
        $this->addFlash('basket', sprintf('Product: %s added in quantity: %s', $product->getName(), $quantity));
        return $this->redirectToRoute('base');
    }

    /**
     * Returns value of basket
     * @return float|int
     */
    public function basketValue()
    {
        $sum = 0;
        foreach ($this->basket->getElements() as $element) {
            $sum += $element->getQuantity() * $element->getProduct()->getPrice();
        }

        return $sum;
    }

    /**
     * @Route("/basket/order", name="order")
     */
    public function convertToOrder()
    {
        $order = new Order();

        foreach ($this->basket->getElements() as $basketElement)
        {
            /** @var Product $product */
            $product = $basketElement->getProduct();
            $orderElement = new OrderElement($product);
            $orderElement
                ->setPrice($product->getPrice())
                ->setQuantity($basketElement->getQuantity());
            $order->addElement($orderElement);
        }
        $this->entityManager->persist($order);
        $this->entityManager->flush();
        $this->session->remove(self::BASKET_KEY);

        return $this->redirectToRoute('order_list');
    }

}
