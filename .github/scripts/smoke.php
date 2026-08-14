<?php

use Illuminate\Contracts\Console\Kernel;
use s9e\TextFormatter\Configurator;
use Waterhole\Models\Permission;
use Waterhole\Models\PermissionCollection;

$basePath = dirname(__DIR__, 2);

require $basePath.'/vendor/autoload.php';

$app = require $basePath.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$allowedClasses = config('cache.serializable_classes');
$values = [
    (new Configurator())->finalize(),
    new PermissionCollection([new Permission()]),
];

foreach ($values as $value) {
    $restored = unserialize(serialize($value), ['allowed_classes' => $allowedClasses]);

    if (str_contains(serialize($restored), '__PHP_Incomplete_Class')) {
        throw new RuntimeException('Cache value contains a class not present in the allowlist.');
    }
}

echo "Smoke test passed.\n";
