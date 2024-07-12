<?php

// Récupère l'URL MongoDB depuis les variables d'environnement
$mongodbUrl = getenv('MONGODB_URL');

// Vérifie si l'URL MongoDB est bien définie
if (!$mongodbUrl) {
    die("L'URL MongoDB n'est pas définie dans les variables d'environnement.");
}

// Configuration du proxy
$proxyUrl = 'tcp://nuzyrlvq72agv5:ieom6200n2pqh2jv2jn1m18x1b6c@eu-west-static-02.quotaguard.com:9293';

// Création du manager MongoDB avec les options du proxy
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

// Exemple de requête pour tester la connexion
try {
    $query = new MongoDB\Driver\Query([]);
    $cursor = $manager->executeQuery('database_name.collection_name', $query);

    foreach ($cursor as $document) {
        var_dump($document);
    }
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Erreur de connexion : ", $e->getMessage();
}
