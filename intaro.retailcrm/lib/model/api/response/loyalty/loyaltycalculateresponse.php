<?php

/**
 * @category Integration
 * @package  Intaro\RetailCrm\Model\Api\Response\Loyalty
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://retailcrm.ru/docs
 */

namespace Intaro\RetailCrm\Model\Api\Response\Loyalty;

use Intaro\RetailCrm\Model\Api\Response\AbstractApiResponseModel;
use Intaro\RetailCrm\Component\Json\Mapping;

/**
 * Class LoyaltyCalculateResponse
 *
 * @package Intaro\RetailCrm\Model\Api\Response\Loyalty
 */
class LoyaltyCalculateResponse extends AbstractApiResponseModel
{
    /**
     * Результат запроса (успешный/неуспешный)
     *
     * @var boolean $success
     *
     * @Mapping\Type("boolean")
     * @Mapping\SerializedName("success")
     */
    public $success;
    
    /**
     * @var \Intaro\RetailCrm\Model\Api\SerializedLoyaltyOrder
     *
     * @Mapping\Type("\Intaro\RetailCrm\Model\Api\SerializedLoyaltyOrder")
     * @Mapping\SerializedName("order")
     */
    public $order;
    
    /**
     * Позиция в заказе
     *
     * @var array $calculations
     *
     * @Mapping\Type("array<Intaro\RetailCrm\Model\Api\LoyaltyCalculation>")
     * @Mapping\SerializedName("calculations")
     */
    public $calculations;
    
    /**
     * Программа лояльности
     *
     * @var \Intaro\RetailCrm\Model\Api\SerializedLoyalty
     *
     * @Mapping\Type("\Intaro\RetailCrm\Model\Api\SerializedLoyalty")
     * @Mapping\SerializedName("loyalty")
     */
    public $loyalty;
}
