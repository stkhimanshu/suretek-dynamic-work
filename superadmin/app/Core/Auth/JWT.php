<?php

namespace App\Core\Auth;

class JWT
{
    private static function secret(): string
    {
        return $_ENV['JWT_SECRET'];
    }

    public static function encode(
        array $payload
    ): string {

        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256',
        ];

        $headerEncoded = self::base64UrlEncode(
            json_encode($header)
        );

        $payloadEncoded = self::base64UrlEncode(
            json_encode($payload)
        );

        $signature = hash_hmac(
            'sha256',
            $headerEncoded . '.' . $payloadEncoded,
            self::secret(),
            true
        );

        $signatureEncoded = self::base64UrlEncode(
            $signature
        );

        return implode('.', [
            $headerEncoded,
            $payloadEncoded,
            $signatureEncoded
        ]);
    }

    public static function decode(
        string $token
    ): ?array {

        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            return null;
        }

        [
            $headerEncoded,
            $payloadEncoded,
            $signatureEncoded
        ] = $parts;

        $signature = self::base64UrlEncode(
            hash_hmac(
                'sha256',
                $headerEncoded . '.' . $payloadEncoded,
                self::secret(),
                true
            )
        );

        if (
            !hash_equals(
                $signature,
                $signatureEncoded
            )
        ) {
            return null;
        }

        return json_decode(
            self::base64UrlDecode(
                $payloadEncoded
            ),
            true
        );
    }

    private static function base64UrlEncode(
        string $data
    ): string {

        return rtrim(
            strtr(
                base64_encode($data),
                '+/',
                '-_'
            ),
            '='
        );
    }

    private static function base64UrlDecode(
        string $data
    ): string {

        return base64_decode(
            strtr(
                $data,
                '-_',
                '+/'
            )
        );
    }
}
