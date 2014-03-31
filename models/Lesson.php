<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Lesson {
    private $lessonId;
    private $userId;
    private $course_id;
    private $startTime;
    private $endTime;
    
    public function getLessonId() {
        return $this->lessonId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getCourse_id() {
        return $this->course_id;
    }

    public function getStartTime() {
        return $this->startTime;
    }

    public function getEndTime() {
        return $this->endTime;
    }

    public function setLessonId($lessonId) {
        $this->lessonId = $lessonId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setCourse_id($course_id) {
        $this->course_id = $course_id;
    }

    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }


}