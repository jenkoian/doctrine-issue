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

// Remove the product outside of the EM
$conn = $entityManager->getConnection();
$conn
    ->prepare('DELETE FROM product WHERE id = :product_id')
    ->executeQuery(['product_id' => $product->getId()]);

// If you imagine this is within a findOrCreate() function for example, where the product wouldn't be found so we attempt to create it.
$product = new Product();
$product->setId(1);
$product->setName('Product that will be removed outside of the EM');
$product->setUpdatedAt(new \DateTime());

$entityManager->persist($product);
$entityManager->flush();

echo "Updated Product with ID " . $product->getId() . "\n";
