<?php
namespace ProgramData\Validator;

use ProgramData\Entity\ProductEntity;
use Respect\Validation\Exceptions\GroupedValidationException;
use Respect\Validation\Validator as validator;

/**
 * Validation for product that is entered
 */
class ProductValidator implements ValidatorInterface
{
    /**
     * Validates the product data.
     * @param array $product
     */
    public function validate(array $product):bool
    {
        return validator::key(
            'Name',
            validator::notBlank()
                ->stringType()
                ->length(1, 255)
        )
            ->key(
                'Description',
                validator::optional(
                    validator::stringType()
                        ->length(1)
                )
            )
            ->key(
                'Price',
                validator::notBlank()
                    ->floatVal()
                    ->min(1)
                    ->max(100000)
            )
            ->validate($product);
    }
}
