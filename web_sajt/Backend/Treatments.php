<?php
class Treatment {
    public $treatment;
    public $length;

    public function __construct($treatment, $length) {
        $this->treatment = $treatment;
        $this->length = $length;
    }
}