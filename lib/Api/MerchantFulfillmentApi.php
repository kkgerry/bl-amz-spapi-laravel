<?php
/**
 * MerchantFulfillmentApi.
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

namespace Kkgerry\AmazonSellingPartnerAPI\Api;

use Kkgerry\AmazonSellingPartnerAPI\ApiException;
use Kkgerry\AmazonSellingPartnerAPI\Configuration;
use Kkgerry\AmazonSellingPartnerAPI\HeaderSelector;
use Kkgerry\AmazonSellingPartnerAPI\Helpers\SellingPartnerApiRequest;
use Kkgerry\AmazonSellingPartnerAPI\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use InvalidArgumentException;

/**
 * MerchantFulfillmentApi Class Doc Comment.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */
class MerchantFulfillmentApi
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
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CancelShipmentResponse
     */
    public function cancelShipment($shipment_id)
    {

        return $this->cancelShipmentWithHttpInfo($shipment_id);;
    }

    /**
     * Operation cancelShipmentWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CancelShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function cancelShipmentWithHttpInfo($shipment_id)
    {
        $request = $this->cancelShipmentRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation cancelShipmentAsync.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
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
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function cancelShipmentAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->cancelShipmentRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'cancelShipment'.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelShipmentRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new InvalidArgumentException('Missing the required parameter $shipment_id when calling cancelShipment');
        }

        $resourcePath = '/mfn/v0/shipments/{shipmentId}';
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

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'DELETE', $httpBody);
    }

    /**
     * Operation cancelShipmentOld.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CancelShipmentResponse
     */
    public function cancelShipmentOld($shipment_id)
    {
        return $this->cancelShipmentOldWithHttpInfo($shipment_id);
    }

    /**
     * Operation cancelShipmentOldWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array
     */
    public function cancelShipmentOldWithHttpInfo($shipment_id)
    {
        $request = $this->cancelShipmentOldRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation cancelShipmentOldAsync.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function cancelShipmentOldAsync($shipment_id)
    {
        return $this->cancelShipmentOldAsyncWithHttpInfo($shipment_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation cancelShipmentOldAsyncWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function cancelShipmentOldAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->cancelShipmentOldRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'cancelShipmentOld'.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment to cancel. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function cancelShipmentOldRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new InvalidArgumentException('Missing the required parameter $shipment_id when calling cancelShipmentOld');
        }

        $resourcePath = '/mfn/v0/shipments/{shipmentId}/cancel';
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

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'PUT', $httpBody);
    }

    /**
     * Operation createShipment.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentResponse
     */
    public function createShipment($body)
    {
        return $this->createShipmentWithHttpInfo($body);
    }

    /**
     * Operation createShipmentWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createShipmentWithHttpInfo($body)
    {
        $request = $this->createShipmentRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation createShipmentAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
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
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function createShipmentAsyncWithHttpInfo($body)
    {
        $returnType = '\Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentResponse';
        $request = $this->createShipmentRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'createShipment'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\CreateShipmentRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createShipmentRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling createShipment');
        }

        $resourcePath = '/mfn/v0/shipments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getAdditionalSellerInputs.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse
     */
    public function getAdditionalSellerInputs($body)
    {
        return $this->getAdditionalSellerInputsWithHttpInfo($body);;
    }

    /**
     * Operation getAdditionalSellerInputsWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAdditionalSellerInputsWithHttpInfo($body)
    {
        $request = $this->getAdditionalSellerInputsRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation getAdditionalSellerInputsAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsAsync($body)
    {
        return $this->getAdditionalSellerInputsAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAdditionalSellerInputsAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsAsyncWithHttpInfo($body)
    {
        $request = $this->getAdditionalSellerInputsRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getAdditionalSellerInputs'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAdditionalSellerInputsRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getAdditionalSellerInputs');
        }

        $resourcePath = '/mfn/v0/additionalSellerInputs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getAdditionalSellerInputsOld.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse
     */
    public function getAdditionalSellerInputsOld($body)
    {
        return $this->getAdditionalSellerInputsOldWithHttpInfo($body);
    }

    /**
     * Operation getAdditionalSellerInputsOldWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAdditionalSellerInputsOldWithHttpInfo($body)
    {
        $request = $this->getAdditionalSellerInputsOldRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation getAdditionalSellerInputsOldAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsOldAsync($body)
    {
        return $this->getAdditionalSellerInputsOldAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAdditionalSellerInputsOldAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getAdditionalSellerInputsOldAsyncWithHttpInfo($body)
    {
        $request = $this->getAdditionalSellerInputsOldRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getAdditionalSellerInputsOld'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetAdditionalSellerInputsRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAdditionalSellerInputsOldRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getAdditionalSellerInputsOld');
        }

        $resourcePath = '/mfn/v0/sellerInputs';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getEligibleShipmentServices.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse
     */
    public function getEligibleShipmentServices($body)
    {
        return $this->getEligibleShipmentServicesWithHttpInfo($body);;
    }

    /**
     * Operation getEligibleShipmentServicesWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getEligibleShipmentServicesWithHttpInfo($body)
    {
        $request = $this->getEligibleShipmentServicesRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation getEligibleShipmentServicesAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesAsync($body)
    {
        return $this->getEligibleShipmentServicesAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getEligibleShipmentServicesAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesAsyncWithHttpInfo($body)
    {
        $returnType = '\Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse';
        $request = $this->getEligibleShipmentServicesRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getEligibleShipmentServices'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getEligibleShipmentServicesRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getEligibleShipmentServices');
        }

        $resourcePath = '/mfn/v0/eligibleShippingServices';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getEligibleShipmentServicesOld.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse
     */
    public function getEligibleShipmentServicesOld($body)
    {
        return $this->getEligibleShipmentServicesOldWithHttpInfo($body);;
    }

    /**
     * Operation getEligibleShipmentServicesOldWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getEligibleShipmentServicesOldWithHttpInfo($body)
    {
        $request = $this->getEligibleShipmentServicesOldRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation getEligibleShipmentServicesOldAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesOldAsync($body)
    {
        return $this->getEligibleShipmentServicesOldAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getEligibleShipmentServicesOldAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getEligibleShipmentServicesOldAsyncWithHttpInfo($body)
    {
        $request = $this->getEligibleShipmentServicesOldRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Create request for operation 'getEligibleShipmentServicesOld'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetEligibleShipmentServicesRequest $body (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getEligibleShipmentServicesOldRequest($body)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new InvalidArgumentException('Missing the required parameter $body when calling getEligibleShipmentServicesOld');
        }

        $resourcePath = '/mfn/v0/eligibleServices';
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
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetShipmentResponse
     */
    public function getShipment($shipment_id)
    {
        return $this->getShipmentWithHttpInfo($shipment_id);;
    }

    /**
     * Operation getShipmentWithHttpInfo.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\MerchantFulfillment\GetShipmentResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getShipmentWithHttpInfo($shipment_id)
    {
        $request = $this->getShipmentRequest($shipment_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getShipmentAsync.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
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
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return PromiseInterface
     */
    public function getShipmentAsyncWithHttpInfo($shipment_id)
    {
        $request = $this->getShipmentRequest($shipment_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getShipment'.
     *
     * @param string $shipment_id The Amazon-defined shipment identifier for the shipment. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getShipmentRequest($shipment_id)
    {
        // verify the required parameter 'shipment_id' is set
        if (null === $shipment_id || (is_array($shipment_id) && 0 === count($shipment_id))) {
            throw new InvalidArgumentException('Missing the required parameter $shipment_id when calling getShipment');
        }

        $resourcePath = '/mfn/v0/shipments/{shipmentId}';
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
}
