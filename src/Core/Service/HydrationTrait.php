<?php

namespace Core\Service;

use Symfony\Component\HttpFoundation\Request;

trait HydrationTrait
{
    protected function convertParams(Request $request)
    {
        $fields = [];

        foreach ($request->request->all() as $key => $value) {
            $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $key)));
            $name = lcfirst($name);

            $fields[$name] = $value;
        }

        return $fields;
    }

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

    public function hydrate($entity, $fields)
    {
        // check all methods for entity
        foreach ($fields as $key => $arg) {
            $method = 'set'.ucfirst($key);
            if (method_exists($entity, $method)) {
                $entity->$method($arg);
            }
        }

        return $entity;
    }
}
