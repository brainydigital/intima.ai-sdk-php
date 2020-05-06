<?php

namespace Intimaai\Resources\ProcessCourse;

use Intimaai\API\API;
use Intimaai\API\APIRequestException;
use Intimaai\API\Paginator;
use Intimaai\API\Resource;
use Intimaai\Resources\Action;
use Intimaai\Resources\ResourceResult;

class ProcessCourse extends Resource
{
    protected $action;

    function getResourceEndpoint()
    {
        return 'process-courses';
    }

    public function __construct(API $api, Action $action)
    {
        parent::__construct($api);
        $this->action = $action;
    }

    /**
     * Get a course by id
     * @param int $id
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getById($id)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $id,
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Get a new course
     * @param Course $course
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewCourse(Course $course)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint(),
            'method' => API::POST,
            'body' => [
                'process_number' => $course->getProcessNumber(),
                'auth_id' => $course->getAuthId(),
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Capture course by id
     * @param int $courseId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function captureCourse($courseId)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/' . $courseId . '/capture',
            'method' => API::GET
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Get a new course and capture
     * @param Course $course
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function getNewCourseAndCapture(Course $course)
    {
        $options = [
            'path' => $this->action->getResourceEndpoint() . '/' . $this->getResourceEndpoint() . '/create-and-capture',
            'method' => API::POST,
            'body' => [
                'process_number' => $course->getProcessNumber(),
                'auth_id' => $course->getAuthId(),
            ]
        ];
        return $this->getAPI()->request($options, true);
    }

    /**
     * Get a course capture results
     * @param int $courseId
     * @return Paginator
     * @throws \Exception
     */
    public function getCourseResults($courseId)
    {
        $resource = new ResourceResult($this->getAPI(), $this, $courseId);
        return $resource->paginate();
    }

    /**
     * Delete a course
     * @param int $courseId
     * @return mixed
     * @throws APIRequestException
     * @throws \Exception
     */
    public function deleteCourse($courseId)
    {
        $options = [
            'path' => $this->getResourceEndpoint() . '/' . $courseId,
            'method' => API::DELETE
        ];
        return $this->getAPI()->request($options, true);
    }
}