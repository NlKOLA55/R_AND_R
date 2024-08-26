<?php
class WorkDay {
    public $day;
    public $start_time;
    public $end_time;

    public function __construct($day, $start_time, $end_time) {
        $this->day = $day;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }
}