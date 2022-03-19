<?php

namespace App\Http\Libraries;

use Illuminate\Support\Facades\Http;

class BaseApi
{
    protected $api_url;
    protected $api_key;

    public function __construct()
    {
        $this->api_url = env('API_HOST');
        $this->api_key = env('API_ID');
    }

    public static function getInstance()
    {
        return new BaseApi();
    }

    public function index(String $endpoint, array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function store(String $endpoint, array $data = [])
    {
        return $this->client()->post($endpoint, $data);
    }

    public function detail(String $endpoint, String $id, array $data = [])
    {
        return $this->client()->get("$endpoint/$id", $data);
    }

    public function update(String $endpoint, String $id, array $data = [])
    {
        return $this->client()->put("$endpoint/$id", $data);
    }

    public function delete(String $endpoint, String $id)
    {
        return $this->client()->delete("$endpoint/$id");
    }

    private function client()
    {
        return Http::withHeaders(['app-id' => $this->api_key])->baseUrl($this->api_url);
    }
}
