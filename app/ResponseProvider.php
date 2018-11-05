<?php
namespace App;

use Illuminate\Container\Container;
use Illuminate\Support\Str;
use SoapBox\Formatter\Formatter;

class ResponseProvider
{
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

            $formatter = Formatter::make($data, Formatter::JSON);

            return $formatter->toXml();

        } else {
            return $this->json($data);
        }
    }
}