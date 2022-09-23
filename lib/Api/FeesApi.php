<?php
/**
 * FeesApi.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */

/**
 * Selling Partner API for Product Fees.
 *
 * The Selling Partner API for Product Fees lets you programmatically retrieve estimated fees for a product. You can then account for those fees in your pricing.
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
 * FeesApi Class Doc Comment.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */
class FeesApi
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
     * Operation getMyFeesEstimateForASIN.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body body (required)
     * @param string                                                                        $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateResponse
     */
    public function getMyFeesEstimateForASIN($body, $asin)
    {
        return $this->getMyFeesEstimateForASINWithHttpInfo($body, $asin);
    }

    /**
     * Operation getMyFeesEstimateForASINWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body (required)
     * @param string                                                                        $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMyFeesEstimateForASINWithHttpInfo($body, $asin)
    {
        $request = $this->getMyFeesEstimateForASINRequest($body, $asin);

        return $this->sendRequest($request);
    }

    /**
     * Operation getMyFeesEstimateForASINAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body (required)
     * @param string                                                                        $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyFeesEstimateForASINAsync($body, $asin)
    {
        return $this->getMyFeesEstimateForASINAsyncWithHttpInfo($body, $asin)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMyFeesEstimateForASINAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body (required)
     * @param string                                                                        $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyFeesEstimateForASINAsyncWithHttpInfo($body, $asin)
    {
        $request = $this->getMyFeesEstimateForASINRequest($body, $asin);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getMyFeesEstimateForASIN'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body (required)
     * @param string                                                                        $asin The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMyFeesEstimateForASINRequest($body, $asin)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling getMyFeesEstimateForASIN');
        }
        // verify the required parameter 'asin' is set
        if (null === $asin || (is_array($asin) && 0 === count($asin))) {
            throw new \InvalidArgumentException('Missing the required parameter $asin when calling getMyFeesEstimateForASIN');
        }

        $resourcePath = '/products/fees/v0/items/{Asin}/feesEstimate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        // path params
        if (null !== $asin) {
            $resourcePath = str_replace(
                '{'.'Asin'.'}',
                ObjectSerializer::toPathValue($asin),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation getMyFeesEstimateForSKU.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body       body (required)
     * @param string                                                                        $seller_sku Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateResponse
     */
    public function getMyFeesEstimateForSKU($body, $seller_sku)
    {
        return $this->getMyFeesEstimateForSKUWithHttpInfo($body, $seller_sku);;
    }

    /**
     * Operation getMyFeesEstimateForSKUWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body       (required)
     * @param string                                                                        $seller_sku Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getMyFeesEstimateForSKUWithHttpInfo($body, $seller_sku)
    {
        $request = $this->getMyFeesEstimateForSKURequest($body, $seller_sku);

        return $this->sendRequest($request);
    }

    /**
     * Operation getMyFeesEstimateForSKUAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body       (required)
     * @param string                                                                        $seller_sku Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyFeesEstimateForSKUAsync($body, $seller_sku)
    {
        return $this->getMyFeesEstimateForSKUAsyncWithHttpInfo($body, $seller_sku)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMyFeesEstimateForSKUAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body       (required)
     * @param string                                                                        $seller_sku Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getMyFeesEstimateForSKUAsyncWithHttpInfo($body, $seller_sku)
    {
        $request = $this->getMyFeesEstimateForSKURequest($body, $seller_sku);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getMyFeesEstimateForSKU'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\ProductFees\GetMyFeesEstimateRequest $body       (required)
     * @param string                                                                        $seller_sku Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getMyFeesEstimateForSKURequest($body, $seller_sku)
    {
        // verify the required parameter 'body' is set
        if (null === $body || (is_array($body) && 0 === count($body))) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling getMyFeesEstimateForSKU');
        }
        // verify the required parameter 'seller_sku' is set
        if (null === $seller_sku || (is_array($seller_sku) && 0 === count($seller_sku))) {
            throw new \InvalidArgumentException('Missing the required parameter $seller_sku when calling getMyFeesEstimateForSKU');
        }

        $resourcePath = '/products/fees/v0/listings/{SellerSKU}/feesEstimate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        // path params
        if (null !== $seller_sku) {
            $resourcePath = str_replace(
                '{'.'SellerSKU'.'}',
                ObjectSerializer::toPathValue($seller_sku),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }
}
