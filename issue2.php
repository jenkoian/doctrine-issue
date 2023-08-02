<?php

use Jenkoian\DoctrineIssue\Product;

require_once "bootstrap.php";

$product = new Product();
$product->setId(1);
$product->setName('Product that will be removed outside of the EM');
$product->setUpdatedAt(new \DateTime());

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";

// Call a method from a proxy version of the product
$proxyFactory = $entityManager->getProxyFactory();
$product = $proxyFactory->getProxy(Product::class, ['id' => $product->getId()]);

echo "Product name from proxy " . $product->getName() . "\n";
