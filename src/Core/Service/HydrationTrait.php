<?php

namespace Core\Service;

use Symfony\Component\HttpFoundation\Request;

trait HydrationTrait
{
    protected function prepareHydrationMap(Request $request)
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
            if (method_exists($news, $method)) {
                $news->$method($arg);
            }
        }

        return $news;
    }
}
