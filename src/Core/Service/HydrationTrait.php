<?php

namespace Core\Service;

use Symfony\Component\HttpFoundation\Request;

trait HydrationTrait
{
    private function prepareHydrationMap(Request $request)
    {
        $fields = [];

        foreach ($request->request->all() as $key => $value) {
            // toCamelCase
            $name = str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            $fields['set' . $name] = $value;
        }

        return $fields;
    }

    public function hydrate($news, $fields)
    {
        // if creation
        foreach ($fields as $method => $arg) {
            $news->$method($arg);
        }

        return $news;
    }
}
