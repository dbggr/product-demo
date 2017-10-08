<?php
namespace ProgramData\Validator;

use ProgramData\Entity\EntityAbstract;

interface ValidatorInterface
{
    /**
     * Validates the product data.
     * @param array $product
     */
    public function validate(array $entity):bool;
}
