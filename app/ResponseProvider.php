<?php
namespace App;

use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Spatie\ArrayToXml\ArrayToXml;

class ResponseProvider
{
    public function xml($xml, $status = 200, array $headers = [], $xmlRoot = 'response')
    {
        if (is_array($xml)) {
            $xml = ArrayToXml::convert($xml, $xmlRoot);
        } elseif (is_object($xml) && method_exists($xml, 'toArray')) {
            $xml = ArrayToXml::convert($xml->toArray(), $xmlRoot);
        } elseif (is_string($xml)) {
            $xml = $xml;
        } else {
            $xml = '';
        }
        if (!isset($headers['Content-Type'])) {
            $headers = array_merge($headers, ['Content-Type' => 'application/xml']);
        }
        return Response()->make($xml, $status, $headers);
    }

    public function json($data)
    {
        return response($data)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ]);
    }



    public function preferredFormat($data, $status = 200, array $headers = [], $xmlRoot = 'response')
    {
        $request = Container::getInstance()->make('request');

        if (Str::contains($request->headers->get('Accept'), 'xml')) {
                return $this->xml($data, $status, array_merge($headers, ['Content-Type' => $request->headers->get('Accept')]), $xmlRoot);
            }
        else {
                return $this->json($data);
            }
    }
}