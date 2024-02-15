<?php
declare (strict_types=1);

namespace Epam\DevelopmentGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Query\Resolver\IdentityInterface;

class Identity implements IdentityInterface
{

    /** @var string */
    private $cacheTag = "development_order_verification";

    /**
     * @param array $resolvedData
     * @return string[]
     */
    public function getIdentities(array $resolvedData): array
    {
        return [ $this->cacheTag ];
    }
}
