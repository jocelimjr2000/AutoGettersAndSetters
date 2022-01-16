<?php

namespace JocelimJr;

trait ConvertData
{

    // private array $AGS_HIDDEN_PARAMETERS = [];

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(array $removeParams = []): array
    {
        $array = get_object_vars($this);
        unset(
            $array['_parent'], 
            $array['_index'], 
            $array['AGS_HIDDEN_PARAMETERS'],
            $array['AGS_GETTERS_SETTERS'],
            $array['AGS_GETTERS'],
            $array['AGS_SETTERS']
        );

        if(isset($this->AGS_HIDDEN_PARAMETERS) && is_array($this->AGS_HIDDEN_PARAMETERS)){
            $removeParams = array_merge($removeParams, $this->AGS_HIDDEN_PARAMETERS);
        }

        foreach ($removeParams as $p) {
            unset($array[$p]);
        }

        array_walk_recursive($array, function (&$property) {
            if (is_object($property) && method_exists($property, 'toArray')) {
                $property = $property->toArray();
            }
        });

        return $array;
    }

    /**
     * toObject
     *
     * @param  mixed $removeParams
     * @param  mixed $forceObject
     * @return object
     */
    public function toObject(array $removeParams = [], bool $forceObject = false): object
    {
        $data = $this->toArray($removeParams);

        if ($forceObject) {
            return json_decode(json_encode($data, JSON_FORCE_OBJECT));
        }

        return json_decode(json_encode($data));
    }

    /**
     * toJson
     *
     * @param  mixed $removeParams
     * @return string
     */
    public function toJson(array $removeParams = []): string
    {
        return json_encode($this->toArray($removeParams));
    }
}
