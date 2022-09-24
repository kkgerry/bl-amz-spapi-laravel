<?php
/**
 * CatalogApi.
 *
 * @author   Stefan Neuhaus / ClouSale
 */

/**
 * Selling Partner API for Catalog Items.
 *
 * The Selling Partner API for Catalog Items helps you programmatically retrieve item details for items in the catalog.
 *
 * OpenAPI spec version: v0
 */

namespace ClouSale\AmazonSellingPartnerAPI\Api;

use ClouSale\AmazonSellingPartnerAPI\ApiException;
use ClouSale\AmazonSellingPartnerAPI\Configuration;
use ClouSale\AmazonSellingPartnerAPI\HeaderSelector;
use ClouSale\AmazonSellingPartnerAPI\Helpers\SellingPartnerApiRequest;
use ClouSale\AmazonSellingPartnerAPI\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;

/**
 * CatalogApi Class Doc Comment.
 *
 * @author   Stefan Neuhaus / ClouSale
 */
class CatalogApi
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
     * Operation getCatalogItem.
     *
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace for the item. (required)
     * @param string $asin           The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return \ClouSale\AmazonSellingPartnerAPI\Models\Catalog\GetCatalogItemResponse
     */
    public function getCatalogItem($marketplace_id, $asin, $includedData=null)
    {
        return $this->getCatalogItemWithHttpInfo($marketplace_id, $asin, $includedData);
    }

    /**
     * Operation getCatalogItemWithHttpInfo.
     *
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace for the item. (required)
     * @param string $asin           The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \ClouSale\AmazonSellingPartnerAPI\Models\Catalog\GetCatalogItemResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getCatalogItemWithHttpInfo($marketplace_id, $asin, $includedData=null)
    {
        $request = $this->getCatalogItemRequest($marketplace_id, $asin, $includedData);

        return $this->sendRequest($request);
    }

    /**
     * Operation getCatalogItemAsync.
     *
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace for the item. (required)
     * @param string $asin           The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCatalogItemAsync($marketplace_id, $asin, $includedData=null)
    {
        return $this->getCatalogItemAsyncWithHttpInfo($marketplace_id, $asin, $includedData)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCatalogItemAsyncWithHttpInfo.
     *
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace for the item. (required)
     * @param string $asin           The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCatalogItemAsyncWithHttpInfo($marketplace_id, $asin, $includedData=null)
    {
        $request = $this->getCatalogItemRequest($marketplace_id, $asin, $includedData);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getCatalogItem'.
     *
     * @param string $marketplace_id A marketplace identifier. Specifies the marketplace for the item. (required)
     * @param string $asin           The Amazon Standard Identification Number (ASIN) of the item. (required)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getCatalogItemRequest($marketplace_id, $asin,$includedData=null)
    {
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new InvalidArgumentException('Missing the required parameter $marketplace_id when calling getCatalogItem');
        }
        // verify the required parameter 'asin' is set
        if (null === $asin || (is_array($asin) && 0 === count($asin))) {
            throw new InvalidArgumentException('Missing the required parameter $asin when calling getCatalogItem');
        }

        //$resourcePath = '/catalog/v0/items/{asin}';
        $resourcePath = '/catalog/2022-04-01/items/{asin}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $marketplace_id) {
            $queryParams['MarketplaceId'] = ObjectSerializer::toQueryValue($marketplace_id);
        }
        if (null !== $includedData) {
            $queryParams['includedData'] = ObjectSerializer::toQueryValue($includedData);
        }

        // path params
        if (null !== $asin) {
            $resourcePath = str_replace(
                '{'.'asin'.'}',
                ObjectSerializer::toPathValue($asin),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation listCatalogItems.
     *
     * @param string $marketplace_id   A marketplace identifier. Specifies the marketplace for which items are returned. (required)
     * @param string $pageToken A token to fetch a certain page when there are multiple pages worth of results.
     * @param string $identifiersType   Type of product identifiers to search the Amazon catalog for. Note: Required when identifiers are provided. [ASIN, EAN, GTIN, ISBN, JAN, MINSAN, SKU, UPC]
     * @param string|array $identifiers   A comma-delimited list of product identifiers to search the Amazon catalog for. Note: Cannot be used with keywords. Max count : 20
     * @param string|array $includedData A comma-delimited list of data sets to include in the response. Default: summaries.
     * @param string $sellerId  A selling partner identifier, such as a seller account or vendor code. Note: Required when identifiersType is SKU.
     * @param string|array $keywords A comma-delimited list of words to search the Amazon catalog for. Note: Cannot be used with identifiers.    Max count : 20
     * @param string|array $brandNames    A comma-delimited list of brand names to limit the search for keywords-based queries. Note: Cannot be used with identifiers.
     * @param string|array $classificationIds   A comma-delimited list of classification identifiers to limit the search for keywords-based queries. Note: Cannot be used with identifiers.
     * @param int $pageSize   Number of results to be returned per page. Maximum : 20
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     */
    public function listCatalogItems($marketplace_id, $pageToken=null, $identifiersType = null, $identifiers = null, $includedData = null, $sellerId = null, $keywords = null, $brandNames = null, $classificationIds = null,$pageSize=20)
    {
        return $this->listCatalogItemsWithHttpInfo($marketplace_id,$pageToken, $identifiersType, $identifiers, $includedData, $sellerId, $keywords, $brandNames, $classificationIds,$pageSize);
    }

    /**
     * Operation listCatalogItemsWithHttpInfo.
     *
     * @param string $marketplace_id   A marketplace identifier. Specifies the marketplace for which items are returned. (required)
     * @param string $query            Keyword(s) to use to search for items in the catalog. Example: &#x27;harry potter books&#x27;. (optional)
     * @param string $query_context_id An identifier for the context within which the given search will be performed. A marketplace might provide mechanisms for constraining a search to a subset of potential items. For example, the retail marketplace allows queries to be constrained to a specific category. The QueryContextId parameter specifies such a subset. If it is omitted, the search will be performed using the default context for the marketplace, which will typically contain the largest set of items. (optional)
     * @param string $seller_sku       Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (optional)
     * @param string $upc              A 12-digit bar code used for retail packaging. (optional)
     * @param string $ean              A European article number that uniquely identifies the catalog item, manufacturer, and its attributes. (optional)
     * @param string $isbn             The unique commercial book identifier used to identify books internationally. (optional)
     * @param string $jan              A Japanese article number that uniquely identifies the product, manufacturer, and its attributes. (optional)
     *
     * @throws ApiException             on non-2xx response
     * @throws InvalidArgumentException
     *
     * @return array of \ClouSale\AmazonSellingPartnerAPI\Models\Catalog\ListCatalogItemsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listCatalogItemsWithHttpInfo($marketplace_id,$pageToken=null, $identifiersType = null, $identifiers = null, $includedData = null, $sellerId = null, $keywords = null, $brandNames = null, $classificationIds = null,$pageSize=null)
    {
        $request = $this->listCatalogItemsRequest($marketplace_id,$pageToken, $identifiersType, $identifiers, $includedData, $sellerId, $keywords, $brandNames, $classificationIds,$pageSize);

        return $this->sendRequest($request);
    }

    /**
     * Operation listCatalogItemsAsync.
     *
     * @param string $marketplace_id   A marketplace identifier. Specifies the marketplace for which items are returned. (required)
     * @param string $query            Keyword(s) to use to search for items in the catalog. Example: &#x27;harry potter books&#x27;. (optional)
     * @param string $query_context_id An identifier for the context within which the given search will be performed. A marketplace might provide mechanisms for constraining a search to a subset of potential items. For example, the retail marketplace allows queries to be constrained to a specific category. The QueryContextId parameter specifies such a subset. If it is omitted, the search will be performed using the default context for the marketplace, which will typically contain the largest set of items. (optional)
     * @param string $seller_sku       Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (optional)
     * @param string $upc              A 12-digit bar code used for retail packaging. (optional)
     * @param string $ean              A European article number that uniquely identifies the catalog item, manufacturer, and its attributes. (optional)
     * @param string $isbn             The unique commercial book identifier used to identify books internationally. (optional)
     * @param string $jan              A Japanese article number that uniquely identifies the product, manufacturer, and its attributes. (optional)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listCatalogItemsAsync($marketplace_id, $pageToken=null, $identifiersType = null, $identifiers = null, $includedData = null, $sellerId = null, $keywords = null, $brandNames = null, $classificationIds = null,$pageSize=null)
    {
        return $this->listCatalogItemsAsyncWithHttpInfo($marketplace_id,$pageToken, $identifiersType, $identifiers, $includedData, $sellerId, $keywords, $brandNames, $classificationIds,$pageSize)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listCatalogItemsAsyncWithHttpInfo.
     *
     * @param string $marketplace_id   A marketplace identifier. Specifies the marketplace for which items are returned. (required)
     * @param string $query            Keyword(s) to use to search for items in the catalog. Example: &#x27;harry potter books&#x27;. (optional)
     * @param string $query_context_id An identifier for the context within which the given search will be performed. A marketplace might provide mechanisms for constraining a search to a subset of potential items. For example, the retail marketplace allows queries to be constrained to a specific category. The QueryContextId parameter specifies such a subset. If it is omitted, the search will be performed using the default context for the marketplace, which will typically contain the largest set of items. (optional)
     * @param string $seller_sku       Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (optional)
     * @param string $upc              A 12-digit bar code used for retail packaging. (optional)
     * @param string $ean              A European article number that uniquely identifies the catalog item, manufacturer, and its attributes. (optional)
     * @param string $isbn             The unique commercial book identifier used to identify books internationally. (optional)
     * @param string $jan              A Japanese article number that uniquely identifies the product, manufacturer, and its attributes. (optional)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listCatalogItemsAsyncWithHttpInfo($marketplace_id, $pageToken=null, $identifiersType = null, $identifiers = null, $includedData = null, $sellerId = null, $keywords = null, $brandNames = null, $classificationIds = null,$pageSize=null)
    {
        $request = $this->listCatalogItemsRequest($marketplace_id,$pageToken, $identifiersType, $identifiers, $includedData, $sellerId, $keywords, $brandNames, $classificationIds,$pageSize);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'listCatalogItems'.
     *
     * @param string $marketplace_id   A marketplace identifier. Specifies the marketplace for which items are returned. (required)
     * @param string $query            Keyword(s) to use to search for items in the catalog. Example: &#x27;harry potter books&#x27;. (optional)
     * @param string $query_context_id An identifier for the context within which the given search will be performed. A marketplace might provide mechanisms for constraining a search to a subset of potential items. For example, the retail marketplace allows queries to be constrained to a specific category. The QueryContextId parameter specifies such a subset. If it is omitted, the search will be performed using the default context for the marketplace, which will typically contain the largest set of items. (optional)
     * @param string $seller_sku       Used to identify an item in the given marketplace. SellerSKU is qualified by the seller&#x27;s SellerId, which is included with every operation that you submit. (optional)
     * @param string $upc              A 12-digit bar code used for retail packaging. (optional)
     * @param string $ean              A European article number that uniquely identifies the catalog item, manufacturer, and its attributes. (optional)
     * @param string $isbn             The unique commercial book identifier used to identify books internationally. (optional)
     * @param string $jan              A Japanese article number that uniquely identifies the product, manufacturer, and its attributes. (optional)
     *
     * @throws InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function listCatalogItemsRequest($marketplace_id, $pageToken=null, $identifiersType = null, $identifiers = null, $includedData = null, $sellerId = null, $keywords = null, $brandNames = null, $classificationIds = null,$pageSize=null)
    {
        // verify the required parameter 'marketplace_id' is set
        if (null === $marketplace_id || (is_array($marketplace_id) && 0 === count($marketplace_id))) {
            throw new InvalidArgumentException('Missing the required parameter $marketplace_id when calling listCatalogItems');
        }

        $resourcePath = '/catalog/2022-04-01/items';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if (null !== $marketplace_id) {
            $queryParams['marketplaceIds'] = $marketplace_id;
        }
        // query params
        if (null !== $identifiersType) {
            $queryParams['identifiersType'] = ObjectSerializer::toQueryValue($identifiersType);
            // query params
            if (null !== $identifiers) {
                $queryParams['identifiers'] = ObjectSerializer::toQueryValue($identifiers);
            }
        }

        // query params
        if (null !== $includedData) {
            $queryParams['includedData'] = ObjectSerializer::toQueryValue($includedData);
        }
        // query params
        if (null !== $sellerId) {
            $queryParams['sellerId'] = ObjectSerializer::toQueryValue($sellerId);
        }
        // query params
        if (null !== $keywords) {
            $queryParams['keywords'] = ObjectSerializer::toQueryValue($keywords);
        }
        // query params
        if (null !== $brandNames) {
            $queryParams['brandNames'] = ObjectSerializer::toQueryValue($brandNames);
        }
        // query params
        if (null !== $classificationIds) {
            $queryParams['classificationIds'] = ObjectSerializer::toQueryValue($classificationIds);
        }
        if (null !== $pageSize) {
            $queryParams['pageSize'] = intval($pageSize);
        }
        if (null !== $pageToken) {
            $queryParams['pageToken'] = $pageToken;
        }
        //print_r($queryParams);die();
        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }
}
