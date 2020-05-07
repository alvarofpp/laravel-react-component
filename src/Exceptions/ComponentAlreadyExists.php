<?php

namespace Alvarofpp\ReactComponent\Exceptions;

use Exception;

class ComponentAlreadyExists extends Exception
{
    /**
     * File of given name already exists at path.
     *
     * @param string $name
     *
     * @return static
     */
    public static function fileExists($name)
    {
        return new static(
            "Component {$name} already exists at path."
        );
    }
}
