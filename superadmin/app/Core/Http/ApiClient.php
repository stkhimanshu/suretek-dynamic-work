<?php

namespace App\Core\Http;

class ApiClient
{
    private static string $baseUrl = 'http://localhost/suretek-lat/superadmin/public';

    public static function post(string $endpoint, array $payload = []): ApiResponse
    {
        return self::request('POST', $endpoint, $payload);
    }

    public static function get(string $endpoint): ApiResponse
    {
        return self::request('GET', $endpoint);
    }

    public static function put(string $endpoint, array $payload = []): ApiResponse
    {
        return self::request('PUT', $endpoint, $payload);
    }

    public static function delete(string $endpoint): ApiResponse
    {
        return self::request('DELETE', $endpoint);
    }

    private static function request(
        string $method,
        string $endpoint,
        array $payload = []
    ): ApiResponse {

        $ch = curl_init();

        $options = [
            CURLOPT_URL => self::$baseUrl . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json'
            ]
        ];

        if (!empty($payload)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($payload);
        }

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $curlError = curl_error($ch);

        curl_close($ch);

        /**
         * Curl Error
         */
        if ($curlError) {

            return new ApiResponse([
                'success' => false,
                'message' => $curlError,
                'data' => null
            ], 500);
        }

        /**
         * Decode Response
         */
        $decoded = json_decode($response, true);

        if (!is_array($decoded)) {

            return new ApiResponse([
                'success' => false,
                'message' => 'Invalid API response',
                'data' => null
            ], 500);
        }

        return new ApiResponse($decoded, $httpCode);
    }
}
