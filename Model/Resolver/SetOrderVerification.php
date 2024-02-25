<?php
declare(strict_types=1);

namespace Epam\VerificationGraphQl\Model\Resolver;

use Epam\Verification\Api\OrderVerificationManagementInterface;
use Epam\Verification\Model\OrderVerificationFactory;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Epam\Verification\Api\Data\OrderVerificationInterface;

class SetOrderVerification implements ResolverInterface
{

    /**
     * @param OrderVerificationManagementInterface $orderVerificationManagement
     * @param OrderVerificationFactory $verificationFactory
     */
    public function __construct(
        private readonly OrderVerificationManagementInterface $orderVerificationManagement,
        private readonly OrderVerificationFactory             $verificationFactory
    )
    {
    }

    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!isset($args['input']['entity_id']) || !isset($args['input']['require_verification'])) {
            throw new GraphQlInputException(__('The order can not be identified for verification' . $args['input']));
        }
        $model = $this->verificationFactory->create();
        $data = [
            'entity_id' => $args['input']['entity_id'],
            'require_verification' => $args['input']['require_verification']
        ];
        $model->setData($data);

        return $this->orderVerificationManagement->setOrderVerification($model);
    }
}
