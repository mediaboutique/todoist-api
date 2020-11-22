<?php

namespace MediaBoutique\Todoist\Api\Models;

use GuzzleHttp\Client;

abstract class Model
{
    protected Client $client;

    protected $request;

    protected array $original = [];

    protected array $creatable = [];

    protected array $updatable = [];

    protected array $immutable = [];

    public function __construct($request, array $attributes = [])
    {
        $this->request = $request;

        $this->original = $attributes;

        $this->fill($attributes);
    }

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
        return $this;
    }

    public function setAttribute($key, $value)
    {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        }
        return $this;
    }

    public function save()
    {
        if (is_array($this->original) && count($this->original) > 0) {
            // update
            $attributes = [];
            foreach ($this->updatable as $key) {
                if (!isset($this->original[$key]) || $this->$key !== $this->original[$key]) {
                    $attributes[$key] = $this->$key;
                }
            }
            if (count($attributes) > 0) {
                $this->request->update($this->id, $attributes);
            }
        } else {
            // create
            $attributes = [];
            foreach ($this->creatable as $key) {
                $attributes[$key] = $this->$key;
            }
            if (count($attributes) > 0) {
                $this->request->create($attributes);
            }
        }
        return $this;
    }
}
