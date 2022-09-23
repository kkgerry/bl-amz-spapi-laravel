<?php
/**
 * ShippingApi.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */

/**
 * Selling Partner API for Shipping.
 *
 * Provides programmatic access to Amazon Shipping APIs.
 *
 * OpenAPI spec version: v1
 */

namespace Kkgerry\AmazonSellingPartnerAPI\Api;

use Kkgerry\AmazonSellingPartnerAPI\Configuration;
use Kkgerry\AmazonSellingPartnerAPI\HeaderSelector;
use Kkgerry\AmazonSellingPartnerAPI\Helpers\SellingPartnerApiRequest;
use Kkgerry\AmazonSellingPartnerAPI\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * ShippingApi Class Doc Comment.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */
class ShippingApi
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
     * Operation cancelShipment.
     *
     * @param string $shipment_id shipment_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CancelShipmentResponse
     */
    public function cancelShipment($shipment_id)
    {
        return $this->cancelShipmentWithHttpInfo($shipment_id);
    }

    /**
     * Operation cancelShipmentWithHttpInfo.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CancelShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelShipmentWithHttpInfo($shipment_id)
    {
        $request = $this->cancelShipmentRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation cancelShipmentAsync.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelShipmentAsync($shipment_id)
    {
        return $this->cancelShipmentAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelShipmentAsyncWithHttpInfo.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function cancelShipmentAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->cancelShipmentRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'cancelShipment'.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelShipmentRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling cancelShipment');
        }

        $resourcePath = '/shipping/v1/shipments/{shipmentId}/cancel';
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
     * Operation createShipment.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CreateShipmentRequest $body body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CreateShipmentResponse
     */
    public function createShipment($body)
    {
        return $this->createShipmentWithHttpInfo($body);
    }

    /**
     * Operation createShipmentWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CreateShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CreateShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createShipmentWithHttpInfo($body)
    {
        $request = $this->createShipmentRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation createShipmentAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CreateShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createShipmentAsync($body)
    {
        return $this->createShipmentAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createShipmentAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CreateShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createShipmentAsyncWithHttpInfo($body)
    {
        $request = $this->createShipmentRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'createShipment'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\CreateShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createShipmentRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling createShipment');
        }

        $resourcePath = '/shipping/v1/shipments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getAccount.
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetAccountResponse
     */
    public function getAccount()
    {
        return $this->getAccountWithHttpInfo();
    }

    /**
     * Operation getAccountWithHttpInfo.
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetAccountResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAccountWithHttpInfo()
    {
        $request = $this->getAccountRequest();

        return $this->sendRequest($request);
    }

    /**
     * Operation getAccountAsync.
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAccountAsync()
    {
        return $this->getAccountAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAccountAsyncWithHttpInfo.
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAccountAsyncWithHttpInfo()
    {
        $request = $this->getAccountRequest();

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getAccount'.
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAccountRequest()
    {
        $resourcePath = '/shipping/v1/account';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getRates.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetRatesRequest $body body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetRatesResponse
     */
    public function getRates($body)
    {
        return $this->getRatesWithHttpInfo($body);
    }

    /**
     * Operation getRatesWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetRatesRequest $body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetRatesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRatesWithHttpInfo($body)
    {
        $request = $this->getRatesRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation getRatesAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetRatesRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRatesAsync($body)
    {
        return $this->getRatesAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getRatesAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetRatesRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRatesAsyncWithHttpInfo($body)
    {
        $request = $this->getRatesRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getRates'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetRatesRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getRatesRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling getRates');
        }

        $resourcePath = '/shipping/v1/rates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getShipment.
     *
     * @param string $shipment_id shipment_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetShipmentResponse
     */
    public function getShipment($shipment_id)
    {
        return $this->getShipmentWithHttpInfo($shipment_id);
    }

    /**
     * Operation getShipmentWithHttpInfo.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getShipmentWithHttpInfo($shipment_id)
    {
        $request = $this->getShipmentRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getShipmentAsync.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentAsync($shipment_id)
    {
        return $this->getShipmentAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getShipmentAsyncWithHttpInfo.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getShipmentAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->getShipmentRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getShipment'.
     *
     * @param string $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getShipmentRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling getShipment');
        }

        $resourcePath = '/shipping/v1/shipments/{shipmentId}';
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
     * Operation getTrackingInformation.
     *
     * @param string $tracking_id tracking_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetTrackingInformationResponse
     */
    public function getTrackingInformation($tracking_id)
    {
        return $this->getTrackingInformationWithHttpInfo($tracking_id);
    }

    /**
     * Operation getTrackingInformationWithHttpInfo.
     *
     * @param string $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\GetTrackingInformationResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTrackingInformationWithHttpInfo($tracking_id)
    {
        $request = $this->getTrackingInformationRequest($tracking_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getTrackingInformationAsync.
     *
     * @param string $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTrackingInformationAsync($tracking_id)
    {
        return $this->getTrackingInformationAsyncWithHttpInfo($tracking_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTrackingInformationAsyncWithHttpInfo.
     *
     * @param string $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTrackingInformationAsyncWithHttpInfo($tracking_id)
    {
        $request = $this->getTrackingInformationRequest($tracking_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getTrackingInformation'.
     *
     * @param string $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getTrackingInformationRequest($tracking_id)
    {
        // verify the required parameter 'tracking_id' is set
        if (null === $tracking_id || (is_array($tracking_id) && 0 === count($tracking_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $tracking_id when calling getTrackingInformation');
        }

        $resourcePath = '/shipping/v1/tracking/{trackingId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $tracking_id) {
            $resourcePath = str_replace(
                '{'.'trackingId'.'}',
                ObjectSerializer::toPathValue($tracking_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation purchaseLabels.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseLabelsRequest $body        body (required)
     * @param string                                                                  $shipment_id shipment_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseLabelsResponse
     */
    public function purchaseLabels($body, $shipment_id)
    {
        return $this->purchaseLabelsWithHttpInfo($body, $shipment_id);

    }

    /**
     * Operation purchaseLabelsWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseLabelsRequest $body        (required)
     * @param string                                                                  $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseLabelsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function purchaseLabelsWithHttpInfo($body, $shipment_id)
    {
        $request = $this->purchaseLabelsRequest($body, $shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation purchaseLabelsAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseLabelsRequest $body        (required)
     * @param string                                                                  $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purchaseLabelsAsync($body, $shipment_id)
    {
        return $this->purchaseLabelsAsyncWithHttpInfo($body, $shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation purchaseLabelsAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseLabelsRequest $body        (required)
     * @param string                                                                  $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purchaseLabelsAsyncWithHttpInfo($body, $shipment_id)
    {
        $request = $this->purchaseLabelsRequest($body, $shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'purchaseLabels'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseLabelsRequest $body        (required)
     * @param string                                                                  $shipment_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function purchaseLabelsRequest($body, $shipment_id)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling purchaseLabels');
        }
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling purchaseLabels');
        }

        $resourcePath = '/shipping/v1/shipments/{shipmentId}/purchaseLabels';
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
     * Operation purchaseShipment.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseShipmentRequest $body body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseShipmentResponse
     */
    public function purchaseShipment($body)
    {
        return $this->purchaseShipmentWithHttpInfo($body);
    }

    /**
     * Operation purchaseShipmentWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function purchaseShipmentWithHttpInfo($body)
    {
        $request = $this->purchaseShipmentRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation purchaseShipmentAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purchaseShipmentAsync($body)
    {
        return $this->purchaseShipmentAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation purchaseShipmentAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function purchaseShipmentAsyncWithHttpInfo($body)
    {
        $request = $this->purchaseShipmentRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'purchaseShipment'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\PurchaseShipmentRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function purchaseShipmentRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling purchaseShipment');
        }

        $resourcePath = '/shipping/v1/purchaseShipment';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation retrieveShippingLabel.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\RetrieveShippingLabelRequest $body        body (required)
     * @param string                                                                         $shipment_id shipment_id (required)
     * @param string                                                                         $tracking_id tracking_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\RetrieveShippingLabelResponse
     */
    public function retrieveShippingLabel($body, $shipment_id, $tracking_id)
    {
        return $this->retrieveShippingLabelWithHttpInfo($body, $shipment_id, $tracking_id);
    }

    /**
     * Operation retrieveShippingLabelWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\RetrieveShippingLabelRequest $body        (required)
     * @param string                                                                         $shipment_id (required)
     * @param string                                                                         $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\RetrieveShippingLabelResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function retrieveShippingLabelWithHttpInfo($body, $shipment_id, $tracking_id)
    {
        $request = $this->retrieveShippingLabelRequest($body, $shipment_id, $tracking_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation retrieveShippingLabelAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\RetrieveShippingLabelRequest $body        (required)
     * @param string                                                                         $shipment_id (required)
     * @param string                                                                         $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function retrieveShippingLabelAsync($body, $shipment_id, $tracking_id)
    {
        return $this->retrieveShippingLabelAsyncWithHttpInfo($body, $shipment_id, $tracking_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation retrieveShippingLabelAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\RetrieveShippingLabelRequest $body        (required)
     * @param string                                                                         $shipment_id (required)
     * @param string                                                                         $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function retrieveShippingLabelAsyncWithHttpInfo($body, $shipment_id, $tracking_id)
    {
        $request = $this->retrieveShippingLabelRequest($body, $shipment_id, $tracking_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'retrieveShippingLabel'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Shipping\RetrieveShippingLabelRequest $body        (required)
     * @param string                                                                         $shipment_id (required)
     * @param string                                                                         $tracking_id (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function retrieveShippingLabelRequest($body, $shipment_id, $tracking_id)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling retrieveShippingLabel');
        }
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $shipment_id when calling retrieveShippingLabel');
        }
        // verify the required parameter 'tracking_id' is set
        if (null === $tracking_id || (is_array($tracking_id) && 0 === count($tracking_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $tracking_id when calling retrieveShippingLabel');
        }

        $resourcePath = '/shipping/v1/shipments/{shipmentId}/containers/{trackingId}/label';
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
        // path params
        if (null !== $tracking_id) {
            $resourcePath = str_replace(
                '{'.'trackingId'.'}',
                ObjectSerializer::toPathValue($tracking_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }
}
