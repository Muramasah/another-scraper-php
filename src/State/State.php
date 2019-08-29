<?php

namespace Another\State;

class State
{
  private $state = [];

  public function get($key = null)
  {
    if ($key) {
      return $this->state[$key];
    } else {
      return $this->state;
    }
  }

  public function update($newState = null)
  {
    if ($newState) {
      foreach ($newState as $key => $newValue) {
        $this->state[$key] = $newValue;
      }
    }
  }
}
