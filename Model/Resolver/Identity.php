<?php
declare (strict_types=1);

namespace Epam\VerificationGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Query\Resolver\IdentityInterface;

class Identity implements IdentityInterface
{

    /** @var string */
    private $cacheTag = "order_verification";

    /**
     * @param array $resolvedData
     * @return string[]
     */
    public function getIdentities(array $resolvedData): array
    {
        return [ $this->cacheTag ];
    }
}
