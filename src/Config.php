<?php

namespace Rcarreirao\Intereasyapi;

use Rcarreirao\Intereasyapi\Exceptions\InvalidConfigException;
use Rcarreirao\Intereasyapi\Support\Contracts\ResolveEndpoints;
use Rcarreirao\Intereasyapi\Support\Endpoints;

class Config
{
    public static string $defaultConfig = 'config';
    public ?string $currentConfig = null;

    public static function getConfig(): Config
    {
        return new static();
    }

    public static function defaultConfig($config)
    {
        self::$defaultConfig = $config;
    }

    public function currentConfig(string $config = null): Config
    {
        $config = $config ?? self::$defaultConfig;

        $this->currentConfig = $config;

        return $this;
    }

    public function getCurrentConfig(): ?string
    {
        return $this->currentConfig ?? self::$defaultConfig;
    }

    public static function getDefaultConfig(): string
    {
        return self::$defaultConfig;
    }

    public static function availableConfigs(): array
    {
        return array_keys(config('interbanking') ?? []);
    }

    public function getBaseUrl(): string
    {
        return $this->getConfigSetting()['base_url'] ?? '';
    }

    public function getSSLCertificateFile(): string
    {
        return $this->getConfigSetting()['ssl_certificate_file'] ?? '';
    }

    public function getSSLCertificateKeyFile(): string
    {
        return $this->getConfigSetting()['ssl_certificate_key_file'] ?? '';
    }

    public function getClientId(): string
    {
        return $this->getConfigSetting()['client_id'] ?? '';
    }

    public function getClientSecret(): string
    {
        return $this->getConfigSetting()['client_secret'] ?? '';
    }

    public function getAuthenticationClass(): string
    {
        return $this->getConfigSetting()['authentication_class'] ?? '';
    }

    public function getScope(): array
    {
        return $this->getConfigSetting()['scope'] ?? '';
    }

    public function getEndpointsResolver(): ResolveEndpoints
    {
        return app(Endpoints::class);
    }

    private function getConfigSetting()
    {
        throw_if(!$this->validateConfig(), InvalidConfigException::configNotFound($this->getCurrentConfig()));

        return config("interbanking.{$this->getCurrentConfig()}");
    }

    private function validateConfig(): bool
    {
        return in_array($this->getCurrentConfig(), $this->availableConfigs());
    }
}
