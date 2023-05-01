<?php

namespace app\modules;

use app\engine\Session;

class Parser
{
    public function getToken($resource)
    {
        $session = new Session();

        $dom = new \DomDocument();
        $dom->loadHTML($resource);

        $tags = $dom->getElementsByTagName('meta');

        for ($i = 0; $i < $tags->length; $i++) {
            $grab = $tags->item($i);
            if ($grab->getAttribute('name') === 'csrf-token') {
                $token = $grab->getAttribute('content');
            }
        }

        $session->setToken($token);
    }

    public function getName($resource)
    {
        $dom = new \DomDocument();
        $dom->loadHTML($resource);
        
        $teg = $dom->getElementsByTagName("h1");

        foreach ($teg as $item) {
            $name = $item->nodeValue;
        }

        return $name;
    }
}
