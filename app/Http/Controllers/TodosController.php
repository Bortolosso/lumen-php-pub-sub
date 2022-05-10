<?php

namespace App\Http\Controllers;

# Includes the autoloader for libraries installed with composer

# Imports the Google Cloud client library
use Google\Cloud\PubSub\PubSubClient;

class TodosController extends Controller
{

    public function createTopic()
    {
        $pubsub = new PubSubClient([
            'projectId' => 'project-dr-consulta'
        ]);

        $topicName = 'my-new-topic-2-PHP';

        $topic = $pubsub->createTopic($topicName);

        return 'Topic ' . $topic->name() . ' created.';;
    }

    public function listTopic()
    {
        $pubsub = new PubSubClient([
            'projectId' => 'project-dr-consulta',
        ]);
        foreach ($pubsub->topics() as $topic) {
            printf('Topic: %s' . PHP_EOL, $topic->name());
        }

        return $topic->name();
    }

    public function deleteTopic()
    {
        $topicName = 'my-new-topic-2-PHP';

        $pubsub = new PubSubClient([
            'projectId' => 'project-dr-consulta',
        ]);
        $topic = $pubsub->topic($topicName);
        $topic->delete();

        printf('Topic deleted: %s' . PHP_EOL, $topic->name());

        return 'Topic deleted';
    }
}
