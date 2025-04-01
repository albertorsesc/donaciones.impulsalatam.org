<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeolocationService
{
    /**
     * List of LATAM country codes
     */
    protected $latamCountries = [
        'AR', // Argentina
        'BO', // Bolivia
        'BR', // Brazil
        'CL', // Chile
        'CO', // Colombia
        'CR', // Costa Rica
        'CU', // Cuba
        'DO', // Dominican Republic
        'EC', // Ecuador
        'SV', // El Salvador
        'GT', // Guatemala
        'HT', // Haiti
        'HN', // Honduras
        'MX', // Mexico
        'NI', // Nicaragua
        'PA', // Panama
        'PY', // Paraguay
        'PE', // Peru
        'PR', // Puerto Rico
        'UY', // Uruguay
        'VE', // Venezuela
    ];

    /**
     * Cache TTL in seconds (24 hours)
     */
    protected $cacheTtl = 86400;

    /**
     * Get the real client IP address
     *
     * @return string
     */
    public function getClientIp()
    {
        $ipAddress = request()->ip();

        // Check for proxy forwarded headers
        foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED'] as $key) {
            if (request()->server($key) && filter_var(request()->server($key), FILTER_VALIDATE_IP)) {
                $ipAddress = request()->server($key);
                break;
            }
        }

        return $ipAddress;
    }

    /**
     * Get location data for an IP address
     *
     * @param string|null $ip
     * @return array|null
     */
    public function getLocation($ip = null)
    {
        $ip = $ip ?: $this->getClientIp();

        // For local development, use a default LATAM location
        if (in_array($ip, ['127.0.0.1', '::1']) && app()->environment('local')) {
            return [
                'country' => 'Mexico',
                'countryCode' => 'MX',
                'regionName' => 'Baja California',
                'city' => 'Mexicali',
                'isLatam' => true
            ];
        }

        // Try to get from cache first
        $cacheKey = 'geolocation_' . str_replace('.', '_', $ip);

        return Cache::remember($cacheKey, $this->cacheTtl, function () use ($ip) {
            try {
                // Use secure HTTPS endpoints for production
                $apiUrl = app()->environment('production')
                    ? "https://pro.ip-api.com/json/{$ip}"
                    : "http://ip-api.com/json/{$ip}";

                $response = Http::get($apiUrl, [
                    'fields' => 'status,message,country,countryCode,region,regionName,city,district,lat,lon'
                ]);

                if ($response->successful() && $response['status'] === 'success') {
                    $data = $response->json();
                    $data['isLatam'] = $this->isLatamCountry($data['countryCode']);
                    return $data;
                }

                Log::warning("IP-API geolocation failed for IP: {$ip}", [
                    'response' => $response->json()
                ]);

                return null;
            } catch (\Exception $e) {
                Log::error("Geolocation service error: " . $e->getMessage(), [
                    'ip' => $ip,
                    'exception' => $e
                ]);

                return null;
            }
        });
    }

    /**
     * Format the location as a readable string
     *
     * @param string|null $ip
     * @return string
     */
    public function getFormattedLocation($ip = null)
    {
        $location = $this->getLocation($ip);

        if (!$location) {
            return '';
        }

        if (!empty($location['city']) && !empty($location['country'])) {
            return $location['city'] . ', ' . $location['country'];
        }

        if (!empty($location['regionName']) && !empty($location['country'])) {
            return $location['regionName'] . ', ' . $location['country'];
        }

        return $location['country'] ?? '';
    }

    /**
     * Check if the country code is in LATAM
     *
     * @param string $countryCode
     * @return bool
     */
    public function isLatamCountry($countryCode)
    {
        return in_array(strtoupper($countryCode), $this->latamCountries);
    }

    /**
     * Check if the current request is from LATAM
     *
     * @return bool
     */
    public function isFromLatam()
    {
        $location = $this->getLocation();

        if (!$location) {
            // Default to false if we can't determine location
            return false;
        }

        return $location['isLatam'];
    }
}