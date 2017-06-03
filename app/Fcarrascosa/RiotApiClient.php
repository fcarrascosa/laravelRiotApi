<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 17/05/17
 * Time: 16:41
 */

namespace App\Fcarrascosa;

use App\Fcarrascosa\RiotApiClient\Exceptions\ConfigurationException;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Exception\ClientException;


/**
 * Class RiotApiClient
 * @package App\RiotApiClient
 */
class RiotApiClient extends GuzzleClient
{

    /**
     * @var Client the HTTP Client using GuzzleHTTP
     */
    protected $client;
    /**
     * @var string The Riot's api Base Url
     */
    protected $apiDomain;
    /**
     * @var string The server against we should connect
     */
    protected $apiServerSubdomain;
    /**
     * @var string The full Riot's api Base Url, with the apiServerSubdomain
     */
    protected $url;
    /**
     * @var string The Path of the api where we will do the request
     */
    protected $path;
    /**
     * @var string The Developer's api key
     */
    protected $api_key;

    /**
     * RiotApiClient constructor.
     * @param string $apiServerSubdomain
     * @throws ConfigurationException
     */
    public function __construct( string $apiServerSubdomain = 'euw1' )
    {
        if(getenv('RIOT_API_KEY') === false) throw new ConfigurationException(ConfigurationException::$errorCodes['NO_API_KEY']);
        if(getenv('RIOT_API_URL') === false) throw new ConfigurationException(ConfigurationException::$errorCodes['NO_API_URL']);

        $this->apiDomain = env('RIOT_API_URL');
        $this->apiServerSubdomain = $apiServerSubdomain;
        $this->url = str_replace('{{subdomain}}', $this->apiServerSubdomain, $this->apiDomain);
        $this->api_key = env('RIOT_API_KEY');
        $this->client = new Client();

    }

    /**
     * Returns the data requested in an associative array
     * @param string $endpoint
     * @param array $query
     * @param string|null $id
     * @return array | integer
     */
    protected function request(string $endpoint, array $query = null, string $id = null)
    {
        if($endpoint != '') $endpoint = '/' . $endpoint;
        $url = $this->url . $this->path . $endpoint;
        if($id !== null) $url = $url . '/' . $id;
        $query = $this->httpQueryBuilder($query);
        try {

            $request = $this->client->request('GET', $url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'X-Riot-Token' => $this->api_key,
                ],
                'query' => $query,
            ])->getBody()->getContents();

        }catch (ClientException $e){
            abort($e->getCode());
        }
        $response = json_decode($request, true);

        return $response;
    }

    /**
     * Returns the query that we will use on the request method as an associative array.
     * @param array|null $params
     * @return array
     */
    protected function httpQueryBuilder(array $params = null): array
    {
        $query  = array();
        $query['locale'] = config('app.locale');
        foreach ((array)$params as $key => $value) {
            $query[$key] = $value;
        }
        return $query;
    }

}
