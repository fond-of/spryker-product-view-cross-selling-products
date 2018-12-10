<?php

namespace FondOfSpryker\Client\ProductViewCrossSellingProducts\Dependency\Client;

interface ProductViewCrossSellingProductsToCatalogClientInterface
{
    /**
     * @param string $searchString
     * @param array $requestParameters
     *
     * @return array
     */
    public function catalogSearch(string $searchString, array $requestParameters): array;
}
