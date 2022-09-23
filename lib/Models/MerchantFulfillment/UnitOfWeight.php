<?php
/**
 * UnitOfWeight.
 *
 * PHP version 5
 *
 * @author   Stefan Neuhaus / Kkgerry
 */

/**
 * Selling Partner API for Merchant Fulfillment.
 *
 * The Selling Partner API for Merchant Fulfillment helps you build applications that let sellers purchase shipping for non-Prime and Prime orders using Amazon’s Buy Shipping Services.
 *
 * OpenAPI spec version: v0
 */

namespace Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment;

/**
 * UnitOfWeight Class Doc Comment.
 *

 * @description The unit of weight.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */
class UnitOfWeight
{
    /**
     * Possible values of this enum.
     */
    const OZ = 'oz';
    const G = 'g';

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::OZ,
self::G,        ];
    }
}
