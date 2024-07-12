<?php

$mongodbUrl = getenv('MONGODB_URL');

if (!$mongodbUrl) {
    die("L'URL MongoDB n'est pas définie dans les variables d'environnement.");
}

$proxyUrl = getenv('QUOTAGUARDSTATIC_URL');

$manager = new MongoDB\Driver\Manager(
    $mongodbUrl,
    [],
    [
        'stream' => [
            'context' => stream_context_create([
                'http' => [
                    'proxy' => $proxyUrl,
                    'request_fulluri' => true,
                ],
            ]),
        ],
    ]
);

try {
    $query = new MongoDB\Driver\Query([]);
    $cursor = $manager->executeQuery('database_name.collection_name', $query);

    foreach ($cursor as $document) {
        var_dump($document);
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Erreur de connexion : ", $e->getMessage();
}
