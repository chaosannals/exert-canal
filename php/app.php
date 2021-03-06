<?php

require './vendor/autoload.php';

use xingwenge\canal_php\CanalConnectorFactory;
use xingwenge\canal_php\CanalClient;
use xingwenge\canal_php\Fmt;

try {
    $client = CanalConnectorFactory::createClient(CanalClient::TYPE_SOCKET_CLUE);

    $client->connect("127.0.0.1", 11111);
    $client->checkValid();
    $client->subscribe("1001", "test", ".*\\..*");

    while (true) {
        $message = $client->get(100);
        if ($entries = $message->getEntries()) {
            foreach ($entries as $entry) {
                Fmt::println($entry);
            }
        }
        sleep(1);
    }

    $client->disConnect();
} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}