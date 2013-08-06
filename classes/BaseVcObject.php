<?php

namespace Keleo\CVGenerator;

class BaseVcObject {

    public function __construct(array $config = null)
    {
        if ($config === null) {
            return;
        }

        foreach($config as $key => $value) {

            $method = 'add' . ucfirst($key);
            if (!method_exists($this, $method)) {
                $method = 'set' . ucfirst($key);
            }

            // assign the value via method
            if (method_exists($this, $method)) {
                $this->$method($value);
                continue;
            }

            // if no method exists, we assign the property directly
            // this way we can either set scalar values (like strings) directly
            // or use __set() for more complex stuff
            $this->$key = $value;
        }
    }

}