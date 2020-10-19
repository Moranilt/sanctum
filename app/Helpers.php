<?php

namespace App;

trait Helpers{


    public function createdAt()
    {
        return $this->created_at->diffForHumans();
    }
}
