<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2008 Kasper Skaarhoj (kasperYYYY@typo3.com)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Front End session user. Login and session data
 * Included from index_ts.php
 *
 * $Id: class.tslib_feuserauth.php 6805 2010-01-18 16:08:04Z benni $
 * Revised for TYPO3 3.6 June/2003 by Kasper Skaarhoj
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @author	Ren� Fritz <r.fritz@colorcube.de>
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   79: class tslib_feUserAuth extends t3lib_userAuth
 *  143:     function fetchGroupData()
 *  233:     function getUserTSconf()
 *
 *              SECTION: Session data management functions
 *  278:     function fetchSessionData()
 *  300:     function storeSessionData()
 *  326:     function getKey($type,$key)
 *  351:     function setKey($type,$key,$data)
 *  377:     function record_registration($recs,$maxSizeOfSessionData=0)
 *
 * TOTAL FUNCTIONS: 7
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */














/**
 * Extension class for Front End User Authentication.
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @author	Ren� Fritz <r.fritz@colorcube.de>
 * @package TYPO3
 * @subpackage tslib
 */
class tslib_feUserAuth extends t3lib_userAuth {
	var $session_table = 'fe_sessions'; 		// Table to use for session data.
	var $name = 'fe_typo_user';                 // Session/Cookie name
	var $get_name = 'ftu';		                	 // Session/GET-var name

	var $user_table = 'fe_users'; 					// Table in database with userdata
	var $username_column = 'username'; 				// Column for login-name
	var $userident_column = 'password'; 			// Column for password
	var $userid_column = 'uid'; 					// Column for user-id
	var $lastLogin_column = 'lastlogin';

	var $enablecolumns = Array (
		'deleted' => 'deleted',
		'disabled' => 'disable',
		'starttime' => 'starttime',
		'endtime' => 'endtime'
	);
	var $formfield_uname = 'user'; 				// formfield with login-name
	var $formfield_uident = 'pass'; 			// formfield with password
	var $formfield_chalvalue = 'challenge';		// formfield with a unique value which is used to encrypt the password and username
	var $formfield_status = 'logintype'; 		// formfield with status: *'login', 'logout'
	var $formfield_permanent = 'permalogin';	// formfield with 0 or 1 // 1 = permanent login enabled // 0 = session is valid for a browser session only
	var $security_level = '';					// sets the level of security. *'normal' = clear-text. 'challenged' = hashed password/username from form in $formfield_uident. 'superchallenged' = hashed password hashed again with username.

	var $auth_include = '';						// this is the name of the include-file containing the login form. If not set, login CAN be anonymous. If set login IS needed.

	var $auth_timeout_field = 6000;				// Server session lifetime. If > 0: session-timeout in seconds. If false or <0: no timeout. If string: The string is a fieldname from the usertable where the timeout can be found.

	var $lifetime = 0;				// Client session lifetime. 0 = Session-cookies. If session-cookies, the browser will stop the session when the browser is closed. Otherwise this specifies the lifetime of a cookie that keeps the session.
	var $sendNoCacheHeaders = 0;
	var $getFallBack = 1;						// If this is set, authentication is also accepted by the _GET. Notice that the identification is NOT 128bit MD5 hash but reduced. This is done in order to minimize the size for mobile-devices, such as WAP-phones
	var $getMethodEnabled = 1;					// Login may be supplied by url.

	var $usergroup_column = 'usergroup';
	var $usergroup_table = 'fe_groups';
	var $groupData = Array(
		'title' =>Array(),
		'uid' =>Array(),
		'pid' =>Array()
	);
	var $TSdataArray=array();		// Used to accumulate the TSconfig data of the user
	var $userTS = array();
	var $userTSUpdated=0;
	var $showHiddenRecords=0;

