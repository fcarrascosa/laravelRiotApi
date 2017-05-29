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
     * @var Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $apiDomain;
    /**
     * @var string
     */
    protected $apiServerSubdomain;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $path;
    /**
     * @var string
     */
    protected $api_key;

    /**
     * RiotApiClient constructor.
     * @param string $apiServerSubdomain
     * @throws ConfigurationException;
     */
    public function __construct( string $apiServerSubdomain = 'euw1' ) {

        if(getenv('RIOT_API_KEY') === false) throw new ConfigurationException(ConfigurationException::$errorCodes['NO_API_KEY']);
        if(getenv('RIOT_API_URL') === false) throw new ConfigurationException(ConfigurationException::$errorCodes['NO_API_URL']);

        $this->apiDomain = env('RIOT_API_URL');
        $this->apiServerSubdomain = $apiServerSubdomain;
        $this->url = str_replace('{{subdomain}}', $this->apiServerSubdomain, $this->apiDomain);
        $this->api_key = env('RIOT_API_KEY');
        $this->client = new Client();

    }

    /**
     * @param string $endpoint
     * @param array $query
     * @param string|null $id
     * @return mixed
     */
    protected function request(string $endpoint, array $query = null, string $id = null)
    {
        $url = $this->url . $this->path . $endpoint;
        $query = $this->httpQueryBuilder($query);

        if($id !== null) $url = $url . '/' . $id;

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
     * @param array|null $params
     * @return array
     */
    protected function httpQueryBuilder(array $params = null): array
    {
        $query  = array();
        $locale = config('app.locale');
        if ($params != null) {
            foreach ((array)$params as $key => $value) {
                if ($key == 'locale') {
                    $locale = $value;
                } else {
                    $query[$key] = $value;
                }

            }
        }

        $query['locale'] = $locale;

        return $query;

    }


}
