<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Assembly
 *
 * @author Nick
 */
// A page for robot assembly, providing different parts to mix and match.
class Assembly extends Application {

    public function index() {
        // Retrieves the file names for each part in the Robots model.
        $this->data['head1'] = $this->partsdata->get_single_part(1)['file_name'];
        $this->data['body1'] = $this->partsdata->get_single_part(2)['file_name'];
        $this->data['feet1'] = $this->partsdata->get_single_part(3)['file_name'];

        $this->data['head2'] = $this->partsdata->get_single_part(4)['file_name'];
        $this->data['body2'] = $this->partsdata->get_single_part(5)['file_name'];
        $this->data['feet2'] = $this->partsdata->get_single_part(6)['file_name'];

        $this->data['head3'] = $this->partsdata->get_single_part(7)['file_name'];
        $this->data['body3'] = $this->partsdata->get_single_part(8)['file_name'];
        $this->data['feet3'] = $this->partsdata->get_single_part(9)['file_name'];

        $this->data['head4'] = $this->partsdata->get_single_part(10)['file_name'];
        $this->data['body4'] = $this->partsdata->get_single_part(11)['file_name'];
        $this->data['feet4'] = $this->partsdata->get_single_part(12)['file_name'];

        $this->data['head5'] = $this->partsdata->get_single_part(13)['file_name'];
        $this->data['body5'] = $this->partsdata->get_single_part(14)['file_name'];
        $this->data['feet5'] = $this->partsdata->get_single_part(15)['file_name'];

        $this->data['head6'] = $this->partsdata->get_single_part(16)['file_name'];
        $this->data['body6'] = $this->partsdata->get_single_part(17)['file_name'];
        $this->data['feet6'] = $this->partsdata->get_single_part(18)['file_name'];
        $this->data['pagebody'] = 'assemblypage';
        $this->render();
    }
    
    public function insertAssembled() {
        if ($this->input->is_ajax_request()) { // just additional, to make sure request is from ajax
            if ($this->input->post('submit_a')) {
                $head = $this->input->post('head');
                $body = $this->input->post('body');
                $legs = $this->input->post('legs');
                // to model
                $headId = $this->partsdata->getPartByFile($head)[0]['id'];
                $bodyId = $this->partsdata->getPartByFile($body)[0]['id'];
                $legsId = $this->partsdata->getPartByFile($legs)[0]['id'];
                //
                $idNum = $this->robotsdata->getIdNum();
                $data = array('id'=>$idNum, 'head'=>$head, 'body'=>$body, 'legs'=>$legs);
                $this->robotsdata->createBot($data);
                $this->partsdata->deletePartById($headId);      
                $this->partsdata->deletePartById($bodyId);
                $this->partsdata->deletePartById($legsId);
                // return to view
                echo json_encode(array("error"=>false));
                return false;
            }
        }
    }
    
}

