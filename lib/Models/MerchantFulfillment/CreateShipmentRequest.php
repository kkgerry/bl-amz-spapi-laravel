<?php
/**
 * CreateShipmentRequest.
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

use ArrayAccess;
use Kkgerry\AmazonSellingPartnerAPI\Models\ModelInterface;
use Kkgerry\AmazonSellingPartnerAPI\ObjectSerializer;

/**
 * CreateShipmentRequest Class Doc Comment.
 *

 * @description Request schema.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */
class CreateShipmentRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'CreateShipmentRequest';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $swaggerTypes = [
        'shipment_request_details' => '\Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\ShipmentRequestDetails',
'shipping_service_id' => '\Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\ShippingServiceIdentifier',
'shipping_service_offer_id' => 'string',
'hazmat_type' => '\Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\HazmatType',
'label_format_option' => '\Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\LabelFormatOptionRequest',
'shipment_level_seller_inputs_list' => '\Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\AdditionalSellerInputsList',    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $swaggerFormats = [
        'shipment_request_details' => null,
'shipping_service_id' => null,
'shipping_service_offer_id' => null,
'hazmat_type' => null,
'label_format_option' => null,
'shipment_level_seller_inputs_list' => null,    ];

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'shipment_request_details' => 'ShipmentRequestDetails',
'shipping_service_id' => 'ShippingServiceId',
'shipping_service_offer_id' => 'ShippingServiceOfferId',
'hazmat_type' => 'HazmatType',
'label_format_option' => 'LabelFormatOption',
'shipment_level_seller_inputs_list' => 'ShipmentLevelSellerInputsList',    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'shipment_request_details' => 'setShipmentRequestDetails',
'shipping_service_id' => 'setShippingServiceId',
'shipping_service_offer_id' => 'setShippingServiceOfferId',
'hazmat_type' => 'setHazmatType',
'label_format_option' => 'setLabelFormatOption',
'shipment_level_seller_inputs_list' => 'setShipmentLevelSellerInputsList',    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'shipment_request_details' => 'getShipmentRequestDetails',
'shipping_service_id' => 'getShippingServiceId',
'shipping_service_offer_id' => 'getShippingServiceOfferId',
'hazmat_type' => 'getHazmatType',
'label_format_option' => 'getLabelFormatOption',
'shipment_level_seller_inputs_list' => 'getShipmentLevelSellerInputsList',    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['shipment_request_details'] = isset($data['shipment_request_details']) ? $data['shipment_request_details'] : null;
        $this->container['shipping_service_id'] = isset($data['shipping_service_id']) ? $data['shipping_service_id'] : null;
        $this->container['shipping_service_offer_id'] = isset($data['shipping_service_offer_id']) ? $data['shipping_service_offer_id'] : null;
        $this->container['hazmat_type'] = isset($data['hazmat_type']) ? $data['hazmat_type'] : null;
        $this->container['label_format_option'] = isset($data['label_format_option']) ? $data['label_format_option'] : null;
        $this->container['shipment_level_seller_inputs_list'] = isset($data['shipment_level_seller_inputs_list']) ? $data['shipment_level_seller_inputs_list'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (null === $this->container['shipment_request_details']) {
            $invalidProperties[] = "'shipment_request_details' can't be null";
        }
        if (null === $this->container['shipping_service_id']) {
            $invalidProperties[] = "'shipping_service_id' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets shipment_request_details.
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\ShipmentRequestDetails
     */
    public function getShipmentRequestDetails()
    {
        return $this->container['shipment_request_details'];
    }

    /**
     * Sets shipment_request_details.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\ShipmentRequestDetails $shipment_request_details shipment_request_details
     *
     * @return $this
     */
    public function setShipmentRequestDetails($shipment_request_details)
    {
        $this->container['shipment_request_details'] = $shipment_request_details;

        return $this;
    }

    /**
     * Gets shipping_service_id.
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\ShippingServiceIdentifier
     */
    public function getShippingServiceId()
    {
        return $this->container['shipping_service_id'];
    }

    /**
     * Sets shipping_service_id.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\ShippingServiceIdentifier $shipping_service_id shipping_service_id
     *
     * @return $this
     */
    public function setShippingServiceId($shipping_service_id)
    {
        $this->container['shipping_service_id'] = $shipping_service_id;

        return $this;
    }

    /**
     * Gets shipping_service_offer_id.
     *
     * @return string
     */
    public function getShippingServiceOfferId()
    {
        return $this->container['shipping_service_offer_id'];
    }

    /**
     * Sets shipping_service_offer_id.
     *
     * @param string $shipping_service_offer_id identifies a shipping service order made by a carrier
     *
     * @return $this
     */
    public function setShippingServiceOfferId($shipping_service_offer_id)
    {
        $this->container['shipping_service_offer_id'] = $shipping_service_offer_id;

        return $this;
    }

    /**
     * Gets hazmat_type.
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\HazmatType
     */
    public function getHazmatType()
    {
        return $this->container['hazmat_type'];
    }

    /**
     * Sets hazmat_type.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\HazmatType $hazmat_type hazmat_type
     *
     * @return $this
     */
    public function setHazmatType($hazmat_type)
    {
        $this->container['hazmat_type'] = $hazmat_type;

        return $this;
    }

    /**
     * Gets label_format_option.
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\LabelFormatOptionRequest
     */
    public function getLabelFormatOption()
    {
        return $this->container['label_format_option'];
    }

    /**
     * Sets label_format_option.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\LabelFormatOptionRequest $label_format_option label_format_option
     *
     * @return $this
     */
    public function setLabelFormatOption($label_format_option)
    {
        $this->container['label_format_option'] = $label_format_option;

        return $this;
    }

    /**
     * Gets shipment_level_seller_inputs_list.
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\AdditionalSellerInputsList
     */
    public function getShipmentLevelSellerInputsList()
    {
        return $this->container['shipment_level_seller_inputs_list'];
    }

    /**
     * Sets shipment_level_seller_inputs_list.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\AdditionalSellerInputsList $shipment_level_seller_inputs_list shipment_level_seller_inputs_list
     *
     * @return $this
     */
    public function setShipmentLevelSellerInputsList($shipment_level_seller_inputs_list)
    {
        $this->container['shipment_level_seller_inputs_list'] = $shipment_level_seller_inputs_list;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int   $offset Offset
     * @param mixed $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param int $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
