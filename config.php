<?php

$localEnv = [];
$envFile = __DIR__ . DIRECTORY_SEPARATOR . '.env';
if (is_readable($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
        if (preg_match('/^\s*(?:export\s+)?([A-Za-z_][A-Za-z0-9_]*)\s*=\s*(.*?)\s*$/', $line, $matches)) {
            $localEnv[$matches[1]] = trim($matches[2], " \t\n\r\0\x0B\"'");
        }
    }
}

$setting = static function (string $name, string $default = '') use ($localEnv): string {
    $value = getenv($name);
    return $value !== false ? $value : ($localEnv[$name] ?? $default);
};

return [
    'db_host' => $setting('DB_HOST', '127.0.0.1'),
    'db_port' => (int)$setting('DB_PORT', '3306'),
    'db_name' => $setting('DB_NAME', 'siprint'),
    'db_user' => $setting('DB_USER', 'root'),
    'db_password' => $setting('DB_PASSWORD'),
    'session_secret' => $setting('SESSION_SECRET'),
    'upload_dir' => $setting('UPLOAD_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'storage'),
    'secure_cookies' => filter_var($setting('SECURE_COOKIES', 'false'), FILTER_VALIDATE_BOOLEAN),
];