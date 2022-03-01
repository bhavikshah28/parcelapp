<?php
// *************************************************************************
// *                                                                       *
// * Exchange Parcel Booking System                                        *
// * Copyright (c) ExchangeParcel. All Rights Reserved                     *
// *                                                                       *
// *************************************************************************

  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');

  class Booking
  {
	  const uTable = "users";
	  const cTable = "add_courier";
      const smsTable = "sms_templates";
	  public $logged_in = null;
	  public $uid = 0;
	  public $b_id = 0;
      public $username;
	  public $email;
	  public $name;
      public $userlevel;
	  public $last;
      public $formdata = array();
	  public static $db;
      private static $instance; 

      /**
       * Users::__construct()
       * 
       * @return
       */
      function __construct()
      {
		  self::$db = Registry::get("Database");
		  //$this->startSession();
      }
      /**
       * Booking::instance()
       * 
       * @return
       */
	  public static function instance(){
        if (!self::$instance){ 
            self::$instance = new Booking(); 
        } 
    
        return self::$instance;  
    }  

      /**
       * Users::startSession()
       * 
       * @return
       */
      private function startSession()
      {
          if (strlen(session_id()) < 1)
              session_start();

          $this->logged_in = $this->loginCheck();

          if (!$this->logged_in) {
              $this->username = $_SESSION['username'] = "Guest";
              $this->sesid = md5(session_id());
              $this->userlevel = 0;
          }
      }
	  
	  
	  /**
       * Core::getCourier Online Booking()
       * 
       * @return
       */
      public function getCourier_list_booking()
      {
          $sql = "SELECT * FROM " . self::cTable . " WHERE username = '" .  $this->username  . "' ";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }

     /**
       * Core::getCourier Online Booking()
       * 
       * @return
       */
      public function getCourier_edit_booking()
      {
          $sql = "SELECT * FROM " . self::cTable . " WHERE id = '" .  $this->b_id  . "' ";
          $row = self::$db->first($sql);
          
          return ($row) ? $row : 0;
      }

	  /**
	   * Users::checkStatus()
	   * 
	   * @param mixed $username
	   * @param mixed $pass
	   * @return
	   */
      public function checkStatus($username, $pass)
      {

          $username = sanitize($username);
          $username = self::$db->escape($username);
          $pass = sanitize($pass);

          $sql = "SELECT password, active FROM " . self::uTable 
		  . "\n WHERE username = '" . $username . "'";
          $result = self::$db->query($sql);
          if (self::$db->numrows($result) == 0)
              return 0;

          $row = self::$db->fetch($result);
          $entered_pass = md5($pass);
		  
          switch ($row->active) {
              case "b":
                  return 1;
                  break;

              case "n":
                  return 2;
                  break;

              case "t":
                  return 3;
                  break;

              case "y" && $entered_pass == $row->password:
                  return 5;
                  break;
          }
      }
	  	  
	  
	  public function getCustomers($from = false)
	  {
		  
          $pager = Paginator::instance();
          $pager->items_total = countEntries(self::uTable);
          $pager->default_ipp = Registry::get("Core")->perpage;
          $pager->paginate();

		  $clause = (isset($clause)) ? $clause : null;

          if (isset($_GET['sort'])) {
              list($sort, $order) = explode("-", $_GET['sort']);
              $sort = sanitize($sort);
              $order = sanitize($order);
              if (in_array($sort, array(
                  "username",
                  "fname",
                  "lname",
                  "email"))
				  ) {
                  $ord = ($order == 'DESC') ? " DESC" : " ASC";
                  $sorting = $sort . $ord;
              } else {
                  $sorting = "created DESC";
              }
          } else {
              $sorting = "created DESC";
          }
		  
          if (isset($_POST['fromdate']) && $_POST['fromdate'] <> "" || isset($from) && $from != '') {
              $enddate = date("Y-m-d");
              $fromdate = (empty($from)) ? $_POST['fromdate'] : $from;
              if (isset($_POST['enddate']) && $_POST['enddate'] <> "") {
                  $enddate = $_POST['enddate'];
              }
              $clause .= " WHERE created BETWEEN '" . trim($fromdate) . "' AND '" . trim($enddate) . " 23:59:59'";
          } 
		  
          $sql = "SELECT *, CONCAT(fname,' ',lname) as name,"
		  . "\n DATE_FORMAT(created, '%d. %b. %Y %H:%i') as cdate,"
		  . "\n DATE_FORMAT(lastlogin, '%d. %b. %Y %H:%i') as adate"
		  . "\n FROM users WHERE userlevel=1 AND active='y'"
		  . "\n " . $clause
		  . "\n ORDER BY " . $sorting . $pager->limit;
          $row = self::$db->fetch_all($sql);
          
		  return ($row) ? $row : 0;
	  }
	  
	  /**
       * Core::getCount()
       * 
       * @return
       */
      public function getCounton()
      {
		  //$pager->items_total = countEntries(self::cTable);
          $sql = "SELECT COUNT(id) as total, SUM(r_Costtotal) as totalprice, GROUP_CONCAT(r_Costtotal ORDER BY r_Costtotal ASC SEPARATOR ', ') as price_inv, GROUP_CONCAT(order_inv ORDER BY order_inv ASC SEPARATOR ', ') as t_order_inv, GROUP_CONCAT(id ORDER BY id ASC SEPARATOR ',') as item_ids  FROM add_courier WHERE user_id = '" . $this->uid . "' and act_status='1'";
          $row = self::$db->first($sql);
          
          return ($row) ? $row : 0;
      }

      /**
       * Core::getTransactions()
       * get parcel status wise
       * @return
       */
      public function getParcelDetails()
      {
          
		  //$pager->items_total = countEntries(self::cTable);
          $sql = "SELECT ts.transaction_id, ts.transaction_amount, ts.transaction_track, ac.status_courier, ac.delivery_type FROM add_courier ac inner join transactions ts on ac.id=ts.item_id WHERE ac.user_id = '" . $this->uid . "' and ac.act_status not in (1,3)";
          
          $row = self::$db->fetch_all($sql);
          return ($row) ? $row : 0;
      }
      
	  /**
       * Booking::getCompany_branches()
       * 
       * @return
       */
      public function getCompany_branches()
      {
		  
	    $sql = "SELECT * FROM com_branch ORDER BY Id ASC";
        $row = self::$db->fetch_all($sql);
          
        return ($row) ? $row : 0;

      }
	  /**
	   * Users::getUniqueCode()
	   * 
	   * @param string $length
	   * @return
	   */
	  public function getUniqueCode($length = "")
	  {
		  $code = uniqid(rand(), true);
		  if ($length != "") {
			  return substr($code, 0, $length);
		  } else
			  return $code;
	  }

	  /**
	   * Users::generateRandID()
	   * 
	   * @return
	   */
	  private function generateRandID()
	  {
		  return $this->getUniqueCode(7);
	  }

      /**
       * Core::getCourierlist_user()
       * 
       * @return
       */
      public function PendingCourierlist_user()
      {
		  
	  $sql = "SELECT * FROM  add_courier WHERE user_id= ".$this->uid." and act_status='1'  ORDER BY id ASC";
      $result = self::$db->query($sql);
      $records = array();
   	  while($row = mysqli_fetch_array($result)){
   	  extract($row);
   	  $records[] = array("id" => $id,
   		"tracking" => $tracking,
   		"delivery_type" => $delivery_type,
   		"address" => $address,
   		"s_branch_id" => $s_branch_id,
        "r_branch_id" => $r_branch_id,
   		"city" => $city,
        "s_state" => $s_state,
        "postal" => $postal,
        "r_address" => $r_address,
        "r_city" => $r_city,
        "r_state" => $r_state,
        "r_postal" => $r_postal,
        "r_costtotal" => $r_costtotal,
        "courier" => $courier);
   	  }	
   	    
      return ($records) ? $records : 0;

      }

      /**
       * Booking::getBranchName()
       */

       public function getBranchName($BranchId){
        $sql = "SELECT cb.Name FROM  com_branch cb WHERE cb.Id=".$BranchId." ";
        $row = self::$db->first($sql);
          
        return ($row) ? $row->Name : 0;
       }
       /**
       * Booking::getStateName()
       */

      public function getStateName($StateId){
        $sql = "SELECT s.name FROM  state s WHERE s.id=".$StateId." ";
        $row = self::$db->first($sql);
          
        return ($row && !empty($row->name)) ? ', ' . $row->name : '';
       }

     /**
      * Booking::removeBooking()
      */
      public function removeBooking($b_id){
        $data = array(
            'status_courier' => 'Removed',
            'act_status' => '3',
        );
        $id = self::$db->update(self::cTable, $data, "id='" . $b_id . "'");
        if (self::$db->affected()) {
            return true;
        } else{
            return false;
        }
      }
	  /**
	   * Booking::processBooking()
	   * 
	   * @return
	   */
	  public function processBooking()
	  {
		  
        //if (intval($this->formdata['booking_type']) != 0){
            //Filter::$msgs['booking_type'] = 'Invalid Request';
        //}else
         if($this->formdata['delivery_type'] == '1'){
		    if (empty($this->formdata['dropoff_branch']))
			    Filter::$msgs['hdndropoffbranch'] = 'Please Select Dropoff Branch';
            if (empty($this->formdata['pickup_branch']))
			    Filter::$msgs['hdnpickupbranch'] = 'Please Select Pickup Branch';

         }
         if($this->formdata['delivery_type'] == '2'){
            if (empty($this->formdata['dropoff_branch']))
			    Filter::$msgs['dropoff_branch'] = 'Please Select Pickup Branch';
            if (empty($this->formdata['cdropoffname']))
			    Filter::$msgs['cdropoffname'] = 'Please Enter Recipient Name';
            if (empty($this->formdata['cdropoffemail']))
			    Filter::$msgs['cdropoffemail'] = 'Please Enter Sender email';
            if (empty($this->formdata['cdropoffmobilecode']))
			    Filter::$msgs['cdropoffmobilecode'] = 'Please Enter Sender mobile code';
            if (empty($this->formdata['cdropoffmobile']))
			    Filter::$msgs['cdropoffmobile'] = 'Please Enter Sender mobile';
            if (empty($this->formdata['cdropoffaddr1']))
			    Filter::$msgs['cdropoffaddr1'] = 'Please Enter Recipient Address';
            if (empty($this->formdata['cdropoffcity']))
			    Filter::$msgs['cdropoffcity'] = 'Please Enter Recipient City';
            if (empty($this->formdata['cdropoffpostcode']))
			    Filter::$msgs['cdropoffpostcode'] = 'Please Enter Recipient PostCOde';
        }
        if($this->formdata['delivery_type'] == '3'){
            if (empty($this->formdata['dropoff_branch']))
			    Filter::$msgs['dropoff_branch'] = 'Please Select Pickup Branch';
            if (empty($this->formdata['cpickupname']))
			    Filter::$msgs['cpickupname'] = 'Please Enter sender Name';
            if (empty($this->formdata['cpickupemail']))
			    Filter::$msgs['cpickupemail'] = 'Please Enter Sender email';
            if (empty($this->formdata['cpickupmobilecode']))
			    Filter::$msgs['cpickupmobilecode'] = 'Please Enter Sender mobile code';
            if (empty($this->formdata['cpickupmobile']))
			    Filter::$msgs['cpickupmobile'] = 'Please Enter Sender mobile';
            if (empty($this->formdata['cpickupaddr1']))
			    Filter::$msgs['cpickupaddr1'] = 'Please Enter Sender Address';
            if (empty($this->formdata['cpickupcity']))
			    Filter::$msgs['cpickupcity'] = 'Please Enter Sender City';
            if (empty($this->formdata['cpickuppostcode']))
			    Filter::$msgs['cpickuppostcode'] = 'Please Enter Sender PostCOde';
        }
        if($this->formdata['delivery_type'] == '4'){
            if (empty($this->formdata['cpickupname']))
			    Filter::$msgs['cpickupname'] = 'Please Enter sender Name';
            if (empty($this->formdata['cpickupemail']))
			    Filter::$msgs['cpickupemail'] = 'Please Enter Sender email';
            if (empty($this->formdata['cpickupmobilecode']))
			    Filter::$msgs['cpickupmobilecode'] = 'Please Enter Sender mobile code';
            if (empty($this->formdata['cpickupmobile']))
			    Filter::$msgs['cpickupmobile'] = 'Please Enter Sender mobile';
            if (empty($this->formdata['cpickupaddr1']))
			    Filter::$msgs['cpickupaddr1'] = 'Please Enter Sender Address';
            if (empty($this->formdata['cpickupcity']))
			    Filter::$msgs['cpickupcity'] = 'Please Enter Sender City';
            if (empty($this->formdata['cpickuppostcode']))
			    Filter::$msgs['cpickuppostcode'] = 'Please Enter Sender PostCOde';
            if (empty($this->formdata['cdropoffname']))
			    Filter::$msgs['cdropoffname'] = 'Please Enter Recipient Name';
            if (empty($this->formdata['cdropoffemail']))
			    Filter::$msgs['cdropoffemail'] = 'Please Enter Sender email';
            if (empty($this->formdata['cdropoffmobilecode']))
			    Filter::$msgs['cdropoffmobilecode'] = 'Please Enter Sender mobile code';
            if (empty($this->formdata['cdropoffmobile']))
			    Filter::$msgs['cdropoffmobile'] = 'Please Enter Sender mobile';
            if (empty($this->formdata['cdropoffaddr1']))
			    Filter::$msgs['cdropoffaddr1'] = 'Please Enter Recipient Address';
            if (empty($this->formdata['cdropoffcity']))
			    Filter::$msgs['cdropoffcity'] = 'Please Enter Recipient City';
            if (empty($this->formdata['cdropoffpostcode']))
			    Filter::$msgs['cdropoffpostcode'] = 'Please Enter Recipient PostCOde';
        }
          $randomnum = $this->generateRandID(); 
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
                  'letter_or' => 'AWB',
                  'tracking' => sanitize($randomnum),
                  'Order_inv' => sanitize('AWB' . $randomnum),  
				  's_name' => sanitize($this->formdata['cpickupname']), 
				  'email' => sanitize($this->formdata['cpickupemail']), 
				  'country' => 'Malaysia',
                  's_state' => sanitize($this->formdata['pickupstate']), 
				  'city' => sanitize($this->formdata['cpickupcity']),
				  'postal' => sanitize($this->formdata['cpickuppostcode']),
				  'phone' => sanitize($this->formdata['cpickupmobilecode']) . sanitize($this->formdata['cpickupmobile']),
				  'address' => sanitize($this->formdata['cpickupaddr1']) . '' . sanitize($this->formdata['cpickupaddr2']) . sanitize($this->formdata['cpickupaddr3']),
                  's_branch_id' => sanitize($this->formdata['hdndropoffbranch']),
                  'r_name' => sanitize($this->formdata['cdropoffname']), 
				  'r_email' => sanitize($this->formdata['cdropoffemail']), 
                  'country' => 'Malaysia',				  
                  'r_state' => sanitize($this->formdata['dropoffstate']),
				  'r_city' => sanitize($this->formdata['cdropoffcity']),
				  'postal' => sanitize($this->formdata['cdropoffpostcode']),
				  'r_phone' =>  sanitize($this->formdata['cdropoffmobile']),
                  'r_address' =>  sanitize($this->formdata['cdropoffaddr1']),
                  //sanitize($this->formdata['cdropoffmobilecode']) .
                  'rc_phone' =>  sanitize($this->formdata['cdropoffmobileAlt']),
                  //sanitize($this->formdata['cdropoffmobilecode'])
				  'r_dest' =>  sanitize($this->formdata['cdropoffaddr2']) . '-' . sanitize($this->formdata['cdropoffaddr3']),
                  'r_branch_id' => sanitize($this->formdata['hdnpickupbranch']),
                  'r_costtotal' => sanitize($this->formdata['booking_rate']),
                  'r_curren' => 'MMK',
				  'package' => 'Courier', 
                  'r_weight' => sanitize($this->formdata['parcel_weight']), 
                  'delivery_type' => sanitize($this->formdata['delivery_type']),
                  'deli_time' => sanitize($this->formdata['deli_time']),
                  'status_courier' => 'Pending',
                  'act_status' => '1',
                  'username' => sanitize($this->formdata['user_name']),
                  'user_id' => sanitize($this->formdata['user_id']),
                  'act_status' => '1',
                  'courier' => sanitize($this->formdata['c_id']),
				//   'active' => sanitize($_POST['active'])
			  );
			  
				  
              $id = ($this->formdata['b_id']) ? self::$db->update(self::cTable, $data, "id='" . $this->formdata['b_id'] . "'") : self::$db->insert(self::cTable, $data);
              if(!empty($this->formdata['b_id']))
                 $id = $this->formdata['b_id'];
              $message = '';

              if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
            return $id;
          } else
              print Filter::msgStatus();

	     
      }
      
      public function getSMSTemplate($SMSType){
        $sql = "SELECT id, body1 FROM " . self::smsTable . " WHERE user_id = '" .  $this->uid  . "' and SMSType = '" . $SMSType . "'";
        $row = self::$db->first($sql); 
        return ($row) ? 'success|' . $row->id . '|' . $row->body1 : 'notfound';
      }

      public function update_template_sms() {
        $data = array(
            'SMSType' => sanitize($this->formdata['SMSType']),
            'body1' => sanitize($this->formdata['composeSMS']),
            'name' => sanitize($this->getSMSTypeName($this->formdata['SMSType'])),
            'user_id' => sanitize($this->uid),
            'active' => '1',
          //   'active' => sanitize($_POST['active'])
        );
        $SMSTID = $this->formdata['hdnsmstid'];
        $id = $SMSTID != '' ? self::$db->update(self::smsTable, $data, "id='" . $SMSTID . "'") : self::$db->insert(self::smsTable, $data);
              if(!empty($row->id))
                 $id = $row->id;
              $message = '';

              if (self::$db->affected()) {
                  $message = "SMS Template has been saved successfully.";
              } else
              $message = "<span>Alert!</span>Nothing to process.";
            return $message;
	   	  	  	   
            }

            public function getSMSTypeName($smsType){
                $smsTypeName = '';
                switch($smsType){
                    case 1:
                        $smsTypeName = 'shipping Notification';
                        break;
                    case 2:
                        $smsTypeName = 'Status Update Center';
                        break;
                    case 3:
                        $smsTypeName = 'Approval of the shipment';
                        break;
                    case 4:
                        $smsTypeName = 'credit cards';
                        break;
                    default:
                        $smsTypeName = 'credit cards';
                        break;
                }
                return $smsTypeName;
            }
        }
?>