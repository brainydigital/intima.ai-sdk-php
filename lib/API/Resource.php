<?php


namespace Intimaai\API;

use Tightenco\Collect\Contracts\Support\Arrayable;
use Tightenco\Collect\Contracts\Support\Jsonable;

abstract class Resource extends API implements Arrayable, \ArrayAccess, Jsonable
{
    protected $relations;

    private $container = [];

    protected $loaded = false;

    public function __construct($id = null, $resourceData = [])
    {
        if(!empty(array_filter($resourceData))) {
            $this->container = $resourceData;
            $this->loaded = true;
        } else {
            $this->container = [
                'id' => $id
            ];
        }

        parent::__construct();
    }

    public function __get($name)
    {
        if($name !== 'id' && !$this->loaded) {
            $this->load();
        }

        if(!empty($this->relations) && array_key_exists($name, $this->relations)) {
            if(!isset($this->{$name})) {
                $data = [];

                if(!empty($this->container[$name])) {
                    $data = $this->container[$name];
                }

                $this->{$name} = new $this->relations[$name]['resource'](
                    $this->{$this->relations[$name]['id_attribute']},
                    $data
                );
            }

            return $this->{$name};
        }

        if (array_key_exists($name, $this->container)) {
            return $this->container[$name];
        }

        if(isset($this->{$name})) {
            return $this->{$name};
        }

        return null;
    }

    abstract function getResourceSlug();

    public function load()
    {
        if(!empty($this->container['id'])) {
            $resource = $this->getJson($this->getResourceSlug() . '/' . $this->container['id']);

            if(!empty($resource['data'])) {
                $this->container = $resource['data'];

                $this->loaded = true;

                return true;
            }
        }

        return false;
    }

    public function paginate()
    {
        $pagination = $this->getJson($this->getResourceSlug());

        return new Paginator($pagination, get_class($this));
    }

    public function all()
    {
        return $this
            ->paginate()
            ->loadAll()
            ->getCollection();
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return $this->__get($offset) !== null;
    }

    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    public function toArray($mergeData = [])
    {
        $container = $this->container;

        if(!empty($this->relations)) {
            foreach ($this->relations as $name => $relation) {
                if(!empty($this->{$name}) && $this->{$name} instanceof Arrayable) {
                    $container[$name] = $this->{$name}->toArray();
                }
            }
        }

        return array_merge($container, $mergeData);
    }
}