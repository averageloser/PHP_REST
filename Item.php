<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * UNUSED.
 * 
 * @author tj
 * 
 * For simplicity, everything is public.  THIS CLASS IS NOT USED.  MAY BE USED IN THE FUTURE.
 */
class Item {
    public $id;
    public $name;
    public $price;
    public $description;
    
    public function __construct($id, $name, $price, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }
}
