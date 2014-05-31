<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Course {
    private $categoryId;
    private $coursename;
    private $coursetype;

    public function getCoursetype() {
        return $this->coursetype;
    }

    public function setCoursetype($coursetype) {
        $this->coursetype = $coursetype;
    }

        public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCoursename() {
        return $this->coursename;
    }

    public function setCoursename($coursename) {
        $this->coursename = $coursename;
    }


}

?>
