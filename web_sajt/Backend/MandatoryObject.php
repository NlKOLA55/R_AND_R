<?php
class Doctor {
    public $id;
    public $fname;
    public $lname;
    public $email;
    public $img;
    public $msg;
    public $treatments;
    public $workHours;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
    public function setFName($fname) {
        $this->fname = $fname;
    }

    public function getFName() {
        return $this->fname;
    }
    public function setLName($lname) {
        $this->lname = $lname;
    }

    public function getLName() {
        return $this->lname;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setImg($img) {
        $this->img = $img;
    }

    public function getImg() {
        return $this->img;
    }
    public function setMsg($msg) {
        $this->msg = $msg;
    }

    public function getMsg() {
        return $this->msg;
    }
    public function setTreatments($treatments) {
        $this->treatments = $treatments;
    }

    public function getTreatments() {
        return $this->treatments;
    }
    public function setWorkHours($workHours) {
        $this->workHours = $workHours;
    }

    public function getWorkHours() {
        return $this->workHours;
    }
}