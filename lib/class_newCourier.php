<?php
// *************************************************************************
// *                                                                       *
// * Exchange Parcel Booking System                                        *
// * Copyright (c) ExchangeParcel. All Rights Reserved                     *
// *                                                                       *
// *************************************************************************

  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');

  class newCourier
  {
    const sTable = "state";
    const crTable = "courier_rate";
    public $formdata = array();    
    private static $db;
          /**
       * newCourier::__construct()
       * 
       * @return
       */
      function __construct()
      {
		  self::$db = Registry::get("Database");
		  //$this->startSession();
      }

      /**
       * newCourier::getState()
       * 
       * @return
       */
      function getState()
      {
            $sql = "SELECT * FROM state ORDER BY Id ASC";
            $row = self::$db->fetch_all($sql);
          
            return ($row) ? $row : 0;

      }
      
      /**
       * newCourier::getRate()
       * 
       * @return
       */
      function getRate($id=null)
      {
         if(!isset($id)){
            $sql1 = "SELECT courier_rate.id, state.name as fromstate,s.name as tostate, courier_rate.FromPoint, courier_rate.ToPoint, courier_rate.FromZip, courier_rate.ToZip, courier_rate.Weight, courier_rate.rate,courier_rate.deli_time, courier_rate.deli_type  
                   FROM `courier_rate` inner join state on state.id=courier_rate.FromPoint left join state s on s.id=courier_rate.ToPoint 
                   order by courier_rate.id ASC";
            $row1 = self::$db->fetch_all($sql1);
            return ($row1) ? $row1 : 0;
         }else{
          $sql = "SELECT courier_rate.id, state.name as fromstate,s.name as tostate, courier_rate.FromZip, courier_rate.ToZip,courier_rate.FromPoint, courier_rate.ToPoint, courier_rate.Weight, courier_rate.rate, courier_rate.deli_time, courier_rate.deli_type 
          FROM `courier_rate` inner join state on state.id=courier_rate.FromPoint left join state s on s.id=courier_rate.ToPoint 
          where courier_rate.id='$id'";
          $row = self::$db->first($sql);
          return ($row) ? $row : 0;
         }
      }
      
      /**
       * newCourier::getStateByID()
       * 
       * @return
       */
      function getStateByID($id)
      {
            $sql = "SELECT * FROM state Where id='$id'";
            $row = self::$db->first($sql);
          
            return ($row) ? $row : 0;

      }
      /**
       * newCourier::InsertState()
       * 
       * @return
       */
      public function InsertState()
      {

            if (empty($this->formdata['State_Name']))
                Filter::$msgs['State_Name'] = 'Please Select State Name';          
        
            if (empty(Filter::$msgs)) {
                $data = array(
                    'name' => sanitize($this->formdata['State_Name']), 
                    'Avail_Zipcode' => sanitize($this->formdata['available_zip']), 
                  //   'active' => sanitize($_POST['active'])
                );
                
              $id = ($this->formdata['s_id']) ? self::$db->update(self::sTable, $data, "id='" . $this->formdata['s_id'] . "'") : self::$db->insert(self::sTable, $data);
              if(!empty($this->formdata['s_id'])){
                $message = 'Successfully updated';
                 $id = $this->formdata['s_id'];
              }else{
                $message = 'Successfully added';
              }
              
              if (self::$db->affected()) {
                  return $message;
              }else{
                  return $message;
              }
            }else
                print Filter::msgStatus();
                
            

      }

      /**
       * newCourier::DeleteState()
       * 
       * @return
       */
      public function DeleteState($s_id)
      {
            if (empty($s_id))
                Filter::$msgs['State_id'] = 'Invalid Request!';          
        
            if (empty(Filter::$msgs)) {
              //$sql = "Delete FROM state Where id='$s_id'";
            $row = self::$db->delete("state", "id='$s_id'");
            
              if($row){
                 $message = 'Successfully deleted';
               }else{
                 $message = 'not deleted due to site incovenience.';
               }
              
              
            }else{
                $message = 'Invalid Request!';
                //print Filter::msgStatus();
            }
            return $message;    
      }

      /**
       * newCourier::InsertRate()
       * 
       * @return
       */
      public function InsertRate()
      {

            if (sanitize($this->formdata['exampleFormControlSelect1']) == 0)
                Filter::$msgs['exampleFormControlSelect1'] = 'Please Select From Point';
            if (empty($this->formdata['available_zip_from']))
                Filter::$msgs['available_zip_from'] = 'Please Select From Zip';
            if (sanitize($this->formdata['exampleFormControlSelect2']) == 0)
                Filter::$msgs['exampleFormControlSelect2'] = 'Please Select To Point';    
            if (empty($this->formdata['available_zip_to']))
                Filter::$msgs['available_zip_to'] = 'Please Select To Zip';
            if (empty($this->formdata['frm_Weight']))
                Filter::$msgs['frm_Weight'] = 'Please Select Weight';
            if (empty($this->formdata['frm_Rate']))
                Filter::$msgs['frm_Rate'] = 'Please Select Rate';
            if (empty($this->formdata['delivery_type']))
                Filter::$msgs['delivery_type'] = 'Please Select Delivery Type';
        
            if (empty(Filter::$msgs)) {
                if(sanitize($this->formdata['delivery_type']) == '1')
                   $delivery_type_text = 'Point To Point';
                if(sanitize($this->formdata['delivery_type']) == '2')
                   $delivery_type_text = 'Point To Door';
                if(sanitize($this->formdata['delivery_type']) == '3')
                   $delivery_type_text = 'Door To Point';
                if(sanitize($this->formdata['delivery_type']) == '4')
                   $delivery_type_text = 'Door To Door';
                $data = array(
                    'FromPoint' => sanitize($this->formdata['exampleFormControlSelect1']), 
                    'FromZip' => sanitize($this->formdata['available_zip_from']),
                    'ToPoint' => sanitize($this->formdata['exampleFormControlSelect2']), 
                    'ToZip' => sanitize($this->formdata['available_zip_to']),
                    'Weight' => sanitize($this->formdata['frm_Weight']), 
                    'rate' => sanitize($this->formdata['frm_Rate']), 
                    'deli_time' => sanitize($this->formdata['delivery_time']),
                    'deli_type' => sanitize($this->formdata['delivery_type']),
                    'deli_type_text' => $delivery_type_text
                  //   'active' => sanitize($_POST['active'])
                );
                
              $id = ($this->formdata['s_id']) ? self::$db->update(self::crTable, $data, "id='" . $this->formdata['s_id'] . "'") : self::$db->insert(self::crTable, $data);
              if(!empty($this->formdata['s_id'])){
                $message = 'Successfully updated';
                 $id = $this->formdata['s_id'];
              }else{
                $message = 'Successfully added';
              }
              
              if (self::$db->affected()) {
                  return $message;
              }else{
                  return $message;
              }
            }else
                print Filter::msgStatus();
                
            

      }
  }
