<?php

namespace JocelimJr;

use JocelimJr\Exceptions\MethodNotAccessibleException;
use JocelimJr\Exceptions\MethodNotImplementedException;

trait AutoGettersAndSetters
{

    // private array $AGS_GETTERS_SETTERS = [];
    // private array $AGS_GETTERS = [];
    // private array $AGS_SETTERS = [];

    /**
     * __call
     *
     * @param  mixed $method
     * @param  mixed $args
     * @return void
     */
    public function __call($method, $args)
    {
        // Type method
        $type = substr(strtolower($method), 0, 3);
        
        // Parameter
        $parameter = lcfirst(substr($method, 3));
    
        // Check parameter exists
        if (!property_exists($this, $parameter)) {
            throw new MethodNotImplementedException($method);
        }

        // Prepare all Getters and Setters list
        $allParameters = [];

        if(isset($this->AGS_GETTERS_SETTERS) && is_array($this->AGS_GETTERS_SETTERS)){
            $allParameters = $this->AGS_GETTERS_SETTERS;
        }
        //

        // Getter
        if($type == 'get'){
            
            if(isset($this->AGS_GETTERS) && is_array($this->AGS_GETTERS)){
                $allParameters = array_merge($allParameters, $this->AGS_GETTERS);
            }

            if(
                ( count($allParameters) > 0 && in_array($parameter, $allParameters) ) ||
                ( count($allParameters) == 0 )
            ){

                $defaultValue = isset($args[0]) ? $args[0] : null;

                return $this->$parameter ?: $defaultValue;
            }

            throw new MethodNotAccessibleException($method);
        }
        //

        // Setter
        if($type == 'set'){

            if(isset($this->AGS_SETTERS) && is_array($this->AGS_SETTERS)){
                $allParameters = array_merge($allParameters, $this->AGS_SETTERS);
            }

            if (
                ( count($allParameters) > 0 && in_array($parameter, $allParameters) ) ||
                ( count($allParameters) == 0)
            ){
                
                $this->$parameter = is_array($args) ? $args[0] : $args;

                return $this;
            }

            throw new MethodNotAccessibleException($method);
        }
        //

    }
}