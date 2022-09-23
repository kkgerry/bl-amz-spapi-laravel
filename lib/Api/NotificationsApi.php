<?php
/**
 * NotificationsApi.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */

/**
 * Selling Partner API for Notifications.
 *
 * The Selling Partner API for Notifications lets you subscribe to notifications that are relevant to a selling partner's business. Using this API you can create a destination to receive notifications, subscribe to notifications, delete notification subscriptions, and more.
 *
 * OpenAPI spec version: v1
 */

namespace Kkgerry\AmazonSellingPartnerAPI\Api;

use Kkgerry\AmazonSellingPartnerAPI\Configuration;
use Kkgerry\AmazonSellingPartnerAPI\ExceptionThrower;
use Kkgerry\AmazonSellingPartnerAPI\HeaderSelector;
use Kkgerry\AmazonSellingPartnerAPI\Helpers\SellingPartnerApiRequest;
use Kkgerry\AmazonSellingPartnerAPI\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * NotificationsApi Class Doc Comment.
 *
 * @author   Stefan Neuhaus / Kkgerry
 */
class NotificationsApi
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
     * Operation createDestination.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateDestinationRequest $body body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateDestinationResponse
     */
    public function createDestination($body)
    {
        return $this->createDestinationWithHttpInfo($body);;
    }

    /**
     * Operation createDestinationWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateDestinationRequest $body (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateDestinationResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createDestinationWithHttpInfo($body)
    {
        $request = $this->createDestinationRequest($body);

        return $this->sendRequest($request);
    }

    /**
     * Operation createDestinationAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateDestinationRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDestinationAsync($body)
    {
        return $this->createDestinationAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createDestinationAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateDestinationRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDestinationAsyncWithHttpInfo($body)
    {
        $request = $this->createDestinationRequest($body);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'createDestination'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateDestinationRequest $body (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createDestinationRequest($body)
    {
        // verify the required parameter 'body' is set
        ExceptionThrower::throwIf(\InvalidArgumentException::class, null === $body || (is_array($body) && 0 === count($body)), 'Missing the required parameter $body when calling createDestination');

        $resourcePath = '/notifications/v1/destinations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation createSubscription.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateSubscriptionRequest $body              body (required)
     * @param string                                                                           $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateSubscriptionResponse
     */
    public function createSubscription($body, $notification_type)
    {
        return $this->createSubscriptionWithHttpInfo($body, $notification_type);;
    }

    /**
     * Operation createSubscriptionWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateSubscriptionRequest $body              (required)
     * @param string                                                                           $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateSubscriptionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createSubscriptionWithHttpInfo($body, $notification_type)
    {
        $request = $this->createSubscriptionRequest($body, $notification_type);

        return $this->sendRequest($request);
    }

    /**
     * Operation createSubscriptionAsync.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateSubscriptionRequest $body              (required)
     * @param string                                                                           $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createSubscriptionAsync($body, $notification_type)
    {
        return $this->createSubscriptionAsyncWithHttpInfo($body, $notification_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createSubscriptionAsyncWithHttpInfo.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateSubscriptionRequest $body              (required)
     * @param string                                                                           $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createSubscriptionAsyncWithHttpInfo($body, $notification_type)
    {
        $request = $this->createSubscriptionRequest($body, $notification_type);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'createSubscription'.
     *
     * @param \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\CreateSubscriptionRequest $body              (required)
     * @param string                                                                           $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createSubscriptionRequest($body, $notification_type)
    {
        ExceptionThrower::throwIf(\InvalidArgumentException::class, null === $body || (is_array($body) && 0 === count($body)), 'Missing the required parameter $body when calling createSubscription');
        ExceptionThrower::throwIf(\InvalidArgumentException::class, null === $notification_type || (is_array($notification_type) && 0 === count($notification_type)), 'Missing the required parameter $notification_type when calling createSubscription');

        $resourcePath = '/notifications/v1/subscriptions/{notificationType}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = $body;
        $multipart = false;

        // path params
        if (null !== $notification_type) {
            $resourcePath = str_replace(
                '{'.'notificationType'.'}',
                ObjectSerializer::toPathValue($notification_type),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'POST', $httpBody);
    }

    /**
     * Operation deleteDestination.
     *
     * @param string $destination_id The identifier for the destination that you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\DeleteDestinationResponse
     */
    public function deleteDestination($destination_id)
    {
        return $this->deleteDestinationWithHttpInfo($destination_id);;
    }

    /**
     * Operation deleteDestinationWithHttpInfo.
     *
     * @param string $destination_id The identifier for the destination that you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\DeleteDestinationResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteDestinationWithHttpInfo($destination_id)
    {
        $request = $this->deleteDestinationRequest($destination_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation deleteDestinationAsync.
     *
     * @param string $destination_id The identifier for the destination that you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteDestinationAsync($destination_id)
    {
        return $this->deleteDestinationAsyncWithHttpInfo($destination_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteDestinationAsyncWithHttpInfo.
     *
     * @param string $destination_id The identifier for the destination that you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteDestinationAsyncWithHttpInfo($destination_id)
    {
        $request = $this->deleteDestinationRequest($destination_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'deleteDestination'.
     *
     * @param string $destination_id The identifier for the destination that you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteDestinationRequest($destination_id)
    {
        // verify the required parameter 'destination_id' is set
        if (null === $destination_id || (is_array($destination_id) && 0 === count($destination_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $destination_id when calling deleteDestination');
        }

        $resourcePath = '/notifications/v1/destinations/{destinationId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $destination_id) {
            $resourcePath = str_replace(
                '{'.'destinationId'.'}',
                ObjectSerializer::toPathValue($destination_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'DELETE', $httpBody);
    }

    /**
     * Operation deleteSubscriptionById.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to delete. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\DeleteSubscriptionByIdResponse
     */
    public function deleteSubscriptionById($subscription_id, $notification_type)
    {
        return $this->deleteSubscriptionByIdWithHttpInfo($subscription_id, $notification_type);;
    }

    /**
     * Operation deleteSubscriptionByIdWithHttpInfo.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to delete. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\DeleteSubscriptionByIdResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteSubscriptionByIdWithHttpInfo($subscription_id, $notification_type)
    {
        $request = $this->deleteSubscriptionByIdRequest($subscription_id, $notification_type);

        return $this->sendRequest($request);
    }

    /**
     * Operation deleteSubscriptionByIdAsync.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to delete. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteSubscriptionByIdAsync($subscription_id, $notification_type)
    {
        return $this->deleteSubscriptionByIdAsyncWithHttpInfo($subscription_id, $notification_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteSubscriptionByIdAsyncWithHttpInfo.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to delete. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteSubscriptionByIdAsyncWithHttpInfo($subscription_id, $notification_type)
    {
        $request = $this->deleteSubscriptionByIdRequest($subscription_id, $notification_type);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'deleteSubscriptionById'.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to delete. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteSubscriptionByIdRequest($subscription_id, $notification_type)
    {
        // verify the required parameter 'subscription_id' is set
        if (null === $subscription_id || (is_array($subscription_id) && 0 === count($subscription_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_id when calling deleteSubscriptionById');
        }
        // verify the required parameter 'notification_type' is set
        if (null === $notification_type || (is_array($notification_type) && 0 === count($notification_type))) {
            throw new \InvalidArgumentException('Missing the required parameter $notification_type when calling deleteSubscriptionById');
        }

        $resourcePath = '/notifications/v1/subscriptions/{notificationType}/{subscriptionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $subscription_id) {
            $resourcePath = str_replace(
                '{'.'subscriptionId'.'}',
                ObjectSerializer::toPathValue($subscription_id),
                $resourcePath
            );
        }
        // path params
        if (null !== $notification_type) {
            $resourcePath = str_replace(
                '{'.'notificationType'.'}',
                ObjectSerializer::toPathValue($notification_type),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'DELETE', $httpBody);
    }

    /**
     * Operation getDestination.
     *
     * @param string $destination_id The identifier generated when you created the destination. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetDestinationResponse
     */
    public function getDestination($destination_id)
    {
        return $this->getDestinationWithHttpInfo($destination_id);;
    }

    /**
     * Operation getDestinationWithHttpInfo.
     *
     * @param string $destination_id The identifier generated when you created the destination. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetDestinationResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDestinationWithHttpInfo($destination_id)
    {
        $request = $this->getDestinationRequest($destination_id);

        return $this->sendRequest($request);
    }

    /**
     * Operation getDestinationAsync.
     *
     * @param string $destination_id The identifier generated when you created the destination. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationAsync($destination_id)
    {
        return $this->getDestinationAsyncWithHttpInfo($destination_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDestinationAsyncWithHttpInfo.
     *
     * @param string $destination_id The identifier generated when you created the destination. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationAsyncWithHttpInfo($destination_id)
    {
        $request = $this->getDestinationRequest($destination_id);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getDestination'.
     *
     * @param string $destination_id The identifier generated when you created the destination. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getDestinationRequest($destination_id)
    {
        // verify the required parameter 'destination_id' is set
        if (null === $destination_id || (is_array($destination_id) && 0 === count($destination_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $destination_id when calling getDestination');
        }

        $resourcePath = '/notifications/v1/destinations/{destinationId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $destination_id) {
            $resourcePath = str_replace(
                '{'.'destinationId'.'}',
                ObjectSerializer::toPathValue($destination_id),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getDestinations.
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetDestinationsResponse
     */
    public function getDestinations()
    {
        return $this->getDestinationsWithHttpInfo();;
    }

    /**
     * Operation getDestinationsWithHttpInfo.
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetDestinationsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDestinationsWithHttpInfo()
    {
        $request = $this->getDestinationsRequest();

        return $this->sendRequest($request);
    }

    /**
     * Operation getDestinationsAsync.
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationsAsync()
    {
        return $this->getDestinationsAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDestinationsAsyncWithHttpInfo.
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDestinationsAsyncWithHttpInfo()
    {
        $request = $this->getDestinationsRequest();

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getDestinations'.
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getDestinationsRequest()
    {
        $resourcePath = '/notifications/v1/destinations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getSubscription.
     *
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetSubscriptionResponse
     */
    public function getSubscription($notification_type)
    {
        return $this->getSubscriptionWithHttpInfo($notification_type);;
    }

    /**
     * Operation getSubscriptionWithHttpInfo.
     *
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetSubscriptionResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSubscriptionWithHttpInfo($notification_type)
    {
        $request = $this->getSubscriptionRequest($notification_type);

        return $this->sendRequest($request);
    }

    /**
     * Operation getSubscriptionAsync.
     *
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSubscriptionAsync($notification_type)
    {
        return $this->getSubscriptionAsyncWithHttpInfo($notification_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSubscriptionAsyncWithHttpInfo.
     *
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSubscriptionAsyncWithHttpInfo($notification_type)
    {
        $request = $this->getSubscriptionRequest($notification_type);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getSubscription'.
     *
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSubscriptionRequest($notification_type)
    {
        // verify the required parameter 'notification_type' is set
        if (null === $notification_type || (is_array($notification_type) && 0 === count($notification_type))) {
            throw new \InvalidArgumentException('Missing the required parameter $notification_type when calling getSubscription');
        }

        $resourcePath = '/notifications/v1/subscriptions/{notificationType}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $notification_type) {
            $resourcePath = str_replace(
                '{'.'notificationType'.'}',
                ObjectSerializer::toPathValue($notification_type),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }

    /**
     * Operation getSubscriptionById.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to get. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetSubscriptionByIdResponse
     */
    public function getSubscriptionById($subscription_id, $notification_type)
    {
        return $this->getSubscriptionByIdWithHttpInfo($subscription_id, $notification_type);;
    }

    /**
     * Operation getSubscriptionByIdWithHttpInfo.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to get. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     * @throws \Kkgerry\AmazonSellingPartnerAPI\ApiException on non-2xx response
     *
     * @return array of \Kkgerry\AmazonSellingPartnerAPI\Models\Notifications\GetSubscriptionByIdResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getSubscriptionByIdWithHttpInfo($subscription_id, $notification_type)
    {
        $request = $this->getSubscriptionByIdRequest($subscription_id, $notification_type);

        return $this->sendRequest($request);
    }

    /**
     * Operation getSubscriptionByIdAsync.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to get. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSubscriptionByIdAsync($subscription_id, $notification_type)
    {
        return $this->getSubscriptionByIdAsyncWithHttpInfo($subscription_id, $notification_type)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSubscriptionByIdAsyncWithHttpInfo.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to get. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getSubscriptionByIdAsyncWithHttpInfo($subscription_id, $notification_type)
    {
        $request = $this->getSubscriptionByIdRequest($subscription_id, $notification_type);

        return $this->sendRequestAsync($request);
    }

    /**
     * Create request for operation 'getSubscriptionById'.
     *
     * @param string $subscription_id   The identifier for the subscription that you want to get. (required)
     * @param string $notification_type The type of notification to which you want to subscribe.   For more information about notification types, see the Notifications API Use Case Guide. (required)
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getSubscriptionByIdRequest($subscription_id, $notification_type)
    {
        // verify the required parameter 'subscription_id' is set
        if (null === $subscription_id || (is_array($subscription_id) && 0 === count($subscription_id))) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_id when calling getSubscriptionById');
        }
        // verify the required parameter 'notification_type' is set
        if (null === $notification_type || (is_array($notification_type) && 0 === count($notification_type))) {
            throw new \InvalidArgumentException('Missing the required parameter $notification_type when calling getSubscriptionById');
        }

        $resourcePath = '/notifications/v1/subscriptions/{notificationType}/{subscriptionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if (null !== $subscription_id) {
            $resourcePath = str_replace(
                '{'.'subscriptionId'.'}',
                ObjectSerializer::toPathValue($subscription_id),
                $resourcePath
            );
        }
        // path params
        if (null !== $notification_type) {
            $resourcePath = str_replace(
                '{'.'notificationType'.'}',
                ObjectSerializer::toPathValue($notification_type),
                $resourcePath
            );
        }

        return $this->generateRequest($multipart, $formParams, $queryParams, $resourcePath, $headerParams, 'GET', $httpBody);
    }
}
