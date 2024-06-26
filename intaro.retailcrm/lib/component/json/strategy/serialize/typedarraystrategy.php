<?php

/**
 * @category Integration
 * @package  Intaro\RetailCrm\Component\Json\Strategy\Serialize
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://retailcrm.ru/docs
 */

namespace Intaro\RetailCrm\Component\Json\Strategy\Serialize;

use Intaro\RetailCrm\Component\Json\Exception\InvalidAnnotationException;
use Intaro\RetailCrm\Component\Json\PropertyAnnotations;
use Intaro\RetailCrm\Component\Json\Strategy\StrategyFactory;
use Intaro\RetailCrm\Component\Json\Strategy\TypedArrayTrait;

/**
 * Class TypedArrayStrategy
 *
 * @package Intaro\RetailCrm\Component\Json\Strategy\Serialize
 */
class TypedArrayStrategy implements SerializeStrategyInterface
{
    use InnerTypeTrait;
    use TypedArrayTrait;

    /**
     * @inheritDoc
     */
    public function serialize($value, $annotations = null)
    {
        $valueType = '';
        $result = [];

        if (!is_array($value)) {
            return $result;
        }

        if (strpos($this->innerType, ',') !== false) {
            [$keyType, $valueType] = static::getInnerTypes($this->innerType);

            if ('' === $keyType && '' === $valueType) {
                $valueType = $this->innerType;
            }
        } else {
            $valueType = $this->innerType;
        }

        $simpleStrategy = new SimpleTypeStrategy();

        foreach (array_keys($value) as $key) {
            $result[$simpleStrategy->serialize($key, new PropertyAnnotations())]
                = StrategyFactory::serializeStrategyByType($valueType)
                ->serialize($value[$key],new PropertyAnnotations());
        }

        return $result;
    }
}
