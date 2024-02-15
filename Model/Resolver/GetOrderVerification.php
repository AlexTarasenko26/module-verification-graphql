<?php
declare(strict_types=1);

namespace Epam\DevelopmentGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Epam\Development\Api\OrderVerificationManagementInterface;

class GetOrderVerification implements ResolverInterface
{
    /**
     * @param OrderVerificationManagementInterface $orderVerificationManagement
     */
    public function __construct(
        private readonly OrderVerificationManagementInterface $orderVerificationManagement
    )
    {
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {

        if (!isset($args['input']['entity_id'])) {
            throw new GraphQlInputException(__('The order can not be identified' . $args['input']));
        }
        return $this->orderVerificationManagement->getVerification($args['input']['entity_id']);
    }
}
