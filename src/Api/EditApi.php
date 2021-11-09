<?php
/**
 * EditApi
 * PHP version 7.2
 *
 * @category Class
 * @package  Shotstack\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Shotstack
 *
 * Shotstack is a video, image and audio editing service that allows for the automated generation of videos, images and audio using JSON and a RESTful API.  You arrange and configure an edit and POST it to the API which will render your media and provide a file  location when complete.  For more details visit [shotstack.io](https://shotstack.io) or checkout our [getting started](https://shotstack.gitbook.io/docs/guides/getting-started) documentation. There are two main API's, one for editing and generating assets (Edit API) and one for managing hosted assets (Serve API).  The Edit API base URL is: <b>https://api.shotstack.io/{version}</b>  The Serve API base URL is: <b>https://api.shotstack.io/serve/{version}</b>
 *
 * The version of the OpenAPI document: v1
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Shotstack\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Shotstack\Client\ApiException;
use Shotstack\Client\Configuration;
use Shotstack\Client\HeaderSelector;
use Shotstack\Client\ObjectSerializer;

/**
 * EditApi Class Doc Comment
 *
 * @category Class
 * @package  Shotstack\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class EditApi
{
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

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex)
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getRender
     *
     * Get Render Status
     *
     * @param  string $id The id of the timeline render task in UUID format (required)
     * @param  bool $data Include the data parameter in the response. The data parameter includes the original timeline, output and other settings sent to the API.&lt;br&gt;&lt;br&gt;&lt;b&gt;Note:&lt;/b&gt; the default is currently &#x60;true&#x60;, this is deprecated and the default will soon be &#x60;false&#x60;. If you rely on the data being returned in the response you should explicitly set the parameter to &#x60;true&#x60;. (optional)
     * @param  bool $merged Used when data is set to true, it will show the [merge fields](#tocs_mergefield) merged in to the data response. (optional)
     *
     * @throws \Shotstack\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Shotstack\Client\Model\RenderResponse
     */
    public function getRender($id, $data = null, $merged = null)
    {
        list($response) = $this->getRenderWithHttpInfo($id, $data, $merged);
        return $response;
    }

    /**
     * Operation getRenderWithHttpInfo
     *
     * Get Render Status
     *
     * @param  string $id The id of the timeline render task in UUID format (required)
     * @param  bool $data Include the data parameter in the response. The data parameter includes the original timeline, output and other settings sent to the API.&lt;br&gt;&lt;br&gt;&lt;b&gt;Note:&lt;/b&gt; the default is currently &#x60;true&#x60;, this is deprecated and the default will soon be &#x60;false&#x60;. If you rely on the data being returned in the response you should explicitly set the parameter to &#x60;true&#x60;. (optional)
     * @param  bool $merged Used when data is set to true, it will show the [merge fields](#tocs_mergefield) merged in to the data response. (optional)
     *
     * @throws \Shotstack\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Shotstack\Client\Model\RenderResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getRenderWithHttpInfo($id, $data = null, $merged = null)
    {
        $request = $this->getRenderRequest($id, $data, $merged);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\Shotstack\Client\Model\RenderResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Shotstack\Client\Model\RenderResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Shotstack\Client\Model\RenderResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Shotstack\Client\Model\RenderResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRenderAsync
     *
     * Get Render Status
     *
     * @param  string $id The id of the timeline render task in UUID format (required)
     * @param  bool $data Include the data parameter in the response. The data parameter includes the original timeline, output and other settings sent to the API.&lt;br&gt;&lt;br&gt;&lt;b&gt;Note:&lt;/b&gt; the default is currently &#x60;true&#x60;, this is deprecated and the default will soon be &#x60;false&#x60;. If you rely on the data being returned in the response you should explicitly set the parameter to &#x60;true&#x60;. (optional)
     * @param  bool $merged Used when data is set to true, it will show the [merge fields](#tocs_mergefield) merged in to the data response. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRenderAsync($id, $data = null, $merged = null)
    {
        return $this->getRenderAsyncWithHttpInfo($id, $data, $merged)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getRenderAsyncWithHttpInfo
     *
     * Get Render Status
     *
     * @param  string $id The id of the timeline render task in UUID format (required)
     * @param  bool $data Include the data parameter in the response. The data parameter includes the original timeline, output and other settings sent to the API.&lt;br&gt;&lt;br&gt;&lt;b&gt;Note:&lt;/b&gt; the default is currently &#x60;true&#x60;, this is deprecated and the default will soon be &#x60;false&#x60;. If you rely on the data being returned in the response you should explicitly set the parameter to &#x60;true&#x60;. (optional)
     * @param  bool $merged Used when data is set to true, it will show the [merge fields](#tocs_mergefield) merged in to the data response. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getRenderAsyncWithHttpInfo($id, $data = null, $merged = null)
    {
        $returnType = '\Shotstack\Client\Model\RenderResponse';
        $request = $this->getRenderRequest($id, $data, $merged);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getRender'
     *
     * @param  string $id The id of the timeline render task in UUID format (required)
     * @param  bool $data Include the data parameter in the response. The data parameter includes the original timeline, output and other settings sent to the API.&lt;br&gt;&lt;br&gt;&lt;b&gt;Note:&lt;/b&gt; the default is currently &#x60;true&#x60;, this is deprecated and the default will soon be &#x60;false&#x60;. If you rely on the data being returned in the response you should explicitly set the parameter to &#x60;true&#x60;. (optional)
     * @param  bool $merged Used when data is set to true, it will show the [merge fields](#tocs_mergefield) merged in to the data response. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getRenderRequest($id, $data = null, $merged = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getRender'
            );
        }
        if (!preg_match("/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/", $id)) {
            throw new \InvalidArgumentException("invalid value for \"id\" when calling EditApi.getRender, must conform to the pattern /^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/.");
        }


        $resourcePath = '/render/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($data !== null) {
            if('form' === 'form' && is_array($data)) {
                foreach($data as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['data'] = $data;
            }
        }
        // query params
        if ($merged !== null) {
            if('form' === 'form' && is_array($merged)) {
                foreach($merged as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['merged'] = $merged;
            }
        }


        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postRender
     *
     * Render Asset
     *
     * @param  \Shotstack\Client\Model\Edit $edit The video, image or audio edit specified using JSON. (required)
     *
     * @throws \Shotstack\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Shotstack\Client\Model\QueuedResponse
     */
    public function postRender($edit)
    {
        list($response) = $this->postRenderWithHttpInfo($edit);
        return $response;
    }

    /**
     * Operation postRenderWithHttpInfo
     *
     * Render Asset
     *
     * @param  \Shotstack\Client\Model\Edit $edit The video, image or audio edit specified using JSON. (required)
     *
     * @throws \Shotstack\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Shotstack\Client\Model\QueuedResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function postRenderWithHttpInfo($edit)
    {
        $request = $this->postRenderRequest($edit);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 201:
                    if ('\Shotstack\Client\Model\QueuedResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Shotstack\Client\Model\QueuedResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Shotstack\Client\Model\QueuedResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Shotstack\Client\Model\QueuedResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation postRenderAsync
     *
     * Render Asset
     *
     * @param  \Shotstack\Client\Model\Edit $edit The video, image or audio edit specified using JSON. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postRenderAsync($edit)
    {
        return $this->postRenderAsyncWithHttpInfo($edit)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postRenderAsyncWithHttpInfo
     *
     * Render Asset
     *
     * @param  \Shotstack\Client\Model\Edit $edit The video, image or audio edit specified using JSON. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postRenderAsyncWithHttpInfo($edit)
    {
        $returnType = '\Shotstack\Client\Model\QueuedResponse';
        $request = $this->postRenderRequest($edit);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'postRender'
     *
     * @param  \Shotstack\Client\Model\Edit $edit The video, image or audio edit specified using JSON. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postRenderRequest($edit)
    {
        // verify the required parameter 'edit' is set
        if ($edit === null || (is_array($edit) && count($edit) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $edit when calling postRender'
            );
        }

        $resourcePath = '/render';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($edit)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($edit));
            } else {
                $httpBody = $edit;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation probe
     *
     * Inspect Media
     *
     * @param  string $url The URL of the media to inspect, must be **URL encoded**. (required)
     *
     * @throws \Shotstack\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Shotstack\Client\Model\ProbeResponse
     */
    public function probe($url)
    {
        list($response) = $this->probeWithHttpInfo($url);
        return $response;
    }

    /**
     * Operation probeWithHttpInfo
     *
     * Inspect Media
     *
     * @param  string $url The URL of the media to inspect, must be **URL encoded**. (required)
     *
     * @throws \Shotstack\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Shotstack\Client\Model\ProbeResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function probeWithHttpInfo($url)
    {
        $request = $this->probeRequest($url);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\Shotstack\Client\Model\ProbeResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Shotstack\Client\Model\ProbeResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Shotstack\Client\Model\ProbeResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = (string) $responseBody;
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Shotstack\Client\Model\ProbeResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation probeAsync
     *
     * Inspect Media
     *
     * @param  string $url The URL of the media to inspect, must be **URL encoded**. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function probeAsync($url)
    {
        return $this->probeAsyncWithHttpInfo($url)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation probeAsyncWithHttpInfo
     *
     * Inspect Media
     *
     * @param  string $url The URL of the media to inspect, must be **URL encoded**. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function probeAsyncWithHttpInfo($url)
    {
        $returnType = '\Shotstack\Client\Model\ProbeResponse';
        $request = $this->probeRequest($url);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = (string) $responseBody;
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'probe'
     *
     * @param  string $url The URL of the media to inspect, must be **URL encoded**. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function probeRequest($url)
    {
        // verify the required parameter 'url' is set
        if ($url === null || (is_array($url) && count($url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $url when calling probe'
            );
        }

        $resourcePath = '/probe/{url}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($url !== null) {
            $resourcePath = str_replace(
                '{' . 'url' . '}',
                ObjectSerializer::toPathValue($url),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}