		// Session and user data:
		/*
			There are two types of data that can be stored: UserData and Session-Data. Userdata is for the login-user, and session-data for anyone viewing the pages.
			'Keys' are keys in the internal dataarray of the data. When you get or set a key in one of the data-spaces (user or session) you decide the type of the variable (not object though)
			'Reserved' keys are:
				- 'recs': Array: Used to 'register' records, eg in a shopping basket. Structure: [recs][tablename][record_uid]=number
				- sys: Reserved for TypoScript standard code.
		*/
	var $sesData = Array();
	var $sesData_change = 0;
	var $userData_change = 0;


	/**
	 * Starts a user session
	 *
	 * @return	void
	 * @see t3lib_userAuth::start()
	 */
	function start() {
		if (intval($this->auth_timeout_field)>0 && intval($this->auth_timeout_field) < $this->lifetime)	{
				// If server session timeout is non-zero but less than client session timeout: Copy this value instead.
			$this->auth_timeout_field = $this->lifetime;
		}

		parent::start();
	}

	/**
	 * Returns a new session record for the current user for insertion into the DB.
	 *
	 * @return	array		user session record
	 */
	function getNewSessionRecord($tempuser) {
		$insertFields = parent::getNewSessionRecord($tempuser);
		$insertFields['ses_permanent'] = $this->is_permanent;

		return $insertFields;
	}

	/**
	 * Determine whether a session cookie needs to be set (lifetime=0)
	 *
	 * @return	boolean
	 * @internal
	 */
	function isSetSessionCookie() {
		$retVal = ($this->newSessionID || $this->forceSetCookie) && ($this->lifetime==0 || !$this->user['ses_permanent']);
		return $retVal;
	}

	/**
	 * Determine whether a non-session cookie needs to be set (lifetime>0)
	 *
	 * @return	boolean
	 * @internal
	 */
	function isRefreshTimeBasedCookie() {
		return $this->lifetime > 0 && $this->user['ses_permanent'];
	}

	/**
	 * Returns an info array with Login/Logout data submitted by a form or params
	 *
	 * @return	array
	 * @see t3lib_userAuth::getLoginFormData()
	 */
	function getLoginFormData() {
		$loginData = parent::getLoginFormData();
		if($GLOBALS['TYPO3_CONF_VARS']['FE']['permalogin'] == 0 || $GLOBALS['TYPO3_CONF_VARS']['FE']['permalogin'] == 1) {
			if ($this->getMethodEnabled)	{
				$isPermanent = t3lib_div::_GP($this->formfield_permanent);
			} else {
				$isPermanent = t3lib_div::_POST($this->formfield_permanent);
			}
			if(strlen($isPermanent) != 1) {
				$isPermanent = $GLOBALS['TYPO3_CONF_VARS']['FE']['permalogin'];
			} elseif(!$isPermanent) {
				$this->forceSetCookie = true; // To make sure the user gets a session cookie and doesn't keep a possibly existing time based cookie, we need to force seeting the session cookie here
			}
			$isPermanent = $isPermanent?1:0;
		} elseif($GLOBALS['TYPO3_CONF_VARS']['FE']['permalogin'] == 2) {
			$isPermanent = 1;
		} else {
			$isPermanent = 0;
		}
		$loginData['permanent'] = $isPermanent;
		$this->is_permanent = $isPermanent;

		return $loginData;
	}

