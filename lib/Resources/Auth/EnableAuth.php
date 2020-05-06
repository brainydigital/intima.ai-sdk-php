<?php


namespace Intimaai\Resources\Auth;


class EnableAuth
{
    private $tabs;
    private $week_days;
    private $day_hour;

    /**
     * EnableAuth constructor.
     * @param array $tabs
     * @param array $week_days
     * @param array $day_hour
     */
    public function __construct($tabs, $week_days, $day_hour)
    {
        $this->tabs = $tabs;
        $this->week_days = $week_days;
        $this->day_hour = $day_hour;
    }

    /**
     * @return array
     */
    public function getTabs()
    {
        return $this->tabs;
    }

    /**
     * @param array $tabs
     */
    public function setTabs($tabs)
    {
        $this->tabs = $tabs;
    }

    /**
     * @return array
     */
    public function getWeekDays()
    {
        return $this->week_days;
    }

    /**
     * @param array $week_days
     */
    public function setWeekDays($week_days)
    {
        $this->week_days = $week_days;
    }

    /**
     * @return array
     */
    public function getDayHour()
    {
        return $this->day_hour;
    }

    /**
     * @param array $day_hour
     */
    public function setDayHour($day_hour)
    {
        $this->day_hour = $day_hour;
    }
}