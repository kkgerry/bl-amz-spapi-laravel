<?php
/**
 * FbaInboundApi.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */

/**
 * Selling Partner API for Fulfillment Inbound.
 *
 * The Selling Partner API for Fulfillment Inbound lets you create applications that create and update inbound shipments of inventory to Amazon's fulfillment network.
 *
 * OpenAPI spec version: v0
 */

namespace Kkgerry\AmazonSellingPartnerAPI\Api;

use Kkgerry\AmazonSellingPartnerAPI\Configuration;
use Kkgerry\AmazonSellingPartnerAPI\HeaderSelector;
use Kkgerry\AmazonSellingPartnerAPI\Helpers\SellingPartnerApiRequest;
use Kkgerry\AmazonSellingPartnerAPI\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * FbaInboundApi Class Doc Comment.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */
class FbaInboundApi
{
    use SellingPartnerApiRequest;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    public function __construct(Configuration $config)
    {
        $this->client = new Client();
        $this->config = $config;
        $this->headerSelector = new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation confirmPreorder.
     *
     * @param string    $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param \DateTime $need_by_date   Date that the shipment must arrive at the Amazon fulfillment center to avoid delivery promise breaks for pre-ordered items. Must be in YYYY-MM-DD format. The response to the getPreorderInfo operation returns this value. (required)
     * @param string    $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\ConfirmPreorderResponse
     */
    public function confirmPreorder($shipment_id, $need_by_date, $marketplace_id)
    {
        return $this->confirmPreorderWithHttpInfo($shipment_id, $need_by_date, $marketplace_id);
    }

    /**
     * Operation confirmPreorderWithHttpInfo.
     *
     * @param string    $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param \DateTime $need_by_date   Date that the shipment must arrive at the Amazon fulfillment center to avoid delivery promise breaks for pre-ordered items. Must be in YYYY-MM-DD format. The response to the getPreorderInfo operation returns this value. (required)
     * @param string    $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\ConfirmPreorderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function confirmPreorderWithHttpInfo($shipment_id, $need_by_date, $marketplace_id)
    {
        $request = $this->confirmPreorderRequest($shipment_id, $need_by_date, $marketplace_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation confirmPreorderAsync.
     *
     * @param string    $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param \DateTime $need_by_date   Date that the shipment must arrive at the Amazon fulfillment center to avoid delivery promise breaks for pre-ordered items. Must be in YYYY-MM-DD format. The response to the getPreorderInfo operation returns this value. (required)
     * @param string    $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function confirmPreorderAsync($shipment_id, $need_by_date, $marketplace_id)
    {
        return $this->confirmPreorderAsyncWithHttpInfo($shipment_id, $need_by_date, $marketplace_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation confirmPreorderAsyncWithHttpInfo.
     *
     * @param string    $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param \DateTime $need_by_date   Date that the shipment must arrive at the Amazon fulfillment center to avoid delivery promise breaks for pre-ordered items. Must be in YYYY-MM-DD format. The response to the getPreorderInfo operation returns this value. (required)
     * @param string    $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function confirmPreorderAsyncWithHttpInfo($shipment_id, $need_by_date, $marketplace_id)
    {
        $request = $this->confirmPreorderRequest($shipment_id, $need_by_date, $marketplace_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'confirmPreorder'.
     *
     * @param string    $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param \DateTime $need_by_date   Date that the shipment must arrive at the Amazon fulfillment center to avoid delivery promise breaks for pre-ordered items. Must be in YYYY-MM-DD format. The response to the getPreorderInfo operation returns this value. (required)
     * @param string    $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function confirmPreorderRequest($shipment_id, $need_by_date, $marketplace_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling confirmPreorder');
        }
        // verify the required parameter 'need_by_date' is set
        if (null === $need_by_date || (is_array($need_by_date) && 0 === count($need_by_date))) {
            throw new \InvalidArgumentException('Missing the required parameter $need_by_date when calling confirmPreorder');
        }
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $marketplace_id when calling confirmPreorder');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/preorder/confirm';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $need_by_date) {
            $queryParams['NeedByDate'] = ObjectSerializer::toQueryValue($need_by_date);
        }
        // query params
        if (null !== $marketplace_id) {
            $queryParams['MarketplaceId'] = ObjectSerializer::toQueryValue($marketplace_id);
        }

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'PUT', $httpBody);
    }

    /**
     * Operation confirmTransport.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\ConfirmTransportResponse
     */
    public function confirmTransport($shipment_id)
    {
        return $this->confirmTransportWithHttpInfo($shipment_id);
    }

    /**
     * Operation confirmTransportWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\ConfirmTransportResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function confirmTransportWithHttpInfo($shipment_id)
    {
        $request = $this->confirmTransportRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation confirmTransportAsync.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function confirmTransportAsync($shipment_id)
    {
        return $this->confirmTransportAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation confirmTransportAsyncWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function confirmTransportAsyncWithHttpInfo($shipment_id)
    {
        $returnType = '\Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\ConfirmTransportResponse';
        $request = $this->confirmTransportRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'confirmTransport'.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function confirmTransportRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling confirmTransport');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/transport/confirm';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation createInboundShipment.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        body (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentResponse
     */
    public function createInboundShipment($body, $shipment_id)
    {
        return $this->createInboundShipmentWithHttpInfo($body, $shipment_id);
    }

    /**
     * Operation createInboundShipmentWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createInboundShipmentWithHttpInfo($body, $shipment_id)
    {
        $request = $this->createInboundShipmentRequest($body, $shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation createInboundShipmentAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInboundShipmentAsync($body, $shipment_id)
    {
        return $this->createInboundShipmentAsyncWithHttpInfo($body, $shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createInboundShipmentAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInboundShipmentAsyncWithHttpInfo($body, $shipment_id)
    {
        $returnType = '\Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentResponse';
        $request = $this->createInboundShipmentRequest($body, $shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'createInboundShipment'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createInboundShipmentRequest($body, $shipment_id)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling createInboundShipment');
        }
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling createInboundShipment');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation createInboundShipmentPlan.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\CreateInboundShipmentPlanRequest $body body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\CreateInboundShipmentPlanResponse
     */
    public function createInboundShipmentPlan($body)
    {
        return $this->createInboundShipmentPlanWithHttpInfo($body);
    }

    /**
     * Operation createInboundShipmentPlanWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\CreateInboundShipmentPlanRequest $body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\CreateInboundShipmentPlanResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createInboundShipmentPlanWithHttpInfo($body)
    {
        $request = $this->createInboundShipmentPlanRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation createInboundShipmentPlanAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\CreateInboundShipmentPlanRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInboundShipmentPlanAsync($body)
    {
        return $this->createInboundShipmentPlanAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createInboundShipmentPlanAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\CreateInboundShipmentPlanRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInboundShipmentPlanAsyncWithHttpInfo($body)
    {
        $request = $this->createInboundShipmentPlanRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'createInboundShipmentPlan'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\CreateInboundShipmentPlanRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createInboundShipmentPlanRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling createInboundShipmentPlan');
        }

        $resourcePath = '/fba/inbound/v0/plans';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation estimateTransport.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\EstimateTransportResponse
     */
    public function estimateTransport($shipment_id)
    {
        return $this->estimateTransportWithHttpInfo($shipment_id);
    }

    /**
     * Operation estimateTransportWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\EstimateTransportResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function estimateTransportWithHttpInfo($shipment_id)
    {
        $request = $this->estimateTransportRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation estimateTransportAsync.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function estimateTransportAsync($shipment_id)
    {
        return $this->estimateTransportAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation estimateTransportAsyncWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function estimateTransportAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->estimateTransportRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'estimateTransport'.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function estimateTransportRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling estimateTransport');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/transport/estimate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getBillOfLading.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetBillOfLadingResponse
     */
    public function getBillOfLading($shipment_id)
    {
        return $this->getBillOfLadingWithHttpInfo($shipment_id);
    }

    /**
     * Operation getBillOfLadingWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetBillOfLadingResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBillOfLadingWithHttpInfo($shipment_id)
    {
        $request = $this->getBillOfLadingRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getBillOfLadingAsync.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBillOfLadingAsync($shipment_id)
    {
        return $this->getBillOfLadingAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBillOfLadingAsyncWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBillOfLadingAsyncWithHttpInfo($shipment_id)
    {
        $returnType = '\Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetBillOfLadingResponse';
        $request = $this->getBillOfLadingRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getBillOfLading'.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBillOfLadingRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling getBillOfLading');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/billOfLading';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getInboundGuidance.
     *
     * @param string   $marketplace_id  A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[] $seller_sku_list A list of SellerSKU values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: SellerSKU is qualified by the SellerId, which is included with every Selling Partner API operation that you submit. If you specify a SellerSKU that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     * @param string[] $asin_list       A list of ASIN values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: If you specify a ASIN that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetInboundGuidanceResponse
     */
    public function getInboundGuidance($marketplace_id, $seller_sku_list = null, $asin_list = null)
    {
        return $this->getInboundGuidanceWithHttpInfo($marketplace_id, $seller_sku_list, $asin_list);
    }

    /**
     * Operation getInboundGuidanceWithHttpInfo.
     *
     * @param string   $marketplace_id  A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[] $seller_sku_list A list of SellerSKU values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: SellerSKU is qualified by the SellerId, which is included with every Selling Partner API operation that you submit. If you specify a SellerSKU that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     * @param string[] $asin_list       A list of ASIN values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: If you specify a ASIN that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetInboundGuidanceResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getInboundGuidanceWithHttpInfo($marketplace_id, $seller_sku_list = null, $asin_list = null)
    {
        $request = $this->getInboundGuidanceRequest($marketplace_id, $seller_sku_list, $asin_list);

        return $this->sendRequest($request);
    }

    /**
     * Operation getInboundGuidanceAsync.
     *
     * @param string   $marketplace_id  A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[] $seller_sku_list A list of SellerSKU values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: SellerSKU is qualified by the SellerId, which is included with every Selling Partner API operation that you submit. If you specify a SellerSKU that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     * @param string[] $asin_list       A list of ASIN values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: If you specify a ASIN that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInboundGuidanceAsync($marketplace_id, $seller_sku_list = null, $asin_list = null)
    {
        return $this->getInboundGuidanceAsyncWithHttpInfo($marketplace_id, $seller_sku_list, $asin_list)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInboundGuidanceAsyncWithHttpInfo.
     *
     * @param string   $marketplace_id  A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[] $seller_sku_list A list of SellerSKU values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: SellerSKU is qualified by the SellerId, which is included with every Selling Partner API operation that you submit. If you specify a SellerSKU that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     * @param string[] $asin_list       A list of ASIN values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: If you specify a ASIN that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInboundGuidanceAsyncWithHttpInfo($marketplace_id, $seller_sku_list = null, $asin_list = null)
    {
        $request = $this->getInboundGuidanceRequest($marketplace_id, $seller_sku_list, $asin_list);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getInboundGuidance'.
     *
     * @param string   $marketplace_id  A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[] $seller_sku_list A list of SellerSKU values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: SellerSKU is qualified by the SellerId, which is included with every Selling Partner API operation that you submit. If you specify a SellerSKU that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     * @param string[] $asin_list       A list of ASIN values. Used to identify items for which you want inbound guidance for shipment to Amazon&#x27;s fulfillment network. Note: If you specify a ASIN that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getInboundGuidanceRequest($marketplace_id, $seller_sku_list = null, $asin_list = null)
    {
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $marketplace_id when calling getInboundGuidance');
        }

        $resourcePath = '/fba/inbound/v0/itemsGuidance';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $marketplace_id) {
            $queryParams['MarketplaceId'] = ObjectSerializer::toQueryValue($marketplace_id);
        }
        // query params
        if (is_array($seller_sku_list)) {
            $seller_sku_list = ObjectSerializer::serializeCollection($seller_sku_list, 'csv', true);
        }
        if (null !== $seller_sku_list) {
            $queryParams['SellerSKUList'] = ObjectSerializer::toQueryValue($seller_sku_list);
        }
        // query params
        if (is_array($asin_list)) {
            $asin_list = ObjectSerializer::serializeCollection($asin_list, 'csv', true);
        }
        if (null !== $asin_list) {
            $queryParams['ASINList'] = ObjectSerializer::toQueryValue($asin_list);
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getLabels.
     *
     * @param string   $shipment_id             A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string   $page_type               The page type to use to print the labels. Submitting a PageType value that is not supported in your marketplace returns an error. (required)
     * @param string   $label_type              The type of labels requested. (required)
     * @param int      $number_of_packages      The number of packages in the shipment. (optional)
     * @param string[] $package_labels_to_print A list of identifiers that specify packages for which you want package labels printed.  Must match CartonId values previously passed using the FBA Inbound Shipment Carton Information Feed. If not, the operation returns the IncorrectPackageIdentifier error code. (optional)
     * @param int      $number_of_pallets       The number of pallets in the shipment. This returns four identical labels for each pallet. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetLabelsResponse
     */
    public function getLabels($shipment_id, $page_type, $label_type, $number_of_packages = null, $page_size=null, $page=null, $package_labels_to_print = null, $number_of_pallets = null)
    {
        return $this->getLabelsWithHttpInfo($shipment_id, $page_type, $label_type, $number_of_packages, $package_labels_to_print, $page_size, $page, $number_of_pallets);
    }

    /**
     * Operation getLabelsWithHttpInfo.
     *
     * @param string   $shipment_id             A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string   $page_type               The page type to use to print the labels. Submitting a PageType value that is not supported in your marketplace returns an error. (required)
     * @param string   $label_type              The type of labels requested. (required)
     * @param int      $number_of_packages      The number of packages in the shipment. (optional)
     * @param string[] $package_labels_to_print A list of identifiers that specify packages for which you want package labels printed.  Must match CartonId values previously passed using the FBA Inbound Shipment Carton Information Feed. If not, the operation returns the IncorrectPackageIdentifier error code. (optional)
     * @param int      $number_of_pallets       The number of pallets in the shipment. This returns four identical labels for each pallet. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetLabelsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getLabelsWithHttpInfo($shipment_id, $page_type, $label_type, $number_of_packages = null, $package_labels_to_print = null, $page_size=null, $page=null,$number_of_pallets = null)
    {
        $request = $this->getLabelsRequest($shipment_id, $page_type, $label_type, $number_of_packages, $package_labels_to_print, $number_of_pallets,$page_size,$page);

        return $this->sendRequest($request);
    }

    /**
     * Operation getLabelsAsync.
     *
     * @param string   $shipment_id             A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string   $page_type               The page type to use to print the labels. Submitting a PageType value that is not supported in your marketplace returns an error. (required)
     * @param string   $label_type              The type of labels requested. (required)
     * @param int      $number_of_packages      The number of packages in the shipment. (optional)
     * @param string[] $package_labels_to_print A list of identifiers that specify packages for which you want package labels printed.  Must match CartonId values previously passed using the FBA Inbound Shipment Carton Information Feed. If not, the operation returns the IncorrectPackageIdentifier error code. (optional)
     * @param int      $number_of_pallets       The number of pallets in the shipment. This returns four identical labels for each pallet. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getLabelsAsync($shipment_id, $page_type, $label_type, $number_of_packages = null, $package_labels_to_print = null, $number_of_pallets = null)
    {
        return $this->getLabelsAsyncWithHttpInfo($shipment_id, $page_type, $label_type, $number_of_packages, $package_labels_to_print, $number_of_pallets)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getLabelsAsyncWithHttpInfo.
     *
     * @param string   $shipment_id             A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string   $page_type               The page type to use to print the labels. Submitting a PageType value that is not supported in your marketplace returns an error. (required)
     * @param string   $label_type              The type of labels requested. (required)
     * @param int      $number_of_packages      The number of packages in the shipment. (optional)
     * @param string[] $package_labels_to_print A list of identifiers that specify packages for which you want package labels printed.  Must match CartonId values previously passed using the FBA Inbound Shipment Carton Information Feed. If not, the operation returns the IncorrectPackageIdentifier error code. (optional)
     * @param int      $number_of_pallets       The number of pallets in the shipment. This returns four identical labels for each pallet. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getLabelsAsyncWithHttpInfo($shipment_id, $page_type, $label_type, $number_of_packages = null, $package_labels_to_print = null, $page_size=null, $page=null, $number_of_pallets = null)
    {
        $request = $this->getLabelsRequest($shipment_id, $page_type, $label_type, $number_of_packages, $package_labels_to_print, $number_of_pallets, $page_size, $page);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getLabels'.
     *
     * @param string   $shipment_id             A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string   $page_type               The page type to use to print the labels. Submitting a PageType value that is not supported in your marketplace returns an error. (required)
     * @param string   $label_type              The type of labels requested. (required)
     * @param int      $number_of_packages      The number of packages in the shipment. (optional)
     * @param string[] $package_labels_to_print A list of identifiers that specify packages for which you want package labels printed.  Must match CartonId values previously passed using the FBA Inbound Shipment Carton Information Feed. If not, the operation returns the IncorrectPackageIdentifier error code. (optional)
     * @param int      $number_of_pallets       The number of pallets in the shipment. This returns four identical labels for each pallet. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getLabelsRequest($shipment_id, $page_type, $label_type, $number_of_packages = null, $package_labels_to_print = null, $number_of_pallets = null,$page_size=null,$page=null)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling getLabels');
        }
        // verify the required parameter 'page_type' is set
        if (null === $page_type || (is_array($page_type) && 0 === count($page_type))) {
            throw new \InvalidArgumentException('Missing the required parameter $page_type when calling getLabels');
        }
        // verify the required parameter 'label_type' is set
        if (null === $label_type || (is_array($label_type) && 0 === count($label_type))) {
            throw new \InvalidArgumentException('Missing the required parameter $label_type when calling getLabels');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/labels';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $page_type) {
            $queryParams['PageType'] = ObjectSerializer::toQueryValue($page_type);
        }
        // query params
        if (null !== $label_type) {
            $queryParams['LabelType'] = ObjectSerializer::toQueryValue($label_type);
        }
        // query params
        if (null !== $number_of_packages) {
            $queryParams['NumberOfPackages'] = ObjectSerializer::toQueryValue($number_of_packages);
        }
        // query params
        if (is_array($package_labels_to_print)) {
            $package_labels_to_print = ObjectSerializer::serializeCollection($package_labels_to_print, 'csv', true);
        }
        if (null !== $package_labels_to_print) {
            $queryParams['PackageLabelsToPrint'] = ObjectSerializer::toQueryValue($package_labels_to_print);
        }
        // query params
        if (null !== $number_of_pallets) {
            $queryParams['NumberOfPallets'] = ObjectSerializer::toQueryValue($number_of_pallets);
        }
        if (null !== $page_size) {
            $queryParams['PageSize'] = intval($page_size);
        }
        if (null !== $page) {
            $queryParams['PageStartIndex'] = intval($page);
        }

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getPreorderInfo.
     *
     * @param string $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetPreorderInfoResponse
     */
    public function getPreorderInfo($shipment_id, $marketplace_id)
    {
        return $this->getPreorderInfoWithHttpInfo($shipment_id, $marketplace_id);
    }

    /**
     * Operation getPreorderInfoWithHttpInfo.
     *
     * @param string $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetPreorderInfoResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPreorderInfoWithHttpInfo($shipment_id, $marketplace_id)
    {
        $request = $this->getPreorderInfoRequest($shipment_id, $marketplace_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getPreorderInfoAsync.
     *
     * @param string $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPreorderInfoAsync($shipment_id, $marketplace_id)
    {
        return $this->getPreorderInfoAsyncWithHttpInfo($shipment_id, $marketplace_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPreorderInfoAsyncWithHttpInfo.
     *
     * @param string $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPreorderInfoAsyncWithHttpInfo($shipment_id, $marketplace_id)
    {
        $request = $this->getPreorderInfoRequest($shipment_id, $marketplace_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getPreorderInfo'.
     *
     * @param string $shipment_id    A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace the shipment is tied to. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPreorderInfoRequest($shipment_id, $marketplace_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling getPreorderInfo');
        }
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $marketplace_id when calling getPreorderInfo');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/preorder';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $marketplace_id) {
            $queryParams['MarketplaceId'] = ObjectSerializer::toQueryValue($marketplace_id);
        }

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getPrepInstructions.
     *
     * @param string   $ship_to_country_code The country code of the country to which the items will be shipped. Note that labeling requirements and item preparation instructions can vary by country. (required)
     * @param string[] $seller_sku_list      A list of SellerSKU values. Used to identify items for which you want labeling requirements and item preparation instructions for shipment to Amazon&#x27;s fulfillment network. The SellerSKU is qualified by the Seller ID, which is included with every call to the Seller Partner API.  Note: Include seller SKUs that you have used to list items on Amazon&#x27;s retail website. If you include a seller SKU that you have never used to list an item on Amazon&#x27;s retail website, the seller SKU is returned in the InvalidSKUList property in the response. (optional)
     * @param string[] $asin_list            A list of ASIN values. Used to identify items for which you want item preparation instructions to help with item sourcing decisions.  Note: ASINs must be included in the product catalog for at least one of the marketplaces that the seller  participates in. Any ASIN that is not included in the product catalog for at least one of the marketplaces that the seller participates in is returned in the InvalidASINList property in the response. You can find out which marketplaces a seller participates in by calling the getMarketplaceParticipations operation in the Selling Partner API for Sellers. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetPrepInstructionsResponse
     */
    public function getPrepInstructions($ship_to_country_code, $seller_sku_list = null, $asin_list = null)
    {
        return $this->getPrepInstructionsWithHttpInfo($ship_to_country_code, $seller_sku_list, $asin_list);
    }

    /**
     * Operation getPrepInstructionsWithHttpInfo.
     *
     * @param string   $ship_to_country_code The country code of the country to which the items will be shipped. Note that labeling requirements and item preparation instructions can vary by country. (required)
     * @param string[] $seller_sku_list      A list of SellerSKU values. Used to identify items for which you want labeling requirements and item preparation instructions for shipment to Amazon&#x27;s fulfillment network. The SellerSKU is qualified by the Seller ID, which is included with every call to the Seller Partner API.  Note: Include seller SKUs that you have used to list items on Amazon&#x27;s retail website. If you include a seller SKU that you have never used to list an item on Amazon&#x27;s retail website, the seller SKU is returned in the InvalidSKUList property in the response. (optional)
     * @param string[] $asin_list            A list of ASIN values. Used to identify items for which you want item preparation instructions to help with item sourcing decisions.  Note: ASINs must be included in the product catalog for at least one of the marketplaces that the seller  participates in. Any ASIN that is not included in the product catalog for at least one of the marketplaces that the seller participates in is returned in the InvalidASINList property in the response. You can find out which marketplaces a seller participates in by calling the getMarketplaceParticipations operation in the Selling Partner API for Sellers. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetPrepInstructionsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPrepInstructionsWithHttpInfo($ship_to_country_code, $seller_sku_list = null, $asin_list = null)
    {
        $request = $this->getPrepInstructionsRequest($ship_to_country_code, $seller_sku_list, $asin_list);

        return $this->sendRequest($request);
    }

    /**
     * Operation getPrepInstructionsAsync.
     *
     * @param string   $ship_to_country_code The country code of the country to which the items will be shipped. Note that labeling requirements and item preparation instructions can vary by country. (required)
     * @param string[] $seller_sku_list      A list of SellerSKU values. Used to identify items for which you want labeling requirements and item preparation instructions for shipment to Amazon&#x27;s fulfillment network. The SellerSKU is qualified by the Seller ID, which is included with every call to the Seller Partner API.  Note: Include seller SKUs that you have used to list items on Amazon&#x27;s retail website. If you include a seller SKU that you have never used to list an item on Amazon&#x27;s retail website, the seller SKU is returned in the InvalidSKUList property in the response. (optional)
     * @param string[] $asin_list            A list of ASIN values. Used to identify items for which you want item preparation instructions to help with item sourcing decisions.  Note: ASINs must be included in the product catalog for at least one of the marketplaces that the seller  participates in. Any ASIN that is not included in the product catalog for at least one of the marketplaces that the seller participates in is returned in the InvalidASINList property in the response. You can find out which marketplaces a seller participates in by calling the getMarketplaceParticipations operation in the Selling Partner API for Sellers. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPrepInstructionsAsync($ship_to_country_code, $seller_sku_list = null, $asin_list = null)
    {
        return $this->getPrepInstructionsAsyncWithHttpInfo($ship_to_country_code, $seller_sku_list, $asin_list)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPrepInstructionsAsyncWithHttpInfo.
     *
     * @param string   $ship_to_country_code The country code of the country to which the items will be shipped. Note that labeling requirements and item preparation instructions can vary by country. (required)
     * @param string[] $seller_sku_list      A list of SellerSKU values. Used to identify items for which you want labeling requirements and item preparation instructions for shipment to Amazon&#x27;s fulfillment network. The SellerSKU is qualified by the Seller ID, which is included with every call to the Seller Partner API.  Note: Include seller SKUs that you have used to list items on Amazon&#x27;s retail website. If you include a seller SKU that you have never used to list an item on Amazon&#x27;s retail website, the seller SKU is returned in the InvalidSKUList property in the response. (optional)
     * @param string[] $asin_list            A list of ASIN values. Used to identify items for which you want item preparation instructions to help with item sourcing decisions.  Note: ASINs must be included in the product catalog for at least one of the marketplaces that the seller  participates in. Any ASIN that is not included in the product catalog for at least one of the marketplaces that the seller participates in is returned in the InvalidASINList property in the response. You can find out which marketplaces a seller participates in by calling the getMarketplaceParticipations operation in the Selling Partner API for Sellers. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPrepInstructionsAsyncWithHttpInfo($ship_to_country_code, $seller_sku_list = null, $asin_list = null)
    {
        $request = $this->getPrepInstructionsRequest($ship_to_country_code, $seller_sku_list, $asin_list);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getPrepInstructions'.
     *
     * @param string   $ship_to_country_code The country code of the country to which the items will be shipped. Note that labeling requirements and item preparation instructions can vary by country. (required)
     * @param string[] $seller_sku_list      A list of SellerSKU values. Used to identify items for which you want labeling requirements and item preparation instructions for shipment to Amazon&#x27;s fulfillment network. The SellerSKU is qualified by the Seller ID, which is included with every call to the Seller Partner API.  Note: Include seller SKUs that you have used to list items on Amazon&#x27;s retail website. If you include a seller SKU that you have never used to list an item on Amazon&#x27;s retail website, the seller SKU is returned in the InvalidSKUList property in the response. (optional)
     * @param string[] $asin_list            A list of ASIN values. Used to identify items for which you want item preparation instructions to help with item sourcing decisions.  Note: ASINs must be included in the product catalog for at least one of the marketplaces that the seller  participates in. Any ASIN that is not included in the product catalog for at least one of the marketplaces that the seller participates in is returned in the InvalidASINList property in the response. You can find out which marketplaces a seller participates in by calling the getMarketplaceParticipations operation in the Selling Partner API for Sellers. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPrepInstructionsRequest($ship_to_country_code, $seller_sku_list = null, $asin_list = null)
    {
        // verify the required parameter 'ship_to_country_code' is set
        if (null === $ship_to_country_code || (is_array($ship_to_country_code) && 0 === count($ship_to_country_code))) {
            throw new \InvalidArgumentException('Missing the required parameter $ship_to_country_code when calling getPrepInstructions');
        }

        $resourcePath = '/fba/inbound/v0/prepInstructions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $ship_to_country_code) {
            $queryParams['ShipToCountryCode'] = ObjectSerializer::toQueryValue($ship_to_country_code);
        }
        // query params
        if (is_array($seller_sku_list)) {
            $seller_sku_list = ObjectSerializer::serializeCollection($seller_sku_list, 'csv', true);
        }
        if (null !== $seller_sku_list) {
            $queryParams['SellerSKUList'] = ObjectSerializer::toQueryValue($seller_sku_list);
        }
        // query params
        if (is_array($asin_list)) {
            $asin_list = ObjectSerializer::serializeCollection($asin_list, 'csv', true);
        }
        if (null !== $asin_list) {
            $queryParams['ASINList'] = ObjectSerializer::toQueryValue($asin_list);
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getShipmentItems.
     *
     * @param string    $query_type          Indicates whether items are returned using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or using NextToken, which continues returning items specified in a previous request. (required)
     * @param string    $marketplace_id      A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param \DateTime $last_updated_after  A date used for selecting inbound shipment items that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before A date used for selecting inbound shipment items that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token          A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetShipmentItemsResponse
     */
    public function getShipmentItems($query_type, $marketplace_id, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        return $this->getShipmentItemsWithHttpInfo($query_type, $marketplace_id, $last_updated_after, $last_updated_before, $next_token);
    }

    /**
     * Operation getShipmentItemsWithHttpInfo.
     *
     * @param string    $query_type          Indicates whether items are returned using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or using NextToken, which continues returning items specified in a previous request. (required)
     * @param string    $marketplace_id      A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param \DateTime $last_updated_after  A date used for selecting inbound shipment items that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before A date used for selecting inbound shipment items that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token          A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetShipmentItemsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getShipmentItemsWithHttpInfo($query_type, $marketplace_id, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        $request = $this->getShipmentItemsRequest($query_type, $marketplace_id, $last_updated_after, $last_updated_before, $next_token);

        return $this->sendRequest($request);
    }

    /**
     * Operation getShipmentItemsAsync.
     *
     * @param string    $query_type          Indicates whether items are returned using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or using NextToken, which continues returning items specified in a previous request. (required)
     * @param string    $marketplace_id      A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param \DateTime $last_updated_after  A date used for selecting inbound shipment items that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before A date used for selecting inbound shipment items that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token          A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentItemsAsync($query_type, $marketplace_id, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        return $this->getShipmentItemsAsyncWithHttpInfo($query_type, $marketplace_id, $last_updated_after, $last_updated_before, $next_token)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getShipmentItemsAsyncWithHttpInfo.
     *
     * @param string    $query_type          Indicates whether items are returned using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or using NextToken, which continues returning items specified in a previous request. (required)
     * @param string    $marketplace_id      A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param \DateTime $last_updated_after  A date used for selecting inbound shipment items that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before A date used for selecting inbound shipment items that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token          A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentItemsAsyncWithHttpInfo($query_type, $marketplace_id, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        $request = $this->getShipmentItemsRequest($query_type, $marketplace_id, $last_updated_after, $last_updated_before, $next_token);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getShipmentItems'.
     *
     * @param string    $query_type          Indicates whether items are returned using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or using NextToken, which continues returning items specified in a previous request. (required)
     * @param string    $marketplace_id      A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param \DateTime $last_updated_after  A date used for selecting inbound shipment items that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before A date used for selecting inbound shipment items that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token          A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getShipmentItemsRequest($query_type, $marketplace_id, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        // verify the required parameter 'query_type' is set
        if (null === $query_type || (is_array($query_type) && 0 === count($query_type))) {
            throw new \InvalidArgumentException('Missing the required parameter $query_type when calling getShipmentItems');
        }
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $marketplace_id when calling getShipmentItems');
        }

        $resourcePath = '/fba/inbound/v0/shipmentItems';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $last_updated_after) {
            $queryParams['LastUpdatedAfter'] = ObjectSerializer::toQueryValue($last_updated_after);
        }
        // query params
        if (null !== $last_updated_before) {
            $queryParams['LastUpdatedBefore'] = ObjectSerializer::toQueryValue($last_updated_before);
        }
        // query params
        if (null !== $query_type) {
            $queryParams['QueryType'] = ObjectSerializer::toQueryValue($query_type);
        }
        // query params
        if (null !== $next_token) {
            $queryParams['NextToken'] = ObjectSerializer::toQueryValue($next_token);
        }
        // query params
        if (null !== $marketplace_id) {
            $queryParams['MarketplaceId'] = ObjectSerializer::toQueryValue($marketplace_id);
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getShipmentItemsByShipmentId.
     *
     * @param string $shipment_id    A shipment identifier used for selecting items in a specific inbound shipment. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetShipmentItemsResponse
     */
    public function getShipmentItemsByShipmentId($shipment_id, $marketplace_id)
    {
        return $this->getShipmentItemsByShipmentIdWithHttpInfo($shipment_id, $marketplace_id);
    }

    /**
     * Operation getShipmentItemsByShipmentIdWithHttpInfo.
     *
     * @param string $shipment_id    A shipment identifier used for selecting items in a specific inbound shipment. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetShipmentItemsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getShipmentItemsByShipmentIdWithHttpInfo($shipment_id, $marketplace_id)
    {
        $request = $this->getShipmentItemsByShipmentIdRequest($shipment_id, $marketplace_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getShipmentItemsByShipmentIdAsync.
     *
     * @param string $shipment_id    A shipment identifier used for selecting items in a specific inbound shipment. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentItemsByShipmentIdAsync($shipment_id, $marketplace_id)
    {
        return $this->getShipmentItemsByShipmentIdAsyncWithHttpInfo($shipment_id, $marketplace_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getShipmentItemsByShipmentIdAsyncWithHttpInfo.
     *
     * @param string $shipment_id    A shipment identifier used for selecting items in a specific inbound shipment. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentItemsByShipmentIdAsyncWithHttpInfo($shipment_id, $marketplace_id)
    {
        $request = $this->getShipmentItemsByShipmentIdRequest($shipment_id, $marketplace_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getShipmentItemsByShipmentId'.
     *
     * @param string $shipment_id    A shipment identifier used for selecting items in a specific inbound shipment. (required)
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getShipmentItemsByShipmentIdRequest($shipment_id, $marketplace_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling getShipmentItemsByShipmentId');
        }
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $marketplace_id when calling getShipmentItemsByShipmentId');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/items';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $marketplace_id) {
            $queryParams['MarketplaceId'] = ObjectSerializer::toQueryValue($marketplace_id);
        }

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getShipments.
     *
     * @param string    $query_type           Indicates whether shipments are returned using shipment information (by providing the ShipmentStatusList or ShipmentIdList parameters), using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or by using NextToken to continue returning items specified in a previous request. (required)
     * @param string    $marketplace_id       A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[]  $shipment_status_list A list of ShipmentStatus values. Used to select shipments with a current status that matches the status values that you specify. (optional)
     * @param string[]  $shipment_id_list     A list of shipment IDs used to select the shipments that you want. If both ShipmentStatusList and ShipmentIdList are specified, only shipments that match both parameters are returned. (optional)
     * @param \DateTime $last_updated_after   A date used for selecting inbound shipments that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before  A date used for selecting inbound shipments that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token           A string token returned in the response to your previous request. (optional)
     *
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetShipmentsResponse
     */
    public function getShipments($query_type, $marketplace_id, $shipment_status_list = null, $shipment_id_list = null, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        return $this->getShipmentsWithHttpInfo($query_type, $marketplace_id, $shipment_status_list, $shipment_id_list, $last_updated_after, $last_updated_before, $next_token);
    }

    /**
     * Operation getShipmentsWithHttpInfo.
     *
     * @param string    $query_type           Indicates whether shipments are returned using shipment information (by providing the ShipmentStatusList or ShipmentIdList parameters), using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or by using NextToken to continue returning items specified in a previous request. (required)
     * @param string    $marketplace_id       A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[]  $shipment_status_list A list of ShipmentStatus values. Used to select shipments with a current status that matches the status values that you specify. (optional)
     * @param string[]  $shipment_id_list     A list of shipment IDs used to select the shipments that you want. If both ShipmentStatusList and ShipmentIdList are specified, only shipments that match both parameters are returned. (optional)
     * @param \DateTime $last_updated_after   A date used for selecting inbound shipments that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before  A date used for selecting inbound shipments that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token           A string token returned in the response to your previous request. (optional)
     *
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetShipmentsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getShipmentsWithHttpInfo($query_type, $marketplace_id, $shipment_status_list = null, $shipment_id_list = null, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        $request = $this->getShipmentsRequest($query_type, $marketplace_id, $shipment_status_list, $shipment_id_list, $last_updated_after, $last_updated_before, $next_token);

        return $this->sendRequest($request);
    }

    /**
     * Operation getShipmentsAsync.
     *
     * @param string    $query_type           Indicates whether shipments are returned using shipment information (by providing the ShipmentStatusList or ShipmentIdList parameters), using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or by using NextToken to continue returning items specified in a previous request. (required)
     * @param string    $marketplace_id       A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[]  $shipment_status_list A list of ShipmentStatus values. Used to select shipments with a current status that matches the status values that you specify. (optional)
     * @param string[]  $shipment_id_list     A list of shipment IDs used to select the shipments that you want. If both ShipmentStatusList and ShipmentIdList are specified, only shipments that match both parameters are returned. (optional)
     * @param \DateTime $last_updated_after   A date used for selecting inbound shipments that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before  A date used for selecting inbound shipments that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token           A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentsAsync($query_type, $marketplace_id, $shipment_status_list = null, $shipment_id_list = null, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        return $this->getShipmentsAsyncWithHttpInfo($query_type, $marketplace_id, $shipment_status_list, $shipment_id_list, $last_updated_after, $last_updated_before, $next_token)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getShipmentsAsyncWithHttpInfo.
     *
     * @param string    $query_type           Indicates whether shipments are returned using shipment information (by providing the ShipmentStatusList or ShipmentIdList parameters), using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or by using NextToken to continue returning items specified in a previous request. (required)
     * @param string    $marketplace_id       A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[]  $shipment_status_list A list of ShipmentStatus values. Used to select shipments with a current status that matches the status values that you specify. (optional)
     * @param string[]  $shipment_id_list     A list of shipment IDs used to select the shipments that you want. If both ShipmentStatusList and ShipmentIdList are specified, only shipments that match both parameters are returned. (optional)
     * @param \DateTime $last_updated_after   A date used for selecting inbound shipments that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before  A date used for selecting inbound shipments that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token           A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentsAsyncWithHttpInfo($query_type, $marketplace_id, $shipment_status_list = null, $shipment_id_list = null, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        $request = $this->getShipmentsRequest($query_type, $marketplace_id, $shipment_status_list, $shipment_id_list, $last_updated_after, $last_updated_before, $next_token);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getShipments'.
     *
     * @param string    $query_type           Indicates whether shipments are returned using shipment information (by providing the ShipmentStatusList or ShipmentIdList parameters), using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or by using NextToken to continue returning items specified in a previous request. (required)
     * @param string    $marketplace_id       A marketplace identifier. Specifies the marketplace where the product would be stored. (required)
     * @param string[]  $shipment_status_list A list of ShipmentStatus values. Used to select shipments with a current status that matches the status values that you specify. (optional)
     * @param string[]  $shipment_id_list     A list of shipment IDs used to select the shipments that you want. If both ShipmentStatusList and ShipmentIdList are specified, only shipments that match both parameters are returned. (optional)
     * @param \DateTime $last_updated_after   A date used for selecting inbound shipments that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param \DateTime $last_updated_before  A date used for selecting inbound shipments that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller. (optional)
     * @param string    $next_token           A string token returned in the response to your previous request. (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getShipmentsRequest($query_type, $marketplace_id, $shipment_status_list = null, $shipment_id_list = null, $last_updated_after = null, $last_updated_before = null, $next_token = null)
    {
        // verify the required parameter 'query_type' is set
        if (null === $query_type || (is_array($query_type) && 0 === count($query_type))) {
            throw new \InvalidArgumentException('Missing the required parameter $query_type when calling getShipments');
        }
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $marketplace_id when calling getShipments');
        }

        $resourcePath = '/fba/inbound/v0/shipments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (is_array($shipment_status_list)) {
            $shipment_status_list = ObjectSerializer::serializeCollection($shipment_status_list, 'csv', true);
        }
        if (null !== $shipment_status_list) {
            $queryParams['ShipmentStatusList'] = ObjectSerializer::toQueryValue($shipment_status_list);
        }
        // query params
        if (is_array($shipment_id_list)) {
            $shipment_id_list = ObjectSerializer::serializeCollection($shipment_id_list, 'csv', true);
        }
        if (null !== $shipment_id_list) {
            $queryParams['ShipmentIdList'] = ObjectSerializer::toQueryValue($shipment_id_list);
        }
        // query params
        if (null !== $last_updated_after) {
            $queryParams['LastUpdatedAfter'] = ObjectSerializer::toQueryValue($last_updated_after);
        }
        // query params
        if (null !== $last_updated_before) {
            $queryParams['LastUpdatedBefore'] = ObjectSerializer::toQueryValue($last_updated_before);
        }
        // query params
        if (null !== $query_type) {
            $queryParams['QueryType'] = ObjectSerializer::toQueryValue($query_type);
        }
        // query params
        if (null !== $next_token) {
            $queryParams['NextToken'] = ObjectSerializer::toQueryValue($next_token);
        }
        // query params
        if (null !== $marketplace_id) {
            $queryParams['MarketplaceId'] = ObjectSerializer::toQueryValue($marketplace_id);
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getTransportDetails.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetTransportDetailsResponse
     */
    public function getTransportDetails($shipment_id)
    {
        return $this->getTransportDetailsWithHttpInfo($shipment_id);
    }

    /**
     * Operation getTransportDetailsWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\GetTransportDetailsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTransportDetailsWithHttpInfo($shipment_id)
    {
        $request = $this->getTransportDetailsRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getTransportDetailsAsync.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransportDetailsAsync($shipment_id)
    {
        return $this->getTransportDetailsAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTransportDetailsAsyncWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransportDetailsAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->getTransportDetailsRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getTransportDetails'.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTransportDetailsRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling getTransportDetails');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/transport';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation putTransportDetails.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\PutTransportDetailsRequest $body        body (required)
     * @param string                                                                                 $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\PutTransportDetailsResponse
     */
    public function putTransportDetails($body, $shipment_id)
    {
        return $this->putTransportDetailsWithHttpInfo($body, $shipment_id);
    }

    /**
     * Operation putTransportDetailsWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\PutTransportDetailsRequest $body        (required)
     * @param string                                                                                 $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\PutTransportDetailsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function putTransportDetailsWithHttpInfo($body, $shipment_id)
    {
        $request = $this->putTransportDetailsRequest($body, $shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation putTransportDetailsAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\PutTransportDetailsRequest $body        (required)
     * @param string                                                                                 $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putTransportDetailsAsync($body, $shipment_id)
    {
        return $this->putTransportDetailsAsyncWithHttpInfo($body, $shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation putTransportDetailsAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\PutTransportDetailsRequest $body        (required)
     * @param string                                                                                 $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putTransportDetailsAsyncWithHttpInfo($body, $shipment_id)
    {
        $request = $this->putTransportDetailsRequest($body, $shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'putTransportDetails'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\PutTransportDetailsRequest $body        (required)
     * @param string                                                                                 $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function putTransportDetailsRequest($body, $shipment_id)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling putTransportDetails');
        }
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling putTransportDetails');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/transport';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'PUT', $httpBody);
    }

    /**
     * Operation updateInboundShipment.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        body (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentResponse
     */
    public function updateInboundShipment($body, $shipment_id)
    {
        return $this->updateInboundShipmentWithHttpInfo($body, $shipment_id);
    }

    /**
     * Operation updateInboundShipmentWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateInboundShipmentWithHttpInfo($body, $shipment_id)
    {
        $request = $this->updateInboundShipmentRequest($body, $shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation updateInboundShipmentAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateInboundShipmentAsync($body, $shipment_id)
    {
        return $this->updateInboundShipmentAsyncWithHttpInfo($body, $shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateInboundShipmentAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateInboundShipmentAsyncWithHttpInfo($body, $shipment_id)
    {
        $request = $this->updateInboundShipmentRequest($body, $shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'updateInboundShipment'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\InboundShipmentRequest $body        (required)
     * @param string                                                                             $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateInboundShipmentRequest($body, $shipment_id)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling updateInboundShipment');
        }
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling updateInboundShipment');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        // path params
        if (null !== $shipment_id) {
            $resourcePath = str_replace(
                '{'.'shipmentId'.'}',
                ObjectSerializer::toPathValue($shipment_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'PUT', $httpBody);
    }

    /**
     * Operation voidTransport.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\VoidTransportResponse
     */
    public function voidTransport($shipment_id)
    {
        return $this->voidTransportWithHttpInfo($shipment_id);
    }

    /**
     * Operation voidTransportWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\FulfillmentInbound\VoidTransportResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function voidTransportWithHttpInfo($shipment_id)
    {
        $request = $this->voidTransportRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation voidTransportAsync.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function voidTransportAsync($shipment_id)
    {
        return $this->voidTransportAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation voidTransportAsyncWithHttpInfo.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function voidTransportAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->voidTransportRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'voidTransport'.
     *
     * @param string $shipment_id A shipment identifier originally returned by the createInboundShipmentPlan operation. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function voidTransportRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling voidTransport');
        }

        $resourcePath = '/fba/inbound/v0/shipments/{shipmentId}/transport/void';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{'.'shipmentId'.'}',
            ObjectSerializer::toPathValue($shipment_id),
            $resourcePath
        );

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }
}