	/**
	 * Will select all fe_groups records that the current fe_user is member of - and which groups are also allowed in the current domain.
	 * It also accumulates the TSconfig for the fe_user/fe_groups in ->TSdataArray
	 *
	 * @return	integer		Returns the number of usergroups for the frontend users (if the internal user record exists and the usergroup field contains a value)
	 */
	function fetchGroupData()	{
		$this->TSdataArray = array();
		$this->userTS = array();
		$this->userTSUpdated = 0;
		$this->groupData = Array(
			'title' => Array(),
			'uid' => Array(),
			'pid' => Array()
		);

			// Setting default configuration:
		$this->TSdataArray[]=$GLOBALS['TYPO3_CONF_VARS']['FE']['defaultUserTSconfig'];

			// get the info data for auth services
		$authInfo = $this->getAuthInfoArray();

		if ($this->writeDevLog) 	{
			if (is_array($this->user))	{
				t3lib_div::devLog('Get usergroups for user: '.t3lib_div::arrayToLogString($this->user, array($this->userid_column,$this->username_column)), 'tslib_feUserAuth');
			} else {
				t3lib_div::devLog('Get usergroups for "anonymous" user', 'tslib_feUserAuth');
			}
		}

		$groupDataArr = array();

			// use 'auth' service to find the groups for the user
		$serviceChain='';
		$subType = 'getGroups'.$this->loginType;
		while (is_object($serviceObj = t3lib_div::makeInstanceService('auth', $subType, $serviceChain)))	{
			$serviceChain.=','.$serviceObj->getServiceKey();
			$serviceObj->initAuth($subType, array(), $authInfo, $this);

			$groupData = $serviceObj->getGroups($this->user, $groupDataArr);
			if (is_array($groupData) && count($groupData))	{
				$groupDataArr = t3lib_div::array_merge($groupDataArr, $groupData);	// Keys in $groupData should be unique ids of the groups (like "uid") so this function will override groups.
			}
			unset($serviceObj);
		}
		if ($this->writeDevLog AND $serviceChain) 	t3lib_div::devLog($subType.' auth services called: '.$serviceChain, 'tslib_feUserAuth');
		if ($this->writeDevLog AND !count($groupDataArr)) 	t3lib_div::devLog('No usergroups found by services', 'tslib_feUserAuth');
		if ($this->writeDevLog AND count($groupDataArr)) 	t3lib_div::devLog(count($groupDataArr).' usergroup records found by services', 'tslib_feUserAuth');


			// use 'auth' service to check the usergroups if they are really valid
		foreach ($groupDataArr as $groupData)	{
				// by default a group is valid
			$validGroup = TRUE;

			$serviceChain='';
			$subType = 'authGroups'.$this->loginType;
			while (is_object($serviceObj = t3lib_div::makeInstanceService('auth', $subType, $serviceChain))) {
				$serviceChain.=','.$serviceObj->getServiceKey();
				$serviceObj->initAuth($subType, array(), $authInfo, $this);

				if (!$serviceObj->authGroup($this->user, $groupData)) {
					$validGroup = FALSE;
					if ($this->writeDevLog) 	t3lib_div::devLog($subType.' auth service did not auth group: '.t3lib_div::arrayToLogString($groupData, 'uid,title'), 'tslib_feUserAuth', 2);

					break;
				}
				unset($serviceObj);
			}
			unset($serviceObj);

			if ($validGroup) {
				$this->groupData['title'][$groupData['uid']]=$groupData['title'];
				$this->groupData['uid'][$groupData['uid']]=$groupData['uid'];
				$this->groupData['pid'][$groupData['uid']]=$groupData['pid'];
				$this->groupData['TSconfig'][$groupData['uid']]=$groupData['TSconfig'];
			}
		}

		if (count($this->groupData ?? []) && count($this->groupData['TSconfig'] ?? []))	{
				// TSconfig: collect it in the order it was collected
			foreach($this->groupData['TSconfig'] as $TSdata)	{
				$this->TSdataArray[]=$TSdata;
			}

			$this->TSdataArray[]=$this->user['TSconfig'];

				// Sort information
			ksort($this->groupData['title']);
			ksort($this->groupData['uid']);
			ksort($this->groupData['pid']);
		}

		return count($this->groupData['uid']) ? count($this->groupData['uid']) : 0;
	}

	/**
	 * Returns the parsed TSconfig for the fe_user
	 * First time this function is called it will parse the TSconfig and store it in $this->userTS. Subsequent requests will not re-parse the TSconfig but simply return what is already in $this->userTS
	 *
	 * @return	array		TSconfig array for the fe_user
	 */
	function getUserTSconf()	{
		if (!$this->userTSUpdated) {
				// Parsing the user TS (or getting from cache)
			$this->TSdataArray = t3lib_TSparser::checkIncludeLines_array($this->TSdataArray);
			$userTS = implode(chr(10).'[GLOBAL]'.chr(10),$this->TSdataArray);
			$parseObj = t3lib_div::makeInstance('t3lib_TSparser');
			$parseObj->parse($userTS);
			$this->userTS = $parseObj->setup;

			$this->userTSUpdated=1;
		}
		return $this->userTS;
	}

















