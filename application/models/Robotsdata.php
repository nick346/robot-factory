<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Robotsdata
 *
 * @author Jake
 */
class Robotsdata extends CI_Model {

    // Constructor    
    public function __construct() {
        parent::__construct();
    }

    // retrieve all of bots
    public function getAllBots() {
        return $this->bots;
    }

    // retrieve a single bot
    public function getBot($which) {
        // iterate over the data until we find the one we want
        foreach ($this->bots as $record) {
            if ($record['id'] == $which) {
                return $record;
            }
        }
          return null;
    }
    
    public function createBot($data) {
        $this->db->insert('assembledbots', $data);
    }
    
    // Returns an ID number by adding 1 to the current number of rows.
    public function getIdNum() {
        $botRowCount = $this->db->count_all('assembledbots');
        $idNum = $botRowCount+1;
        return $idNum;
    }
    
}







