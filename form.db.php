<?php namespace JF;

/**

Copyright 2017 JQueryForm.com
License: http://www.jqueryform.com/license.php

*/

class Form2DB {
    
    // mysql
    private $db = array(
        'host'    => '127.0.0.1',
        'db'      => 'form2db',
        'user'    => 'root',
        'pass'    => '',
        'charset' => 'utf8',    
    );

    private $table = 'detailsform';

    /*
    define the mapping between form field IDs and table columns
    */
    private $fieldMap = array(
        // formFieldID => columnName
        'f1'           => 'name',
        'f2'           => 'email',
		'f5'           => 'mobile',
        'f3'           => 'comments',
		'f4'		   => 'guardian_Name',
		'f6'           => 'DOB',
		'f32'		   => 'gender',
		'f7'           => 'course',
		'f26'          => 'fee',
		'f24'          => 'docs',
		'f25'          => 'photo',
		'f23'          => 'remarks',
		'f22'          => 'extras',
		'f21'          => 'idcard',
		'f20'          => 'readings',
		'f16'          => 'cmode',
		'f17'          => 'lang',
		'f14'          =>'exp',
		'f13'          =>'add_qual',
		'f12'          =>'edu',
		'f11'          => 'occ',
		'f10'          =>'reln',
		'f9_addressLine1'=> 'taddr1',
		'f9_addressLine2'=>'taddr2',
		'f9_city'      =>'tcity',
		'f9_country'   =>'tcountry',
		'f9_postalCode'=>'tpin',
		'f9_state'     =>'tstate',
		'f8_addressLine1' => 'paddr1',
		'f8_addressLine2'=>'paddr2', 
		'f8_city'=>'pcity', 
		'f8_country'=>'pcountry', 
		'f8_postalCode'=>'ppin', 
		'f8_state' =>'pstate',
		'f52' => 'nationality',
		'f71' => 'bloodgroup',

        'AutoID'       => 'AutoID',
        'HTTP_HOST'    => 'HTTP_HOST',
        'IP'           => 'IP',
        'Date'         => 'Date',
        'Time'         => 'Time',
        'HTTP_REFERER' => 'HTTP_REFERER',
    );

    private $pdo;

    private function connectDB(){
        $dsn = "mysql:host=" . $this->db['host'] . ";dbname=" . $this->db['db'] . ";charset=" . $this->db['charset'];
        $this->pdo = new \PDO( $dsn, $this->db['user'], $this->db['pass'] );
    }

    // $form is a array of form data after form validation
    public function saveFormData( $form ){
        $rowCount = 0;
        $values   = $this->getValues( $form );
        $columns  = array_keys( $values );
        $marks    = array_fill( 0, sizeof($columns), '?' );
        $sql      = "INSERT INTO " . $this->table . " (" . join( ",", $columns ) . ") VALUES ( " . join( ',', $marks ) . ")";        
        
        try{
            $this->connectDB();
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute( array_values($values) );
            $rowCount = $stmt->rowCount();
        } catch ( \PDOException $e ){
            // do nothing
            die( $e->getMessage() );
        };
        
        return $rowCount;
    }

    private function getValues( $form ){
        $values = array();
        foreach( $this->fieldMap as $id => $column ){
            $values[ $column ] = isset($form[ $id ]) ? $form[ $id ] : '';
        }
        return $values;
    }
    
} // class


/*
example:

CREATE DATABASE form2db;

CREATE TABLE `detailsform` (
	`id` INT(10) UNSIGNED NOT NULL auto_increment,
	`name` TINYTEXT NULL,
	`comments` TEXT NULL,
	`email` VARCHAR(100) NULL DEFAULT NULL,
	`mobile` varchar(12) NULL DEFAULT NULL,
	`guardian_Name` VARCHAR(100) TINYTEXT NULL,
	`DOB` varchar(16) NULL DEFAULT NULL,
	`gender` varchar(6) NULL DEFAULT NULL,
	`course` varchar(100) NULL DEFAULT NULL,
	`docs` LARGEBLOB,
	`photo` MEDUIUMBLOB,
	`remarks` varchar(500) NULL DEFAULT NULL,
	`extras` varchar(100) NULL DEFAULT NULL,
	`idcard` varchar(5) NULL DEFAULT NULL,
	`readings` varchar(100) NULL DEFAULT NULL,
	`cmode` varchar(100) NULL DEFAULT NULL,
	`lang` varchar(100) NULL DEFAULT NULL,
	`exp` varchar(100) NULL DEFAULT NULL,
	`add_qual` varchar(100) NULL DEFAULT NULL,
	`edu` varchar(100) NULL DEFAULT NULL,
	`occ` varchar(100) NULL DEFAULT NULL,
	`reln` varchar(100) NULL DEFAULT NULL,
	`taddr1` varchar(100) NULL DEFAULT NULL,
	`taddr2` varchar(100) NULL DEFAULT NULL,
	`tcity` varchar(100) NULL DEFAULT NULL,
	`tcountry` varchar(100) NULL DEFAULT NULL,
	`tpin` varchar(6) NULL DEFAULT NULL,
	`tstate` varchar(100) NULL DEFAULT NULL,
	`paddr1` varchar(100) NULL DEFAULT NULL,
	`paddr2` varchar(100) NULL DEFAULT NULL,
	`pcity` varchar(100) NULL DEFAULT NULL,
	`pcountry` varchar(100) NULL DEFAULT NULL,
	`pstate` varchar(100) NULL DEFAULT NULL,
	`fee` varchar(100) NULL DEFAULT NULL,
	`ppin` varchar(6) NULL DEFAULT NULL,
	
    `AutoID` varchar(64) NULL DEFAULT NULL,
    `HTTP_HOST` varchar(255) NULL DEFAULT NULL,
    `IP` varchar(15) NULL DEFAULT NULL,
    `Date` varchar(16) NULL DEFAULT NULL,
    `Time` varchar(16) NULL DEFAULT NULL,
    `HTTP_REFERER` text,

	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

GRANT ALL ON form2db.* TO 'form2db_user'@'localhost' IDENTIFIED BY 'form2db_pass';
flush privileges;


{f1} : Your Name xx
{f4} : Guardian Name xx
{f6} : Date Of Birth  xx
{f32} : Gender xx
{f7} : Course Name xx
{f2} : Email xx
{f5} : Mobile No.
{f8_addressLine1},{f8_addressLine2},{f8_city},{f8_country},{f8_postalCode},{f8_state} : Permanent Address
{f9_addressLine1},{f9_addressLine2},{f9_city},{f9_country},{f9_postalCode},{f9_state} : Present Address
{f10} : Religion/Caste
{f11} : Occupation/Profession
{f12} : Education Qualification
{f13} : Additional Qualification
{f14} : Experience (If Any)
{f17} : Language Medium
{f16} : Course Mode
{f20} : Reading Material Send By
{f21} : ID card
{f22} : Extra Service Recommended by (Rs. 1000)
{f23} : Remarks
{f25} : Upload Image
{f24} : Attach Documents
{f26} : Subscription (Fees)
{dataTable} : A html table shows all form data
{dataText} : Plain text format of form data
{AutoID} : Reference ID of the form submission, like an Order ID.
{Date} : Date
{Time} : Time
{IP} : IP address
{HTTP_HOST} : Your website name
{HTTP_REFERER} : The address of the page (if any) which referred the user agent to your form
Username: admin
Password: 5690c
*/