	/*****************************************
	 *
	 * Session data management functions
	 *
	 ****************************************/

	/**
	 * Fetches the session data for the user (from the fe_session_data table) based on the ->id of the current user-session.
	 * The session data is restored to $this->sesData
	 * 1/100 calls will also do a garbage collection.
	 *
	 * @return	void
	 * @access private
	 * @see storeSessionData()
	 */
	function fetchSessionData()	{
			// Gets SesData if any AND if not already selected by session fixation check in ->isExistingSessionRecord()
		if ($this->id && !count($this->sesData)) {
			$dbres = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'fe_session_data', 'hash='.$GLOBALS['TYPO3_DB']->fullQuoteStr($this->id, 'fe_session_data'));
			if ($sesDataRow = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($dbres))	{
				$this->sesData = unserialize($sesDataRow['content']);
			}
		}
			// delete old data:
		if ((rand()%100) <= 1) {		// a possibility of 1 % for garbage collection.
			$GLOBALS['TYPO3_DB']->exec_DELETEquery('fe_session_data', 'tstamp < '.intval(time()-3600*24));		// all data older than 24 hours are deleted.
		}
	}

	/**
	 * Will write UC and session data.
	 * If the flag $this->userData_change has been set, the function ->writeUC is called (which will save persistent user session data)
	 * If the flag $this->sesData_change has been set, the fe_session_data table is updated with the content of $this->sesData (deleting any old record, inserting new)
	 *
	 * @return	void
	 * @see fetchSessionData(), getKey(), setKey()
	 */
	function storeSessionData()	{
			// Saves UC and SesData if changed.
		if ($this->userData_change)	{
			$this->writeUC('');
		}
		if ($this->sesData_change)	{
			if ($this->id)	{
				$insertFields = array (
					'hash' => $this->id,
					'content' => serialize($this->sesData),
					'tstamp' => time()
				);
				$GLOBALS['TYPO3_DB']->exec_DELETEquery('fe_session_data', 'hash='.$GLOBALS['TYPO3_DB']->fullQuoteStr($this->id, 'fe_session_data'));
				$GLOBALS['TYPO3_DB']->exec_INSERTquery('fe_session_data', $insertFields);
			}
		}
	}

	/**
	 * Returns session data for the fe_user; Either persistent data following the fe_users uid/profile (requires login) or current-session based (not available when browse is closed, but does not require login)
	 *
	 * @param	string		Session data type; Either "user" (persistent, bound to fe_users profile) or "ses" (temporary, bound to current session cookie)
	 * @param	string		Key from the data array to return; The session data (in either case) is an array ($this->uc / $this->sesData) and this value determines which key to return the value for.
	 * @return	mixed		Returns whatever value there was in the array for the key, $key
	 * @see setKey()
	 */
	function getKey($type,$key) {
		if ($key)	{
			switch($type)	{
				case 'user':
					return $this->uc[$key];
				break;
				case 'ses':
					return $this->sesData[$key];
				break;
			}
		}
	}

	/**
	 * Saves session data, either persistent or bound to current session cookie. Please see getKey() for more details.
	 * When a value is set the flags $this->userData_change or $this->sesData_change will be set so that the final call to ->storeSessionData() will know if a change has occurred and needs to be saved to the database.
	 * Notice: The key "recs" is already used by the function record_registration() which stores table/uid=value pairs in that key. This is used for the shopping basket among other things.
	 * Notice: Simply calling this function will not save the data to the database! The actual saving is done in storeSessionData() which is called as some of the last things in index_ts.php. So if you exit before this point, nothing gets saved of course! And the solution is to call $GLOBALS['TSFE']->storeSessionData(); before you exit.
	 *
	 * @param	string		Session data type; Either "user" (persistent, bound to fe_users profile) or "ses" (temporary, bound to current session cookie)
	 * @param	string		Key from the data array to store incoming data in; The session data (in either case) is an array ($this->uc / $this->sesData) and this value determines in which key the $data value will be stored.
	 * @param	mixed		The data value to store in $key
	 * @return	void
	 * @see setKey(), storeSessionData(), record_registration()
	 */
	function setKey($type,$key,$data)	{
		if ($key)	{
			switch($type)	{
				case 'user':
					if ($this->user['uid'])	{
						$this->uc[$key]=$data;
						$this->userData_change=1;
					}
				break;
				case 'ses':
					$this->sesData[$key]=$data;
					$this->sesData_change=1;
				break;
			}
		}
	}

	/**
	 * Registration of records/"shopping basket" in session data
	 * This will take the input array, $recs, and merge into the current "recs" array found in the session data.
	 * If a change in the recs storage happens (which it probably does) the function setKey() is called in order to store the array again.
	 *
	 * @param	array		The data array to merge into/override the current recs values. The $recs array is constructed as [table]][uid] = scalar-value (eg. string/integer).
	 * @param	integer		The maximum size of stored session data. If zero, no limit is applied and even confirmation of cookie session is discarded.
	 * @return	void
	 */
	function record_registration($recs,$maxSizeOfSessionData=0)	{

			// Storing value ONLY if there is a confirmed cookie set (->cookieID), 
			// otherwise a shellscript could easily be spamming the fe_sessions table
			// with bogus content and thus bloat the database
		if (!$maxSizeOfSessionData || $this->cookieId) {
			if ($recs['clear_all'])	{
				$this->setKey('ses', 'recs', array());
			}
			$change=0;
			$recs_array=$this->getKey('ses','recs');
			reset($recs);
			while(list($table,$data)=each($recs))	{
				if (is_array($data))	{
					reset($data);
					while(list($rec_id,$value)=each($data))	{
						if ($value != $recs_array[$table][$rec_id])	{
							$recs_array[$table][$rec_id] = $value;
							$change=1;
						}
					}
				}
			}
			if ($change && (!$maxSizeOfSessionData || strlen(serialize($recs_array))<$maxSizeOfSessionData))	{
				$this->setKey('ses','recs',$recs_array);
			}
		}
	}

	/**
	 * Determine whether there's an according session record to a given session_id
	 * in the database. Don't care if session record is still valid or not.
	 *
	 * This calls the parent function but additionally tries to look up the session ID in the "fe_session_data" table.
	 *
	 * @param	integer		Claimed Session ID
	 * @return	boolean		Returns true if a corresponding session was found in the database
	 */
	function isExistingSessionRecord($id) {
			// Perform check in parent function
		$count = parent::isExistingSessionRecord($id);

			// Check if there are any fe_session_data records for the session ID the client claims to have
		if ($count == false) {
			$dbres = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
							'content',
							'fe_session_data',
							'hash=' . $GLOBALS['TYPO3_DB']->fullQuoteStr($id, 'fe_session_data')
						);
			if ($dbres !== false) {
				if ($sesDataRow = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($dbres)) {
					$count = true;
					$this->sesData = unserialize($sesDataRow['content']);
				}
			}
		}

			// @deprecated: Check for commerce basket records. The following lines should be removed once a fixed commerce version is released.
			// Extensions like commerce which have their own session table should just put some small bit of data into fe_session_data using $GLOBALS['TSFE']->fe_user->setKey('ses', ...) to make the session stable.
		if ($count == false && t3lib_extMgm::isLoaded('commerce')) {
			$dbres = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
							'*',
							'tx_commerce_baskets',
							'sid=' . $GLOBALS['TYPO3_DB']->fullQuoteStr($id, 'tx_commerce_baskets')
						);
			if ($dbres !== false) {
				if ($sesDataRow = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($dbres)) {
					$count = true;
				}
			}
		}

		return $count;
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['tslib/class.tslib_feuserauth.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['tslib/class.tslib_feuserauth.php']);
}
?>
