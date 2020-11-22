<?php

namespace MediaBoutique\Todoist\Api\Requests;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

abstract class Request
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all(array $params = [])
    {
        $response = $this->client->get($this->baseUri.(count($params) > 0 ? '?'.http_build_query($params) : ''));
        if (in_array($response->getStatusCode(), [200, 204])) {
            $results = $this->validatedResponse($response);
        }
        if (!empty($results)) {
            return array_map(function ($iteration) {
                return new $this->modelClass($this, $iteration);
            }, $results);
        }
        return null;
    }

    public function create(array $model)
    {
        $response = $this->client->post($this->baseUri, [
            RequestOptions::JSON => $model
        ]);
        if (in_array($response->getStatusCode(), [200, 204])) {
            return new $this->modelClass($this, $this->validatedResponse($response));
        }
        return null;
    }

    public function delete(int $id)
    {
        $response = $this->client->delete($this->baseUri.'/'.$id);
        if (in_array($response->getStatusCode(), [200, 204])) {
            return true;
        }
        return false;
    }

    public function get(int $id)
    {
        $response = $this->client->get($this->baseUri.'/'.$id);
        if (in_array($response->getStatusCode(), [200, 204])) {
            return new $this->modelClass($this, $this->validatedResponse($response));
        }
        return null;
    }

    public function update(int $id, array $model)
    {
        $response = $this->client->post($this->baseUri.'/'.$id, [
            RequestOptions::JSON => $model
        ]);
        if (in_array($response->getStatusCode(), [200, 204])) {
            $validated = $this->validatedResponse($response);
            return ($validated && is_array($validated) ? new $this->modelClass($this, $validated) : null);
        }
        return null;
    }

    protected function validatedResponse(ResponseInterface $response): ?array
    {
        if (!in_array($response->getStatusCode(), [200, 204])) {
            throw new Exception('Server responded with status code '.$response->getStatusCode());
        }
        $contents = $response->getBody()->getContents();
        return ($contents ? json_decode($contents, true) : null);
    }
}
