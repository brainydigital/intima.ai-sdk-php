<?php


namespace Intimaai\Actions;

use Intimaai\API\Resource;

class Action extends Resource
{
    protected $actionName;

    public function getResourceSlug()
    {
        return 'actions';
    }

    public function getSync($path, $options, $maxChecks = 10)
    {

    }

}