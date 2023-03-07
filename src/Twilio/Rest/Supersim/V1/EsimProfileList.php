<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Supersim
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Supersim\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;


class EsimProfileList extends ListResource
    {
    /**
     * Construct the EsimProfileList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(
        Version $version
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        ];

        $this->uri = '/ESimProfiles';
    }

    /**
     * Create the EsimProfileInstance
     *
     * @param array|Options $options Optional Arguments
     * @return EsimProfileInstance Created EsimProfileInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(array $options = []): EsimProfileInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'CallbackUrl' =>
                $options['callbackUrl'],
            'CallbackMethod' =>
                $options['callbackMethod'],
            'Eid' =>
                $options['eid'],
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new EsimProfileInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Reads EsimProfileInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return EsimProfileInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Streams EsimProfileInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Retrieve a single page of EsimProfileInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return EsimProfilePage Page of EsimProfileInstance
     */
    public function page(
        array $options = [],
        $pageSize = Values::NONE,
        string $pageToken = Values::NONE,
        $pageNumber = Values::NONE
    ): EsimProfilePage
    {
        $options = new Values($options);

        $params = Values::of([
            'Eid' =>
                $options['eid'],
            'SimSid' =>
                $options['simSid'],
            'Status' =>
                $options['status'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $response = $this->version->page('GET', $this->uri, $params);

        return new EsimProfilePage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of EsimProfileInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return EsimProfilePage Page of EsimProfileInstance
     */
    public function getPage(string $targetUrl): EsimProfilePage
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new EsimProfilePage($this->version, $response, $this->solution);
    }


    /**
     * Constructs a EsimProfileContext
     *
     * @param string $sid The SID of the eSIM Profile resource to fetch.
     */
    public function getContext(
        string $sid
        
    ): EsimProfileContext
    {
        return new EsimProfileContext(
            $this->version,
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Supersim.V1.EsimProfileList]';
    }
}
