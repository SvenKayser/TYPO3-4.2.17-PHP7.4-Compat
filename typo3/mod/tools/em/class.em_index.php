<?php
/***************************************************************
*  Copyright notice
*
*  (c) 1999-2008 Kasper Skaarhoj (kasperYYYY@typo3.com)
*  (c) 2005-2008 Karsten Dambekalns <karsten@typo3.org>
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
 * Module: Extension manager
 *
 * $Id: class.em_index.php 8962 2010-10-06 08:12:57Z ohader $
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @author	Karsten Dambekalns <karsten@typo3.org>
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *  194: class SC_mod_tools_em_index extends t3lib_SCbase
 *
 *              SECTION: Standard module initialization
 *  337:     function init()
 *  417:     function handleExternalFunctionValue($MM_key='function', $MS_value=NULL)
 *  431:     function menuConfig()
 *  508:     function main()
 *  584:     function printContent()
 *
 *              SECTION: Function Menu Applications
 *  609:     function extensionList_loaded()
 *  664:     function extensionList_installed()
 *  736:     function extensionList_import()
 *  903:     function alterSettings()
 *
 *              SECTION: Command Applications (triggered by GET var)
 * 1005:     function importExtInfo($extKey, $version='')
 * 1062:     function fetchMetaData($metaType)
 * 1125:     function getMirrorURL()
 * 1158:     function installExtension($extKey, $version=null, $mode=EM_INSTALL_VERSION_MIN)
 * 1279:     function importExtFromRep($extKey,$version,$loc,$uploadFlag=0,$dontDelete=0,$directInput='')
 * 1425:     function showExtDetails($extKey)
 *
 *              SECTION: Application Sub-functions (HTML parts)
 * 1737:     function updatesForm($extKey,$extInfo,$notSilent=0,$script='',$addFields='')
 * 1768:     function extDumpTables($extKey,$extInfo)
 * 1835:     function getFileListOfExtension($extKey,$conf)
 * 1889:     function extDelete($extKey,$extInfo)
 * 1920:     function extUpdateEMCONF($extKey,$extInfo)
 * 1940:     function extBackup($extKey,$extInfo)
 * 1987:     function extBackup_dumpDataTablesLine($tablesArray,$extKey)
 * 2015:     function extInformationArray($extKey,$extInfo,$remote=0)
 * 2097:     function extInformationArray_dbReq($techInfo,$tableHeader=0)
 * 2110:     function extInformationArray_dbInst($dbInst,$current)
 * 2129:     function getRepositoryUploadForm($extKey,$extInfo)
 *
 *              SECTION: Extension list rendering
 * 2190:     function extensionListRowHeader($trAttrib,$cells,$import=0)
 * 2251:     function extensionListRow($extKey,$extInfo,$cells,$bgColorClass='',$inst_list=array(),$import=0,$altLinkUrl='')
 *
 *              SECTION: Output helper functions
 * 2367:     function wrapEmail($str,$email)
 * 2380:     function helpCol($key)
 * 2396:     function labelInfo($str)
 * 2408:     function extensionTitleIconHeader($extKey,$extInfo,$align='top')
 * 2423:     function removeButton()
 * 2432:     function installButton()
 * 2441:     function noImportMsg()
 * 2454:     function depToString($dep,$type='depends')
 * 2473:     function stringToDep($dep)
 *
 *              SECTION: Read information about all available extensions
 * 2503:     function getInstalledExtensions()
 * 2530:     function getInstExtList($path,&$list,&$cat,$type)
 * 2561:     function fixEMCONF($emConf)
 * 2600:     function splitVersionRange($ver)
 * 2616:     function prepareImportExtList()
 * 2660:     function setCat(&$cat,$listArrayPart,$extKey)
 *
 *              SECTION: Extension analyzing (detailed information)
 * 2710:     function makeDetailedExtensionAnalysis($extKey,$extInfo,$validity=0)
 * 2892:     function getClassIndexLocallangFiles($absPath,$table_class_prefix,$extKey)
 * 2962:     function modConfFileAnalysis($confFilePath)
 * 2990:     function serverExtensionMD5Array($extKey,$conf)
 * 3015:     function findMD5ArrayDiff($current,$past)
 *
 *              SECTION: File system operations
 * 3047:     function createDirsInPath($dirs,$extDirPath)
 * 3065:     function removeExtDirectory($removePath,$removeContentOnly=0)
 * 3128:     function clearAndMakeExtensionDir($importedData,$type,$dontDelete=0)
 * 3182:     function removeCacheFiles()
 * 3192:     function extractDirsFromFileList($files)
 * 3218:     function getExtPath($extKey,$type)
 *
 *              SECTION: Writing to "conf.php" and "localconf.php" files
 * 3252:     function writeTYPO3_MOD_PATH($confFilePath,$type,$mP)
 * 3289:     function writeNewExtensionList($newExtList)
 * 3312:     function writeTsStyleConfig($extKey,$arr)
 * 3334:     function updateLocalEM_CONF($extKey,$extInfo)
 *
 *              SECTION: Compiling upload information, emconf-file etc.
 * 3376:     function construct_ext_emconf_file($extKey,$EM_CONF)
 * 3407:     function arrayToCode($array, $level=0)
 * 3433:     function makeUploadArray($extKey,$conf)
 * 3502:     function getSerializedLocalLang($file,$content)
 *
 *              SECTION: Managing dependencies, conflicts, priorities, load order of extension keys
 * 3538:     function addExtToList($extKey,$instExtInfo)
 * 3569:     function checkDependencies($extKey, $conf, $instExtInfo)
 * 3709:     function removeExtFromList($extKey,$instExtInfo)
 * 3746:     function removeRequiredExtFromListArr($listArr)
 * 3761:     function managesPriorities($listArr,$instExtInfo)
 *
 *              SECTION: System Update functions (based on extension requirements)
 * 3813:     function checkClearCache($extInfo)
 * 3840:     function checkUploadFolder($extKey,$extInfo)
 * 3925:     function checkDBupdates($extKey,$extInfo,$infoOnly=0)
 * 4022:     function forceDBupdates($extKey, $extInfo)
 * 4080:     function tsStyleConfigForm($extKey,$extInfo,$output=0,$script='',$addFields='')
 *
 *              SECTION: Dumping database (MySQL compliant)
 * 4175:     function dumpTableAndFieldStructure($arr)
 * 4200:     function dumpStaticTables($tableList)
 * 4229:     function dumpHeader()
 * 4246:     function dumpTableHeader($table,$fieldKeyInfo,$dropTableIfExists=0)
 * 4288:     function dumpTableContent($table,$fieldStructure)
 * 4323:     function getTableAndFieldStructure($parts)
 *
 *              SECTION: TER Communication functions
 * 4373:     function uploadExtensionToTER($em)
 *
 *              SECTION: Various helper functions
 * 4411:     function listOrderTitle($listOrder,$key)
 * 4436:     function makeVersion($v,$mode)
 * 4448:     function renderVersion($v,$raise='')
 * 4485:     function ulFolder($extKey)
 * 4494:     function importAtAll()
 * 4505:     function importAsType($type,$lockType='')
 * 4527:     function deleteAsType($type)
 * 4548:     function versionDifference($v1,$v2,$div=1)
 * 4560:     function first_in_array($str,$array,$caseInsensitive=FALSE)
 * 4578:     function includeEMCONF($path,$_EXTKEY)
 * 4593:     function searchExtension($extKey,$row)
 *
 * TOTAL FUNCTIONS: 90
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */

	// Include classes needed:
require_once(PATH_t3lib.'class.t3lib_tcemain.php');
require_once(PATH_t3lib.'class.t3lib_install.php');
require_once(PATH_t3lib.'class.t3lib_tsstyleconfig.php');
require_once(PATH_t3lib.'class.t3lib_scbase.php');

require_once('class.em_xmlhandler.php');
require_once('class.em_terconnection.php');
require_once('class.em_unzip.php');

	// from tx_ter by Robert Lemke
define('TX_TER_RESULT_EXTENSIONSUCCESSFULLYUPLOADED', '10504');

define('EM_INSTALL_VERSION_MIN', 1);
define('EM_INSTALL_VERSION_MAX', 2);
define('EM_INSTALL_VERSION_STRICT', 3);

/**
 * Module: Extension manager
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @author	Karsten Dambekalns <karsten@typo3.org>
 * @package TYPO3
 * @subpackage core
 */
class SC_mod_tools_em_index extends t3lib_SCbase {

		// Internal, static:
	var $versionDiffFactor = 1;		// This means that version difference testing for import is detected for sub-versions only, not dev-versions. Default: 1000
	var $systemInstall = 0;				// If "1" then installs in the sysext directory is allowed. Default: 0
	var $requiredExt = '';				// List of required extension (from TYPO3_CONF_VARS)
	var $maxUploadSize = 31457280;		// Max size in bytes of extension upload to repository
	var $kbMax = 500;					// Max size in kilobytes for files to be edited.
	var $doPrintContent = true;			// If set (default), the function printContent() will echo the content which was collected in $this->content. You can set this to FALSE in order to echo content from elsewhere, fx. when using outbut buffering
	var $listingLimit = 500;		// List that many extension maximally at one time (fixing memory problems)
	var $listingLimitAuthor = 250;		// List that many extension maximally at one time (fixing memory problems)

	/**
	 * Internal variable loaded with extension categories (for display/listing). Should reflect $categories above
	 * Dynamic var.
	 */
	var $defaultCategories = Array(
		'cat' => Array (
			'be' => array(),
			'module' => array(),
			'fe' => array(),
			'plugin' => array(),
			'misc' => array(),
			'services' => array(),
			'templates' => array(),
			'example' => array(),
			'doc' => array()
		)
	);

	/**
	 * Extension Categories (static var)
	 * Content must be redundant with the same internal variable as in class.tx_extrep.php!
	 */
	var $categories = Array(
		'be' => 'Backend',
		'module' => 'Backend Modules',
		'fe' => 'Frontend',
		'plugin' => 'Frontend Plugins',
		'misc' => 'Miscellaneous',
		'services' => 'Services',
		'templates' => 'Templates',
		'example' => 'Examples',
		'doc' => 'Documentation'
	);

	/**
	 * Extension States
	 * Content must be redundant with the same internal variable as in class.tx_extrep.php!
	 */
	var $states = Array (
		'alpha' => 'Alpha',
		'beta' => 'Beta',
		'stable' => 'Stable',
		'experimental' => 'Experimental',
		'test' => 'Test',
		'obsolete' => 'Obsolete',
	);

	/**
	 * Colors for extension states
	 */
	var $stateColors = Array (
		'alpha' => '#d12438',
		'beta' => '#97b17e',
		'stable' => '#3bb65c',
		'experimental' => '#007eba',
		'test' => '#979797',
		'obsolete' => '#000000',
	);

	/**
	 * "TYPE" information; labels, paths, description etc.
	 */
	var $typeLabels = Array (
		'S' => 'System',
		'G' => 'Global',
		'L' => 'Local',
	);
	var $typeDescr = Array (
		'S' => 'System extension (typo3/sysext/) - Always distributed with source code (Static).',
		'G' => 'Global extensions (typo3/ext/) - Available for shared source on server (Dynamic).',
		'L' => 'Local extensions (typo3conf/ext/) - Local for this TYPO3 installation only (Dynamic).',
	);
	var $typePaths = Array();			// Also static, set in init()
	var $typeBackPaths = Array();		// Also static, set in init()

	var $typeRelPaths = Array (
		'S' => 'sysext/',
		'G' => 'ext/',
		'L' => '../typo3conf/ext/',
	);

	var $detailCols = Array (
		0 => 2,
		1 => 5,
		2 => 6,
		3 => 6,
		4 => 4,
		5 => 1
	);

	var $fe_user = array(
		'username' => '',
		'password' => '',
	);

	var $privacyNotice = 'When you interact with the online repository, server information may be sent and stored in the repository for statistics.';
	var $securityHint = '<strong>Found a security problem? Please get in touch with us!</strong><br />If you think you have found a security issue in TYPO3 or an extension, please contact the <a href="http://typo3.org/teams/security/" target="_blank">TYPO3 security team</a>! Thank you!';
	var $editTextExtensions = 'html,htm,txt,css,tmpl,inc,php,sql,conf,cnf,pl,pm,sh,xml,ChangeLog';
	var $nameSpaceExceptions = 'beuser_tracking,design_components,impexp,static_file_edit,cms,freesite,quickhelp,classic_welcome,indexed_search,sys_action,sys_workflows,sys_todos,sys_messages,direct_mail,sys_stat,tt_address,tt_board,tt_calender,tt_guest,tt_links,tt_news,tt_poll,tt_rating,tt_products,setup,taskcenter,tsconfig_help,context_help,sys_note,tstemplate,lowlevel,install,belog,beuser,phpmyadmin,aboutmodules,imagelist,setup,taskcenter,sys_notepad,viewpage,adodb';





		// Default variables for backend modules
	var $MCONF = array();				// Module configuration
	var $MOD_MENU = array();			// Module menu items
	var $MOD_SETTINGS = array();		// Module session settings
	/**
	 * Document Template Object
	 *
	 * @var noDoc
	 */
	var $doc;
	var $content;						// Accumulated content

	var $inst_keys = array();			// Storage of installed extensions
	var $gzcompress = 0;				// Is set true, if system support compression.

	/**
	 * instance of TER connection handler
	 *
	 * @var SC_mod_tools_em_terconnection
	 */
	var $terConnection;

	/**
	 * XML handling class for the TYPO3 Extension Manager
	 *
	 * @var SC_mod_tools_em_xmlhandler
	 */
	var $xmlhandler;
	var $JScode;						// JavaScript code to be forwared to $this->doc->JScode

		// GPvars:
	var $CMD = array();					// CMD array
	var $listRemote;					// If set, connects to remote repository
	var $lookUpStr;						// Search string when listing local extensions




	/*********************************
	*
	* Standard module initialization
	*
	*********************************/

	/**
	 * Standard init function of a module.
	 *
	 * @return	void
	 */
	function init()	{
		global $BE_USER,$LANG,$BACK_PATH,$TYPO3_CONF_VARS;

			// Setting paths of install scopes:
		$this->typePaths = Array (
			'S' => TYPO3_mainDir.'sysext/',
			'G' => TYPO3_mainDir.'ext/',
			'L' => 'typo3conf/ext/'
		);
		$this->typeBackPaths = Array (
			'S' => '../../../',
			'G' => '../../../',
			'L' => '../../../../'.TYPO3_mainDir
		);

		$this->excludeForPackaging = $GLOBALS['TYPO3_CONF_VARS']['EXT']['excludeForPackaging'];

			// Setting module configuration:
		$this->MCONF = $GLOBALS['MCONF'];

			// Setting GPvars:
		$this->CMD = is_array(t3lib_div::_GP('CMD')) ? t3lib_div::_GP('CMD') : array();
		$this->lookUpStr = trim(t3lib_div::_GP('_lookUp'));
		$this->listRemote = t3lib_div::_GP('ter_connect');
		$this->listRemote_search = trim(t3lib_div::_GP('ter_search'));


			// Configure menu
		$this->menuConfig();

			// Setting internal static:
		if ($TYPO3_CONF_VARS['EXT']['allowSystemInstall'])	$this->systemInstall = 1;
		$this->requiredExt = t3lib_div::trimExplode(',',$TYPO3_CONF_VARS['EXT']['requiredExt'],1);


			// Initialize helper object
		$this->terConnection = t3lib_div::makeInstance('SC_mod_tools_em_terconnection');
		$this->terConnection->emObj =& $this;
		$this->terConnection->wsdlURL = $TYPO3_CONF_VARS['EXT']['em_wsdlURL'];
		$this->xmlhandler = t3lib_div::makeInstance('SC_mod_tools_em_xmlhandler');
		$this->xmlhandler->emObj =& $this;
		$this->xmlhandler->useUnchecked = $this->MOD_SETTINGS['display_unchecked'];
		$this->xmlhandler->useObsolete = $this->MOD_SETTINGS['display_obsolete'];

			// Initialize Document Template object:
		$this->doc = t3lib_div::makeInstance('template');
		$this->doc->backPath = $BACK_PATH;
		$this->doc->setModuleTemplate('templates/em_index.html');
		$this->doc->docType='xhtml_trans';

			// JavaScript
		$this->doc->JScode = $this->doc->wrapScriptTags('
			script_ended = 0;
			function jumpToUrl(URL)	{	//
				window.location.href = URL;
			}
		');

			// Reload left frame menu
		if ($this->CMD['refreshMenu']) {
			$this->doc->JScode .= $this->doc->wrapScriptTags('
				if(top.refreshMenu) {
					top.refreshMenu();
				} else {
					top.TYPO3ModuleMenu.refreshMenu();
				}
			');
		}


			// Descriptions:
		$this->descrTable = '_MOD_'.$this->MCONF['name'];
		if ($BE_USER->uc['edit_showFieldHelp'])	{
			$LANG->loadSingleTableDescription($this->descrTable);
		}

			// Setting username/password etc. for upload-user:
		$this->fe_user['username'] = $this->MOD_SETTINGS['fe_u'];
		$this->fe_user['password'] = $this->MOD_SETTINGS['fe_p'];
		parent::init();
		$this->handleExternalFunctionValue('singleDetails');
	}

	/**
	 * This function is a copy of the same function in t3lib_SCbase with one modification:
	 * In contrast to t3lib_SCbase::handleExternalFunctionValue() this function merges the $this->extClassConf array
	 * instead of overwriting it. That was necessary for including the Kickstarter as a submodule into the 'singleDetails'
	 * selectorbox as well as in the main 'function' selectorbox.
	 *
	 * @param	string		Mod-setting array key
	 * @param	string		Mod setting value, overriding the one in the key
	 * @return	void
	 * @see t3lib_SCbase::handleExternalFunctionValue()
	 */
	function handleExternalFunctionValue($MM_key='function', $MS_value=NULL)	{
		$MS_value = is_null($MS_value) ? $this->MOD_SETTINGS[$MM_key] : $MS_value;
		$externalItems = $this->getExternalItemConfig($this->MCONF['name'],$MM_key,$MS_value);
		if (is_array($externalItems))	$this->extClassConf = array_merge($externalItems,is_array($this->extClassConf)?$this->extClassConf:array());
		if (is_array($this->extClassConf) && $this->extClassConf['path'])	{
			$this->include_once[]=$this->extClassConf['path'];
		}
	}

	/**
	 * Configuration of which mod-menu items can be used
	 *
	 * @return	void
	 */
	function menuConfig()	{
		global $BE_USER, $TYPO3_CONF_VARS;

		// MENU-ITEMS:
		$this->MOD_MENU = array(
			'function' => array(
				0 => 'Loaded extensions',
				1 => 'Install extensions',
				2 => 'Import extensions',
				4 => 'Translation handling',
				3 => 'Settings',
				5 => 'Check for extension updates',
			),
			'listOrder' => array(
				'cat' => 'Category',
				'author_company' => 'Author',
				'state' => 'State',
				'type' => 'Type'
			),
			'display_details' => array(
				1 => 'Details',
				0 => 'Description',
				2 => 'More details',

				3 => 'Technical (takes time!)',
				4 => 'Validating (takes time!)',
				5 => 'Changed? (takes time!)',
			),
			'display_shy' => '',
			'display_own' => '',
			'display_unchecked' => '',
			'display_obsolete' => '',
			'display_installed' => '',
			'display_files' => '',


			'singleDetails' => array(
				'info' => 'Information',
				'edit' => 'Edit files',
				'backup' => 'Backup/Delete',
				'dump' => 'Dump DB',
				'upload' => 'Upload to TER',
				'updateModule' => 'UPDATE!',
			),
			'fe_u' => '',
			'fe_p' => '',

			'mirrorListURL' => '',
			'rep_url' => '',
			'extMirrors' => '',
			'selectedMirror' => '',

			'selectedLanguages' => ''
		);

		$this->MOD_MENU['singleDetails'] = $this->mergeExternalItems($this->MCONF['name'],'singleDetails',$this->MOD_MENU['singleDetails']);

		// page/be_user TSconfig settings and blinding of menu-items
		if (!$BE_USER->getTSConfigVal('mod.'.$this->MCONF['name'].'.allowTVlisting'))	{
			unset($this->MOD_MENU['display_details'][3]);
			unset($this->MOD_MENU['display_details'][4]);
			unset($this->MOD_MENU['display_details'][5]);
		}

		// CLEANSE SETTINGS
		$this->MOD_SETTINGS = t3lib_BEfunc::getModuleData($this->MOD_MENU, t3lib_div::_GP('SET'), $this->MCONF['name']);

		if ($this->MOD_SETTINGS['function']==2)	{
			// If listing from online repository, certain items are removed though:
			unset($this->MOD_MENU['listOrder']['type']);
			unset($this->MOD_MENU['display_details'][2]);
			unset($this->MOD_MENU['display_details'][3]);
			unset($this->MOD_MENU['display_details'][4]);
			unset($this->MOD_MENU['display_details'][5]);
			$this->MOD_SETTINGS = t3lib_BEfunc::getModuleData($this->MOD_MENU, t3lib_div::_GP('SET'), $this->MCONF['name']);
		}
		parent::menuConfig();
	}

	/**
	 * Main function for Extension Manager module.
	 *
	 * @return	void
	 */
	function main()	{
		global $BE_USER,$LANG,$TYPO3_CONF_VARS;

		if (empty($this->MOD_SETTINGS['mirrorListURL'])) $this->MOD_SETTINGS['mirrorListURL'] = $TYPO3_CONF_VARS['EXT']['em_mirrorListURL'];

		// Starting page:
		$this->content.=$this->doc->header('Extension Manager');
		$this->content.=$this->doc->spacer(5);

		// Commands given which is executed regardless of main menu setting:
		if ($this->CMD['showExt'])	{	// Show details for a single extension
			$this->showExtDetails($this->CMD['showExt']);
		} elseif ($this->CMD['requestInstallExtensions'])	{	// Show details for a single extension
				$this->requestInstallExtensions($this->CMD['requestInstallExtensions']);
		} elseif ($this->CMD['importExt'] || $this->CMD['uploadExt'])	{	// Imports an extension from online rep.
			$err = $this->importExtFromRep($this->CMD['importExt'],$this->CMD['extVersion'],$this->CMD['loc'],$this->CMD['uploadExt']);
			if ($err)	{
				$this->content.=$this->doc->section('',$GLOBALS['TBE_TEMPLATE']->rfw($err));
			}
			if(!$err && $this->CMD['importExt']) {
				$this->installTranslationsForExtension($this->CMD['importExt'], $this->getMirrorURL());
			}
		} elseif ($this->CMD['importExtInfo'])	{	// Gets detailed information of an extension from online rep.
			$this->importExtInfo($this->CMD['importExtInfo'],$this->CMD['extVersion']);
		} else {	// No command - we show what the menu setting tells us:
			if (t3lib_div::inList('0,1,2',$this->MOD_SETTINGS['function']))	{
				$menu.='&nbsp;Group by:&nbsp;'.t3lib_BEfunc::getFuncMenu(0,'SET[listOrder]',$this->MOD_SETTINGS['listOrder'],$this->MOD_MENU['listOrder']).
				'&nbsp;&nbsp;Show:&nbsp;'.t3lib_BEfunc::getFuncMenu(0,'SET[display_details]',$this->MOD_SETTINGS['display_details'],$this->MOD_MENU['display_details']).'<br />';
			}
			if (t3lib_div::inList('0,1,5',$this->MOD_SETTINGS['function']))	{
				$menu.='<label for="checkDisplayShy">Display shy extensions:</label>&nbsp;&nbsp;'.t3lib_BEfunc::getFuncCheck(0,'SET[display_shy]',$this->MOD_SETTINGS['display_shy'],'','','id="checkDisplayShy"');
			}
			if (t3lib_div::inList('2',$this->MOD_SETTINGS['function']) && strlen($this->fe_user['username']))	{
				$menu.='<label for="checkDisplayOwn">Only my extensions:</label>&nbsp;&nbsp;'.t3lib_BEfunc::getFuncCheck(0,'SET[display_own]',$this->MOD_SETTINGS['display_own'],'','','id="checkDisplayOwn"');
			}
			if (t3lib_div::inList('0,1,2',$this->MOD_SETTINGS['function']))	{
				$menu.='&nbsp;&nbsp;<label for="checkDisplayObsolete">Show obsolete:</label>&nbsp;&nbsp;'.t3lib_BEfunc::getFuncCheck(0,'SET[display_obsolete]',$this->MOD_SETTINGS['display_obsolete'],'','','id="checkDisplayObsolete"');
			}

			$this->content.=$this->doc->section('','<form action="index.php" method="post" name="pageform"><span class="nobr">'.$menu.'</span></form>');
			$this->content.=$this->doc->spacer(10);

			switch((string)$this->MOD_SETTINGS['function'])	{
				case '0':
					// Lists loaded (installed) extensions
					$this->extensionList_loaded();
					break;
				case '1':
					// Lists the installed (available) extensions
					$this->extensionList_installed();
					break;
				case '2':
					// Lists the extensions available from online rep.
					$this->extensionList_import();
					break;
				case '3':
					// Shows the settings screen
					$this->alterSettings();
					break;
				case '4':
					// Allows to set the translation preferences and check the status
					$this->translationHandling();
					break;
				case '5':
					// Shows a list of extensions with updates in TER
					$this->checkForUpdates();
					break;
				default:
					$this->extObjContent();
					break;
			}
		}

		// closing any form?
		$formTags = substr_count($this->content, '<form') + substr_count($this->content, '</form');
		if ($formTags % 2 > 0) {
			$this->content .= '</form>';
		}

			// Setting up the buttons and markers for docheader
		$docHeaderButtons = $this->getButtons();
		$markers = array(
			'CSH' => $docHeaderButtons['csh'],
			'FUNC_MENU' => $this->getFuncMenu(),
			'CONTENT' => $this->content
		);

			// Build the <body> for the module
		$this->content = $this->doc->startPage('Extension Manager');
		$this->content.= $this->doc->moduleBody($this->pageinfo, $docHeaderButtons, $markers);
		$this->content.= $this->doc->endPage();
		$this->content = $this->doc->insertStylesAndJS($this->content);
	}

	/**
	 * Print module content. Called as last thing in the global scope.
	 *
	 * @return	void
	 */
	function printContent()	{
		if ($this->doPrintContent) {
			echo $this->content;
		}
	}

	/**
	 * Create the function menu
	 *
	 * @return	string	HTML of the function menu
	 */
	protected function getFuncMenu() {
		$funcMenu = '';
		if(!$this->CMD['showExt'] && !$this->CMD['requestInstallExtensions'] && !$this->CMD['importExt'] && !$this->CMD['uploadExt'] && !$this->CMD['importExtInfo']) {
			$funcMenu = t3lib_BEfunc::getFuncMenu(0, 'SET[function]', $this->MOD_SETTINGS['function'], $this->MOD_MENU['function']);
		} elseif($this->CMD['showExt'] && (!$this->CMD['standAlone'] && !t3lib_div::_GP('standAlone'))) {
			$funcMenu = t3lib_BEfunc::getFuncMenu(0, 'SET[singleDetails]', $this->MOD_SETTINGS['singleDetails'], $this->MOD_MENU['singleDetails'], '', '&CMD[showExt]=' . $this->CMD['showExt']);
		}
		return $funcMenu;
	}

	/**
	 * Create the panel of buttons for submitting the form or otherwise perform operations.
	 *
	 * @return	array	all available buttons as an assoc. array
	 */
	protected function getButtons()	{

		$buttons = array(
			'csh' => '',
			'back' => '',
			'shortcut' => ''
		);
			// CSH
		//$buttons['csh'] = t3lib_BEfunc::cshItem('_MOD_web_func', '', $GLOBALS['BACK_PATH']);

			// Shortcut
		if ($GLOBALS['BE_USER']->mayMakeShortcut())	{
			$buttons['shortcut'] = $this->doc->makeShortcutIcon('CMD','function',$this->MCONF['name']);
		}
			// Back
		if(($this->CMD['showExt'] && (!$this->CMD['standAlone'] && !t3lib_div::_GP('standAlone'))) || ($this->CMD['importExt'] || $this->CMD['uploadExt'] && (!$this->CMD['standAlone'])) || $this->CMD['importExtInfo']) {
			$buttons['back'] = '<a href="index.php" class="typo3-goBack"><img' . t3lib_iconWorks::skinImg($this->doc->backPath, 'gfx/goback.gif') . ' title="Go back" class="absmiddle" alt="" /></a>';
		}

		return $buttons;
	}








	/*********************************
	*
	* Function Menu Applications
	*
	*********************************/

	/**
	 * Listing of loaded (installed) extensions
	 *
	 * @return	void
	 */
	function extensionList_loaded()	{
		global $TYPO3_LOADED_EXT;

		list($list,$cat) = $this->getInstalledExtensions();

		// Loaded extensions
		$content = '';
		$lines = array();

		// Available extensions
		if (is_array($cat[$this->MOD_SETTINGS['listOrder']]))	{
			$content='';
			$lines=array();
			$lines[] = $this->extensionListRowHeader(' class="bgColor5"',array('<td><img src="clear.gif" width="1" height="1" alt="" /></td>'));

			foreach($cat[$this->MOD_SETTINGS['listOrder']] as $catName => $extEkeys)	{
				natcasesort($extEkeys);
				reset($extEkeys);
				$extensions = array();
				while(list($extKey)=each($extEkeys))	{
					if (array_key_exists($extKey,$TYPO3_LOADED_EXT) && ($this->MOD_SETTINGS['display_shy'] || !$list[$extKey]['EM_CONF']['shy']) && $this->searchExtension($extKey,$list[$extKey]))	{
						if (in_array($extKey, $this->requiredExt))	{
							$loadUnloadLink = '<strong>'.$GLOBALS['TBE_TEMPLATE']->rfw('Rq').'</strong>';
						} else {
							$loadUnloadLink = '<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[remove]=1').'">'.$this->removeButton().'</a>';
						}

						$extensions[] = $this->extensionListRow($extKey,$list[$extKey],array('<td class="bgColor">'.$loadUnloadLink.'</td>'));
					}
				}
				if(count($extensions)) {
					$lines[]='<tr><td colspan="'.(3+$this->detailCols[$this->MOD_SETTINGS['display_details']]).'"><br /></td></tr>';
					$lines[]='<tr><td colspan="'.(3+$this->detailCols[$this->MOD_SETTINGS['display_details']]).'"><img '.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/i/sysf.gif"', 'width="18" height="16"').' align="top" alt="" /><strong>'.$this->listOrderTitle($this->MOD_SETTINGS['listOrder'],$catName).'</strong></td></tr>';
					$lines[] = implode(chr(10),$extensions);
				}
			}
		}

		$content.= t3lib_BEfunc::cshItem('_MOD_tools_em', 'loaded', $GLOBALS['BACK_PATH'],'');
		$content.= '<form action="index.php" method="post" name="lookupform">';
		$content.= '<label for="_lookUp">Look up:</label> <input type="text" id="_lookUp" name="_lookUp" value="'.htmlspecialchars($this->lookUpStr).'" /><input type="submit" value="Search"/><br/><br/>';

		$content.= '</form>

			<!-- Loaded Extensions List -->
			<table border="0" cellpadding="2" cellspacing="1">'.implode('',$lines).'</table>';

		$this->content.=$this->doc->section('Loaded Extensions',$content,0,1);
	}

	/**
	 * Listing of available (installed) extensions
	 *
	 * @return	void
	 */
	function extensionList_installed()	{
		global $TYPO3_LOADED_EXT;

		list($list,$cat)=$this->getInstalledExtensions();

		// Available extensions
		if (is_array($cat[$this->MOD_SETTINGS['listOrder']]))	{
			$content='';
			$lines=array();
			$lines[]=$this->extensionListRowHeader(' class="bgColor5"',array('<td><img src="clear.gif" width="18" height="1" alt="" /></td>'));

			$allKeys=array();
			foreach($cat[$this->MOD_SETTINGS['listOrder']] as $catName => $extEkeys)	{
				if(!$this->MOD_SETTINGS['display_obsolete'] && $catName=='obsolete') continue;

				$allKeys[]='';
				$allKeys[]='TYPE: '.$catName;

				natcasesort($extEkeys);
				reset($extEkeys);
				$extensions = array();
				while(list($extKey)=each($extEkeys))	{
					$allKeys[]=$extKey;
					if ((!$list[$extKey]['EM_CONF']['shy'] || $this->MOD_SETTINGS['display_shy']) &&
							($list[$extKey]['EM_CONF']['state']!='obsolete' || $this->MOD_SETTINGS['display_obsolete'])
					 && $this->searchExtension($extKey,$list[$extKey]))	{
						$loadUnloadLink = t3lib_extMgm::isLoaded($extKey)?
						'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[remove]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->removeButton().'</a>':
						'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[load]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->installButton().'</a>';
						if (in_array($extKey,$this->requiredExt))	{
							$loadUnloadLink='<strong>'.$GLOBALS['TBE_TEMPLATE']->rfw('Rq').'</strong>';
						}
						$theRowClass = t3lib_extMgm::isLoaded($extKey)? 'em-listbg1' : 'em-listbg2';
						$extensions[]=$this->extensionListRow($extKey,$list[$extKey],array('<td class="bgColor">'.$loadUnloadLink.'</td>'),$theRowClass);
					}
				}
				if(count($extensions)) {
					$lines[]='<tr><td colspan="'.(3+$this->detailCols[$this->MOD_SETTINGS['display_details']]).'"><br /></td></tr>';
					$lines[]='<tr><td colspan="'.(3+$this->detailCols[$this->MOD_SETTINGS['display_details']]).'"><img '.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/i/sysf.gif"', 'width="18" height="16"').'align="top" alt="" /><strong>'.$this->listOrderTitle($this->MOD_SETTINGS['listOrder'],$catName).'</strong></td></tr>';
					$lines[] = implode(chr(10),$extensions);
				}
			}

			$content.='


<!--
EXTENSION KEYS:

'.trim(implode(chr(10),$allKeys)).'

-->

';

			$content.= t3lib_BEfunc::cshItem('_MOD_tools_em', 'avail', $GLOBALS['BACK_PATH'],'|<br/>');
			$content.= 'If you want to use an extension in TYPO3, you should simply click the "plus" button '.$this->installButton().' . <br />
						Installed extensions can also be removed again - just click the remove button '.$this->removeButton().' .<br /><br />';
			$content .= '<form action="index.php" method="post" name="lookupform">';
			$content.= '<label for="_lookUp">Look up:</label> <input type="text" id="_lookUp" name="_lookUp" value="'.htmlspecialchars($this->lookUpStr).'" /><input type="submit" value="Search"/></form><br/><br/>';
			$content.= $this->securityHint.'<br /><br />';

			$content.= '<table border="0" cellpadding="2" cellspacing="1">'.implode('',$lines).'</table>';

			$this->content.=$this->doc->section('Available Extensions - Grouped by: '.$this->MOD_MENU['listOrder'][$this->MOD_SETTINGS['listOrder']],$content,0,1);
		}
	}

	/**
	 * Listing remote extensions from online repository
	 *
	 * @return	void
	 */
	function extensionList_import()	{
		global $TYPO3_LOADED_EXT;
		$content='';

			// Listing from online repository:
		if ($this->listRemote)	{
			list($inst_list,) = $this->getInstalledExtensions();
			$this->inst_keys = array_flip(array_keys($inst_list));

			$this->detailCols[1]+=6;

				// see if we have an extensionlist at all
			$this->extensionCount = $this->xmlhandler->countExtensions();
			if (!$this->extensionCount)	{
				$content .= $this->fetchMetaData('extensions');
			}

			if($this->MOD_SETTINGS['listOrder']=='author_company') {
				$this->listingLimit = $this->listingLimitAuthor;
			}

			$this->pointer = intval(t3lib_div::_GP('pointer'));
			$offset = $this->listingLimit*$this->pointer;

			if($this->MOD_SETTINGS['display_own'] && strlen($this->fe_user['username'])) {
				$this->xmlhandler->searchExtensionsXML($this->listRemote_search, $this->fe_user['username'], $this->MOD_SETTINGS['listOrder']);
			} else {
				$this->xmlhandler->searchExtensionsXML($this->listRemote_search, '', $this->MOD_SETTINGS['listOrder'], false, false, $offset, $this->listingLimit);
			}
			if (count($this->xmlhandler->extensionsXML))	{
				list($list,$cat) = $this->prepareImportExtList(true);

					// Available extensions
				if (is_array($cat[$this->MOD_SETTINGS['listOrder']]))	{
					$lines=array();
					$lines[]=$this->extensionListRowHeader(' class="bgColor5"',array('<td><img src="clear.gif" width="18" height="1" alt="" /></td>'),1);

					foreach($cat[$this->MOD_SETTINGS['listOrder']] as $catName => $extEkeys)	{
						if (count($extEkeys))	{
							$lines[]='<tr><td colspan="'.(3+$this->detailCols[$this->MOD_SETTINGS['display_details']]).'"><br /></td></tr>';
							$lines[]='<tr><td colspan="'.(3+$this->detailCols[$this->MOD_SETTINGS['display_details']]).'"><img '.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/i/sysf.gif"', 'width="18" height="16"').'align="top" alt="" /><strong>'.$this->listOrderTitle($this->MOD_SETTINGS['listOrder'],$catName).'</strong></td></tr>';

							natcasesort($extEkeys);
							reset($extEkeys);
							while(list($extKey)=each($extEkeys))	{
								$version = array_keys($list[$extKey]['versions']);
								$version = end($version);
								$ext = $list[$extKey]['versions'][$version];
								$ext['downloadcounter_all'] = $list[$extKey]['downloadcounter'];
								$ext['_ICON'] = $list[$extKey]['_ICON'];
								$loadUnloadLink='';
								if ($inst_list[$extKey]['type']!='S' && (!isset($inst_list[$extKey]) || $this->versionDifference($version,$inst_list[$extKey]['EM_CONF']['version'],$this->versionDiffFactor)))	{
									if (isset($inst_list[$extKey]))	{
											// update
										$loc= ($inst_list[$extKey]['type']=='G'?'G':'L');
										$aUrl = 'index.php?CMD[importExt]='.$extKey.'&CMD[extVersion]='.$version.'&CMD[loc]='.$loc;
										$loadUnloadLink.= '<a href="'.htmlspecialchars($aUrl).'"><img src="'.$GLOBALS['BACK_PATH'].'gfx/import_update.gif" width="12" height="12" title="Update the extension in \''.($loc=='G'?'global':'local').'\' from online repository to server" alt="" /></a>';
									} else {
											// import
										$aUrl = 'index.php?CMD[importExt]='.$extKey.'&CMD[extVersion]='.$version.'&CMD[loc]=L';
										$loadUnloadLink.= '<a href="'.htmlspecialchars($aUrl).'"><img src="'.$GLOBALS['BACK_PATH'].'gfx/import.gif" width="12" height="12" title="Import this extension to \'local\' dir typo3conf/ext/ from online repository." alt="" /></a>';
									}
								} else {
									$loadUnloadLink = '&nbsp;';
								}

								if (isset($inst_list[$extKey]))	{
									$theRowClass = t3lib_extMgm::isLoaded($extKey) ? 'em-listbg1' : 'em-listbg2';
								} else {
									$theRowClass = 'em-listbg3';
								}

								$lines[]=$this->extensionListRow($extKey,$ext,array('<td class="bgColor">'.$loadUnloadLink.'</td>'),$theRowClass,$inst_list,1,'index.php?CMD[importExtInfo]='.rawurlencode($extKey));
								unset($list[$extKey]);
							}
						}
					}
					unset($list);

						// CSH:
					$content.= t3lib_BEfunc::cshItem('_MOD_tools_em', 'import_ter', $GLOBALS['BACK_PATH'],'|<br/>');
					$onsubmit = "window.location.href='index.php?ter_connect=1&ter_search='+escape(this.elements['_lookUp'].value);return false;";
					$content.= '<form action="index.php" method="post" onsubmit="'.htmlspecialchars($onsubmit).'"><label for="_lookUp">List or look up <strong'.($this->MOD_SETTINGS['display_unchecked']?' style="color:#900;">all':' style="color:#090;">reviewed').'</strong> extensions</label><br />
							<input type="text" id="_lookUp" name="_lookUp" value="'.htmlspecialchars($this->listRemote_search).'" /> <input type="submit" value="Look up" /></form><br /><br />';

 					$content .= $this->browseLinks();

					$content.= '

					<!-- TER Extensions list -->
					<table border="0" cellpadding="2" cellspacing="1">'.implode(chr(10),$lines).'</table>';
 					$content .= '<br />'.$this->browseLinks();
					$content.= '<br /><br />'.$this->securityHint;
					$content.= '<br /><br /><strong>PRIVACY NOTICE:</strong><br /> '.$this->privacyNotice;

					$this->content.=$this->doc->section('Extensions in TYPO3 Extension Repository (online) - Grouped by: '.$this->MOD_MENU['listOrder'][$this->MOD_SETTINGS['listOrder']],$content,0,1);

						// Plugins which are NOT uploaded to repository but present on this server.
					$content='';
					$lines=array();
					if (count($this->inst_keys))	{
						reset($this->inst_keys);
						while(list($extKey)=each($this->inst_keys))	{
 							$this->xmlhandler->searchExtensionsXML($extKey, '', '', true);
							if((strlen($this->listRemote_search) && !stristr($extKey,$this->listRemote_search)) || isset($this->xmlhandler->extensionsXML[$extKey])) continue;

							$loadUnloadLink = t3lib_extMgm::isLoaded($extKey)?
							'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[remove]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->removeButton().'</a>':
							'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[load]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->installButton().'</a>';
							if (in_array($extKey,$this->requiredExt))	$loadUnloadLink='<strong>'.$GLOBALS['TBE_TEMPLATE']->rfw('Rq').'</strong>';
							$lines[]=$this->extensionListRow($extKey,$inst_list[$extKey],array('<td class="bgColor">'.$loadUnloadLink.'</td>'),t3lib_extMgm::isLoaded($extKey)?'em-listbg1':'em-listbg2');
						}
					}
					if(count($lines)) {
						$content.= 'This is the list of extensions which are available locally, but not in the repository.<br />They might be user-defined and should be prepended user_ then.<br /><br />';
						$content.= '<table border="0" cellpadding="2" cellspacing="1">'.
							$this->extensionListRowHeader(' class="bgColor5"',array('<td><img src="clear.gif" width="18" height="1" alt="" /></td>')).
							implode('',$lines).'</table>';
						$this->content.=$this->doc->spacer(20);
						$this->content.=$this->doc->section('Extensions found only on this server',$content,0,1);
					}
				}
			} else {
				$content.= t3lib_BEfunc::cshItem('_MOD_tools_em', 'import_ter', $GLOBALS['BACK_PATH'],'|<br/>');
				$onsubmit = "window.location.href='index.php?ter_connect=1&ter_search='+escape(this.elements['_lookUp'].value);return false;";
				$content.= '<form action="index.php" method="post" onsubmit="'.htmlspecialchars($onsubmit).'"><label for="_lookUp">List or look up <strong'.($this->MOD_SETTINGS['display_unchecked']?' style="color:#900;">all':' style="color:#090;">reviewed').'</strong> extensions</label><br />
					<input type="text" id="_lookUp" name="_lookUp" value="'.htmlspecialchars($this->listRemote_search).'" /> <input type="submit" value="Look up" /></form><br /><br />';

				$content.= '<p><strong>No matching extensions found.</strong></p>';

				$content.= '<br /><br /><strong>PRIVACY NOTICE:</strong><br /> '.$this->privacyNotice;
				$this->content.=$this->doc->section('Extensions in TYPO3 Extension Repository (online) - Grouped by: '.$this->MOD_MENU['listOrder'][$this->MOD_SETTINGS['listOrder']],$content,0,1);
			}
		} else {
				// CSH
			$content.= t3lib_BEfunc::cshItem('_MOD_tools_em', 'import', $GLOBALS['BACK_PATH'],'|<br/>');

			$onsubmit = "window.location.href='index.php?ter_connect=1&ter_search='+escape(this.elements['_lookUp'].value);return false;";
			$content.= '<form action="index.php" method="post" onsubmit="'.htmlspecialchars($onsubmit).'"><label for="_lookUp">List or look up <strong'.($this->MOD_SETTINGS['display_unchecked']?' style="color:#900;">all':' style="color:#090;">reviewed').'</strong> extensions</label><br />
			<input type="text" id="_lookUp" name="_lookUp" value="" /> <input type="submit" value="Look up" /><br /><br />';

			if ($this->CMD['fetchMetaData'])	{	// fetches mirror/extension data from online rep.
				$content .= $this->fetchMetaData($this->CMD['fetchMetaData']);
			} else {
				$onCLick = "window.location.href='index.php?CMD[fetchMetaData]=extensions';return false;";
				$content.= 'Connect to the current mirror and retrieve the current list of available plugins from the TYPO3 Extension Repository.<br />
				<input type="submit" value="Retrieve/Update" onclick="'.htmlspecialchars($onCLick).'" />';
				if (is_file(PATH_site.'typo3temp/extensions.xml.gz'))	{
					$dateFormat = $GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'];
					$timeFormat = $GLOBALS['TYPO3_CONF_VARS']['SYS']['hhmm'];
					$content.= ' (last update: '.date($dateFormat.' '.$timeFormat,filemtime(PATH_site.'typo3temp/extensions.xml.gz')).')';
				}
			}
			$content.= '</form><br /><br />'.$this->securityHint;
			$content.= '<br /><br /><strong>PRIVACY NOTICE:</strong><br />'.$this->privacyNotice;

			$this->content.=$this->doc->section('Extensions in TYPO3 Extension Repository',$content,0,1);
		}

			// Upload:
		if ($this->importAtAll())	{
			$content= '<form action="index.php" enctype="'.$GLOBALS['TYPO3_CONF_VARS']['SYS']['form_enctype'].'" method="post">
			<label for="upload_ext_file">Upload extension file (.t3x):</label><br />
				<input type="file" size="60" id="upload_ext_file" name="upload_ext_file" /><br />
				... to location:<br />
				<select name="CMD[loc]">';
			if ($this->importAsType('L'))	$content.='<option value="L">Local (../typo3conf/ext/)</option>';
			if ($this->importAsType('G'))	$content.='<option value="G">Global (typo3/ext/)</option>';
			if ($this->importAsType('S'))	$content.='<option value="S">System (typo3/sysext/)</option>';
			$content.='</select><br />
	<input type="checkbox" value="1" name="CMD[uploadOverwrite]" id="checkUploadOverwrite" /> <label for="checkUploadOverwrite">Overwrite any existing extension!</label><br />
	<input type="submit" name="CMD[uploadExt]" value="Upload extension file" /></form><br />
			';
		} else $content=$this->noImportMsg();

		$this->content.=$this->doc->spacer(20);
		$this->content.=$this->doc->section('Upload extension file directly (.t3x):',$content,0,1);
	}

	/**
	 * Generates a link to the next page of extensions
	 *
	 * @return	void
	 */
	function browseLinks()	{
		$content = '';
		if ($this->pointer)	{
			$content .= '<a href="'.t3lib_div::linkThisScript(array('pointer' => $this->pointer-1)).'" class="typo3-prevPage"><img'.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/pilleft_n.gif','width="14" height="14"').' alt="Prev page" /> Prev page</a>';
		}
		if ($content) $content .= '&nbsp;&nbsp;&nbsp;';
		if (intval($this->xmlhandler->matchingCount/$this->listingLimit)>$this->pointer)	{
			$content .= '<a href="'.t3lib_div::linkThisScript(array('pointer' => $this->pointer+1)).'" class="typo3-nextPage"><img'.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/pilright_n.gif','width="14" height="14"').' alt="Next page" /> Next page</a>';
		}
		$upper = (($this->pointer+1)*$this->listingLimit);
		if ($upper>$this->xmlhandler->matchingCount)	{
			$upper = $this->xmlhandler->matchingCount;
		}
		if ($content) $content .= '<br /><br />Showing extensions <strong>'.($this->pointer*$this->listingLimit+1).'</strong> to <strong>'.$upper.'</strong>';
		if ($content) $content .= '<br /><br />';
		return $content;
	}

	/**
	 * Allows changing of settings
	 *
	 * @return	void
	 */
	function alterSettings()	{

			// Prepare the HTML output:
		$content.= '
			'.t3lib_BEfunc::cshItem('_MOD_tools_em', 'settings', $GLOBALS['BACK_PATH'],'|<br/>').'
			<form action="index.php" method="post" name="altersettings">
			<fieldset><legend>Security Settings</legend>
			<table border="0" cellpadding="2" cellspacing="2">
				<tr class="bgColor4">
					<td><label for="display_unchecked">Enable extensions without review (basic security check):</label></td>
					<td>'.t3lib_BEfunc::getFuncCheck(0,'SET[display_unchecked]',$this->MOD_SETTINGS['display_unchecked'],'','','id="display_unchecked"').'</td>
				</tr>
			</table>
			<strong>Notice:</strong> Make sure you know what consequences enabling this checkbox might have. Check the <a href="http://typo3.org/extensions/what-are-reviews/" target="_blank">information on typo3.org about security reviewing</a>!
			</fieldset>
			<br />
			<br />
			<fieldset><legend>User Settings</legend>
			<table border="0" cellpadding="2" cellspacing="2">
				<tr class="bgColor4">
					<td><label for="set_fe_u">Enter repository username:</label></td>
					<td><input type="text" id="set_fe_u" name="SET[fe_u]" value="'.htmlspecialchars($this->MOD_SETTINGS['fe_u']).'" /></td>
				</tr>
				<tr class="bgColor4">
					<td><label for="set_fe_p">Enter repository password:</label></td>
					<td><input type="password" id="set_fe_p" name="SET[fe_p]" value="'.htmlspecialchars($this->MOD_SETTINGS['fe_p']).'" /></td>
				</tr>
			</table>
			<strong>Notice:</strong> This is <em>not</em> your password to the TYPO3 backend! This user information is what is needed to log in at typo3.org with your account there!
			</fieldset>
			<br />
			<br />
			<fieldset><legend>Mirror selection</legend>
			<table border="0" cellpadding="2" cellspacing="2">
				<tr class="bgColor4">
					<td><label for="set_mirror_list_url">Enter mirror list URL:</label></a></td>
					<td><input type="text" size="50" id="set_mirror_list_url" name="SET[mirrorListURL]" value="'.htmlspecialchars($this->MOD_SETTINGS['mirrorListURL']).'" /></td>
				</tr>
			</table>
			<br />
			<p>Select a mirror from below. This list is built from the online mirror list retrieved from the URL above.<br /><br /></p>
			<fieldset><legend>Mirror list</legend>';
		if(!empty($this->MOD_SETTINGS['mirrorListURL'])) {
			if ($this->CMD['fetchMetaData'])	{	// fetches mirror/extension data from online rep.
				$content .= $this->fetchMetaData($this->CMD['fetchMetaData']);
			} else {
				$content.= '<a href="index.php?CMD[fetchMetaData]=mirrors">Click here to reload the list.</a>';
			}
		}
		$content .= '<br />
			<table cellspacing="4" style="text-align:left; vertical-alignment:top;">
			<tr><td>Use</td><td>Name</td><td>URL</td><td>Country</td><td>Sponsored by</td></tr>
		';

		if (!strlen($this->MOD_SETTINGS['extMirrors'])) $this->fetchMetaData('mirrors');
		$extMirrors = unserialize($this->MOD_SETTINGS['extMirrors']);
		$extMirrors[''] = array('title'=>'Random (recommended!)');
		ksort($extMirrors);
		if(is_array($extMirrors)) {
			foreach($extMirrors as $k => $v) {
				if(isset($v['sponsor'])) {
					$sponsor = '<a href="'.htmlspecialchars($v['sponsor']['link']).'" target="_new"><img src="'.$v['sponsor']['logo'].'" title="'.htmlspecialchars($v['sponsor']['name']).'" alt="'.htmlspecialchars($v['sponsor']['name']).'" /></a>';
				}
				$selected = ($this->MOD_SETTINGS['selectedMirror']==$k) ? 'checked="checked"' : '';
				$content.='<tr class="bgColor4">
			<td><input type="radio" name="SET[selectedMirror]" id="selectedMirror'.$k.'" value="'.$k.'" '.$selected.'/></td><td><label for="selectedMirror'.$k.'">'.htmlspecialchars($v['title']).'</label></td><td>'.htmlspecialchars($v['host'].$v['path']).'</td><td>'.$v['country'].'</td><td>'.$sponsor.'</td></tr>';
			}
		}
		$content.= '
			</table>
			</fieldset>
			<br />
			<table border="0" cellpadding="2" cellspacing="2">
				<tr class="bgColor4">
					<td><label for="set_rep_url">Enter repository URL:</label></td>
					<td><input type="text" size="50" id="set_rep_url" name="SET[rep_url]" value="'.htmlspecialchars($this->MOD_SETTINGS['rep_url']).'" /></td>
				</tr>
			</table>

			If you set a repository URL, this overrides the use of a mirror. Use this to select a specific (private) repository.<br />
			</fieldset>
			<br />
			<input type="submit" value="Update" />
			</form>
		';

		$this->content.=$this->doc->section('Repository settings',$content,0,1);
	}

	/**
	 * Allows to set the translation preferences and check the status
	 *
	 * @return	void
	 */
	function translationHandling()	{
		global $LANG, $TYPO3_LOADED_EXT;
		$LANG->includeLLFile('EXT:setup/mod/locallang.xml');

		//prepare docheader
		$docHeaderButtons = $this->getButtons();
		$markers = array(
			'CSH' => $docHeaderButtons['csh'],
			'FUNC_MENU' => $this->getFuncMenu(),
		);


		$incoming = t3lib_div::_POST('SET');
		if(isset($incoming['selectedLanguages']) && is_array($incoming['selectedLanguages'])) {
			t3lib_BEfunc::getModuleData($this->MOD_MENU, array('selectedLanguages' => serialize($incoming['selectedLanguages'])), $this->MCONF['name'], '', 'selectedLanguages');
			$this->MOD_SETTINGS['selectedLanguages'] = serialize($incoming['selectedLanguages']);
		}

		$selectedLanguages = unserialize($this->MOD_SETTINGS['selectedLanguages']);
		if(count($selectedLanguages)==1 && empty($selectedLanguages[0])) $selectedLanguages = array();
		$theLanguages = t3lib_div::trimExplode('|',TYPO3_languages);
		foreach($theLanguages as $val)  {
			if ($val!='default')    {
				$localLabel = '  -  ['.htmlspecialchars($GLOBALS['LOCAL_LANG']['default']['lang_'.$val]).']';
				$selected = (is_array($selectedLanguages) && in_array($val, $selectedLanguages)) ? ' selected="selected"' : '';
				$opt[$GLOBALS['LOCAL_LANG']['default']['lang_'.$val].'--'.$val]='
			 <option value="'.$val.'"'.$selected.'>'.$LANG->getLL('lang_'.$val,1).$localLabel.'</option>';
			}
		}
		ksort($opt);

			// Prepare the HTML output:
		$content.= '
			'.t3lib_BEfunc::cshItem('_MOD_tools_em', 'translation', $GLOBALS['BACK_PATH'],'|<br/>').'
			<form action="index.php" method="post" name="translationform">
			<fieldset><legend>Translation Settings</legend>
			<table border="0" cellpadding="2" cellspacing="2">
				<tr class="bgColor4">
					<td>Languages to fetch:</td>
					<td>
					  <select name="SET[selectedLanguages][]" multiple="multiple" size="10">
					  <option></option>'.
			implode('',$opt).'
			</select>
		  </td>
				</tr>
			</table>
			<br />
			<p>For the selected languages the EM tries to download and install translation files if available, whenever an extension is installed. (This replaces the <code>csh_*</code> extensions that were used to install core translations before TYPO3 version 4!)<br />
			<br />To request an update/install for already loaded extensions, see below.</p>
			</fieldset>
			<br />
			<input type="submit" value="Save selection" />
			<br />
			</fieldset>
			</form>';

		$this->content.=$this->doc->section('Translation settings',$content,0,1);

		if(count($selectedLanguages)>0) {
			$mirrorURL = $this->getMirrorURL();
			$content = '<input type="button" value="Check status against repository" onclick="document.location.href=\''.t3lib_div::linkThisScript(array('l10n'=>'check')).'\'" />&nbsp;<input type="button" value="Update from repository" onclick="document.location.href=\''.t3lib_div::linkThisScript(array('l10n'=>'update')).'\'" />';

				// as this page loads dynamically, quit output buffering caused by ob_gzhandler
			$this->quitOutputBuffering();

			if(t3lib_div::_GET('l10n') == 'check') {
				$loadedExtensions = array_keys($TYPO3_LOADED_EXT);
				$loadedExtensions = array_diff($loadedExtensions,array('_CACHEFILE'));

					// Override content output - we now do that ourself:
				$this->content .= $this->doc->section('Translation status',$content,0,1);
					// Setting up the buttons and markers for docheader
				$content = $this->doc->startPage('Extension Manager');
				$content.= $this->doc->moduleBody($this->pageinfo, $docHeaderButtons, $markers);
				$contentParts=explode('###CONTENT###',$content);

				echo $contentParts[0].$this->content;

				$this->doPrintContent = FALSE;
				flush();

				echo '
				<br />
				<br />
				<p id="progress-message">
					Checking translation status, please wait ...
				</p>
				<br />
				<div style="width:100%; height:20px; border: 1px solid black;">
					<div id="progress-bar" style="float: left; width: 0%; height: 20px; background-color:green;">&nbsp;</div>
					<div id="transparent-bar" style="float: left; width: 100%; height: 20px; background-color:'.$this->doc->bgColor2.';">&nbsp;</div>
				</div>
				<br />
				<br /><p>This table shows the status of the loaded extension\'s translations.</p><br />
				<table border="0" cellpadding="2" cellspacing="2">
					<tr class="bgColor2"><td>Extension key</td>
				';

				foreach($selectedLanguages as $lang) {
					echo ('<td>'.$LANG->getLL('lang_'.$lang,1).'</td>');
				}
				echo ('</tr>');

				$counter = 1;
				foreach($loadedExtensions as $extKey) {

					$percentDone = intval (($counter / count($loadedExtensions)) * 100);
					echo ('
					<script>
						document.getElementById("progress-bar").style.width = "'.$percentDone.'%";
						document.getElementById("transparent-bar").style.width = "'.(100-$percentDone).'%";
						document.getElementById("progress-message").firstChild.data="Checking translation status for extension \"'.$extKey.'\" ...";
					</script>
					');

					flush();
					$translationStatusArr = $this->terConnection->fetchTranslationStatus($extKey,$mirrorURL);

					echo ('<tr class="bgColor4"><td>'.$extKey.'</td>');
					foreach($selectedLanguages as $lang) {
						// remote unknown -> keine l10n
						if(!isset($translationStatusArr[$lang])) {
							echo ('<td title="No translation available">N/A</td>');
							continue;
						}
							// determine local md5 from zip
						if(is_file(PATH_site.'typo3temp/'.$extKey.'-l10n-'.$lang.'.zip')) {
							$localmd5 = md5_file(PATH_site.'typo3temp/'.$extKey.'-l10n-'.$lang.'.zip');
						} else {
							echo ('<td title="Not installed / Unknown" style="background-color:#ff0">???</td>');
							continue;
						}
							// local!=remote -> needs update
						if($localmd5 != $translationStatusArr[$lang]['md5']) {
							echo ('<td title="Needs update" style="background-color:#ff0">UPD</td>');
							continue;
						}
						echo ('<td title="Is up to date" style="background-color:#69a550">OK</td>');
					}
					echo ('</tr>');

					$counter ++;
				}
				echo '</table>
					<script>
						document.getElementById("progress-message").firstChild.data="Check done.";
					</script>
				';
				echo $contentParts[1] . $this->doc->endPage();
				exit;

			} elseif(t3lib_div::_GET('l10n') == 'update') {
				$loadedExtensions = array_keys($TYPO3_LOADED_EXT);
				$loadedExtensions = array_diff($loadedExtensions,array('_CACHEFILE'));

					// Override content output - we now do that ourself:
				$this->content .= $this->doc->section('Translation status',$content,0,1);
					// Setting up the buttons and markers for docheader
				$content = $this->doc->startPage('Extension Manager');
				$content.= $this->doc->moduleBody($this->pageinfo, $docHeaderButtons, $markers);
				$contentParts=explode('###CONTENT###',$content);

				echo $contentParts[0].$this->content;

				$this->doPrintContent = FALSE;
				flush();

				echo ('
				<br />
				<br />
				<p id="progress-message">
					Updating translations, please wait ...
				</p>
				<br />
				<div style="width:100%; height:20px; border: 1px solid black;">
					<div id="progress-bar" style="float: left; width: 0%; height: 20px; background-color:green;">&nbsp;</div>
					<div id="transparent-bar" style="float: left; width: 100%; height: 20px; background-color:'.$this->doc->bgColor2.';">&nbsp;</div>
				</div>
				<br />
				<br /><p>This table shows the update results of the loaded extension\'s translations.<br />
				<em>If you want to force a full check/update, delete the l10n zip-files from the typo3temp folder.</em></p><br />
				<table border="0" cellpadding="2" cellspacing="2">
					<tr class="bgColor2"><td>Extension key</td>
				');

				foreach($selectedLanguages as $lang) {
					echo '<td>'.$LANG->getLL('lang_'.$lang,1).'</td>';
				}
				echo '</tr>';

				$counter = 1;
				foreach($loadedExtensions as $extKey) {
					$percentDone = intval (($counter / count($loadedExtensions)) * 100);
					echo ('
					<script>
						document.getElementById("progress-bar").style.width = "'.$percentDone.'%";
						document.getElementById("transparent-bar").style.width = "'.(100-$percentDone).'%";
						document.getElementById("progress-message").firstChild.data="Updating translation for extension \"'.$extKey.'\" ...";
					</script>
					');

					flush();
					$translationStatusArr = $this->terConnection->fetchTranslationStatus($extKey,$mirrorURL);

					echo ('<tr class="bgColor4"><td>'.$extKey.'</td>');
					if(is_array($translationStatusArr)) {
						foreach($selectedLanguages as $lang) {
								// remote unknown -> no l10n available
							if(!isset($translationStatusArr[$lang])) {
								echo ('<td title="No translation available">N/A</td>');
								continue;
							}
								// determine local md5 from zip
							if(is_file(PATH_site.'typo3temp/'.$extKey.'-l10n-'.$lang.'.zip')) {
								$localmd5 = md5_file(PATH_site.'typo3temp/'.$extKey.'-l10n-'.$lang.'.zip');
							} else {
								$localmd5 = 'zzz';
							}
								// local!=remote or not installed -> needs update
							if($localmd5 != $translationStatusArr[$lang]['md5']) {
								$ret = $this->updateTranslation($extKey, $lang, $mirrorURL);
								if($ret === true) {
									echo ('<td title="Has been updated" style="background-color:#69a550">UPD</td>');
								} else {
									echo ('<td title="'.htmlspecialchars($ret).'" style="background-color:#cb3352">ERR</td>');
								}
								continue;
							}
							echo ('<td title="Is up to date" style="background-color:#69a550">OK</td>');
						}
					} else {
						echo ('<td colspan="'.count($selectedLanguages).'" title="Possible reasons: network problems, allow_url_fopen off, curl not enabled in Install tool.">Could not fetch translation status</td>');
					}
					echo ('</tr>');
					$counter++;
				}
				echo '</table>
					<script>
						document.getElementById("progress-message").firstChild.data="Update done.";
					</script>
				';
				echo $contentParts[1] . $this->doc->endPage();
				exit;
			}

			$this->content.=$this->doc->section('Translation status',$content,0,1);
		}
	}

	/**
	 * Install translations for all selected languages for an extension
	 *
	 * @param string $extKey		The extension key to install the translations for
	 * @param string $lang		Language code of translation to fetch
	 * @param string $mirrorURL		Mirror URL to fetch data from
	 * @return mixed	true on success, error string on fauilure
	 */
	function updateTranslation($extKey, $lang, $mirrorURL) {
		$l10n = $this->terConnection->fetchTranslation($extKey, $lang, $mirrorURL);
		if(is_array($l10n)) {
			$file = PATH_site.'typo3temp/'.$extKey.'-l10n-'.$lang.'.zip';
			$path = 'l10n/'.$lang.'/';
			if(!is_dir(PATH_typo3conf.$path)) t3lib_div::mkdir_deep(PATH_typo3conf,$path);
			t3lib_div::writeFile($file, $l10n[0]);
			if($this->unzip($file, PATH_typo3conf.$path)) {
				return true;
			} else {
				return 'Unpacking the language pack failed!';
			}
		} else {
			return $l10n;
		}
	}

	/**
	 * Install translations for all selected languages for an extension
	 *
	 * @param string $extKey		The extension key to install the translations for
	 * @param string $mirrorURL		Mirror URL to fetch data from
	 * @return mixed	true on success, error string on fauilure
	 */
	function installTranslationsForExtension($extKey, $mirrorURL) {
		$selectedLanguages = unserialize($this->MOD_SETTINGS['selectedLanguages']);
		if(!is_array($selectedLanguages)) $selectedLanguages = array();
		foreach($selectedLanguages as $lang) {
			$l10n = $this->terConnection->fetchTranslation($extKey, $lang, $mirrorURL);
			if(is_array($l10n)) {
				$file = PATH_typo3conf.'l10n/'.$extKey.'-l10n-'.$lang.'.zip';
				$path = 'l10n/'.$lang.'/'.$extKey;
				t3lib_div::writeFile($file, $l10n[0]);
				if(!is_dir(PATH_typo3conf.$path)) t3lib_div::mkdir_deep(PATH_typo3conf,$path);
				if($this->unzip($file, PATH_typo3conf.$path)) {
					return true;
				} else {
					return 'Unpacking the language pack failed!';
				}
			} else {
				return $l10n;
			}
		}
	}

	/**
	 * Unzips a zip file in the given path.
	 *
	 * Uses unzip binary if available, otherwise a pure PHP unzip is used.
	 *
	 * @param string $file		Full path to zip file
	 * @param string $path		Path to change to before extracting
	 * @return boolean	True on success, false in failure
	 */
	function unzip($file, $path) {
		if(strlen($GLOBALS['TYPO3_CONF_VARS']['BE']['unzip_path'])) {
			chdir($path);
			$cmd = $GLOBALS['TYPO3_CONF_VARS']['BE']['unzip_path'].' -o '.escapeshellarg($file);
			exec($cmd, $list, $ret);
			return ($ret === 0);
		} else {
				// we use a pure PHP unzip
			$unzip = new em_unzip($file);
			$ret = $unzip->extract(array('add_path'=>$path));
			return (is_array($ret));
		}
	}



	/*********************************
	*
	* Command Applications (triggered by GET var)
	*
	*********************************/

	/**
	 * Returns detailed info about an extension in the online repository
	 *
	 * @param	string		Extension repository uid + optional "private key": [uid]-[key].
	 * @param	[type]		$version: ...
	 * @return	void
	 */
	function importExtInfo($extKey, $version='')	{

		$content = '<form action="index.php" method="post" name="pageform">';

			// Fetch remote data:
		$this->xmlhandler->searchExtensionsXML($extKey, '', '', true, true);
		list($fetchData,) = $this->prepareImportExtList(true);

		$versions = array_keys($fetchData[$extKey]['versions']);
		$version = ($version == '') ? end($versions) : $version;

		$opt = array();
		foreach(array_keys($fetchData[$extKey]['versions']) as $ver)	{
			$opt[]='<option value="'.$ver.'"'.(($version == $ver) ? ' selected="selected"' : '').'>'.$ver.'</option>';
		}

			// "Select version" box:
		$onClick = 'window.location.href=\'index.php?CMD[importExtInfo]='.$extKey.'&CMD[extVersion]=\'+document.pageform.extVersion.options[document.pageform.extVersion.selectedIndex].value; return false;';
		$select='<select name="extVersion">'.implode('',$opt).'</select> <input type="submit" value="Load details" onclick="'.htmlspecialchars($onClick).'" /> or<br /><br />';

		if ($this->importAtAll())	{
			$onClick = '
					window.location.href=\'index.php?CMD[importExt]='.$extKey.'\'
						+\'&CMD[extVersion]=\'+document.pageform.extVersion.options[document.pageform.extVersion.selectedIndex].value
						+\'&CMD[loc]=\'+document.pageform.loc.options[document.pageform.loc.selectedIndex].value;
						return false;';
			$select.='
				<input type="submit" value="Import/Update" onclick="'.htmlspecialchars($onClick).'"> to:
				<select name="loc">'.
				($this->importAsType('G',$fetchData['emconf_lockType'])?'<option value="G">Global: '.$this->typePaths['G'].$extKey.'/'.(@is_dir(PATH_site.$this->typePaths['G'].$extKey)?' (OVERWRITE)':' (empty)').'</option>':'').
				($this->importAsType('L',$fetchData['emconf_lockType'])?'<option value="L">Local: '.$this->typePaths['L'].$extKey.'/'.(@is_dir(PATH_site.$this->typePaths['L'].$extKey)?' (OVERWRITE)':' (empty)').'</option>':'').
				($this->importAsType('S',$fetchData['emconf_lockType'])?'<option value="S">System: '.$this->typePaths['S'].$extKey.'/'.(@is_dir(PATH_site.$this->typePaths['S'].$extKey)?' (OVERWRITE)':' (empty)').'</option>':'').
				'</select>
				</form>';
		} else $select.= $this->noImportMsg();
		$content.= $select;
		$this->content.= $this->doc->section('Select command',$content,0,1);

			// Details:
		$eInfo = $fetchData[$extKey]['versions'][$version];
		$content='<strong>'.$fetchData[$extKey]['_ICON'].' &nbsp;'.$eInfo['EM_CONF']['title'].' ('.$extKey.', '.$version.')</strong><br /><br />';
		$content.=$this->extInformationArray($extKey,$eInfo,1);
		$this->content.=$this->doc->spacer(10);
		$this->content.=$this->doc->section('Remote Extension Details',$content,0,1);
	}

	/**
	 * Fetches metadata and stores it to the corresponding place. This includes the mirror list,
	 * extension XML files.
	 *
	 * @param	string		Type of data to fetch: (mirrors)
	 * @param	boolean		If true the method doesn't produce any output
	 * @return	void
	 */
	function fetchMetaData($metaType)	{
		global $TYPO3_CONF_VARS;

		switch($metaType) {
			case 'mirrors':
				$mfile = t3lib_div::tempnam('mirrors');
				$mirrorsFile = t3lib_div::getURL($this->MOD_SETTINGS['mirrorListURL'], 0, array(TYPO3_user_agent));
				if($mirrorsFile===false) {
					t3lib_div::unlink_tempfile($mfile);
					$content = '<p>The mirror list was not updated, it could not be fetched from '.$this->MOD_SETTINGS['mirrorListURL'].'. Possible reasons: network problems, allow_url_fopen is off, curl is not enabled in Install tool.</p>';
				} else {
					t3lib_div::writeFile($mfile, $mirrorsFile);
					$mirrors = implode('',gzfile($mfile));
					t3lib_div::unlink_tempfile($mfile);

					$mirrors = $this->xmlhandler->parseMirrorsXML($mirrors);
					if(is_array($mirrors) && count($mirrors)) {
						t3lib_BEfunc::getModuleData($this->MOD_MENU, array('extMirrors' => serialize($mirrors)), $this->MCONF['name'], '', 'extMirrors');
						$this->MOD_SETTINGS['extMirrors'] = serialize($mirrors);
						$content = '<p>The mirror list has been updated and now contains '.count($mirrors).' entries.</p>';
					}
					else {
						$content = '<p>'.$mirrors.'<br />The mirror list was not updated as it contained no entries.</p>';
					}
				}
				break;
			case 'extensions':
				$this->fetchMetaData('mirrors'); // if we fetch the extensions anyway, we can as well keep this up-to-date

				$mirror = $this->getMirrorURL();
				$extfile = $mirror.'extensions.xml.gz';
				$extmd5 = t3lib_div::getURL($mirror.'extensions.md5', 0, array(TYPO3_user_agent));
				if (is_file(PATH_site.'typo3temp/extensions.xml.gz')) {
					$localmd5 = md5_file(PATH_site.'typo3temp/extensions.xml.gz');
				}

				if($extmd5 === false) {
					$content .= '<p>Error: The extension MD5 sum could not be fetched from '.$mirror.'extensions.md5. Possible reasons: network problems, allow_url_fopen is off, curl is not enabled in Install tool.</p>';
				} elseif($extmd5 == $localmd5) {
					$content .= '<p>The extension list has not changed remotely, it has thus not been fetched.</p>';
				} else {
					$extXML = t3lib_div::getURL($extfile, 0, array(TYPO3_user_agent));
					if($extXML === false) {
						$content .= '<p>Error: The extension list could not be fetched from '.$extfile.'. Possible reasons: network problems, allow_url_fopen is off, curl is not enabled in Install tool.</p>';
					} else {
						t3lib_div::writeFile(PATH_site.'typo3temp/extensions.xml.gz', $extXML);
						$content .= $this->xmlhandler->parseExtensionsXML(PATH_site.'typo3temp/extensions.xml.gz');
					}
				}
				break;
		}

		return $content;
	}

	/**
	 * Returns the base URL for the slected or a random mirror.
	 *
	 * @return	string		The URL for the selected or a random mirror
	 */
	function getMirrorURL() {
		if(strlen($this->MOD_SETTINGS['rep_url'])) return $this->MOD_SETTINGS['rep_url'];

		$mirrors = unserialize($this->MOD_SETTINGS['extMirrors']);
		if(!is_array($mirrors)) {
			$this->fetchMetaData('mirrors');
			$mirrors = unserialize($this->MOD_SETTINGS['extMirrors']);
			if(!is_array($mirrors)) return false;
		}
		if($this->MOD_SETTINGS['selectedMirror']=='') {
			srand((float) microtime() * 10000000); // not needed after PHP 4.2.0...
			$rand = array_rand($mirrors);
			$url = 'http://'.$mirrors[$rand]['host'].$mirrors[$rand]['path'];
		}
		else {
			$url = 'http://'.$mirrors[$this->MOD_SETTINGS['selectedMirror']]['host'].$mirrors[$this->MOD_SETTINGS['selectedMirror']]['path'];
		}

		return $url;
	}



	/**
	 * Installs (activates) an extension
	 *
	 * For $mode use the three constants EM_INSTALL_VERSION_MIN, EM_INSTALL_VERSION_MAX, EM_INSTALL_VERSION_STRICT
	 *
	 * If an extension is loaded or imported already and the version requirement is matched, it will not be
	 * fetched from the repository. This means, if you use EM_INSTALL_VERSION_MIN, you will not always get the latest
	 * version of an extension!
	 *
	 * @param	string		$extKey	The extension key to install
	 * @param	string		$version	A version number that should be installed
	 * @param	int		$mode	If a version is requested, this determines if it is the min, max or strict version requested
	 * @return	[type]		...
	 * @todo Make the method able to handle needed interaction somehow (unmatched dependencies)
	 */
	function installExtension($extKey, $version=null, $mode=EM_INSTALL_VERSION_MIN) {
		list($inst_list,) = $this->getInstalledExtensions();

			// check if it is already installed and loaded with sufficient version
		if(isset($inst_list[$extKey])) {
			$currentVersion = $inst_list[$extKey]['EM_CONF']['version'];

			if(t3lib_extMgm::isLoaded($extKey)) {
				if($version===null) {
					return array(true, 'Extension already installed and loaded.');
				} else {
					switch($mode) {
						case EM_INSTALL_VERSION_STRICT:
							if ($currentVersion == $version)	{
								return array(true, 'Extension already installed and loaded.');
							}
							break;
						case EM_INSTALL_VERSION_MIN:
							if (version_compare($currentVersion, $version, '>='))	{
								return array(true, 'Extension already installed and loaded.');
							}
							break;
						case EM_INSTALL_VERSION_MAX:
							if (version_compare($currentVersion, $version, '<='))	{
								return array(true, 'Extension already installed and loaded.');
							}
							break;
					}
				}
			} else {
				if (!t3lib_extMgm::isLocalconfWritable())	{
					return array(false, 'localconf.php is not writable!');
				}
				$newExtList = -1;
				switch($mode) {
					case EM_INSTALL_VERSION_STRICT:
						if ($currentVersion == $version)	{
							$newExtList = $this->addExtToList($extKey, $inst_list);
						}
						break;
					case EM_INSTALL_VERSION_MIN:
						if (version_compare($currentVersion, $version, '>='))	{
							$newExtList = $this->addExtToList($extKey, $inst_list);
						}
						break;
					case EM_INSTALL_VERSION_MAX:
						if (version_compare($currentVersion, $version, '<='))	{
							$newExtList = $this->addExtToList($extKey, $inst_list);
						}
						break;
				}
				if ($newExtList!=-1)	{
					$this->writeNewExtensionList($newExtList);
					$this->refreshGlobalExtList();
					$this->forceDBupdates($extKey, $inst_list[$extKey]);
					return array(true, 'Extension was already installed, it has been loaded.');
				}
			}
		}

			// at this point we know we need to import (a matching version of) the extension from TER2

			// see if we have an extensionlist at all
		if (!$this->xmlhandler->countExtensions())	{
			$this->fetchMetaData('extensions');
		}
		$this->xmlhandler->searchExtensionsXML($extKey, '', '', true);

			// check if extension can be fetched
		if(isset($this->xmlhandler->extensionsXML[$extKey])) {
			$versions = array_keys($this->xmlhandler->extensionsXML[$extKey]['versions']);
			$latestVersion = end($versions);
			switch($mode) {
				case EM_INSTALL_VERSION_STRICT:
					if(!isset($this->xmlhandler->extensionsXML[$extKey]['versions'][$version])) {
						return array(false, 'Extension not available in matching version');
					}
					break;
				case EM_INSTALL_VERSION_MIN:
					if (version_compare($latestVersion, $version, '>='))	{
						$version = $latestVersion;
					} else {
						return array(false, 'Extension not available in matching version');
					}
					break;
				case EM_INSTALL_VERSION_MAX:
					while (($v = array_pop($versions)) && version_compare($v, $version, '>='))	{
						// Loop until a version is found
					}

					if ($v !== null && version_compare($v, $version, '<='))	{
						$version = $v;
					} else {
						return array(false, 'Extension not available in matching version');
					}
					break;
			}
			$this->importExtFromRep($extKey, $version, 'L');
			$newExtList = $this->addExtToList($extKey, $inst_list);
			if ($newExtList!=-1)	{
				$this->writeNewExtensionList($newExtList);
				$this->refreshGlobalExtList();
				$this->forceDBupdates($extKey, $inst_list[$extKey]);
				$this->installTranslationsForExtension($extKey, $this->getMirrorURL());
				return array(true, 'Extension has been imported from repository and loaded.');
			} else {
				return array(false, 'Extension is in repository, but could not be loaded.');
			}
		} else {
			return array(false, 'Extension not available in repository');
		}
	}

	function refreshGlobalExtList() {
		global $TYPO3_LOADED_EXT;

		$TYPO3_LOADED_EXT = t3lib_extMgm::typo3_loadExtensions();
		if ($TYPO3_LOADED_EXT['_CACHEFILE'])    {
			require(PATH_typo3conf.$TYPO3_LOADED_EXT['_CACHEFILE'].'_ext_localconf.php');
		}
		return;

		$GLOBALS['TYPO3_LOADED_EXT'] = t3lib_extMgm::typo3_loadExtensions();
		if ($TYPO3_LOADED_EXT['_CACHEFILE'])    {
			require(PATH_typo3conf.$TYPO3_LOADED_EXT['_CACHEFILE'].'_ext_localconf.php');
		} else {
			$temp_TYPO3_LOADED_EXT = $TYPO3_LOADED_EXT;
			reset($temp_TYPO3_LOADED_EXT);
			while(list($_EXTKEY,$temp_lEDat)=each($temp_TYPO3_LOADED_EXT))  {
				if (is_array($temp_lEDat) && $temp_lEDat['ext_localconf.php'])  {
					$_EXTCONF = $TYPO3_CONF_VARS['EXT']['extConf'][$_EXTKEY];
					require($temp_lEDat['ext_localconf.php']);
				}
			}
		}
	}


	/**
	 * Imports an extensions from the online repository
	 * NOTICE: in version 4.0 this changed from "importExtFromRep_old($extRepUid,$loc,$uploadFlag=0,$directInput='',$recentTranslations=0,$incManual=0,$dontDelete=0)"
	 *
	 * @param	string		Extension key
	 * @param	string		Version
	 * @param	string		Install scope: "L" or "G" or "S"
	 * @param	boolean		If true, extension is uploaded as file
	 * @param	boolean		If true, extension directory+files will not be deleted before writing the new ones. That way custom files stored in the extension folder will be kept.
	 * @param	array		Direct input array (like from kickstarter)
	 * @return	string		Return false on success, returns error message if error.
	 */
	function importExtFromRep($extKey,$version,$loc,$uploadFlag=0,$dontDelete=0,$directInput='')	{

		$uploadSucceed = false;
		$uploadedTempFile = '';
		if (is_array($directInput))	{
			$fetchData = array($directInput,'');
			$loc = ($loc==='G'||$loc==='S') ? $loc : 'L';
		} elseif ($uploadFlag)	{
			if (($uploadedTempFile = $this->CMD['alreadyUploaded']) || $_FILES['upload_ext_file']['tmp_name'])	{

					// Read uploaded file:
				if (!$uploadedTempFile)	{
					if (!is_uploaded_file($_FILES['upload_ext_file']['tmp_name'])) {
 						t3lib_div::sysLog('Possible file upload attack: '.$_FILES['upload_ext_file']['tmp_name'], 'Extension Manager', 3);

						return 'File was not uploaded?!?';
					}

					$uploadedTempFile = t3lib_div::upload_to_tempfile($_FILES['upload_ext_file']['tmp_name']);
				}
				$fileContent = t3lib_div::getUrl($uploadedTempFile);

				if (!$fileContent)	return 'File is empty!';

					// Decode file data:
				$fetchData = $this->terConnection->decodeExchangeData($fileContent);

				if (is_array($fetchData))	{
					$extKey = $fetchData[0]['extKey'];
					if ($extKey)	{
						if (!$this->CMD['uploadOverwrite'])	{
							$loc = ($loc==='G'||$loc==='S') ? $loc : 'L';
							$comingExtPath = PATH_site.$this->typePaths[$loc].$extKey.'/';
							if (@is_dir($comingExtPath))	{
								return 'Extension was already present in "'.$comingExtPath.'" - and the overwrite flag was not set! So nothing done...';
							}	// ... else go on, install...
						}	// ... else go on, install...
					} else return 'No extension key in file. Strange...';
				} else return 'Wrong file format. No data recognized, '.$fetchData;
			} else return 'No file uploaded! Probably the file was too large for PHPs internal limit for uploadable files.';
		} else {
			$this->xmlhandler->searchExtensionsXML($extKey, '', '', true, true);

				// Fetch extension from TER:
			if(!strlen($version)) {
				$versions = array_keys($this->xmlhandler->extensionsXML[$extKey]['versions']);
				$version = end($versions);
			}
			$fetchData = $this->terConnection->fetchExtension($extKey, $version, $this->xmlhandler->extensionsXML[$extKey]['versions'][$version]['t3xfilemd5'], $this->getMirrorURL());
		}

		// At this point the extension data should be present; so we want to write it to disc:
		if ($this->importAsType($loc))	{
			if (is_array($fetchData))	{	// There was some data successfully transferred
				if ($fetchData[0]['extKey'] && is_array($fetchData[0]['FILES']))	{
					$extKey = $fetchData[0]['extKey'];
					if(!isset($fetchData[0]['EM_CONF']['constraints'])) $fetchData[0]['EM_CONF']['constraints'] = $this->xmlhandler->extensionsXML[$extKey]['versions'][$version]['dependencies'];
					$EM_CONF = $this->fixEMCONF($fetchData[0]['EM_CONF']);
					if (!$EM_CONF['lockType'] || !strcmp($EM_CONF['lockType'],$loc))	{
							// check dependencies, act accordingly if ext is loaded
						list($instExtInfo,)=$this->getInstalledExtensions();
						$depStatus = $this->checkDependencies($extKey, $EM_CONF, $instExtInfo);
						if(t3lib_extMgm::isLoaded($extKey) && !$depStatus['returnCode']) {
							$this->content .= $depStatus['html'];
							if ($uploadedTempFile)	{
								$this->content .= '<input type="hidden" name="CMD[alreadyUploaded]" value="'.$uploadedTempFile.'" />';
							}
						} else {
							$res = $this->clearAndMakeExtensionDir($fetchData[0],$loc,$dontDelete);
							if (is_array($res))	{
								$extDirPath = trim($res[0]);
								if ($extDirPath && @is_dir($extDirPath) && substr($extDirPath,-1)=='/')	{

									$emConfFile = $this->construct_ext_emconf_file($extKey,$EM_CONF);
									$dirs = $this->extractDirsFromFileList(array_keys($fetchData[0]['FILES']));

									$res = $this->createDirsInPath($dirs,$extDirPath);
									if (!$res)	{
										$writeFiles = $fetchData[0]['FILES'];
										$writeFiles['ext_emconf.php']['content'] = $emConfFile;
										$writeFiles['ext_emconf.php']['content_md5'] = md5($emConfFile);

											// Write files:
										foreach($writeFiles as $theFile => $fileData)	{
											t3lib_div::writeFile($extDirPath.$theFile,$fileData['content']);
											if (!@is_file($extDirPath.$theFile))	{
												$content.='Error: File "'.$extDirPath.$theFile.'" could not be created!!!<br />';
											} elseif (md5(t3lib_div::getUrl($extDirPath.$theFile)) != $fileData['content_md5']) {
												$content.='Error: File "'.$extDirPath.$theFile.'" MD5 was different from the original files MD5 - so the file is corrupted!<br />';
											}
										}

											// No content, no errors. Create success output here:
										if (!$content)	{
											$content='SUCCESS: '.$extDirPath.'<br />';

											$uploadSucceed = true;

												// Fix TYPO3_MOD_PATH for backend modules in extension:
											$modules = t3lib_div::trimExplode(',',$EM_CONF['module'],1);
											if (count($modules))	{
												foreach($modules as $mD)	{
													$confFileName = $extDirPath.$mD.'/conf.php';
													if (@is_file($confFileName))	{
														$content.= $this->writeTYPO3_MOD_PATH($confFileName,$loc,$extKey.'/'.$mD.'/').'<br />';
													} else $content.='Error: Couldn\'t find "'.$confFileName.'"<br />';
												}
											}
												// NOTICE: I used two hours trying to find out why a script, ext_emconf.php, written twice and in between included by PHP did not update correct the second time. Probably something with PHP-A cache and mtime-stamps.
												// But this order of the code works.... (using the empty Array with type, EMCONF and files hereunder).

												// Writing to ext_emconf.php:
											$sEMD5A = $this->serverExtensionMD5Array($extKey,array('type' => $loc, 'EM_CONF' => array(), 'files' => array()));
											$EM_CONF['_md5_values_when_last_written'] = serialize($sEMD5A);
											$emConfFile = $this->construct_ext_emconf_file($extKey,$EM_CONF);
											t3lib_div::writeFile($extDirPath.'ext_emconf.php',$emConfFile);

											$content.='ext_emconf.php: '.$extDirPath.'ext_emconf.php<br />';
											$content.='Type: '.$loc.'<br />';

												// Remove cache files:
											if (t3lib_extMgm::isLoaded($extKey))	{
												if ($this->removeCacheFiles())	{
													$content.='Cache-files are removed and will be re-written upon next hit<br />';
												}

												list($new_list)=$this->getInstalledExtensions();
												$content.=$this->updatesForm($extKey,$new_list[$extKey],1,'index.php?CMD[showExt]='.$extKey.'&SET[singleDetails]=info');
											}

												// Install / Uninstall:
											if(!$this->CMD['standAlone']) {
												$content.='<h3>Install / Uninstall Extension:</h3>';
												$content.= $new_list[$extKey] ?
													'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[remove]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->removeButton().' Uninstall extension</a>' :
													'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[load]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->installButton().' Install extension</a>';
											} else {
												$content = 'Extension has been imported.<br /><br /><a href="javascript:opener.top.content.document.forms[0].submit();window.close();">Close window and recheck dependencies</a>';
											}

										}
									} else $content = $res;
								} else $content = 'Error: The extension path "'.$extDirPath.'" was different than expected...';
							} else $content = $res;
						}
					} else $content = 'Error: The extension can only be installed in the path '.$this->typePaths[$EM_CONF['lockType']].' (lockType='.$EM_CONF['lockType'].')';
				} else $content = 'Error: No extension key!!! Why? - nobody knows... (Or no files in the file-array...)';
			}  else $content = 'Error: The datatransfer did not succeed. '.$fetchData;
		}  else $content = 'Error: Installation is not allowed in this path ('.$this->typePaths[$loc].')';

		$this->content.=$this->doc->section('Extension import results',$content,0,1);

		if ($uploadSucceed && $uploadedTempFile)	{
			t3lib_div::unlink_tempfile($uploadedTempFile);
		}

		return false;
	}

	/**
	 * Display extensions details.
	 *
	 * @param	string		Extension key
	 * @return	void		Writes content to $this->content
	 */
	function showExtDetails($extKey)	{
		global $TYPO3_LOADED_EXT;

		list($list,)=$this->getInstalledExtensions();
		$absPath = $this->getExtPath($extKey,$list[$extKey]['type']);

		// Check updateModule:
		if (isset($list[$extKey]) && @is_file($absPath.'class.ext_update.php'))	{
			require_once($absPath.'class.ext_update.php');
			$updateObj = new ext_update;
			if (!$updateObj->access())	{
				unset($this->MOD_MENU['singleDetails']['updateModule']);
			}
		} else {
			unset($this->MOD_MENU['singleDetails']['updateModule']);
		}

		if($this->CMD['doDelete']) {
			$this->MOD_MENU['singleDetails'] = array();
		}

			// Function menu here:
		if(!$this->CMD['standAlone'] && !t3lib_div::_GP('standAlone')) {
			$content = 'Extension:&nbsp;<strong>' . $this->extensionTitleIconHeader($extKey, $list[$extKey]) . '</strong> (' . htmlspecialchars($extKey) . ')';
			$this->content.= $this->doc->section('', $content);
		}

			// Show extension details:
		if ($list[$extKey])	{

				// Checking if a command for install/uninstall is executed:
			if (($this->CMD['remove'] || $this->CMD['load']) && !in_array($extKey,$this->requiredExt))	{

					// Install / Uninstall extension here:
				if (t3lib_extMgm::isLocalconfWritable())	{
						// Check dependencies:
					$depStatus = $this->checkDependencies($extKey, $list[$extKey]['EM_CONF'], $list);
					if(!$this->CMD['remove'] && !$depStatus['returnCode']) {
						$this->content .= $depStatus['html'];
						$newExtList = -1;
					} elseif ($this->CMD['remove'])	{
						$newExtList = $this->removeExtFromList($extKey,$list);
					} else {
						$newExtList = $this->addExtToList($extKey,$list);
					}

					// Success-installation:
					if ($newExtList!=-1)	{
						$updates = '';
						if ($this->CMD['load'])	{
							if($_SERVER['REQUEST_METHOD'] == 'POST') {
								$script = t3lib_div::linkThisScript(array('CMD[showExt]' => $extKey, 'CMD[load]' => 1, 'CMD[clrCmd]' => $this->CMD['clrCmd'], 'SET[singleDetails]' => 'info'));
							} else {
								$script = '';
							}
							if($this->CMD['standAlone']) {
								$standaloneUpdates = '<input type="hidden" name="standAlone" value="1" />';
							}
							$depsolver = t3lib_div::_POST('depsolver');
							if(is_array($depsolver['ignore'])) {
								foreach($depsolver['ignore'] as $depK => $depV)	{
									$dependencyUpdates .= '<input type="hidden" name="depsolver[ignore]['.$depK.']" value="1" />';
								}
							}
							$updatesForm = $this->updatesForm($extKey,$list[$extKey],1,$script, $dependencyUpdates.$standaloneUpdates.'<input type="hidden" name="_do_install" value="1" /><input type="hidden" name="_clrCmd" value="'.$this->CMD['clrCmd'].'" />');
							if ($updatesForm) {
								$updates = 'Before the extension can be installed the database needs to be updated with new tables or fields. Please select which operations to perform:'.$updatesForm;
								$this->content.=$this->doc->section('Installing '.$this->extensionTitleIconHeader($extKey,$list[$extKey]).strtoupper(': Database needs to be updated'),$updates,1,1,1,1);
							}
						} elseif ($this->CMD['remove']) {
							$updates.= $this->checkClearCache($list[$extKey]);
							if ($updates)	{
								$updates = '
								<form action="'.t3lib_div::linkThisScript().'" method="post">'.$updates.'
								<br /><input type="submit" name="write" value="Remove extension" />
								<input type="hidden" name="_do_install" value="1" />
								<input type="hidden" name="_clrCmd" value="'.$this->CMD['clrCmd'].'" />
								<input type="hidden" name="standAlone" value="'.$this->CMD['standAlone'].'" />
								</form>';
								$this->content.=$this->doc->section('Removing '.$this->extensionTitleIconHeader($extKey,$list[$extKey]).strtoupper(': Database needs to be updated'),$updates,1,1,1,1);
							}
						}
						if (!$updates || t3lib_div::_GP('_do_install')) {
							$this->writeNewExtensionList($newExtList);
							$GLOBALS['BE_USER']->writelog(5,1,0,0,'Extension list has been changed, extension %s has been %s',array($extKey,($this->CMD['load']?'installed':'removed')));
							if ($this->CMD['clrCmd'] || t3lib_div::_GP('_clrCmd'))	{
								if ($this->CMD['load'] && @is_file($absPath.'ext_conf_template.txt')) {
									$vA = array('CMD'=>Array('showExt'=>$extKey));
								} else {
									$vA = array('CMD'=>'');
								}
							} else {
								$vA = array('CMD'=>Array('showExt'=>$extKey));
							}
							if($this->CMD['standAlone'] || t3lib_div::_GP('standAlone')) {
								$this->content .= 'Extension has been '.($this->CMD['load'] ? 'installed' : 'removed').'.<br /><br /><a href="javascript:opener.top.content.document.forms[0].submit();window.close();">Close window and recheck dependencies</a>';
							} else {
									// Determine if new modules were installed:
								$techInfo = $this->makeDetailedExtensionAnalysis($extKey, $list[$extKey]);
								if (($this->CMD['load'] || $this->CMD['remove']) && is_array($techInfo['flags']) && in_array('Module', $techInfo['flags'], true)) {
									$vA['CMD']['refreshMenu'] = 1;
								}
								header('Location: '.t3lib_div::linkThisScript($vA));
							}
						}
					}
				} else {
					$this->content.=$this->doc->section('Installing '.$this->extensionTitleIconHeader($extKey,$list[$extKey]).strtoupper(': Write access error'),'typo3conf/localconf.php seems not to be writable, so the extension cannot be installed automatically!',1,1,2,1);
				}

			} elseif ($this->CMD['downloadFile'] && !in_array($extKey,$this->requiredExt))	{

				// Link for downloading extension has been clicked - deliver content stream:
				$dlFile = $this->CMD['downloadFile'];
				if (t3lib_div::isAllowedAbsPath($dlFile) && t3lib_div::isFirstPartOfStr($dlFile, PATH_site) && t3lib_div::isFirstPartOfStr($dlFile, $absPath) && @is_file($dlFile)) {
					$mimeType = 'application/octet-stream';
					Header('Content-Type: '.$mimeType);
					Header('Content-Disposition: attachment; filename='.basename($dlFile));
					echo t3lib_div::getUrl($dlFile);
					exit;
				} else die('Error while trying to download extension file...');

			} elseif ($this->CMD['editFile'] && !in_array($extKey,$this->requiredExt))	{

				// Editing extension file:
				$editFile = $this->CMD['editFile'];
				if (t3lib_div::isAllowedAbsPath($editFile) && t3lib_div::isFirstPartOfStr($editFile, $absPath)) {

					$fI = t3lib_div::split_fileref($editFile);
					if (@is_file($editFile) && t3lib_div::inList($this->editTextExtensions,($fI['fileext']?$fI['fileext']:$fI['filebody'])))	{
						if (filesize($editFile)<($this->kbMax*1024))	{
							$outCode = '<form action="index.php" method="post" name="editfileform">';
							$info = '';
							$submittedContent = t3lib_div::_POST('edit');
							$saveFlag = 0;

							if(isset($submittedContent['file']) && !$GLOBALS['TYPO3_CONF_VARS']['EXT']['noEdit'])	{		// Check referer here?
								$oldFileContent = t3lib_div::getUrl($editFile);
								if($oldFileContent != $submittedContent['file']) {
									$oldMD5 = md5(str_replace(chr(13),'',$oldFileContent));
									$info.= 'MD5: <b>'.$oldMD5.'</b> (Previous File)<br />';
									t3lib_div::writeFile($editFile,$submittedContent['file']);
									$saveFlag = 1;
								} else {
									$info .= 'No changes to the file detected!<br />';
								}
							}

							$fileContent = t3lib_div::getUrl($editFile);

							$outCode.= 'File: <b>'.substr($editFile,strlen($absPath)).'</b> ('.t3lib_div::formatSize(filesize($editFile)).')<br />';
							$fileMD5 = md5(str_replace(chr(13),'',$fileContent));
							$info.= 'MD5: <b>'.$fileMD5.'</b> (Current File)<br />';
							if($saveFlag)	{
								$saveMD5 = md5(str_replace(chr(13),'',$submittedContent['file']));
								$info.= 'MD5: <b>'.$saveMD5.'</b> (Submitted)<br />';
								if($fileMD5!=$saveMD5) $info .= $GLOBALS['TBE_TEMPLATE']->rfw('<br /><strong>Saving failed, the content was not correctly written to disk. Changes have been lost!</strong>').'<br />';
								else $info.= $GLOBALS['TBE_TEMPLATE']->rfw('<br /><strong>File saved.</strong>').'<br />';
							}

							$outCode.= '<textarea name="edit[file]" rows="35" wrap="off"'.$this->doc->formWidthText(48,'width:98%;height:70%','off').' class="fixed-font enable-tab">'.t3lib_div::formatForTextarea($fileContent).'</textarea>';
							$outCode.= '<input type="hidden" name="edit[filename]" value="'.$editFile.'" />';
							$outCode.= '<input type="hidden" name="CMD[editFile]" value="'.htmlspecialchars($editFile).'" />';
							$outCode.= '<input type="hidden" name="CMD[showExt]" value="'.$extKey.'" />';
							$outCode.= $info;

							if (!$GLOBALS['TYPO3_CONF_VARS']['EXT']['noEdit'])	{
								$outCode.='<br /><input type="submit" name="save_file" value="Save file" />';
							} else $outCode.=$GLOBALS['TBE_TEMPLATE']->rfw('<br />[SAVING IS DISABLED - can be enabled by the $TYPO3_CONF_VARS[\'EXT\'][\'noEdit\']-flag] ');

							$onClick = 'window.location.href=\'index.php?CMD[showExt]='.$extKey.'\';return false;';
							$outCode.='<input type="submit" name="cancel" value="Cancel" onclick="'.htmlspecialchars($onClick).'" /></form>';

							$theOutput.=$this->doc->spacer(15);
							$theOutput.=$this->doc->section('Edit file:','',0,1);
							$theOutput.=$this->doc->sectionEnd().$outCode;
							$this->content.=$theOutput;
						} else {
							$theOutput.=$this->doc->spacer(15);
							$theOutput.=$this->doc->section('Filesize exceeded '.$this->kbMax.' Kbytes','Files larger than '.$this->kbMax.' KBytes are not allowed to be edited.');
						}
					}
				} else die('Fatal Edit error: File "' . htmlspecialchars($editFile) . '" was not inside the correct path of the TYPO3 Extension!');
			} else {

				// MAIN:
				switch((string)$this->MOD_SETTINGS['singleDetails'])	{
					case 'info':
						// Loaded / Not loaded:
						if (!in_array($extKey,$this->requiredExt))	{
							if ($TYPO3_LOADED_EXT[$extKey])	{
								$content = '<strong>The extension is installed (loaded and running)!</strong><br />'.
								'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[remove]=1').'">Click here to remove the extension: '.$this->removeButton().'</a>';
							} else {
								$content = 'The extension is <strong>not</strong> installed yet.<br />'.
								'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[load]=1').'">Click here to install the extension: '.$this->installButton().'</a>';
							}
						} else {
							$content = 'This extension is entered in the TYPO3_CONF_VARS[SYS][requiredExt] list and is therefore always loaded.';
						}
						$this->content.=$this->doc->spacer(10);
						$this->content.=$this->doc->section('Active status:',$content,0,1);

						if (t3lib_extMgm::isLoaded($extKey))	{
							$updates=$this->updatesForm($extKey,$list[$extKey]);
							if ($updates)	{
								$this->content.=$this->doc->spacer(10);
								$this->content.=$this->doc->section('Update needed:',$updates.'<br /><br />Notice: "Static data" may not <em>need</em> to be updated. You will only have to import static data each time you upgrade the extension.',0,1);
							}
						}

						// Config:
						if (@is_file($absPath.'ext_conf_template.txt'))	{
							$this->content.=$this->doc->spacer(10);
							$this->content.=$this->doc->section('Configuration:','(<em>Notice: You may need to clear the cache after configuration of the extension. This is required if the extension adds TypoScript depending on these settings.</em>)<br /><br />',0,1);

							$this->tsStyleConfigForm($extKey, $list[$extKey]);
						}

						// Show details:
						$content = t3lib_BEfunc::cshItem('_MOD_tools_em', 'info', $GLOBALS['BACK_PATH'],'|<br/>');
						$content.= $this->extInformationArray($extKey,$list[$extKey]);

						$this->content.=$this->doc->spacer(10);
						$this->content.=$this->doc->section('Details:',$content,0,1);
						break;
					case 'upload':
						$em = t3lib_div::_POST('em');
						if($em['action'] == 'doUpload') {
							$em['extKey'] = $extKey;
							$em['extInfo'] = $list[$extKey];
							$content = $this->uploadExtensionToTER($em);
							$content .= $this->doc->spacer(10);
								// Must reload this, because EM_CONF information has been updated!
							list($list,)=$this->getInstalledExtensions();
						} else {
								// CSH:
							$content = t3lib_BEfunc::cshItem('_MOD_tools_em', 'upload', $GLOBALS['BACK_PATH'],'|<br/>');

								// Upload:
							if (substr($extKey,0,5)!='user_')	{
								$content.= $this->getRepositoryUploadForm($extKey,$list[$extKey]);
								$eC=0;
							} else {
								$content.='The extensions has an extension key prefixed "user_" which indicates that it is a user-defined extension with no official unique identification. Therefore it cannot be uploaded.';
								$eC=2;
							}
							if (!$this->fe_user['username'])	{
								$content.= '<br /><br /><img src="'.$GLOBALS['BACK_PATH'].'gfx/icon_note.gif" width="18" height="16" align="top" alt="" />You have not configured a default username/password yet. <a href="index.php?SET[function]=3">Go to "Settings"</a> if you want to do that.<br />';
							}
						}
						$this->content.=$this->doc->section('Upload extension to repository',$content,0,1,$eC);
						break;
					case 'backup':
						if($this->CMD['doDelete']) {
							$content = $this->extDelete($extKey,$list[$extKey]);
							$this->content.=$this->doc->section('Delete',$content,0,1);
						} else {
							$content = t3lib_BEfunc::cshItem('_MOD_tools_em', 'backup_delete', $GLOBALS['BACK_PATH'],'|<br/>');
							$content.= $this->extBackup($extKey,$list[$extKey]);
							$this->content.=$this->doc->section('Backup',$content,0,1);

							$content = $this->extDelete($extKey,$list[$extKey]);
							$this->content.=$this->doc->section('Delete',$content,0,1);

							$content = $this->extUpdateEMCONF($extKey,$list[$extKey]);
							$this->content.=$this->doc->section('Update EM_CONF',$content,0,1);
						}
						break;
					case 'dump':
						$this->extDumpTables($extKey,$list[$extKey]);
						break;
					case 'edit':
						$content = t3lib_BEfunc::cshItem('_MOD_tools_em', 'editfiles', $GLOBALS['BACK_PATH'],'|<br/>');
						$content.= $this->getFileListOfExtension($extKey,$list[$extKey]);

						$this->content.=$this->doc->section('Extension files',$content,0,1);
						break;
					case 'updateModule':
						$this->content.=$this->doc->section('Update:',is_object($updateObj) ? $updateObj->main() : 'No update object',0,1);
						break;
					default:
						$this->extObjContent();
						break;
				}
			}
		}
	}

	/**
	 * Outputs a screen from where you can install multiple extensions in one go
	 * This can be called from external modules with "...index.php?CMD[requestInstallExtensions]=
	 *
	 * @param	string		Comma list of extension keys to install. Renders a screen with checkboxes for all extensions not already imported or installed
	 * @return	void
	 */
	function requestInstallExtensions($extList)	{

			// Return URL:
		$returnUrl = t3lib_div::sanitizeLocalUrl(t3lib_div::_GP('returnUrl'));
		$installOrImportExtension = t3lib_div::_POST('installOrImportExtension');

			// Extension List:
		$extArray = explode(',',$extList);
		$outputRow = array();
		$outputRow[] = '
			<tr class="bgColor5 tableheader">
				<td>Install/Import:</td>
				<td>Extension Key:</td>
			</tr>
		';

		foreach($extArray as $extKey)	{

				// Check for the request:
			if ($installOrImportExtension[$extKey])	{
				$this->installExtension($extKey);
			}

				// Display:
			if (!t3lib_extMgm::isLoaded($extKey))	{
				$outputRow[] = '
				<tr class="bgColor4">
					<td><input type="checkbox" name="'.htmlspecialchars('installOrImportExtension['.$extKey.']').'" value="1" checked="checked" id="check_'.$extKey.'" /></td>
					<td><label for="check_'.$extKey.'">'.htmlspecialchars($extKey).'</label></td>
				</tr>
				';
			}
		}

		if (count($outputRow)>1 || !$returnUrl)	{
			$content = '
				<!-- ending page form ... -->
			<form action="'.htmlspecialchars(t3lib_div::getIndpEnv('REQUEST_URI')).'" method="post">
				<table border="0" cellpadding="1" cellspacing="1">'.implode('',$outputRow).'</table>
			<input type="submit" name="_" value="Import and Install selected" />
			</form>';

			if ($returnUrl)	{
				$content.= '
				<br/>
				<br/>
				<a href="'.htmlspecialchars($returnUrl).'">Return</a>
				';
			}

			$this->content.= $this->doc->section('Import/Install Extensions:',$content,0,1);
		} else {
			header('Location: '.t3lib_div::locationHeaderUrl($returnUrl));
		}
	}








	/***********************************
	*
	* Application Sub-functions (HTML parts)
	*
	**********************************/

	/**
	 * Creates a form for an extension which contains all options for configuration, updates of database, clearing of cache etc.
	 * This form is shown when
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @param	boolean		If set, the form will ONLY show if fields/tables should be updated (suppressing forms like general configuration and cache clearing).
	 * @param	string		Alternative action=""-script
	 * @param	string		HTML: Additional form fields
	 * @return	string		HTML
	 */
	function updatesForm($extKey,$extInfo,$notSilent=0,$script='',$addFields='')	{
		$script = $script ? $script : t3lib_div::linkThisScript();
		$updates.= $this->checkDBupdates($extKey,$extInfo);
		$uCache = $this->checkClearCache($extInfo);
		if ($notSilent)	$updates.= $uCache;
		$updates.= $this->checkUploadFolder($extKey,$extInfo);
		
		$absPath = $this->getExtPath($extKey, $extInfo['type']); 
		if ($notSilent && @is_file($absPath.'ext_conf_template.txt')) { 
			$configForm = $this->tsStyleConfigForm($extKey, $extInfo, 1, $script, $updates.$addFields.'<br />'); 
		} 
		
		if ($updates || $configForm) {
			if ($configForm) {
				$updates = '</form>'.$configForm.'<form>';
			} else {
				$updates = '</form><form action="'.htmlspecialchars($script).'" method="post">'.$updates.$addFields.' 
					<br /><input type="submit" name="write" value="Make updates" /> 
				';
			}
		}

		return $updates;
	}

	/**
	 * Creates view for dumping static tables and table/fields structures...
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	void
	 */
	function extDumpTables($extKey,$extInfo)	{

		// Get dbInfo which holds the structure known from the tables.sql file
		$techInfo = $this->makeDetailedExtensionAnalysis($extKey,$extInfo);
		$absPath = $this->getExtPath($extKey,$extInfo['type']);

		// Static tables:
		if (is_array($techInfo['static']))	{
			if ($this->CMD['writeSTATICdump'])	{	// Writing static dump:
				$writeFile = $absPath.'ext_tables_static+adt.sql';
				if (@is_file($writeFile))	{
					$dump_static = $this->dumpStaticTables(implode(',',$techInfo['static']));
					t3lib_div::writeFile($writeFile,$dump_static);
					$this->content.=$this->doc->section('Table and field structure required',t3lib_div::formatSize(strlen($dump_static)).'bytes written to '.substr($writeFile,strlen(PATH_site)),0,1);
				}
			} else {	// Showing info about what tables to dump - and giving the link to execute it.
				$msg = 'Dumping table content for static tables:<br />';
				$msg.= '<br />'.implode('<br />',$techInfo['static']).'<br />';

				// ... then feed that to this function which will make new CREATE statements of the same fields but based on the current database content.
				$this->content.=$this->doc->section('Static tables',$msg.'<hr /><strong><a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[writeSTATICdump]=1').'">Write current static table contents to ext_tables_static+adt.sql now!</a></strong>',0,1);
				$this->content.=$this->doc->spacer(20);
			}
		}

		// Table and field definitions:
		if (is_array($techInfo['dump_tf']))	{
			$dump_tf_array = $this->getTableAndFieldStructure($techInfo['dump_tf']);
			$dump_tf = $this->dumpTableAndFieldStructure($dump_tf_array);
			if ($this->CMD['writeTFdump'])	{
				$writeFile = $absPath.'ext_tables.sql';
				if (@is_file($writeFile))	{
					t3lib_div::writeFile($writeFile,$dump_tf);
					$this->content.=$this->doc->section('Table and field structure required',t3lib_div::formatSize(strlen($dump_tf)).'bytes written to '.substr($writeFile,strlen(PATH_site)),0,1);
				}
			} else {
				$msg = 'Dumping current database structure for:<br />';
				if (is_array($techInfo['tables']))	{
					$msg.= '<br /><strong>Tables:</strong><br />'.implode('<br />',$techInfo['tables']).'<br />';
				}
				if (is_array($techInfo['fields']))	{
					$msg.= '<br /><strong>Solo-fields:</strong><br />'.implode('<br />',$techInfo['fields']).'<br />';
				}

				// ... then feed that to this function which will make new CREATE statements of the same fields but based on the current database content.
				$this->content.=$this->doc->section('Table and field structure required',$msg.'<hr /><strong><a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[writeTFdump]=1').'">Write this dump to ext_tables.sql now!</a></strong><hr />
				<pre>'.htmlspecialchars($dump_tf).'</pre>',0,1);


				$details = '							This dump is based on two factors:<br />
				<ul>
				<li>1) All tablenames in ext_tables.sql which are <em>not</em> found in the "modify_tables" list in ext_emconf.php are dumped with the current database structure.</li>
				<li>2) For any tablenames which <em>are</em> listed in "modify_tables" all fields and keys found for the table in ext_tables.sql will be re-dumped with the fresh equalents from the database.</li>
				</ul>
				Bottomline is: Whole tables are dumped from database with no regard to which fields and keys are defined in ext_tables.sql. But for tables which are only modified, any NEW fields added to the database must in some form or the other exist in the ext_tables.sql file as well.<br />';
				$this->content.=$this->doc->section('',$details);
			}
		}
	}

	/**
	 * Returns file-listing of an extension
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		HTML table.
	 */
	function getFileListOfExtension($extKey,$conf)	{
		$content = '';
		$extPath = $this->getExtPath($extKey,$conf['type']);

		if ($extPath)	{
			// Read files:
			$fileArr = array();
			$fileArr = t3lib_div::getAllFilesAndFoldersInPath($fileArr,$extPath,'',0,99,$this->excludeForPackaging);

			// Start table:
			$lines = array();
			$totalSize = 0;

			// Header:
			$lines[] = '
				<tr class="bgColor5">
					<td>File:</td>
					<td>Size:</td>
					<td>Edit:</td>
				</tr>';

			foreach($fileArr as $file)	{
				$fI = t3lib_div::split_fileref($file);
				$lines[] = '
				<tr class="bgColor4">
					<td><a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[downloadFile]='.rawurlencode($file)).'" title="Download...">'.substr($file,strlen($extPath)).'</a></td>
					<td>'.t3lib_div::formatSize(filesize($file)).'</td>
					<td>'.(!in_array($extKey,$this->requiredExt)&&t3lib_div::inList($this->editTextExtensions,($fI['fileext']?$fI['fileext']:$fI['filebody']))?'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[editFile]='.rawurlencode($file)).'">Edit file</a>':'').'</td>
				</tr>';
				$totalSize+=filesize($file);
			}

			$lines[] = '
				<tr class="bgColor6">
					<td><strong>Total:</strong></td>
					<td><strong>'.t3lib_div::formatSize($totalSize).'</strong></td>
					<td>&nbsp;</td>
				</tr>';

			$content = '
			Path: '.$extPath.'<br /><br />
			<table border="0" cellpadding="1" cellspacing="2">'.implode('',$lines).'</table>';
		}

		return $content;
	}

	/**
	 * Delete extension from the file system
	 *
	 * @param	string		Extension key
	 * @param	array		Extension info array
	 * @return	string		Returns message string about the status of the operation
	 */
	function extDelete($extKey,$extInfo)	{
		$absPath = $this->getExtPath($extKey,$extInfo['type']);
		if (t3lib_extMgm::isLoaded($extKey))	{
			return 'This extension is currently installed (loaded and active) and so cannot be deleted!';
		} elseif (!$this->deleteAsType($extInfo['type'])) {
			return 'You cannot delete (and install/update) extensions in the '.$this->typeLabels[$extInfo['type']].' scope.';
		} elseif (t3lib_div::inList('G,L',$extInfo['type'])) {
			if ($this->CMD['doDelete'] && !strcmp($absPath,$this->CMD['absPath'])) {
				$res = $this->removeExtDirectory($absPath);
				if ($res) {
					return 'ERROR: Could not remove extension directory "'.$absPath.'". Had the following errors:<br /><br />'.
					nl2br($res);
				} else {
					return 'Removed extension in path "'.$absPath.'"!';
				}
			} else {
				$onClick = "if (confirm('Are you sure you want to delete this extension from the server?')) {window.location.href='index.php?CMD[showExt]=".$extKey.'&CMD[doDelete]=1&CMD[absPath]='.rawurlencode($absPath)."';}";
				$content.= '<a href="#" onclick="'.htmlspecialchars($onClick).' return false;"><strong>DELETE EXTENSION FROM SERVER</strong> (in the "'.$this->typeLabels[$extInfo['type']].'" location "'.substr($absPath,strlen(PATH_site)).'")!</a>';
				$content.= '<br /><br />(Maybe you should make a backup first, see above.)';
				return $content;
			}
		} else return 'Extension is not a global or local extension and cannot be removed.';
	}

	/**
	 * Update extension EM_CONF...
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		HTML content.
	 */
	function extUpdateEMCONF($extKey,$extInfo)	{
		$absPath = $this->getExtPath($extKey,$extInfo['type']);
		if ($this->CMD['doUpdateEMCONF']) {
			return $this->updateLocalEM_CONF($extKey,$extInfo);
		} else {
			$onClick = "if (confirm('Are you sure you want to update EM_CONF?')) {window.location.href='index.php?CMD[showExt]=".$extKey."&CMD[doUpdateEMCONF]=1';}";
			$content.= '<a href="#" onclick="'.htmlspecialchars($onClick).' return false;"><strong>Update extension EM_CONF file</strong> (in the "'.$this->typeLabels[$extInfo['type']].'" location "'.substr($absPath,strlen(PATH_site)).'")!</a>';
			$content.= '<br /><br />If files are changed, added or removed to an extension this is normally detected and displayed so you know that this extension has been locally altered and may need to be uploaded or at least not overridden.<br />
						Updating this file will first of all reset this registration.';
			return $content;
		}
	}

	/**
	 * Download extension as file / make backup
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		HTML content
	 */
	function extBackup($extKey,$extInfo)	{
		$uArr = $this->makeUploadArray($extKey,$extInfo);
		if (is_array($uArr))	{
			$backUpData = $this->terConnection->makeUploadDataFromArray($uArr);
			$filename = 'T3X_'.$extKey.'-'.str_replace('.','_',$extInfo['EM_CONF']['version']).'-z-'.date('YmdHi').'.t3x';
			if (intval($this->CMD['doBackup'])==1)	{
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.$filename);
				echo $backUpData;
				exit;
			} elseif ($this->CMD['dumpTables'])	{
				$filename='T3X_'.$extKey;
				$cTables = count(explode(',',$this->CMD['dumpTables']));
				if ($cTables>1)	{
					$filename.='-'.$cTables.'tables';
				} else {
					$filename.='-'.$this->CMD['dumpTables'];
				}
				$filename.='+adt.sql';

				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.$filename);
				echo $this->dumpStaticTables($this->CMD['dumpTables']);
				exit;
			} else {
				$techInfo = $this->makeDetailedExtensionAnalysis($extKey,$extInfo);
				$lines=array();
				$lines[]='<tr class="bgColor5"><td colspan="2"><strong>Make selection:</strong></td></tr>';
				$lines[]='<tr class="bgColor4"><td><strong>Extension files:</strong></td><td>'.
				'<a href="'.htmlspecialchars('index.php?CMD[doBackup]=1&CMD[showExt]='.$extKey).'">Download extension "'.$extKey.'" as a file</a><br />('.$filename.', '.t3lib_div::formatSize(strlen($backUpData)).', MD5: '.md5($backUpData).')<br /></td></tr>';

				if (is_array($techInfo['tables']))	{	$lines[]='<tr class="bgColor4"><td><strong>Data tables:</strong></td><td>'.$this->extBackup_dumpDataTablesLine($techInfo['tables'],$extKey).'</td></tr>';	}
				if (is_array($techInfo['static']))	{	$lines[]='<tr class="bgColor4"><td><strong>Static tables:</strong></td><td>'.$this->extBackup_dumpDataTablesLine($techInfo['static'],$extKey).'</td></tr>';	}

				$content = '<table border="0" cellpadding="2" cellspacing="2">'.implode('',$lines).'</table>';
				return $content;
			}
		} else die('Error...');
	}

	/**
	 * Link to dump of database tables
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		HTML
	 */
	function extBackup_dumpDataTablesLine($tablesArray,$extKey)	{
		$tables = array();
		$tablesNA = array();

		foreach($tablesArray as $tN)	{
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('count(*)', $tN, '');
			if (!$GLOBALS['TYPO3_DB']->sql_error())	{
				$row = $GLOBALS['TYPO3_DB']->sql_fetch_row($res);
				$tables[$tN]='<tr><td>&nbsp;</td><td><a href="'.htmlspecialchars('index.php?CMD[dumpTables]='.rawurlencode($tN).'&CMD[showExt]='.$extKey).'" title="Dump table \''.$tN.'\'">'.$tN.'</a></td><td>&nbsp;&nbsp;&nbsp;</td><td>'.$row[0].' records</td></tr>';
			} else {
				$tablesNA[$tN]='<tr><td>&nbsp;</td><td>'.$tN.'</td><td>&nbsp;</td><td>Did not exist.</td></tr>';
			}
		}
		$label = '<table border="0" cellpadding="0" cellspacing="0">'.implode('',array_merge($tables,$tablesNA)).'</table>';// Candidate for t3lib_div::array_merge() if integer-keys will some day make trouble...
		if (count($tables))	{
			$label = '<a href="'.htmlspecialchars('index.php?CMD[dumpTables]='.rawurlencode(implode(',',array_keys($tables))).'&CMD[showExt]='.$extKey).'" title="Dump all existing tables.">Download all data from:</a><br /><br />'.$label;
		} else $label = 'Nothing to dump...<br /><br />'.$label;
		return $label;
	}

	/**
	 * Prints a table with extension information in it.
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @param	boolean		If set, the information array shows information for a remote extension in TER, not a local one.
	 * @return	string		HTML content.
	 */
	function extInformationArray($extKey,$extInfo,$remote=0)	{
		$lines=array();
		$lines[]='<tr class="bgColor5"><td colspan="2"><strong>General information:</strong></td>'.$this->helpCol('').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Title:</td><td>'.$extInfo['EM_CONF']['_icon'].$extInfo['EM_CONF']['title'].'</td>'.$this->helpCol('title').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Description:</td><td>'.nl2br(htmlspecialchars($extInfo['EM_CONF']['description'])).'</td>'.$this->helpCol('description').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Author:</td><td>'.$this->wrapEmail($extInfo['EM_CONF']['author'].($extInfo['EM_CONF']['author_email'] ? ' <'.$extInfo['EM_CONF']['author_email'].'>' : ''),$extInfo['EM_CONF']['author_email']).($extInfo['EM_CONF']['author_company']?', '.$extInfo['EM_CONF']['author_company']:'').
		'</td>'.$this->helpCol('author').'</tr>';

		$lines[]='<tr class="bgColor4"><td>Version:</td><td>'.$extInfo['EM_CONF']['version'].'</td>'.$this->helpCol('version').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Category:</td><td>'.$this->categories[$extInfo['EM_CONF']['category']].'</td>'.$this->helpCol('category').'</tr>';
		$lines[]='<tr class="bgColor4"><td>State:</td><td>'.$this->states[$extInfo['EM_CONF']['state']].'</td>'.$this->helpCol('state').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Shy?</td><td>'.($extInfo['EM_CONF']['shy']?'Yes':'').'</td>'.$this->helpCol('shy').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Internal?</td><td>'.($extInfo['EM_CONF']['internal']?'Yes':'').'</td>'.$this->helpCol('internal').'</tr>';

		$lines[]='<tr class="bgColor4"><td>Depends on:</td><td>'.$this->depToString($extInfo['EM_CONF']['constraints']).'</td>'.$this->helpCol('dependencies').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Conflicts with:</td><td>'.$this->depToString($extInfo['EM_CONF']['constraints'],'conflicts').'</td>'.$this->helpCol('conflicts').'</tr>';
		$lines[]='<tr class="bgColor4"><td>Suggests:</td><td>'.$this->depToString($extInfo['EM_CONF']['constraints'],'suggests').'</td>'.$this->helpCol('suggests').'</tr>';
		if (!$remote)	{
			$lines[]='<tr class="bgColor4"><td>Priority:</td><td>'.$extInfo['EM_CONF']['priority'].'</td>'.$this->helpCol('priority').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Clear cache?</td><td>'.($extInfo['EM_CONF']['clearCacheOnLoad']?'Yes':'').'</td>'.$this->helpCol('clearCacheOnLoad').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Includes modules:</td><td>'.$extInfo['EM_CONF']['module'].'</td>'.$this->helpCol('module').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Lock Type?</td><td>'.($extInfo['EM_CONF']['lockType']?$extInfo['EM_CONF']['lockType']:'').'</td>'.$this->helpCol('lockType').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Modifies tables:</td><td>'.$extInfo['EM_CONF']['modify_tables'].'</td>'.$this->helpCol('modify_tables').'</tr>';

			// Installation status:
			$techInfo = $this->makeDetailedExtensionAnalysis($extKey,$extInfo,1);
			$lines[]='<tr><td>&nbsp;</td><td></td>'.$this->helpCol('').'</tr>';
			$lines[]='<tr class="bgColor5"><td colspan="2"><strong>Installation status:</strong></td>'.$this->helpCol('').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Type of install:</td><td>'.$this->typeLabels[$extInfo['type']].' - <em>'.$this->typeDescr[$extInfo['type']].'</em></td>'.$this->helpCol('type').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Double installs?</td><td>'.$this->extInformationArray_dbInst($extInfo['doubleInstall'],$extInfo['type']).'</td>'.$this->helpCol('doubleInstall').'</tr>';
			if (is_array($extInfo['files']))	{
				sort($extInfo['files']);
				$lines[]='<tr class="bgColor4"><td>Root files:</td><td>'.implode('<br />',$extInfo['files']).'</td>'.$this->helpCol('rootfiles').'</tr>';
			}

			if ($techInfo['tables']||$techInfo['static']||$techInfo['fields'])	{
				if (!$remote && t3lib_extMgm::isLoaded($extKey))	{
					$tableStatus = $GLOBALS['TBE_TEMPLATE']->rfw(($techInfo['tables_error']?'<strong>Table error!</strong><br />Probably one or more required fields/tables are missing in the database!':'').
					($techInfo['static_error']?'<strong>Static table error!</strong><br />The static tables are missing or empty!':''));
				} else {
					$tableStatus = $techInfo['tables_error']||$techInfo['static_error'] ? 'The database will need to be updated when this extension is installed.' : 'All required tables are already in the database!';
				}
			}

			$lines[]='<tr class="bgColor4"><td>Database requirements:</td><td>'.$this->extInformationArray_dbReq($techInfo,1).'</td>'.$this->helpCol('dbReq').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Database status:</td><td>'.$tableStatus.'</td>'.$this->helpCol('dbStatus').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Flags:</td><td>'.(is_array($techInfo['flags'])?implode('<br />',$techInfo['flags']):'').'</td>'.$this->helpCol('flags').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Config template?</td><td>'.($techInfo['conf']?'Yes':'').'</td>'.$this->helpCol('conf').'</tr>';
			$lines[]='<tr class="bgColor4"><td>TypoScript files:</td><td>'.(is_array($techInfo['TSfiles'])?implode('<br />',$techInfo['TSfiles']):'').'</td>'.$this->helpCol('TSfiles').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Language files:</td><td>'.(is_array($techInfo['locallang'])?implode('<br />',$techInfo['locallang']):'').'</td>'.$this->helpCol('locallang').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Upload folder:</td><td>'.($techInfo['uploadfolder']?$techInfo['uploadfolder']:'').'</td>'.$this->helpCol('uploadfolder').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Create directories:</td><td>'.(is_array($techInfo['createDirs'])?implode('<br />',$techInfo['createDirs']):'').'</td>'.$this->helpCol('createDirs').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Module names:</td><td>'.(is_array($techInfo['moduleNames'])?implode('<br />',$techInfo['moduleNames']):'').'</td>'.$this->helpCol('moduleNames').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Class names:</td><td>'.(is_array($techInfo['classes'])?implode('<br />',$techInfo['classes']):'').'</td>'.$this->helpCol('classNames').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Code warnings:<br />(developer-relevant)</td><td>'.(is_array($techInfo['errors'])?$GLOBALS['TBE_TEMPLATE']->rfw(implode('<br />',$techInfo['errors'])):'').'</td>'.$this->helpCol('errors').'</tr>';
			$lines[]='<tr class="bgColor4"><td>Naming annoyances:<br />(developer-relevant)</td><td>'.(is_array($techInfo['NSerrors']) ? (!t3lib_div::inList($this->nameSpaceExceptions,$extKey)?t3lib_div::view_array($techInfo['NSerrors']):$GLOBALS['TBE_TEMPLATE']->dfw('[exception]')) : '').'</td>'.$this->helpCol('NSerrors').'</tr>';

			$currentMd5Array = $this->serverExtensionMD5Array($extKey,$extInfo);
			$affectedFiles='';

			$msgLines=array();
			if (strcmp($extInfo['EM_CONF']['_md5_values_when_last_written'],serialize($currentMd5Array)))	{
				$msgLines[] = $GLOBALS['TBE_TEMPLATE']->rfw('<br /><strong>A difference between the originally installed version and the current was detected!</strong>');
				$affectedFiles = $this->findMD5ArrayDiff($currentMd5Array,unserialize($extInfo['EM_CONF']['_md5_values_when_last_written']));
				if (count($affectedFiles))	$msgLines[] = '<br /><strong>Modified files:</strong><br />'.$GLOBALS['TBE_TEMPLATE']->rfw(implode('<br />',$affectedFiles));
			}
			$lines[]='<tr class="bgColor4"><td>Files changed?</td><td>'.implode('<br />',$msgLines).'</td>'.$this->helpCol('filesChanged').'</tr>';
		}

		return '<table border="0" cellpadding="1" cellspacing="2">
					'.implode('
					',$lines).'
				</table>';
	}

	/**
	 * Returns HTML with information about database requirements
	 *
	 * @param	array		Technical information array
	 * @param	boolean		Table header displayed
	 * @return	string		HTML content.
	 */
	function extInformationArray_dbReq($techInfo,$tableHeader=0)	{
		return nl2br(trim((is_array($techInfo['tables'])?($tableHeader?"\n\n<strong>Tables:</strong>\n":'').implode(chr(10),$techInfo['tables']):'').
		(is_array($techInfo['static'])?"\n\n<strong>Static tables:</strong>\n".implode(chr(10),$techInfo['static']):'').
		(is_array($techInfo['fields'])?"\n\n<strong>Additional fields:</strong>\n".implode('<hr />',$techInfo['fields']):'')));
	}

	/**
	 * Double install warning.
	 *
	 * @param	string		Double-install string, eg. "LG" etc.
	 * @param	string		Current scope, eg. "L" or "G" or "S"
	 * @return	string		Message
	 */
	function extInformationArray_dbInst($dbInst,$current)	{
		if (strlen($dbInst)>1)	{
			$others = array();
			for($a=0;$a<strlen($dbInst);$a++)	{
				if (substr($dbInst,$a,1)!=$current)	{
					$others[]='"'.$this->typeLabels[substr($dbInst,$a,1)].'"';
				}
			}
			return $GLOBALS['TBE_TEMPLATE']->rfw('A '.implode(' and ',$others).' extension with this key is also available on the server, but cannot be loaded because the "'.$this->typeLabels[$current].'" version takes precedence.');
		} else return '';
	}

	/**
	 * Prints the upload form for extensions
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		HTML content.
	 */
	function getRepositoryUploadForm($extKey,$extInfo)	{
		$content = '<form action="index.php" method="post" name="repuploadform">
			<input type="hidden" name="CMD[showExt]" value="'.$extKey.'" />
			<input type="hidden" name="em[action]" value="doUpload" />
			<table border="0" cellpadding="2" cellspacing="1">
				<tr class="bgColor4">
					<td>Repository Username:</td>
					<td><input'.$this->doc->formWidth(20).' type="text" name="em[user][fe_u]" value="'.$this->fe_user['username'].'" /></td>
				</tr>
				<tr class="bgColor4">
					<td>Repository Password:</td>
					<td><input'.$this->doc->formWidth(20).' type="password" name="em[user][fe_p]" value="'.$this->fe_user['password'].'" /></td>
				</tr>
				<tr class="bgColor4">
					<td>Changelog for upload:</td>
					<td><textarea'.$this->doc->formWidth(30,1).' rows="5" name="em[upload][comment]"></textarea></td>
				</tr>
				<tr class="bgColor4">
					<td>Upload command:</td>
					<td nowrap="nowrap">
						<input type="radio" name="em[upload][mode]" id="new_dev" value="new_dev" checked="checked" /> <label for="new_dev">New bugfix version (latest x.x.<strong>'.$GLOBALS['TBE_TEMPLATE']->rfw('x+1').'</strong>)</label><br />
						<input type="radio" name="em[upload][mode]" id="new_sub" value="new_sub" /> <label for="new_sub">New sub version (latest x.<strong>'.$GLOBALS['TBE_TEMPLATE']->rfw('x+1').'</strong>.0)</label><br />
						<input type="radio" name="em[upload][mode]" id="new_main" value="new_main" /> <label for="new_main">New main version (latest <strong>'.$GLOBALS['TBE_TEMPLATE']->rfw('x+1').'</strong>.0.0)</label><br />
					</td>
				</tr>
				<tr class="bgColor4">
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Upload extension" />
					</td>
				</tr>
			</table>
			</form>';

		return $content;
	}










	/***********************************
	*
	* Extension list rendering
	*
	**********************************/

	/**
	 * Prints the header row for the various listings
	 *
	 * @param	string		Attributes for the <tr> tag
	 * @param	array		Preset cells in the beginning of the row. Typically a blank cell with a clear-gif
	 * @param	boolean		If set, the list is coming from remote server.
	 * @return	string		HTML <tr> table row
	 */
	function extensionListRowHeader($trAttrib,$cells,$import=0)	{
		$cells[] = '<td></td>';
		$cells[] = '<td>Title:</td>';

		if (!$this->MOD_SETTINGS['display_details'])	{
			$cells[] = '<td>Description:</td>';
			$cells[] = '<td>Author:</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==2)	{
			$cells[] = '<td>Priority:</td>';
			$cells[] = '<td>Mod.Tables:</td>';
			$cells[] = '<td>Modules:</td>';
			$cells[] = '<td>Cl.Cache?</td>';
			$cells[] = '<td>Internal?</td>';
			$cells[] = '<td>Shy?</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==3)	{
			$cells[] = '<td>Tables/Fields:</td>';
			$cells[] = '<td>TS-files:</td>';
			$cells[] = '<td>Affects:</td>';
			$cells[] = '<td>Modules:</td>';
			$cells[] = '<td>Config?</td>';
			$cells[] = '<td>Code warnings:</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==4)	{
			$cells[] = '<td>locallang:</td>';
			$cells[] = '<td>Classes:</td>';
			$cells[] = '<td>Code warnings:</td>';
			$cells[] = '<td>Nameing annoyances:</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==5)	{
			$cells[] = '<td>Changed files:</td>';
		} else {
			$cells[] = '<td>Extension key:</td>';
			$cells[] = '<td>Version:</td>';
			if (!$import) {
				$cells[] = '<td>DL:</td>';
				$cells[] = '<td>Doc:</td>';
				$cells[] = '<td>Type:</td>';
			} else {
				$cells[] = '<td class="bgColor6"'.$this->labelInfo('Current version of the extension on this server. If colored red there is a newer version in repository! Then you should upgrade.').'>Cur. Ver:</td>';
				$cells[] = '<td class="bgColor6"'.$this->labelInfo('Current type of installation of the extension on this server.').'>Cur. Type:</td>';
				$cells[] = '<td'.$this->labelInfo('Number of downloads, all versions/this version').'>DL:</td>';
			}
			$cells[] = '<td>State:</td>';
		}
		return '
			<tr'.$trAttrib.'>
				'.implode('
				',$cells).'
			</tr>';
	}

	/**
	 * Prints a row with data for the various extension listings
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @param	array		Preset table cells, eg. install/uninstall icons.
	 * @param	string		<tr> tag class
	 * @param	array		Array with installed extension keys (as keys)
	 * @param	boolean		If set, the list is coming from remote server.
	 * @param	string		Alternative link URL
	 * @return	string		HTML <tr> content
	 */
	function extensionListRow($extKey,$extInfo,$cells,$bgColorClass='',$inst_list=array(),$import=0,$altLinkUrl='')	{

			// Icon:
		$imgInfo = @getImageSize($this->getExtPath($extKey,$extInfo['type']).'/ext_icon.gif');
		if (is_array($imgInfo))	{
			$cells[] = '<td><img src="'.$GLOBALS['BACK_PATH'].$this->typeRelPaths[$extInfo['type']].$extKey.'/ext_icon.gif'.'" '.$imgInfo[3].' alt="" /></td>';
		} elseif ($extInfo['_ICON']) {
			$cells[] = '<td>'.$extInfo['_ICON'].'</td>';
		} else {
			$cells[] = '<td><img src="clear.gif" width="1" height="1" alt="" /></td>';
		}

			// Extension title:
		$cells[] = '<td nowrap="nowrap"><a href="'.htmlspecialchars($altLinkUrl?$altLinkUrl:'index.php?CMD[showExt]='.$extKey.'&SET[singleDetails]=info').'" title="'.$extKey.'"'/*.($extInfo['EM_CONF']['shy'] ? ' style="color:#666;" ' : '')*/.'>'.t3lib_div::fixed_lgd($extInfo['EM_CONF']['title']?$extInfo['EM_CONF']['title']:'<em>'.$extKey.'</em>',40).'</a></td>';

			// Based on which display mode you will see more or less details:
		if (!$this->MOD_SETTINGS['display_details'])	{
			$cells[] = '<td>'.htmlspecialchars(t3lib_div::fixed_lgd($extInfo['EM_CONF']['description'],400)).'<br /><img src="clear.gif" width="300" height="1" alt="" /></td>';
			$cells[] = '<td nowrap="nowrap">'.($extInfo['EM_CONF']['author_email'] ? '<a href="mailto:'.htmlspecialchars($extInfo['EM_CONF']['author_email']).'">' : '').htmlspecialchars($extInfo['EM_CONF']['author']).($extInfo['EM_CONF']['author_email'] ? '</a>' : '').($extInfo['EM_CONF']['author_company'] ? '<br />'.htmlspecialchars($extInfo['EM_CONF']['author_company']) : '').'</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==2)	{
			$cells[] = '<td nowrap="nowrap">'.$extInfo['EM_CONF']['priority'].'</td>';
			$cells[] = '<td nowrap="nowrap">'.implode('<br />',t3lib_div::trimExplode(',',$extInfo['EM_CONF']['modify_tables'],1)).'</td>';
			$cells[] = '<td nowrap="nowrap">'.$extInfo['EM_CONF']['module'].'</td>';
			$cells[] = '<td nowrap="nowrap">'.($extInfo['EM_CONF']['clearCacheOnLoad'] ? 'Yes' : '').'</td>';
			$cells[] = '<td nowrap="nowrap">'.($extInfo['EM_CONF']['internal'] ? 'Yes' : '').'</td>';
			$cells[] = '<td nowrap="nowrap">'.($extInfo['EM_CONF']['shy'] ? 'Yes' : '').'</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==3)	{
			$techInfo = $this->makeDetailedExtensionAnalysis($extKey,$extInfo);

			$cells[] = '<td>'.$this->extInformationArray_dbReq($techInfo).
			'</td>';
			$cells[] = '<td nowrap="nowrap">'.(is_array($techInfo['TSfiles']) ? implode('<br />',$techInfo['TSfiles']) : '').'</td>';
			$cells[] = '<td nowrap="nowrap">'.(is_array($techInfo['flags']) ? implode('<br />',$techInfo['flags']) : '').'</td>';
			$cells[] = '<td nowrap="nowrap">'.(is_array($techInfo['moduleNames']) ? implode('<br />',$techInfo['moduleNames']) : '').'</td>';
			$cells[] = '<td nowrap="nowrap">'.($techInfo['conf'] ? 'Yes' : '').'</td>';
			$cells[] = '<td>'.
			$GLOBALS['TBE_TEMPLATE']->rfw((t3lib_extMgm::isLoaded($extKey)&&$techInfo['tables_error']?'<strong>Table error!</strong><br />Probably one or more required fields/tables are missing in the database!':'').
			(t3lib_extMgm::isLoaded($extKey)&&$techInfo['static_error']?'<strong>Static table error!</strong><br />The static tables are missing or empty!':'')).
			'</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==4)	{
			$techInfo=$this->makeDetailedExtensionAnalysis($extKey,$extInfo,1);

			$cells[] = '<td>'.(is_array($techInfo['locallang']) ? implode('<br />',$techInfo['locallang']) : '').'</td>';
			$cells[] = '<td>'.(is_array($techInfo['classes']) ? implode('<br />',$techInfo['classes']) : '').'</td>';
			$cells[] = '<td>'.(is_array($techInfo['errors']) ? $GLOBALS['TBE_TEMPLATE']->rfw(implode('<hr />',$techInfo['errors'])) : '').'</td>';
			$cells[] = '<td>'.(is_array($techInfo['NSerrors']) ? (!t3lib_div::inList($this->nameSpaceExceptions,$extKey) ? t3lib_div::view_array($techInfo['NSerrors']) : $GLOBALS['TBE_TEMPLATE']->dfw('[exception]')) :'').'</td>';
		} elseif ($this->MOD_SETTINGS['display_details']==5)	{
			$currentMd5Array = $this->serverExtensionMD5Array($extKey,$extInfo);
			$affectedFiles = '';
			$msgLines = array();
			$msgLines[] = 'Files: '.count($currentMd5Array);
			if (strcmp($extInfo['EM_CONF']['_md5_values_when_last_written'],serialize($currentMd5Array)))	{
				$msgLines[] = $GLOBALS['TBE_TEMPLATE']->rfw('<br /><strong>A difference between the originally installed version and the current was detected!</strong>');
				$affectedFiles = $this->findMD5ArrayDiff($currentMd5Array,unserialize($extInfo['EM_CONF']['_md5_values_when_last_written']));
				if (count($affectedFiles))	$msgLines[] = '<br /><strong>Modified files:</strong><br />'.$GLOBALS['TBE_TEMPLATE']->rfw(implode('<br />',$affectedFiles));
			}
			$cells[] = '<td>'.implode('<br />',$msgLines).'</td>';
		} else {
				// Default view:
			$verDiff = $inst_list[$extKey] && $this->versionDifference($extInfo['EM_CONF']['version'],$inst_list[$extKey]['EM_CONF']['version'],$this->versionDiffFactor);

			$cells[] = '<td nowrap="nowrap"><em>'.$extKey.'</em></td>';
			$cells[] = '<td nowrap="nowrap">'.($verDiff ? '<strong>'.$GLOBALS['TBE_TEMPLATE']->rfw(htmlspecialchars($extInfo['EM_CONF']['version'])).'</strong>' : $extInfo['EM_CONF']['version']).'</td>';
			if (!$import) {		// Listing extenson on LOCAL server:
					// Extension Download:
				$cells[] = '<td nowrap="nowrap"><a href="'.htmlspecialchars('index.php?CMD[doBackup]=1&SET[singleDetails]=backup&CMD[showExt]='.$extKey).'"><img src="download.png" width="13" height="12" title="Download" alt="" /></a></td>';

					// Manual download
				$fileP = PATH_site.$this->typePaths[$extInfo['type']].$extKey.'/doc/manual.sxw';
				$cells[] = '<td nowrap="nowrap">'.
				($this->typePaths[$extInfo['type']] && @is_file($fileP)?'<a href="'.htmlspecialchars(t3lib_div::resolveBackPath($this->doc->backPath.'../'.$this->typePaths[$extInfo['type']].$extKey.'/doc/manual.sxw')).'" target="_blank"><img src="oodoc.gif" width="13" height="16" title="Local Open Office Manual" alt="" /></a>':'').
				'</td>';
				$cells[] = '<td nowrap="nowrap">'.$this->typeLabels[$extInfo['type']].(strlen($extInfo['doubleInstall'])>1?'<strong> '.$GLOBALS['TBE_TEMPLATE']->rfw($extInfo['doubleInstall']).'</strong>':'').'</td>';
			} else {	// Listing extensions from REMOTE repository:
				$inst_curVer = $inst_list[$extKey]['EM_CONF']['version'];
				if (isset($inst_list[$extKey]))	{
					if ($verDiff)	$inst_curVer = '<strong>'.$GLOBALS['TBE_TEMPLATE']->rfw($inst_curVer).'</strong>';
				}
				$cells[] = '<td nowrap="nowrap">'.$inst_curVer.'</td>';
				$cells[] = '<td nowrap="nowrap">'.$this->typeLabels[$inst_list[$extKey]['type']].(strlen($inst_list[$extKey]['doubleInstall'])>1?'<strong> '.$GLOBALS['TBE_TEMPLATE']->rfw($inst_list[$extKey]['doubleInstall']).'</strong>':'').'</td>';
				$cells[] = '<td nowrap="nowrap">'.($extInfo['downloadcounter_all']?$extInfo['downloadcounter_all']:'&nbsp;&nbsp;').'/'.($extInfo['downloadcounter']?$extInfo['downloadcounter']:'&nbsp;').'</td>';
			}
			$cells[] = '<td nowrap="nowrap" class="extstate" style="background-color:'.$this->stateColors[$extInfo['EM_CONF']['state']].';">'.$this->states[$extInfo['EM_CONF']['state']].'</td>';
		}

		if($this->xmlhandler->getReviewState($extKey,$extInfo['EM_CONF']['version'])<1) {
			$bgclass = ' class="unsupported-ext"';
		} else {
			$bgclass = ' class="'.($bgColorClass?$bgColorClass:'bgColor4').'"';
		}

		return '
			<tr'.$bgclass.'>
				'.implode('
				',$cells).'
			</tr>';
	}






	/************************************
	*
	* Output helper functions
	*
	************************************/

	/**
	 * Wrapping input string in a link tag with link to email address
	 *
	 * @param	string		Input string, being wrapped in <a> tags
	 * @param	string		Email address for use in link.
	 * @return	string		Output
	 */
	function wrapEmail($str,$email)	{
		if ($email)	{
			$str = '<a href="mailto:'.htmlspecialchars($email).'">'.htmlspecialchars($str).'</a>';
		}
		return $str;
	}

	/**
	 * Returns help text if applicable.
	 *
	 * @param	string		Help text key
	 * @return	string		HTML table cell
	 */
	function helpCol($key)	{
		global $BE_USER;
		if ($BE_USER->uc['edit_showFieldHelp'])	{
			if (empty($key)) {
				return '<td>&nbsp;</td>';
			}
			else {
				return t3lib_BEfunc::cshItem($this->descrTable, 'emconf_'.$key, $GLOBALS['BACK_PATH'], '<td>|</td>');
			}
		}
		else {
			return '';
		}
	}

	/**
	 * Returns title and style attribute for mouseover help text.
	 *
	 * @param	string		Help text.
	 * @return	string		title="" attribute prepended with a single space
	 */
	function labelInfo($str)	{
		return ' title="'.htmlspecialchars($str).'" style="cursor:help;"';
	}

	/**
	 * Returns a header for an extensions including icon if any
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @param	string		align-attribute value (for <img> tag)
	 * @return	string		HTML; Extension title and image.
	 */
	function extensionTitleIconHeader($extKey,$extInfo,$align='top')	{
		$imgInfo = @getImageSize($this->getExtPath($extKey,$extInfo['type']).'/ext_icon.gif');
		$out = '';
		if (is_array($imgInfo))	{
			$out.= '<img src="'.$GLOBALS['BACK_PATH'].$this->typeRelPaths[$extInfo['type']].$extKey.'/ext_icon.gif" '.$imgInfo[3].' align="'.$align.'" alt="" />';
		}
		$out.= $extInfo['EM_CONF']['title'] ? htmlspecialchars(t3lib_div::fixed_lgd($extInfo['EM_CONF']['title'], 40)) : '<em>' . htmlspecialchars($extKey) . '</em>';
		return $out;
	}

	/**
	 * Returns image tag for "uninstall"
	 *
	 * @return	string		<img> tag
	 */
	function removeButton()	{
		return '<img src="uninstall.gif" width="16" height="16" title="Remove extension" align="top" alt="" />';
	}

	/**
	 * Returns image for "install"
	 *
	 * @return	string		<img> tag
	 */
	function installButton()	{
		return '<img src="install.gif" width="16" height="16" title="Install extension..." align="top" alt="" />';
	}

	/**
	 * Warning (<img> + text string) message about the impossibility to import extensions (both local and global locations are disabled...)
	 *
	 * @return	string		<img> + text string.
	 */
	function noImportMsg()	{
		return '<img src="'.$this->doc->backPath.'gfx/icon_warning2.gif" width="18" height="16" align="top" alt="" /><strong>Import to both local and global path is disabled in TYPO3_CONF_VARS!</strong>';
	}

	/**
	 * Checks whether the passed dependency is TER2-style (array) and returns a single string for displaying the dependencies.
	 *
	 * It leaves out all version numbers and the "php" and "typo3" dependencies, as they are implicit and of no interest without the version number.
	 *
	 * @param	mixed		$dep Either a string or an array listing dependencies.
	 * @param	string		$type The dependency type to list if $dep is an array
	 * @return	string		A simple dependency list for display
	 */
	function depToString($dep,$type='depends') {
		if(is_array($dep)) {
			unset($dep[$type]['php']);
			unset($dep[$type]['typo3']);
			$s = (count($dep[$type])) ? implode(',', array_keys($dep[$type])) : '';
			return $s;
		}
		return '';
	}

	/**
	 * Checks whether the passed dependency is TER-style (string) or TER2-style (array) and returns a single string for displaying the dependencies.
	 *
	 * It leaves out all version numbers and the "php" and "typo3" dependencies, as they are implicit and of no interest without the version number.
	 *
	 * @param	mixed		$dep Either a string or an array listing dependencies.
	 * @param	string		$type The dependency type to list if $dep is an array
	 * @return	string		A simple dependency list for display
	 */
	function stringToDep($dep) {
		$constraint = array();
		if(is_string($dep) && strlen($dep)) {
			$dep = explode(',',$dep);
			foreach($dep as $v) {
				$constraint[$v] = '';
			}
		}
		return $constraint;
	}








	/********************************
	*
	* Read information about all available extensions
	*
	*******************************/

	/**
	 * Returns the list of available (installed) extensions
	 *
	 * @return	array		Array with two arrays, list array (all extensions with info) and category index
	 * @see getInstExtList()
	 */
	function getInstalledExtensions()	{
		$list = array();
		$cat = $this->defaultCategories;

		$path = PATH_typo3.'sysext/';
		$this->getInstExtList($path,$list,$cat,'S');

		$path = PATH_typo3.'ext/';
		$this->getInstExtList($path,$list,$cat,'G');

		$path = PATH_typo3conf.'ext/';
		$this->getInstExtList($path,$list,$cat,'L');

		return array($list,$cat);
	}

	/**
	 * Gathers all extensions in $path
	 *
	 * @param	string		Absolute path to local, global or system extensions
	 * @param	array		Array with information for each extension key found. Notice: passed by reference
	 * @param	array		Categories index: Contains extension titles grouped by various criteria.
	 * @param	string		Path-type: L, G or S
	 * @return	void		"Returns" content by reference
	 * @access private
	 * @see getInstalledExtensions()
	 */
	function getInstExtList($path,&$list,&$cat,$type)	{

		if (@is_dir($path))	{
			$extList = t3lib_div::get_dirs($path);
			if (is_array($extList))	{
				foreach($extList as $extKey)	{
					if (@is_file($path.$extKey.'/ext_emconf.php'))	{
						$emConf = $this->includeEMCONF($path.$extKey.'/ext_emconf.php', $extKey);
						if (is_array($emConf))	{
							if (is_array($list[$extKey]))	{
								$list[$extKey]=array('doubleInstall'=>$list[$extKey]['doubleInstall']);
							}
							$list[$extKey]['doubleInstall'].= $type;
							$list[$extKey]['type'] = $type;
							$list[$extKey]['EM_CONF'] = $emConf;
							$list[$extKey]['files'] = t3lib_div::getFilesInDir($path.$extKey, '', 0, '', $this->excludeForPackaging);

							$this->setCat($cat,$list[$extKey], $extKey);
						}
					}
				}
			}
		}
	}

	/**
	 * Fixes an old style ext_emconf.php array by adding constraints if needed and removing deprecated keys
	 *
	 * @param	array		$emConf
	 * @return	array
	 */
	function fixEMCONF($emConf) {
		if(!isset($emConf['constraints']) || !isset($emConf['constraints']['depends']) || !isset($emConf['constraints']['conflicts']) || !isset($emConf['constraints']['suggests'])) {
			if(!isset($emConf['constraints']) || !isset($emConf['constraints']['depends'])) {
				$emConf['constraints']['depends'] = $this->stringToDep($emConf['dependencies']);
				if(strlen($emConf['PHP_version'])) {
					$versionRange = $this->splitVersionRange($emConf['PHP_version']);
					if (version_compare($versionRange[0],'3.0.0','<')) $versionRange[0] = '3.0.0';
					if (version_compare($versionRange[1],'3.0.0','<')) $versionRange[1] = '0.0.0';
					$emConf['constraints']['depends']['php'] = implode('-',$versionRange);
				}
				if(strlen($emConf['TYPO3_version'])) {
					$versionRange = $this->splitVersionRange($emConf['TYPO3_version']);
					if (version_compare($versionRange[0],'3.5.0','<')) $versionRange[0] = '3.5.0';
					if (version_compare($versionRange[1],'3.5.0','<')) $versionRange[1] = '0.0.0';
					$emConf['constraints']['depends']['typo3'] = implode('-',$versionRange);
				}
			}
			if(!isset($emConf['constraints']) || !isset($emConf['constraints']['conflicts'])) {
				$emConf['constraints']['conflicts'] = $this->stringToDep($emConf['conflicts']);
			}
			if(!isset($emConf['constraints']) || !isset($emConf['constraints']['suggests'])) {
				$emConf['constraints']['suggests'] = array();
			}
		} elseif (isset($emConf['constraints']) && isset($emConf['dependencies'])) {
			$emConf['suggests'] = isset($emConf['suggests']) ? $emConf['suggests'] : array();
			$emConf['dependencies'] = $this->depToString($emConf['constraints']);
			$emConf['conflicts'] = $this->depToString($emConf['constraints'], 'conflicts');
		}

			// sanity check for version numbers, intentionally only checks php and typo3
		if(isset($emConf['constraints']['depends']) && isset($emConf['constraints']['depends']['php'])) {
			$versionRange = $this->splitVersionRange($emConf['constraints']['depends']['php']);
			if (version_compare($versionRange[0],'3.0.0','<')) $versionRange[0] = '3.0.0';
			if (version_compare($versionRange[1],'3.0.0','<')) $versionRange[1] = '0.0.0';
			$emConf['constraints']['depends']['php'] = implode('-',$versionRange);
		}
		if(isset($emConf['constraints']['depends']) && isset($emConf['constraints']['depends']['typo3'])) {
			$versionRange = $this->splitVersionRange($emConf['constraints']['depends']['typo3']);
			if (version_compare($versionRange[0],'3.5.0','<')) $versionRange[0] = '3.5.0';
			if (version_compare($versionRange[1],'3.5.0','<')) $versionRange[1] = '0.0.0';
			$emConf['constraints']['depends']['typo3'] = implode('-',$versionRange);
		}

		unset($emConf['private']);
		unset($emConf['download_password']);
		unset($emConf['TYPO3_version']);
		unset($emConf['PHP_version']);

		return $emConf;
	}

	/**
	 * Splits a version range into an array.
	 *
	 * If a single version number is given, it is considered a minimum value.
	 * If a dash is found, the numbers left and right are considered as minimum and maximum. Empty values are allowed.
	 *
	 * @param	string		$ver A string with a version range.
	 * @return	array
	 */
	function splitVersionRange($ver)	{
		$versionRange = array();
		if (strstr($ver, '-'))	{
			$versionRange = explode('-', $ver, 2);
		} else {
			$versionRange[0] = $ver;
			$versionRange[1] = '';
		}

		if (!$versionRange[0])	{ $versionRange[0] = '0.0.0'; }
		if (!$versionRange[1])	{ $versionRange[1] = '0.0.0'; }

		return $versionRange;
	}

	/**
	 * Maps remote extensions information into $cat/$list arrays for listing
	 *
	 * @param	boolean		If set the info in the internal extensionsXML array will be unset before returning the result.
	 * @return	array		List array and category index as key 0 / 1 in an array.
	 */
	function prepareImportExtList($unsetProc = false)	{
		$list = array();
		$cat = $this->defaultCategories;
		$filepath = $this->getMirrorURL();

		reset($this->xmlhandler->extensionsXML);
		while (list($extKey, $data) = each($this->xmlhandler->extensionsXML)) {
			$GLOBALS['LANG']->csConvObj->convArray($data,'utf-8',$GLOBALS['LANG']->charSet); // is there a better place for conversion?
			$list[$extKey]['type'] = '_';
			$version = array_keys($data['versions']);
			$extPath = t3lib_div::strtolower($extKey);
			$list[$extKey]['_ICON'] = '<img alt="" src="' . $filepath . $extPath{0} . '/' . $extPath{1} . '/' . $extPath . '_' . end($version) . '.gif" />';
			$list[$extKey]['downloadcounter'] = $data['downloadcounter'];

			foreach(array_keys($data['versions']) as $version) {
				$list[$extKey]['versions'][$version]['downloadcounter'] = $data['versions'][$version]['downloadcounter'];

				$list[$extKey]['versions'][$version]['EM_CONF'] = array(
				'version' => $version,
				'title' => $data['versions'][$version]['title'],
				'description' => $data['versions'][$version]['description'],
				'category' => $data['versions'][$version]['category'],
				'constraints' => $data['versions'][$version]['dependencies'],
				'state' => $data['versions'][$version]['state'],
				'reviewstate' => $data['versions'][$version]['reviewstate'],
				'lastuploaddate' => $data['versions'][$version]['lastuploaddate'],
				'author' => $data['versions'][$version]['authorname'],
				'author_email' => $data['versions'][$version]['authoremail'],
				'author_company' => $data['versions'][$version]['authorcompany'],
				);
			}
			$this->setCat($cat, $list[$extKey]['versions'][$version], $extKey);
			if ($unsetProc)	{
				unset($this->xmlhandler->extensionsXML[$extKey]);
			}
		}

		return array($list,$cat);
	}

	/**
	 * Set category array entries for extension
	 *
	 * @param	array		Category index array
	 * @param	array		Part of list array for extension.
	 * @param	string		Extension key
	 * @return	array		Modified category index array
	 */
	function setCat(&$cat,$listArrayPart,$extKey)	{

		// Getting extension title:
		$extTitle = $listArrayPart['EM_CONF']['title'];

		// Category index:
		$index = $listArrayPart['EM_CONF']['category'];
		$cat['cat'][$index][$extKey] = $extTitle;

		// Author index:
		$index = $listArrayPart['EM_CONF']['author'].($listArrayPart['EM_CONF']['author_company']?', '.$listArrayPart['EM_CONF']['author_company']:'');
		$cat['author_company'][$index][$extKey] = $extTitle;

		// State index:
		$index = $listArrayPart['EM_CONF']['state'];
		$cat['state'][$index][$extKey] = $extTitle;

		// Type index:
		$index = $listArrayPart['type'];
		$cat['type'][$index][$extKey] = $extTitle;

		// Return categories:
		return $cat;
	}










	/*******************************
	*
	* Extension analyzing (detailed information)
	*
	******************************/

	/**
	 * Perform a detailed, technical analysis of the available extension on server!
	 * Includes all kinds of verifications
	 * Takes some time to process, therfore use with care, in particular in listings.
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information
	 * @param	boolean		If set, checks for validity of classes etc.
	 * @return	array		Information in an array.
	 */
	function makeDetailedExtensionAnalysis($extKey,$extInfo,$validity=0)	{

		// Get absolute path of the extension
		$absPath = $this->getExtPath($extKey,$extInfo['type']);

		$infoArray = array();

		$table_class_prefix = substr($extKey,0,5)=='user_' ? 'user_' : 'tx_'.str_replace('_','',$extKey).'_';
		$module_prefix = substr($extKey,0,5)=='user_' ? 'u' : 'tx'.str_replace('_','',$extKey);

		// Database status:
		$dbInfo = $this->checkDBupdates($extKey,$extInfo,1);

		// Database structure required:
		if (is_array($dbInfo['structure']['tables_fields']))	{
			$modify_tables = t3lib_div::trimExplode(',',$extInfo['EM_CONF']['modify_tables'],1);
			$infoArray['dump_tf'] = array();

			foreach($dbInfo['structure']['tables_fields'] as $tN => $d)	{
				if (in_array($tN,$modify_tables))	{
					$infoArray['fields'][] = $tN.': <i>'.
					(is_array($d['fields']) ? implode(', ',array_keys($d['fields'])) : '').
					(is_array($d['keys']) ? ' + '.count($d['keys']).' keys' : '').
					'</i>';
					if (is_array($d['fields']))	{
						reset($d['fields']);
						while(list($fN) = each($d['fields']))	{
							$infoArray['dump_tf'][] = $tN.'.'.$fN;
							if (!t3lib_div::isFirstPartOfStr($fN,$table_class_prefix))	{
								$infoArray['NSerrors']['fields'][$fN] = $fN;
							} else {
								$infoArray['NSok']['fields'][$fN] = $fN;
							}
						}
					}
					if (is_array($d['keys']))	{
						reset($d['keys']);
						while(list($fN)=each($d['keys']))	{
							$infoArray['dump_tf'][] = $tN.'.KEY:'.$fN;
						}
					}
				} else {
					$infoArray['dump_tf'][] = $tN;
					$infoArray['tables'][] = $tN;
					if (!t3lib_div::isFirstPartOfStr($tN,$table_class_prefix))	{
						$infoArray['NSerrors']['tables'][$tN] = $tN;
					} else $infoArray['NSok']['tables'][$tN] = $tN;
				}
			}
			if (count($dbInfo['structure']['diff']['diff']) || count($dbInfo['structure']['diff']['extra']))	{
				$msg = array();
				if (count($dbInfo['structure']['diff']['diff']))	$msg[] = 'missing';
				if (count($dbInfo['structure']['diff']['extra']))	$msg[] = 'of wrong type';
				$infoArray['tables_error'] = 1;
				if (t3lib_extMgm::isLoaded($extKey))	$infoArray['errors'][] = 'Some tables or fields are '.implode(' and ',$msg).'!';
			}
		}

		// Static tables?
		if (is_array($dbInfo['static']))	{
			$infoArray['static'] = array_keys($dbInfo['static']);

			foreach($dbInfo['static'] as $tN => $d)	{
				if (!$d['exists'])	{
					$infoArray['static_error'] = 1;
					if (t3lib_extMgm::isLoaded($extKey))	$infoArray['errors'][] = 'Static table(s) missing!';
					if (!t3lib_div::isFirstPartOfStr($tN,$table_class_prefix))	{
						$infoArray['NSerrors']['tables'][$tN] = $tN;
					} else $infoArray['NSok']['tables'][$tN] = $tN;
				}
			}
		}

		// Backend Module-check:
		$knownModuleList = t3lib_div::trimExplode(',',$extInfo['EM_CONF']['module'],1);
		foreach($knownModuleList as $mod)	{
			if (@is_dir($absPath.$mod))	{
				if (@is_file($absPath.$mod.'/conf.php'))	{
					$confFileInfo = $this->modConfFileAnalysis($absPath.$mod.'/conf.php');
					if (is_array($confFileInfo['TYPO3_MOD_PATH']))	{
						$shouldBePath = $this->typeRelPaths[$extInfo['type']].$extKey.'/'.$mod.'/';
						if (strcmp($confFileInfo['TYPO3_MOD_PATH'][1][1],$shouldBePath))	{
							$infoArray['errors'][] = 'Configured TYPO3_MOD_PATH "'.$confFileInfo['TYPO3_MOD_PATH'][1][1].'" different from "'.$shouldBePath.'"';
						}
					} else {
						// It seems like TYPO3_MOD_PATH and therefore also this warning is no longer needed.
						// $infoArray['errors'][] = 'No definition of TYPO3_MOD_PATH constant found inside!';
					}
					if (is_array($confFileInfo['MCONF_name']))	{
						$mName = $confFileInfo['MCONF_name'][1][1];
						$mNameParts = explode('_',$mName);
						$infoArray['moduleNames'][] = $mName;
						if (!t3lib_div::isFirstPartOfStr($mNameParts[0],$module_prefix) &&
						(!$mNameParts[1] || !t3lib_div::isFirstPartOfStr($mNameParts[1],$module_prefix)))	{
							$infoArray['NSerrors']['modname'][] = $mName;
						} else $infoArray['NSok']['modname'][] = $mName;
					} else $infoArray['errors'][] = 'No definition of MCONF[name] variable found inside!';
				} else  $infoArray['errors'][] = 'Backend module conf file "'.$mod.'/conf.php" should exist but does not!';
			} else $infoArray['errors'][] = 'Backend module folder "'.$mod.'/" should exist but does not!';
		}
		$dirs = t3lib_div::get_dirs($absPath);
		if (is_array($dirs))	{
			reset($dirs);
			while(list(,$mod) = each($dirs))	{
				if (!in_array($mod,$knownModuleList) && @is_file($absPath.$mod.'/conf.php'))	{
					$confFileInfo = $this->modConfFileAnalysis($absPath.$mod.'/conf.php');
					if (is_array($confFileInfo))	{
						$infoArray['errors'][] = 'It seems like there is a backend module in "'.$mod.'/conf.php" which is not configured in ext_emconf.php';
					}
				}
			}
		}

		// ext_tables.php:
		if (@is_file($absPath.'ext_tables.php'))	{
			$content = t3lib_div::getUrl($absPath.'ext_tables.php');
			if (stristr($content,'t3lib_extMgm::addModule'))	$infoArray['flags'][] = 'Module';
			if (stristr($content,'t3lib_extMgm::insertModuleFunction'))	$infoArray['flags'][] = 'Module+';
			if (stristr($content,'t3lib_div::loadTCA'))	$infoArray['flags'][] = 'loadTCA';
			if (stristr($content,'$TCA['))	$infoArray['flags'][] = 'TCA';
			if (stristr($content,'t3lib_extMgm::addPlugin'))	$infoArray['flags'][] = 'Plugin';
		}

		// ext_localconf.php:
		if (@is_file($absPath.'ext_localconf.php'))	{
			$content = t3lib_div::getUrl($absPath.'ext_localconf.php');
			if (stristr($content,'t3lib_extMgm::addPItoST43'))	$infoArray['flags'][]='Plugin/ST43';
			if (stristr($content,'t3lib_extMgm::addPageTSConfig'))	$infoArray['flags'][]='Page-TSconfig';
			if (stristr($content,'t3lib_extMgm::addUserTSConfig'))	$infoArray['flags'][]='User-TSconfig';
			if (stristr($content,'t3lib_extMgm::addTypoScriptSetup'))	$infoArray['flags'][]='TS/Setup';
			if (stristr($content,'t3lib_extMgm::addTypoScriptConstants'))	$infoArray['flags'][]='TS/Constants';
		}

		if (@is_file($absPath.'ext_typoscript_constants.txt'))	{
			$infoArray['TSfiles'][] = 'Constants';
		}
		if (@is_file($absPath.'ext_typoscript_setup.txt'))	{
			$infoArray['TSfiles'][] = 'Setup';
		}
		if (@is_file($absPath.'ext_conf_template.txt'))	{
			$infoArray['conf'] = 1;
		}

		// Classes:
		if ($validity)	{
			$filesInside = $this->getClassIndexLocallangFiles($absPath,$table_class_prefix,$extKey);
			if (is_array($filesInside['errors']))	$infoArray['errors'] = array_merge((array)$infoArray['errors'],$filesInside['errors']);
			if (is_array($filesInside['NSerrors']))	$infoArray['NSerrors'] = array_merge((array)$infoArray['NSerrors'],$filesInside['NSerrors']);
			if (is_array($filesInside['NSok']))	$infoArray['NSok'] = array_merge((array)$infoArray['NSok'],$filesInside['NSok']);
			$infoArray['locallang'] = $filesInside['locallang'];
			$infoArray['classes'] = $filesInside['classes'];
		}

		// Upload folders
		if ($extInfo['EM_CONF']['uploadfolder'])	{
			$infoArray['uploadfolder'] = $this->ulFolder($extKey);
			if (!@is_dir(PATH_site.$infoArray['uploadfolder']))	{
				$infoArray['errors'][] = 'Error: Upload folder "'.$infoArray['uploadfolder'].'" did not exist!';
				$infoArray['uploadfolder'] = '';
			}
		}

		// Create directories:
		if ($extInfo['EM_CONF']['createDirs'])	{
			$infoArray['createDirs'] = array_unique(t3lib_div::trimExplode(',',$extInfo['EM_CONF']['createDirs'],1));
			foreach($infoArray['createDirs'] as $crDir)	{
				if (!@is_dir(PATH_site.$crDir))	{
					$infoArray['errors'][]='Error: Upload folder "'.$crDir.'" did not exist!';
				}
			}
		}

		// Return result array:
		return $infoArray;
	}

	/**
	 * Analyses the php-scripts of an available extension on server
	 *
	 * @param	string		Absolute path to extension
	 * @param	string		Prefix for tables/classes.
	 * @param	string		Extension key
	 * @return	array		Information array.
	 * @see makeDetailedExtensionAnalysis()
	 */
	function getClassIndexLocallangFiles($absPath,$table_class_prefix,$extKey)	{
		$filesInside = t3lib_div::removePrefixPathFromList(t3lib_div::getAllFilesAndFoldersInPath(array(),$absPath,'php,inc',0,99,$this->excludeForPackaging),$absPath);
		$out = array();

		foreach($filesInside as $fileName)	{
			if (substr($fileName,0,4)!='ext_' && substr($fileName,0,6)!='tests/')	{	// ignore supposed-to-be unit tests as well
				$baseName = basename($fileName);
				if (substr($baseName,0,9)=='locallang' && substr($baseName,-4)=='.php')	{
					$out['locallang'][] = $fileName;
				} elseif ($baseName!='conf.php')	{
					if (filesize($absPath.$fileName)<500*1024)	{
						$fContent = t3lib_div::getUrl($absPath.$fileName);
						unset($reg);
						if (preg_match('/\n[[:space:]]*class[[:space:]]*([[:alnum:]_]+)([[:alnum:][:space:]_]*)/',$fContent,$reg))	{

							// Find classes:
							$lines = explode(chr(10),$fContent);
							foreach($lines as $l)	{
								$line = trim($l);
								unset($reg);
								if (preg_match('/^class[[:space:]]*([[:alnum:]_]+)([[:alnum:][:space:]_]*)/',$line,$reg))	{
									$out['classes'][] = $reg[1];
									$out['files'][$fileName]['classes'][] = $reg[1];
									if ($reg[1]!=='ext_update' && substr($reg[1],0,3)!='ux_' && !t3lib_div::isFirstPartOfStr($reg[1],$table_class_prefix) && strcmp(substr($table_class_prefix,0,-1),$reg[1]))	{
										$out['NSerrors']['classname'][] = $reg[1];
									} else $out['NSok']['classname'][] = $reg[1];
								}
							}
							// If class file prefixed 'class.'....
							if (substr($baseName,0,6)=='class.')	{
								$fI = pathinfo($baseName);
								$testName=substr($baseName,6,-(1+strlen($fI['extension'])));
								if ($testName!=='ext_update' && substr($testName,0,3)!='ux_' && !t3lib_div::isFirstPartOfStr($testName,$table_class_prefix) && strcmp(substr($table_class_prefix,0,-1),$testName))	{
									$out['NSerrors']['classfilename'][] = $baseName;
								} else {
									$out['NSok']['classfilename'][] = $baseName;
									if (is_array($out['files'][$fileName]['classes']) && $this->first_in_array($testName,$out['files'][$fileName]['classes'],1))	{
										$out['msg'][] = 'Class filename "'.$fileName.'" did contain the class "'.$testName.'" just as it should.';
									} else $out['errors'][] = 'Class filename "'.$fileName.'" did NOT contain the class "'.$testName.'"!';
								}
							}
							//
							$XclassParts = split('if \(defined\([\'"]TYPO3_MODE[\'"]\) && \$TYPO3_CONF_VARS\[TYPO3_MODE\]\[[\'"]XCLASS[\'"]\]',$fContent,2);
							if (count($XclassParts)==2)	{
								unset($reg);
								preg_match('/^\[[\'"]([[:alnum:]_\/\.]*)[\'"]\]/',$XclassParts[1],$reg);
								if ($reg[1]) {
									$cmpF = 'ext/'.$extKey.'/'.$fileName;
									if (!strcmp($reg[1],$cmpF))	{
										if (preg_match('/_once[[:space:]]*\(\$TYPO3_.ONF_VARS\[TYPO3_MODE\]\[[\'"]XCLASS[\'"]\]\[[\'"]'.preg_quote($cmpF,'/').'[\'"]\]\);/', $XclassParts[1]))	{
											$out['msg'][] = 'XCLASS OK in '.$fileName;
										} else $out['errors'][] = 'Couldn\'t find the include_once statement for XCLASS!';
									} else $out['errors'][] = 'The XCLASS filename-key "'.$reg[1].'" was different from "'.$cmpF.'" which it should have been!';
								} else $out['errors'][] = 'No XCLASS filename-key found in file "'.$fileName.'". Maybe a regex coding error here...';
							} elseif (!$this->first_in_array('ux_',$out['files'][$fileName]['classes'])) $out['errors'][] = 'No XCLASS inclusion code found in file "'.$fileName.'"';
						}
					}
				}
			}
		}
		return $out;
	}

	/**
	 * Reads $confFilePath (a module $conf-file) and returns information on the existence of TYPO3_MOD_PATH definition and MCONF_name
	 *
	 * @param	string		Absolute path to a "conf.php" file of a module which we are analysing.
	 * @return	array		Information found.
	 * @see writeTYPO3_MOD_PATH()
	 */
	function modConfFileAnalysis($confFilePath)	{
		$lines = explode(chr(10),t3lib_div::getUrl($confFilePath));
		$confFileInfo = array();
		$confFileInfo['lines'] = $lines;

		foreach($lines as $k => $l)	{
			$line = trim($l);

			unset($reg);
			if (preg_match('/^define[[:space:]]*\([[:space:]]*["\']TYPO3_MOD_PATH["\'][[:space:]]*,[[:space:]]*["\']([[:alnum:]_\/\.]+)["\'][[:space:]]*\)[[:space:]]*;/',$line,$reg))	{
				$confFileInfo['TYPO3_MOD_PATH'] = array($k,$reg);
			}

			unset($reg);
			if (preg_match('/^\$MCONF\[["\']?name["\']?\][[:space:]]*=[[:space:]]*["\']([[:alnum:]_]+)["\'];/',$line,$reg))	{
				$confFileInfo['MCONF_name'] = array($k,$reg);
			}
		}
		return $confFileInfo;
	}

	/**
	 * Creates a MD5-hash array over the current files in the extension
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	array		MD5-keys
	 */
	function serverExtensionMD5Array($extKey,$conf)	{

		// Creates upload-array - including filelist.
		$mUA = $this->makeUploadArray($extKey,$conf);

		$md5Array = array();
		if (is_array($mUA['FILES']))	{

			// Traverse files.
			foreach($mUA['FILES'] as $fN => $d)	{
				if ($fN!='ext_emconf.php')	{
					$md5Array[$fN] = substr($d['content_md5'],0,4);
				}
			}
		} else debug($mUA);
		return $md5Array;
	}

	/**
	 * Compares two arrays with MD5-hash values for analysis of which files has changed.
	 *
	 * @param	array		Current values
	 * @param	array		Past values
	 * @return	array		Affected files
	 */
	function findMD5ArrayDiff($current,$past)	{
		if (!is_array($current))	$current = array();
		if (!is_array($past))		$past = array();
		$filesInCommon = array_intersect($current,$past);
		$diff1 =  array_keys(array_diff($past,$filesInCommon));
		$diff2 =  array_keys(array_diff($current,$filesInCommon));
		$affectedFiles = array_unique(array_merge($diff1,$diff2));
		return $affectedFiles;
	}










	/***********************************
	*
	* File system operations
	*
	**********************************/

	/**
	 * Creates directories in $extDirPath
	 *
	 * @param	array		Array of directories to create relative to extDirPath, eg. "blabla", "blabla/blabla" etc...
	 * @param	string		Absolute path to directory.
	 * @return	mixed		Returns false on success or an error string
	 */
	function createDirsInPath($dirs,$extDirPath)	{
		if (is_array($dirs))	{
			foreach($dirs as $dir)	{
				$error = t3lib_div::mkdir_deep($extDirPath,$dir);
				if ($error)	return $error;
			}
		}

		return false;
	}

	/**
	 * Removes the extension directory (including content)
	 *
	 * @param	string		Extension directory to remove (with trailing slash)
	 * @param	boolean		If set, will leave the extension directory
	 * @return	boolean		False on success, otherwise error string.
	 */
	function removeExtDirectory($removePath,$removeContentOnly=0)	{
		$errors = array();
		if (@is_dir($removePath) && substr($removePath,-1)=='/' && (
		t3lib_div::isFirstPartOfStr($removePath,PATH_site.$this->typePaths['G']) ||
		t3lib_div::isFirstPartOfStr($removePath,PATH_site.$this->typePaths['L']) ||
		(t3lib_div::isFirstPartOfStr($removePath,PATH_site.$this->typePaths['S']) && $this->systemInstall) ||
		t3lib_div::isFirstPartOfStr($removePath,PATH_site.'fileadmin/_temp_/'))		// Playing-around directory...
		) {

			// All files in extension directory:
			$fileArr = t3lib_div::getAllFilesAndFoldersInPath(array(),$removePath,'',1);
			if (is_array($fileArr))	{

				// Remove files in dirs:
				foreach($fileArr as $removeFile)	{
					if (!@is_dir($removeFile))	{
						if (@is_file($removeFile) && t3lib_div::isFirstPartOfStr($removeFile,$removePath) && strcmp($removeFile,$removePath))	{	// ... we are very paranoid, so we check what cannot go wrong: that the file is in fact within the prefix path!
							@unlink($removeFile);
							clearstatcache();
							if (@is_file($removeFile))	{
								$errors[] = 'Error: "'.$removeFile.'" could not be deleted!';
							}
						} else $errors[] = 'Error: "'.$removeFile.'" was either not a file, or it was equal to the removed directory or simply outside the removed directory "'.$removePath.'"!';
					}
				}

				// Remove directories:
				$remDirs = $this->extractDirsFromFileList(t3lib_div::removePrefixPathFromList($fileArr,$removePath));
				$remDirs = array_reverse($remDirs);	// Must delete outer directories first...
				foreach($remDirs as $removeRelDir)	{
					$removeDir = $removePath.$removeRelDir;
					if (@is_dir($removeDir))	{
						rmdir($removeDir);
						clearstatcache();
						if (@is_dir($removeDir))	{
							$errors[] = 'Error: "'.$removeDir.'" could not be removed (are there files left?)';
						}
					} else $errors[] = 'Error: "'.$removeDir.'" was not a directory!';
				}

				// If extension dir should also be removed:
				if (!$removeContentOnly)	{
					rmdir($removePath);
					clearstatcache();
					if (@is_dir($removePath))	{
						$errors[] = 'Error: Extension directory "'.$removePath.'" could not be removed (are there files or folders left?)';
					}
				}
			} else $errors[] = 'Error: '.$fileArr;
		} else $errors[] = 'Error: Unallowed path to remove: '.$removePath;

		// Return errors if any:
		return implode(chr(10),$errors);
	}

	/**
	 * Removes the current extension of $type and creates the base folder for the new one (which is going to be imported)
	 *
	 * @param	array		Data for imported extension
	 * @param	string		Extension installation scope (L,G,S)
	 * @param	boolean		If set, nothing will be deleted (neither directory nor files)
	 * @return	mixed		Returns array on success (with extension directory), otherwise an error string.
	 */
	function clearAndMakeExtensionDir($importedData,$type,$dontDelete=0)	{
		if (!$importedData['extKey'])	return 'FATAL ERROR: Extension key was not set for some VERY strange reason. Nothing done...';

		// Setting install path (L, G, S or fileadmin/_temp_/)
		$path = '';
		switch((string)$type)	{
			case 'G':
			case 'L':
				$path = PATH_site.$this->typePaths[$type];
				$suffix = '';

				// Creates the typo3conf/ext/ directory if it does NOT already exist:
				if ((string)$type=='L' && !@is_dir($path))	{
					t3lib_div::mkdir($path);
				}
				break;
			default:
				if ($this->systemInstall && (string)$type=='S')	{
					$path = PATH_site.$this->typePaths[$type];
					$suffix = '';
				} else {
					$path = PATH_site.'fileadmin/_temp_/';
					$suffix = '_'.date('dmy-His');
				}
				break;
		}

		// If the install path is OK...
		if ($path && @is_dir($path))	{

			// Set extension directory:
			$extDirPath = $path.$importedData['extKey'].$suffix.'/';

			// Install dir was found, remove it then:
			if (@is_dir($extDirPath))	{
				if($dontDelete) return array($extDirPath);
				$res = $this->removeExtDirectory($extDirPath);
				if ($res) {
					return 'ERROR: Could not remove extension directory "'.$extDirPath.'". Reasons:<br /><br />'.nl2br($res);
				}
			}

			// We go create...
			t3lib_div::mkdir($extDirPath);
			if (!is_dir($extDirPath))	return 'ERROR: Could not create extension directory "'.$extDirPath.'"';
			return array($extDirPath);
		} else return 'ERROR: The extension install path "'.$path.'" was not a directory.';
	}

	/**
	 * Unlink (delete) cache files
	 *
	 * @return	integer		Number of deleted files.
	 */
	function removeCacheFiles()	{
		return t3lib_extMgm::removeCacheFiles();
	}

	/**
	 * Extracts the directories in the $files array
	 *
	 * @param	array		Array of files / directories
	 * @return	array		Array of directories from the input array.
	 */
	function extractDirsFromFileList($files)	{
		$dirs = array();

		if (is_array($files))	{
			// Traverse files / directories array:
			foreach($files as $file)	{
				if (substr($file,-1)=='/')	{
					$dirs[$file] = $file;
				} else {
					$pI = pathinfo($file);
					if (strcmp($pI['dirname'],'') && strcmp($pI['dirname'],'.'))	{
						$dirs[$pI['dirname'].'/'] = $pI['dirname'].'/';
					}
				}
			}
		}
		return $dirs;
	}

	/**
	 * Returns the absolute path where the extension $extKey is installed (based on 'type' (SGL))
	 *
	 * @param	string		Extension key
	 * @param	string		Install scope type: L, G, S
	 * @return	string		Returns the absolute path to the install scope given by input $type variable. It is checked if the path is a directory. Slash is appended.
	 */
	function getExtPath($extKey,$type)	{
		$typeP = $this->typePaths[$type];
		if ($typeP)	{
			$path = PATH_site.$typeP.$extKey.'/';
			return @is_dir($path) ? $path : '';
		} else {
			return '';
		}
	}










	/*******************************
	*
	* Writing to "conf.php" and "localconf.php" files
	*
	******************************/

	/**
	 * Write new TYPO3_MOD_PATH to "conf.php" file.
	 *
	 * @param	string		Absolute path to a "conf.php" file of the backend module which we want to write back to.
	 * @param	string		Install scope type: L, G, S
	 * @param	string		Relative path for the module folder in extenson
	 * @return	string		Returns message about the status.
	 * @see modConfFileAnalysis()
	 */
	function writeTYPO3_MOD_PATH($confFilePath,$type,$mP)	{
		$lines = explode(chr(10),t3lib_div::getUrl($confFilePath));
		$confFileInfo = array();
		$confFileInfo['lines'] = $lines;

		$flag_M = 0;
		$flag_B = 0;

		foreach($lines as $k => $l)	{
			$line = trim($l);

			unset($reg);
			if (preg_match('/^define[[:space:]]*\([[:space:]]*["\']TYPO3_MOD_PATH["\'][[:space:]]*,[[:space:]]*["\']([[:alnum:]_\/\.]+)["\'][[:space:]]*\)[[:space:]]*;/',$line,$reg))	{
				$lines[$k] = str_replace($reg[0], 'define(\'TYPO3_MOD_PATH\', \''.$this->typeRelPaths[$type].$mP.'\');', $lines[$k]);
				$flag_M = $k+1;
			}

			unset($reg);
			if (preg_match('/^\$BACK_PATH[[:space:]]*=[[:space:]]*["\']([[:alnum:]_\/\.]+)["\'][[:space:]]*;/',$line,$reg))	{
				$lines[$k] = str_replace($reg[0], '$BACK_PATH=\''.$this->typeBackPaths[$type].'\';', $lines[$k]);
				$flag_B = $k+1;
			}
		}

		if ($flag_B && $flag_M)	{
			t3lib_div::writeFile($confFilePath,implode(chr(10),$lines));
			return 'TYPO3_MOD_PATH and $BACK_PATH was updated in "'.substr($confFilePath,strlen(PATH_site)).'"';
		} else return 'Error: Either TYPO3_MOD_PATH or $BACK_PATH was not found in the "'.$confFilePath.'" file. You must manually configure that!';
	}

	/**
	 * Writes the extension list to "localconf.php" file
	 * Removes the temp_CACHED* files before return.
	 *
	 * @param	string		List of extensions
	 * @return	void
	 */
	function writeNewExtensionList($newExtList)	{
		global $TYPO3_CONF_VARS;

		// Instance of install tool
		$instObj = new t3lib_install;
		$instObj->allowUpdateLocalConf =1;
		$instObj->updateIdentity = 'TYPO3 Extension Manager';

		// Get lines from localconf file
		$lines = $instObj->writeToLocalconf_control();
		$instObj->setValueInLocalconfFile($lines, '$TYPO3_CONF_VARS[\'EXT\'][\'extList\']', $newExtList);
		$instObj->writeToLocalconf_control($lines);

		$TYPO3_CONF_VARS['EXT']['extList'] = $newExtList;
		$this->removeCacheFiles();
	}

	/**
	 * Writes the TSstyleconf values to "localconf.php"
	 * Removes the temp_CACHED* files before return.
	 *
	 * @param	string		Extension key
	 * @param	array		Configuration array to write back
	 * @return	void
	 */
	function writeTsStyleConfig($extKey,$arr)	{

		// Instance of install tool
		$instObj = new t3lib_install;
		$instObj->allowUpdateLocalConf =1;
		$instObj->updateIdentity = 'TYPO3 Extension Manager';

		// Get lines from localconf file
		$lines = $instObj->writeToLocalconf_control();
		$instObj->setValueInLocalconfFile($lines, '$TYPO3_CONF_VARS[\'EXT\'][\'extConf\'][\''.$extKey.'\']', serialize($arr));	// This will be saved only if there are no linebreaks in it !
		$instObj->writeToLocalconf_control($lines);

		$this->removeCacheFiles();
	}

	/**
	 * Forces update of local EM_CONF. This will renew the information of changed files.
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		Status message
	 */
	function updateLocalEM_CONF($extKey,$extInfo)	{
		$extInfo['EM_CONF']['_md5_values_when_last_written'] = serialize($this->serverExtensionMD5Array($extKey,$extInfo));
		$emConfFileContent = $this->construct_ext_emconf_file($extKey,$extInfo['EM_CONF']);

		$absPath = $this->getExtPath($extKey,$extInfo['type']);
		$emConfFileName = $absPath.'ext_emconf.php';
		if($emConfFileContent)	{

			if(@is_file($emConfFileName))	{
				if(t3lib_div::writeFile($emConfFileName,$emConfFileContent) === true) {
					return '"'.substr($emConfFileName,strlen($absPath)).'" was updated with a cleaned up EM_CONF array.';
				} else {
					return '<strong>Error: "'.$emConfFileName.'" was not writable!</strong>';
				}
			} else return('<strong>Error: No file "'.$emConfFileName.'" found. DON\'T PANIC!</strong>');
		} else {
			return 'No content to write to "'.substr($emConfFileName,strlen($absPath)).'"!';
		}
	}










	/*******************************************
	*
	* Compiling upload information, emconf-file etc.
	*
	*******************************************/

	/**
	 * Compiles the ext_emconf.php file
	 *
	 * @param	string		Extension key
	 * @param	array		EM_CONF array
	 * @return	string		PHP file content, ready to write to ext_emconf.php file
	 */
	function construct_ext_emconf_file($extKey,$EM_CONF)	{

			// clean version number:
		$vDat = $this->renderVersion($EM_CONF['version']);
		$EM_CONF['version']=$vDat['version'];

		$code = '<?php

########################################################################
# Extension Manager/Repository config file for ext: "'.$extKey.'"
#
# Auto generated '.date('d-m-Y H:i').'
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = '.$this->arrayToCode($EM_CONF, 0).';

?>';
		return str_replace(chr(13), '', $code);
	}

	/**
	 * Enter description here...
	 *
	 * @param	unknown_type		$array
	 * @param	unknown_type		$lines
	 * @param	unknown_type		$level
	 * @return	unknown
	 */
	function arrayToCode($array, $level=0) {
		$lines = 'array('.chr(10);
		$level++;
		foreach($array as $k => $v)	{
			if(strlen($k) && is_array($v)) {
				$lines .= str_repeat(chr(9),$level)."'".$k."' => ".$this->arrayToCode($v, $level);
			} elseif(strlen($k)) {
				$lines .= str_repeat(chr(9),$level)."'".$k."' => ".(t3lib_div::testInt($v) ? intval($v) : "'".t3lib_div::slashJS(trim($v),1)."'").','.chr(10);
			}
		}

		$lines .= str_repeat(chr(9),$level-1).')'.($level-1==0 ? '':','.chr(10));
		return $lines;
	}

	/**
	 * Make upload array out of extension
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	mixed		Returns array with extension upload array on success, otherwise an error string.
	 */
	function makeUploadArray($extKey,$conf)	{
		$extPath = $this->getExtPath($extKey,$conf['type']);

		if ($extPath)	{

			// Get files for extension:
			$fileArr = array();
			$fileArr = t3lib_div::getAllFilesAndFoldersInPath($fileArr,$extPath,'',0,99,$this->excludeForPackaging);

			// Calculate the total size of those files:
			$totalSize = 0;
			foreach($fileArr as $file)	{
				$totalSize+=filesize($file);
			}

			// If the total size is less than the upper limit, proceed:
			if ($totalSize < $this->maxUploadSize)	{

				// Initialize output array:
				$uploadArray = array();
				$uploadArray['extKey'] = $extKey;
				$uploadArray['EM_CONF'] = $conf['EM_CONF'];
				$uploadArray['misc']['codelines'] = 0;
				$uploadArray['misc']['codebytes'] = 0;

				$uploadArray['techInfo'] = $this->makeDetailedExtensionAnalysis($extKey,$conf,1);

				// Read all files:
				foreach($fileArr as $file)	{
					$relFileName = substr($file,strlen($extPath));
					$fI = pathinfo($relFileName);
					if ($relFileName!='ext_emconf.php')	{		// This file should be dynamically written...
						$uploadArray['FILES'][$relFileName] = array(
						'name' => $relFileName,
						'size' => filesize($file),
						'mtime' => filemtime($file),
						'is_executable' => (TYPO3_OS=='WIN' ? 0 : is_executable($file)),
						'content' => t3lib_div::getUrl($file)
						);
						if (t3lib_div::inList('php,inc',strtolower($fI['extension'])))	{
							$uploadArray['FILES'][$relFileName]['codelines']=count(explode(chr(10),$uploadArray['FILES'][$relFileName]['content']));
							$uploadArray['misc']['codelines']+=$uploadArray['FILES'][$relFileName]['codelines'];
							$uploadArray['misc']['codebytes']+=$uploadArray['FILES'][$relFileName]['size'];

							// locallang*.php files:
							if (substr($fI['basename'],0,9)=='locallang' && strstr($uploadArray['FILES'][$relFileName]['content'],'$LOCAL_LANG'))	{
								$uploadArray['FILES'][$relFileName]['LOCAL_LANG']=$this->getSerializedLocalLang($file,$uploadArray['FILES'][$relFileName]['content']);
							}
						}
						$uploadArray['FILES'][$relFileName]['content_md5'] = md5($uploadArray['FILES'][$relFileName]['content']);
					}
				}

				// Return upload-array:
				return $uploadArray;
			} else return 'Error: Total size of uncompressed upload ('.$totalSize.') exceeds '.t3lib_div::formatSize($this->maxUploadSize);
		} else {
			return 'Error: Extension path for extension "'.$extKey.'" not found';
		}
	}

	/**
	 * Include a locallang file and return the $LOCAL_LANG array serialized.
	 *
	 * @param	string		Absolute path to locallang file to include.
	 * @param	string		Old content of a locallang file (keeping the header content)
	 * @return	array		Array with header/content as key 0/1
	 * @see makeUploadArray()
	 */
	function getSerializedLocalLang($file,$content)	{
		$returnParts = explode('$LOCAL_LANG',$content,2);

		include($file);
		if (is_array($LOCAL_LANG))	{
			$returnParts[1] = serialize($LOCAL_LANG);
			return $returnParts;
		} else {
			return array();
		}
	}










	/********************************
	*
	* Managing dependencies, conflicts, priorities, load order of extension keys
	*
	*******************************/

	/**
	 * Adds extension to extension list and returns new list. If -1 is returned, an error happend.
	 * Checks dependencies etc.
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array - information about installed extensions
	 * @return	string		New list of installed extensions or -1 if error
	 * @see showExtDetails()
	 */
	function addExtToList($extKey,$instExtInfo)	{
		global $TYPO3_LOADED_EXT;

			// ext_emconf.php information:
		$conf = $instExtInfo[$extKey]['EM_CONF'];

			// Get list of installed extensions and add this one.
		$listArr = array_keys($TYPO3_LOADED_EXT);
		if ($conf['priority']=='top')	{
			array_unshift($listArr,$extKey);
		} else {
			$listArr[]=$extKey;
		}

			// Manage other circumstances:
		$listArr = $this->managesPriorities($listArr,$instExtInfo);
		$listArr = $this->removeRequiredExtFromListArr($listArr);

			// Implode unique list of extensions to load and return:
		$list = implode(',',array_unique($listArr));
		return $list;
	}

	/**
	 * Enter description here...
	 *
	 * @param	string		$extKey
	 * @param	array		$conf
	 * @param	array		$instExtInfo
	 * @return	array
	 */
	function checkDependencies($extKey, $conf, $instExtInfo) {
		$content = '';
		$depError = false;
		$depIgnore = false;
		$msg = array();
		$depsolver = t3lib_div::_POST('depsolver');

		if (isset($conf['constraints']['depends']) && is_array($conf['constraints']['depends'])) {
			foreach($conf['constraints']['depends'] as $depK => $depV)	{
				if($depsolver['ignore'][$depK]) {
					$msg[] = '<br />Dependency on '.$depK.' ignored as requested.
						<input type="hidden" value="1" name="depsolver[ignore]['.$depK.']" />';
					$depIgnore = true;
					continue;
				}
				if($depK == 'php') {
					if(!$depV) continue;
					$versionRange = $this->splitVersionRange($depV);
					$phpv = strstr(PHP_VERSION,'-') ? substr(PHP_VERSION,0,strpos(PHP_VERSION,'-')) : PHP_VERSION; // Linux distributors like to add suffixes, like in 5.1.2-1. Those must be ignored!
					if ($versionRange[0]!='0.0.0' && version_compare($phpv,$versionRange[0],'<'))	{
						$msg[] = '<br />The running PHP version ('.$phpv.') is lower than required ('.$versionRange[0].')';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this version requirement</label>';
						$depError = true;
						continue;
					} elseif ($versionRange[1]!='0.0.0' && version_compare($phpv,$versionRange[1],'>'))	{
						$msg[] = '<br />The running PHP version ('.$phpv.') is higher than allowed ('.$versionRange[1].')';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this version requirement</label>';
						$depError = true;
						continue;
					}

				} elseif ($depK == 'typo3')	{
					if (!$depV) continue;

					$versionRange = $this->splitVersionRange($depV);
					if ($versionRange[0]!='0.0.0' && version_compare(TYPO3_version,$versionRange[0],'<'))	{
						$msg[] = '<br />The running TYPO3 version ('.TYPO3_version.') is lower than required ('.$versionRange[0].')';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this version requirement</label>';
						$depError = true;
						continue;
					} elseif ($versionRange[1]!='0.0.0' && version_compare(TYPO3_version,$versionRange[1],'>'))	{
						$msg[] = '<br />The running TYPO3 version ('.TYPO3_version.') is higher than allowed ('.$versionRange[1].')';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this version requirement</label>';
						$depError = true;
						continue;
					}
				} elseif (strlen($depK) && !t3lib_extMgm::isLoaded($depK))	{	// strlen check for braindead empty dependencies coming from extensions...
					if(!isset($instExtInfo[$depK]))	{
						$msg[] = '<br />Extension "'.$depK.'" was not available in the system. Please import it from the TYPO3 Extension Repository.';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$GLOBALS['BACK_PATH'].'gfx/import.gif" width="12" height="12" title="Import this extension to \'local\' dir typo3conf/ext/ from online repository." alt="" />&nbsp;<a href="index.php?CMD[importExt]='.$depK.'&CMD[loc]=L&CMD[standAlone]=1" target="_blank">Import now (opens a new window)</a>';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this extension requirement</label>';
					} else {
						$msg[] = '<br />Extension "'.$depK.'" ('.$instExtInfo[$depK]['EM_CONF']['title'].') was not installed. Please install it first.';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;'.$this->installButton().'&nbsp;<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$depK.'&CMD[load]=1&CMD[clrCmd]=1&CMD[standAlone]=1&SET[singleDetails]=info').'" target="_blank">Install now (opens a new window)</a>';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this extension requirement</label>';
					}
					$depError = true;
				} else {
					$versionRange = $this->splitVersionRange($depV);
					if ($versionRange[0]!='0.0.0' && version_compare($instExtInfo[$depK]['EM_CONF']['version'],$versionRange[0],'<'))	{
						$msg[] = '<br />The running version of extension "'.$depK.'" ('.$instExtInfo[$depK]['EM_CONF']['version'].') is lower than required ('.$versionRange[0].')';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this version requirement</label>';
						$depError = true;
						continue;
					} elseif ($versionRange[1]!='0.0.0' && version_compare($instExtInfo[$depK]['EM_CONF']['version'],$versionRange[1],'>'))	{
						$msg[] = '<br />The running version of extension "'.$depK.'" ('.$instExtInfo[$depK]['EM_CONF']['version'].') is higher than allowed ('.$versionRange[1].')';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$depK.']" id="checkIgnore_'.$depK.'" /> <label for="checkIgnore_'.$depK.'">Ignore this version requirement</label>';
						$depError = true;
						continue;
					}
				}
			}
		}
		if($depError || $depIgnore) {
			$content.= $this->doc->section('Dependency Error',implode('<br />',$msg),0,1,2);
		}

			// Check conflicts with other extensions:
		$conflictError = false;
		$conflictIgnore = false;
		$msg = array();

		if (isset($conf['constraints']['conflicts']) && is_array($conf['constraints']['conflicts'])) {
			foreach((array)$conf['constraints']['conflicts'] as $conflictK => $conflictV)	{
				if($depsolver['ignore'][$conflictK]) {
					$msg[] = '<br />Conflict with '.$conflictK.' ignored as requested.
						<input type="hidden" value="1" name="depsolver[ignore]['.$conflictK.']" />';
					$conflictIgnore = true;
					continue;
				}
				if (t3lib_extMgm::isLoaded($conflictK))	{
					$versionRange = $this->splitVersionRange($conflictV);
					if ($versionRange[0] != '0.0.0' && version_compare($instExtInfo[$conflictK]['EM_CONF']['version'],$versionRange[0],'<'))	{
						continue;
					}
					elseif ($versionRange[1] != '0.0.0' && version_compare($instExtInfo[$conflictK]['EM_CONF']['version'],$versionRange[1],'>'))	{
						continue;
					}
					$msg[] = 'The extensions "'.$extKey.'" and "'.$conflictK.'" ('.$instExtInfo[$conflictK]['EM_CONF']['title'].') will conflict with each other. Please remove "'.$conflictK.'" if you want to install "'.$extKey.'".';
					$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;'.$this->removeButton().'&nbsp;<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$conflictK.'&CMD[remove]=1&CMD[clrCmd]=1&CMD[standAlone]=1&SET[singleDetails]=info').'" target="_blank">Remove now (opens a new window)</a>';
					$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$conflictK.']" id="checkIgnore_'.$conflictK.'" /> <label for="checkIgnore_'.$conflictK.'">Ignore this conflict error</label>';
					$conflictError = true;
				}
			}
		}
		if($conflictError || $conflictIgnore) {
			$content.= $this->doc->section('Conflict Error',implode('<br />',$msg),0,1,2);
		}

			// Check suggests on other extensions:
		if(isset($conf['constraints']['suggests']) && is_array($conf['constraints']['suggests'])) {
			$suggestion = false;
			$suggestionIgnore = false;
			$msg = array();
			foreach($conf['constraints']['suggests'] as $suggestK => $suggestV)	{
				if($depsolver['ignore'][$suggestK]) {
					$msg[] = '<br />Suggestion of '.$suggestK.' ignored as requested.
				<input type="hidden" value="1" name="depsolver[ignore]['.$suggestK.']" />';
					$suggestionIgnore = true;
					continue;
				}
				if (!t3lib_extMgm::isLoaded($suggestK))	{
					if (!isset($instExtInfo[$suggestK]))	{
						$msg[] = 'Extension "'.$suggestK.'" was not available in the system. You may want to import it from the TYPO3 Extension Repository.';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$GLOBALS['BACK_PATH'].'gfx/import.gif" width="12" height="12" title="Import this extension to \'local\' dir typo3conf/ext/ from online repository." alt="" />&nbsp;<a href="index.php?CMD[importExt]='.$suggestK.'&CMD[loc]=L&CMD[standAlone]=1" target="_blank">Import now (opens a new window)</a>';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$suggestK.']" id="checkIgnore_'.$suggestK.'" /> <label for="checkIgnore_'.$suggestK.'">Ignore this suggestion</label>';
					} else {
						$msg[] = 'Extension "'.$suggestK.'" ('.$instExtInfo[$suggestK]['EM_CONF']['title'].') was not installed. You may want to install it.';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;'.$this->installButton().'&nbsp;<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$suggestK.'&CMD[load]=1&CMD[clrCmd]=1&CMD[standAlone]=1&SET[singleDetails]=info').'" target="_blank">Install now (opens a new window)</a>';
						$msg[] = '&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1" name="depsolver[ignore]['.$suggestK.']" id="checkIgnore_'.$suggestK.'" /> <label for="checkIgnore_'.$suggestK.'">Ignore this suggestion</label>';
					}
					$suggestion = true;
				}
			}
			if($suggestion || $suggestionIgnore) {
				$content .= $this->doc->section('Extensions suggested by extension "'.$extKey.'"',implode('<br />',$msg),0,1,1);
			}
		}

		if($depError || $conflictError || $suggestion) {
			foreach($this->CMD as $k => $v) {
				$content .= '<input type="hidden" name="CMD['.$k.']" value="'.$v.'" />';
			}
			$content .= '<br /><br /><input type="submit" value="Try again" />';

			return array('returnCode' => false, 'html' => '<form action="index.php" method="post" name="depform">'.$content.'</form>');
		}

		return array('returnCode' => true);
	}

	/**
	 * Remove extension key from the list of currently installed extensions and return list. If -1 is returned, an error happend.
	 * Checks dependencies etc.
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array - information about installed extensions
	 * @return	string		New list of installed extensions or -1 if error
	 * @see showExtDetails()
	 */
	function removeExtFromList($extKey,$instExtInfo)	{
		global $TYPO3_LOADED_EXT;

			// Initialize:
		$depList = array();
		$listArr = array_keys($TYPO3_LOADED_EXT);

			// Traverse all installed extensions to check if any of them have this extension as dependency since if that is the case it will not work out!
		foreach($listArr as $k => $ext)	{
			if ($instExtInfo[$ext]['EM_CONF']['dependencies'])	{
				$dep = t3lib_div::trimExplode(',',$instExtInfo[$ext]['EM_CONF']['dependencies'],1);
				if (in_array($extKey,$dep))	{
					$depList[] = $ext;
				}
			}
			if (!strcmp($ext,$extKey))	unset($listArr[$k]);
		}

			// Returns either error or the new list
		if (count($depList))	{
			$msg = 'The extension(s) "'.implode(', ',$depList).'" depends on the extension you are trying to remove. The operation was not completed.';
			$this->content.=$this->doc->section('Dependency Error',$msg,0,1,2);
			return -1;
		} else {
			$listArr = $this->removeRequiredExtFromListArr($listArr);
			$list = implode(',',array_unique($listArr));
			return $list;
		}
	}

	/**
	 * This removes any required extensions from the $listArr - they should NOT be added to the common extension list, because they are found already in "requiredExt" list
	 *
	 * @param	array		Array of extension keys as values
	 * @return	array		Modified array
	 * @see removeExtFromList(), addExtToList()
	 */
	function removeRequiredExtFromListArr($listArr)	{
		foreach($listArr as $k => $ext)	{
			if (in_array($ext,$this->requiredExt) || !strcmp($ext,'_CACHEFILE'))	unset($listArr[$k]);
		}
		return $listArr;
	}

	/**
	 * Traverse the array of installed extensions keys and arranges extensions in the priority order they should be in
	 *
	 * @param	array		Array of extension keys as values
	 * @param	array		Extension information array
	 * @return	array		Modified array of extention keys as values
	 * @see addExtToList()
	 */
	function managesPriorities($listArr,$instExtInfo)	{

			// Initialize:
		$levels = array(
			'top' => array(),
			'middle' => array(),
			'bottom' => array(),
		);

			// Traverse list of extensions:
		foreach($listArr as $ext)	{
			$prio = trim($instExtInfo[$ext]['EM_CONF']['priority']);
			switch((string)$prio)	{
				case 'top':
				case 'bottom':
					$levels[$prio][] = $ext;
					break;
				default:
					$levels['middle'][] = $ext;
					break;
			}
		}
		return array_merge(
			$levels['top'],
			$levels['middle'],
			$levels['bottom']
		);
	}










	/*******************************
	*
	* System Update functions (based on extension requirements)
	*
	******************************/

	/**
	 * Check if clear-cache should be performed, otherwise show form (for installation of extension)
	 * Shown only if the extension has the clearCacheOnLoad flag set.
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		HTML output (if form is shown)
	 */
	function checkClearCache($extInfo)	{
		if ($extInfo['EM_CONF']['clearCacheOnLoad'])	{
			if (t3lib_div::_POST('_clear_all_cache'))	{		// Action: Clearing the cache
				$tce = t3lib_div::makeInstance('t3lib_TCEmain');
				$tce->stripslashes_values = 0;
				$tce->start(Array(),Array());
				$tce->clear_cacheCmd('all');
			} else {	// Show checkbox for clearing cache:
				$content.= '
					<br />
					<h3>Clear cache</h3>
					<p>This extension requests the cache to be cleared when it is installed/removed.<br />
						<label for="check_clear_all_cache">Clear all cache:</label> <input type="checkbox" name="_clear_all_cache" id="check_clear_all_cache" checked="checked" value="1" /><br />
					</p>
				';
			}
		}
		return $content;
	}

	/**
	 * Check if upload folder / "createDir" directories should be created.
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	string		HTML content.
	 */
	function checkUploadFolder($extKey,$extInfo)	{

			// Checking for upload folder:
		$uploadFolder = PATH_site.$this->ulFolder($extKey);
		if ($extInfo['EM_CONF']['uploadfolder'] && !@is_dir($uploadFolder))	{
			if (t3lib_div::_POST('_uploadfolder'))	{	// CREATE dir:
				t3lib_div::mkdir($uploadFolder);
				$indexContent = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML>
<HEAD>
	<TITLE></TITLE>
<META http-equiv=Refresh Content="0; Url=../../">
</HEAD>
</HTML>';
				t3lib_div::writeFile($uploadFolder.'index.html',$indexContent);
			} else {	// Show checkbox / HTML for creation:
				$content.='
					<br /><h3>Create upload folder</h3>
					<p>The extension requires the upload folder "'.$this->ulFolder($extKey).'" to exist.<br />
				<label for="check_uploadfolder">Create directory "'.$this->ulFolder($extKey).'":</label> <input type="checkbox" name="_uploadfolder" id="check_uploadfolder" checked="checked" value="1" /><br />
				</p>
				';
			}
		}

			// Additional directories that should be created:
		if ($extInfo['EM_CONF']['createDirs'])	{
			$createDirs = array_unique(t3lib_div::trimExplode(',',$extInfo['EM_CONF']['createDirs'],1));

			foreach($createDirs as $crDir)	{
				if (!@is_dir(PATH_site.$crDir))	{
					if (t3lib_div::_POST('_createDir_'.md5($crDir)))	{	// CREATE dir:

							// Initialize:
						$crDirStart = '';
						$dirs_in_path = explode('/',preg_replace('/\/$/','',$crDir));

							// Traverse each part of the dir path and create it one-by-one:
						foreach($dirs_in_path as $dirP)	{
							if (strcmp($dirP,''))	{
								$crDirStart.= $dirP.'/';
								if (!@is_dir(PATH_site.$crDirStart))	{
									t3lib_div::mkdir(PATH_site.$crDirStart);
									$finalDir = PATH_site.$crDirStart;
								}
							} else {
								die('ERROR: The path "'.PATH_site.$crDir.'" could not be created.');
							}
						}
						if ($finalDir)	{
							$indexContent = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML>
<HEAD>
	<TITLE></TITLE>
<META http-equiv=Refresh Content="0; Url=/">
</HEAD>
</HTML>';
							t3lib_div::writeFile($finalDir.'index.html',$indexContent);
						}
					} else {	// Show checkbox / HTML for creation:
						$md5CrDir = md5($crDir);
						$content.='
							<br />
							<h3>Create folder</h3>
							<p>The extension requires the folder "'.$crDir.'" to exist.<br />
						<label for="check_createDir_'.$md5CrDir.'">Create directory "'.$crDir.'":</label> <input type="checkbox" name="_createDir_'.$md5CrDir.'" id="check_createDir_'.$md5CrDir.'" checked="checked" value="1" /><br />
						</p>
						';
					}
				}
			}
		}

		return $content;
	}

	/**
	 * Validates the database according to extension requirements
	 * Prints form for changes if any. If none, returns blank. If an update is ordered, empty is returned as well.
	 * DBAL compliant (based on Install Tool code)
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @param	boolean		If true, returns array with info.
	 * @return	mixed		If $infoOnly, returns array with information. Otherwise performs update.
	 */
	function checkDBupdates($extKey,$extInfo,$infoOnly=0)	{

			// Initializing Install Tool object:
		$instObj = new t3lib_install;
		$instObj->INSTALL = t3lib_div::_GP('TYPO3_INSTALL');
		$dbStatus = array();

			// Updating tables and fields?
		if (is_array($extInfo['files']) && in_array('ext_tables.sql', $extInfo['files'])) {
			$fileContent = t3lib_div::getUrl($this->getExtPath($extKey,$extInfo['type']).'ext_tables.sql');

			$FDfile = $instObj->getFieldDefinitions_fileContent($fileContent);
			if (count($FDfile)) {
				$FDdb = $instObj->getFieldDefinitions_database(TYPO3_db);
				$diff = $instObj->getDatabaseExtra($FDfile, $FDdb);
				$update_statements = $instObj->getUpdateSuggestions($diff);

				$dbStatus['structure']['tables_fields'] = $FDfile;
				$dbStatus['structure']['diff'] = $diff;

					// Updating database...
				if (!$infoOnly && is_array($instObj->INSTALL['database_update']))	{
					$instObj->performUpdateQueries($update_statements['add'],$instObj->INSTALL['database_update']);
					$instObj->performUpdateQueries($update_statements['change'],$instObj->INSTALL['database_update']);
					$instObj->performUpdateQueries($update_statements['create_table'],$instObj->INSTALL['database_update']);
				} else {
					$content.=$instObj->generateUpdateDatabaseForm_checkboxes($update_statements['add'],'Add fields');
					$content.=$instObj->generateUpdateDatabaseForm_checkboxes($update_statements['change'],'Changing fields',1,0,$update_statements['change_currentValue']);
					$content.=$instObj->generateUpdateDatabaseForm_checkboxes($update_statements['create_table'],'Add tables');
				}
			}
		}

			// Importing static tables?
		if (is_array($extInfo['files']) && in_array('ext_tables_static+adt.sql',$extInfo['files']))	{
			$fileContent = t3lib_div::getUrl($this->getExtPath($extKey,$extInfo['type']).'ext_tables_static+adt.sql');

			$statements = $instObj->getStatementArray($fileContent,1);
			list($statements_table, $insertCount) = $instObj->getCreateTables($statements,1);

				// Execute import of static table content:
			if (!$infoOnly && is_array($instObj->INSTALL['database_import']))	{

					// Traverse the tables
				foreach($instObj->INSTALL['database_import'] as $table => $md5str)	{
					if ($md5str == md5($statements_table[$table]))	{
						$GLOBALS['TYPO3_DB']->admin_query('DROP TABLE IF EXISTS '.$table);
						$GLOBALS['TYPO3_DB']->admin_query($statements_table[$table]);

						if ($insertCount[$table])	{
							$statements_insert = $instObj->getTableInsertStatements($statements, $table);

							foreach($statements_insert as $v)	{
								$GLOBALS['TYPO3_DB']->admin_query($v);
							}
						}
					}
				}
			} else {
				$whichTables = $instObj->getListOfTables();
				if (count($statements_table))	{
					$out = '';
					foreach($statements_table as $table => $definition)	{
						$exist = isset($whichTables[$table]);

						$dbStatus['static'][$table]['exists'] = $exist;
						$dbStatus['static'][$table]['count'] = $insertCount[$table];

						$out.= '<tr>
							<td><input type="checkbox" name="TYPO3_INSTALL[database_import]['.$table.']" checked="checked" value="'.md5($definition).'" /></td>
							<td><strong>'.$table.'</strong></td>
							<td><img src="clear.gif" width="10" height="1" alt="" /></td>
							<td nowrap="nowrap">'.($insertCount[$table]?'Rows: '.$insertCount[$table]:'').'</td>
							<td><img src="clear.gif" width="10" height="1" alt="" /></td>
							<td nowrap="nowrap">'.($exist?'<img src="'.$GLOBALS['BACK_PATH'].'gfx/icon_warning.gif" width="18" height="16" align="top" alt="" />Table exists!':'').'</td>
							</tr>';
					}
					$content.= '
						<br />
						<h3>Import static data</h3>
						<table border="0" cellpadding="0" cellspacing="0">'.$out.'</table>
						';
				}
			}
		}

			// Return array of information if $infoOnly, otherwise content.
		return $infoOnly ? $dbStatus : $content;
	}

	/**
	 * Updates the database according to extension requirements
	 * DBAL compliant (based on Install Tool code)
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @return	void
	 */
	function forceDBupdates($extKey, $extInfo)	{
		$instObj = new t3lib_install;

			// Updating tables and fields?
		if (is_array($extInfo['files']) && in_array('ext_tables.sql',$extInfo['files']))	{
			$fileContent = t3lib_div::getUrl($this->getExtPath($extKey,$extInfo['type']).'ext_tables.sql');

			$FDfile = $instObj->getFieldDefinitions_fileContent($fileContent);
			if (count($FDfile))	{
				$FDdb = $instObj->getFieldDefinitions_database(TYPO3_db);
				$diff = $instObj->getDatabaseExtra($FDfile, $FDdb);
				$update_statements = $instObj->getUpdateSuggestions($diff);

				foreach((array)$update_statements['add'] as $string)	{
					$GLOBALS['TYPO3_DB']->admin_query($string);
				}
				foreach((array)$update_statements['change'] as $string)	{
					$GLOBALS['TYPO3_DB']->admin_query($string);
				}
				foreach((array)$update_statements['create_table'] as $string)	{
					$GLOBALS['TYPO3_DB']->admin_query($string);
				}
			}
		}

			// Importing static tables?
		if (is_array($extInfo['files']) && in_array('ext_tables_static+adt.sql',$extInfo['files']))	{
			$fileContent = t3lib_div::getUrl($this->getExtPath($extKey,$extInfo['type']).'ext_tables_static+adt.sql');

			$statements = $instObj->getStatementArray($fileContent,1);
			list($statements_table, $insertCount) = $instObj->getCreateTables($statements,1);

				// Traverse the tables
			foreach($statements_table as $table => $query)	{
				$GLOBALS['TYPO3_DB']->admin_query('DROP TABLE IF EXISTS '.$table);
				$GLOBALS['TYPO3_DB']->admin_query($query);

				if ($insertCount[$table])	{
					$statements_insert = $instObj->getTableInsertStatements($statements, $table);

					foreach($statements_insert as $v)	{
						$GLOBALS['TYPO3_DB']->admin_query($v);
					}
				}
			}
		}
	}

	/**
	 * Produces the config form for an extension (if any template file, ext_conf_template.txt is found)
	 *
	 * @param	string		Extension key
	 * @param	array		Extension information array
	 * @param	boolean		If true, the form HTML content is returned, otherwise the content is set in $this->content.
	 * @param	string		Submit-to URL (supposedly)
	 * @param	string		Additional form fields to include.
	 * @return	string		Depending on $output. Can return the whole form.
	 */
	function tsStyleConfigForm($extKey,$extInfo,$output=0,$script='',$addFields='')	{
		global $TYPO3_CONF_VARS;

			// Initialize:
		$absPath = $this->getExtPath($extKey,$extInfo['type']);
		$relPath = $this->typeRelPaths[$extInfo['type']].$extKey.'/';

			// Look for template file for form:
		if (t3lib_extMgm::isLoaded($extKey) && @is_file($absPath.'ext_conf_template.txt')) {

				// Load tsStyleConfig class and parse configuration template:
			$tsStyleConfig = t3lib_div::makeInstance('t3lib_tsStyleConfig');
			$tsStyleConfig->doNotSortCategoriesBeforeMakingForm = TRUE;
			$theConstants = $tsStyleConfig->ext_initTSstyleConfig(
				t3lib_div::getUrl($absPath.'ext_conf_template.txt'),
				$relPath,
				$absPath,
				$GLOBALS['BACK_PATH']
			);

				// Load the list of resources.
			$tsStyleConfig->ext_loadResources($absPath.'res/');

				// Load current value:
			$arr = unserialize($TYPO3_CONF_VARS['EXT']['extConf'][$extKey]);
			$arr = is_array($arr) ? $arr : array();

				// Call processing function for constants config and data before write and form rendering:
			if (is_array($TYPO3_CONF_VARS['SC_OPTIONS']['typo3/mod/tools/em/index.php']['tsStyleConfigForm']))	{
				$_params = array('fields' => &$theConstants, 'data' => &$arr, 'extKey' => $extKey);
				foreach($TYPO3_CONF_VARS['SC_OPTIONS']['typo3/mod/tools/em/index.php']['tsStyleConfigForm'] as $_funcRef)	{
					t3lib_div::callUserFunction($_funcRef,$_params,$this);
				}
				unset($_params);
			}

				// If saving operation is done:
			if (t3lib_div::_POST('submit'))	{
				$tsStyleConfig->ext_procesInput(t3lib_div::_POST(),array(),$theConstants,array());
				$arr = $tsStyleConfig->ext_mergeIncomingWithExisting($arr);
				$this->writeTsStyleConfig($extKey,$arr);
			}

				// Setting value array
			$tsStyleConfig->ext_setValueArray($theConstants,$arr);

				// Getting session data:
			$MOD_MENU = array();
			$MOD_MENU['constant_editor_cat'] = $tsStyleConfig->ext_getCategoriesForModMenu();
			$MOD_SETTINGS = t3lib_BEfunc::getModuleData($MOD_MENU, t3lib_div::_GP('SET'), 'xMod_test');

				// Resetting the menu (stop)
			if (count($MOD_MENU)>1)	{
				$menu = 'Category: '.t3lib_BEfunc::getFuncMenu(0,'SET[constant_editor_cat]',$MOD_SETTINGS['constant_editor_cat'],$MOD_MENU['constant_editor_cat'],'','&CMD[showExt]='.$extKey);
				$this->content.=$this->doc->section('','<span class="nobr">'.$menu.'</span>');
				$this->content.=$this->doc->spacer(10);
			}

				// Category and constant editor config:
			$form = '
				<table border="0" cellpadding="0" cellspacing="0" width="600">
					<tr>
						<td>'.$tsStyleConfig->ext_getForm($MOD_SETTINGS['constant_editor_cat'],$theConstants,$script,$addFields).'</form></td>
					</tr>
				</table>';
		} else {
			$form = '
				<table border="0" cellpadding="0" cellspacing="0" width="600">
					<tr>
						<td>
							<form action="'.htmlspecialchars($script).'" method="post">'.
								$addFields.'
								<p><img '.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'], 'gfx/icon_note.gif', ' width="18" height="16"').' alt="Note" align="absmiddle" /> This extension provides additional configuration options which become available once it is installed.</p><br />
								<input type="submit" name="write" value="Make updates" />
							</form>
						</td>
					</tr>
				</table>';
		}
		
		if ($output) {
			return $form;
		} else {
			$this->content.=$this->doc->section('', $form);
		}
		
	}










	/*******************************
	*
	* Dumping database (MySQL compliant)
	*
	******************************/

	/**
	 * Makes a dump of the tables/fields definitions for an extension
	 *
	 * @param	array		Array with table => field/key definition arrays in
	 * @return	string		SQL for the table definitions
	 * @see dumpStaticTables()
	 */
	function dumpTableAndFieldStructure($arr)	{
		$tables = array();

		if (count($arr))	{

			// Get file header comment:
			$tables[] = $this->dumpHeader();

			// Traverse tables, write each table/field definition:
			foreach($arr as $table => $fieldKeyInfo)	{
				$tables[] = $this->dumpTableHeader($table,$fieldKeyInfo);
			}
		}

		// Return result:
		return implode(chr(10).chr(10).chr(10),$tables);
	}

	/**
	 * Dump content for static tables
	 *
	 * @param	string		Comma list of tables from which to dump content
	 * @return	string		Returns the content
	 * @see dumpTableAndFieldStructure()
	 */
	function dumpStaticTables($tableList)	{
		$instObj = new t3lib_install;
		$dbFields = $instObj->getFieldDefinitions_database(TYPO3_db);

		$out = '';
		$parts = t3lib_div::trimExplode(',',$tableList,1);

		// Traverse the table list and dump each:
		foreach($parts as $table)	{
			if (is_array($dbFields[$table]['fields']))	{
				$dHeader = $this->dumpHeader();
				$header = $this->dumpTableHeader($table,$dbFields[$table],1);
				$insertStatements = $this->dumpTableContent($table,$dbFields[$table]['fields']);

				$out.= $dHeader.chr(10).chr(10).chr(10).
				$header.chr(10).chr(10).chr(10).
				$insertStatements.chr(10).chr(10).chr(10);
			} else {
				die('Fatal error: Table for dump not found in database...');
			}
		}
		return $out;
	}

	/**
	 * Header comments of the SQL dump file
	 *
	 * @return	string		Table header
	 */
	function dumpHeader()	{
		return trim('
# TYPO3 Extension Manager dump 1.1
#
# Host: '.TYPO3_db_host.'    Database: '.TYPO3_db.'
#--------------------------------------------------------
');
	}

	/**
	 * Dump CREATE TABLE definition
	 *
	 * @param	string		Table name
	 * @param	array		Field and key information (as provided from Install Tool class!)
	 * @param	boolean		If true, add "DROP TABLE IF EXISTS"
	 * @return	string		Table definition SQL
	 */
	function dumpTableHeader($table,$fieldKeyInfo,$dropTableIfExists=0)	{
		$lines = array();
		$dump = '';

		// Create field definitions
		if (is_array($fieldKeyInfo['fields']))	{
			foreach($fieldKeyInfo['fields'] as $fieldN => $data)	{
				$lines[]='  '.$fieldN.' '.$data;
			}
		}

		// Create index key definitions
		if (is_array($fieldKeyInfo['keys']))	{
			foreach($fieldKeyInfo['keys'] as $fieldN => $data)	{
				$lines[]='  '.$data;
			}
		}

		// Compile final output:
		if (count($lines))	{
			$dump = trim('
#
# Table structure for table "'.$table.'"
#
'.($dropTableIfExists ? 'DROP TABLE IF EXISTS '.$table.';
' : '').'CREATE TABLE '.$table.' (
'.implode(','.chr(10),$lines).'
);'
);
		}

		return $dump;
	}

	/**
	 * Dump table content
	 * Is DBAL compliant, but the dump format is written as MySQL standard. If the INSERT statements should be imported in a DBMS using other quoting than MySQL they must first be translated. t3lib_sqlengine can parse these queries correctly and translate them somehow.
	 *
	 * @param	string		Table name
	 * @param	array		Field structure
	 * @return	string		SQL Content of dump (INSERT statements)
	 */
	function dumpTableContent($table,$fieldStructure)	{

		// Substitution of certain characters (borrowed from phpMySQL):
		$search = array('\\', '\'', "\x00", "\x0a", "\x0d", "\x1a");
		$replace = array('\\\\', '\\\'', '\0', '\n', '\r', '\Z');

		$lines = array();

		// Select all rows from the table:
		$result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', $table, '');

		// Traverse the selected rows and dump each row as a line in the file:
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
			$values = array();
			reset($fieldStructure);
			while(list($field) = each($fieldStructure))	{
				$values[] = isset($row[$field]) ? "'".str_replace($search, $replace, $row[$field])."'" : 'NULL';
			}
			$lines[] = 'INSERT INTO '.$table.' VALUES ('.implode(', ',$values).');';
		}

		// Free DB result:
		$GLOBALS['TYPO3_DB']->sql_free_result($result);

		// Implode lines and return:
		return implode(chr(10),$lines);
	}

	/**
	 * Gets the table and field structure from database.
	 * Which fields and which tables are determined from the ext_tables.sql file
	 *
	 * @param	string		Array with table.field values
	 * @return	array		Array of tables and fields splitted.
	 */
	function getTableAndFieldStructure($parts)	{
		// Instance of install tool
		$instObj = new t3lib_install;
		$dbFields = $instObj->getFieldDefinitions_database(TYPO3_db);


		$outTables = array();
		foreach($parts as $table)	{
			$tP = explode('.',$table);
			if ($tP[0] && isset($dbFields[$tP[0]]))	{
				if ($tP[1])	{
					$kfP = explode('KEY:',$tP[1],2);
					if (count($kfP)==2 && !$kfP[0])	{	// key:
						if (isset($dbFields[$tP[0]]['keys'][$kfP[1]]))	$outTables[$tP[0]]['keys'][$kfP[1]] = $dbFields[$tP[0]]['keys'][$kfP[1]];
					} else {
						if (isset($dbFields[$tP[0]]['fields'][$tP[1]]))	$outTables[$tP[0]]['fields'][$tP[1]] = $dbFields[$tP[0]]['fields'][$tP[1]];
					}
				} else {
					$outTables[$tP[0]] = $dbFields[$tP[0]];
				}
			}
		}

		return $outTables;
	}










	/*******************************
	*
	* TER Communication functions
	*
	******************************/



	/**
	 * Processes return-data from online repository.
	 * Currently only the returned emconf array is written to extension.
	 *
	 * @param	array		Command array returned from TER
	 * @return	string		Message
	 */
	function uploadExtensionToTER($em)	{
		$msg = '';
		$response = $this->terConnection->uploadToTER($em);

		if(!is_array($response)) return $response;

		if($response['resultCode']==TX_TER_RESULT_EXTENSIONSUCCESSFULLYUPLOADED) {
			$em['extInfo']['EM_CONF']['version'] = $response['version'];
			$response['resultMessages'][] = 'The extension is now version: '.$response['version'];
			$response['resultMessages'][] = $this->updateLocalEM_CONF($em['extKey'],$em['extInfo']);
		}

		$msg = '<ul><li>'.implode('</li><li>',$response['resultMessages']).'</li></ul>';
		return $msg;
	}










	/************************************
	*
	* Various helper functions
	*
	************************************/

	/**
	 * Returns subtitles for the extension listings
	 *
	 * @param	string		List order type
	 * @param	string		Key value
	 * @return	string		output.
	 */
	function listOrderTitle($listOrder,$key)	{
		switch($listOrder)	{
			case 'cat':
				return isset($this->categories[$key])?$this->categories[$key]:'<em>['.$key.']</em>';
				break;
			case 'author_company':
				return $key;
				break;
			case 'state':
				return $this->states[$key];
				break;
			case 'type':
				return $this->typeDescr[$key];
				break;
		}
	}

	/**
	 * Returns version information
	 *
	 * @param	string		Version code, x.x.x
	 * @param	string		part: "", "int", "main", "sub", "dev"
	 * @return	string
	 * @see renderVersion()
	 */
	function makeVersion($v,$mode)	{
		$vDat = $this->renderVersion($v);
		return $vDat['version_'.$mode];
	}

	/**
	 * Parses the version number x.x.x and returns an array with the various parts.
	 *
	 * @param	string		Version code, x.x.x
	 * @param	string		Increase version part: "main", "sub", "dev"
	 * @return	string
	 */
	function renderVersion($v,$raise='')	{
		$parts = t3lib_div::intExplode('.',$v.'..');
		$parts[0] = t3lib_div::intInRange($parts[0],0,999);
		$parts[1] = t3lib_div::intInRange($parts[1],0,999);
		$parts[2] = t3lib_div::intInRange($parts[2],0,999);

		switch((string)$raise)	{
			case 'main':
				$parts[0]++;
				$parts[1]=0;
				$parts[2]=0;
				break;
			case 'sub':
				$parts[1]++;
				$parts[2]=0;
				break;
			case 'dev':
				$parts[2]++;
				break;
		}

		$res = array();
		$res['version'] = $parts[0].'.'.$parts[1].'.'.$parts[2];
		$res['version_int'] = intval($parts[0]*1000000+$parts[1]*1000+$parts[2]);
		$res['version_main'] = $parts[0];
		$res['version_sub'] = $parts[1];
		$res['version_dev'] = $parts[2];

		return $res;
	}

	/**
	 * Returns upload folder for extension
	 *
	 * @param	string		Extension key
	 * @return	string		Upload folder for extension
	 */
	function ulFolder($extKey)	{
		return 'uploads/tx_'.str_replace('_','',$extKey).'/';
	}

	/**
	 * Returns true if global OR local installation of extensions is allowed/possible.
	 *
	 * @return	boolean		Returns true if global OR local installation of extensions is allowed/possible.
	 */
	function importAtAll()	{
		return ($GLOBALS['TYPO3_CONF_VARS']['EXT']['allowGlobalInstall'] || $GLOBALS['TYPO3_CONF_VARS']['EXT']['allowLocalInstall']);
	}

	/**
	 * Reports back if installation in a certain scope is possible.
	 *
	 * @param	string		Scope: G, L, S
	 * @param	string		Extension lock-type (eg. "L" or "G")
	 * @return	boolean		True if installation is allowed.
	 */
	function importAsType($type,$lockType='')	{
		switch($type)	{
			case 'G':
				return $GLOBALS['TYPO3_CONF_VARS']['EXT']['allowGlobalInstall'] && (!$lockType || !strcmp($lockType,$type));
				break;
			case 'L':
				return $GLOBALS['TYPO3_CONF_VARS']['EXT']['allowLocalInstall'] && (!$lockType || !strcmp($lockType,$type));
				break;
			case 'S':
				return $this->systemInstall;
				break;
			default:
				return false;
		}
	}

	/**
	 * Returns true if extensions in scope, $type, can be deleted (or installed for that sake)
	 *
	 * @param	string		Scope: "G" or "L"
	 * @return	boolean		True if possible.
	 */
	function deleteAsType($type)	{
		switch($type)	{
			case 'G':
				return $GLOBALS['TYPO3_CONF_VARS']['EXT']['allowGlobalInstall'];
				break;
			case 'L':
				return $GLOBALS['TYPO3_CONF_VARS']['EXT']['allowLocalInstall'];
				break;
			default:
				return false;
		}
	}

	/**
	 * Evaluates differences in version numbers with three parts, x.x.x. Returns true if $v1 is greater than $v2
	 *
	 * @param	string		Version number 1
	 * @param	string		Version number 2
	 * @param	integer		Tolerance factor. For instance, set to 1000 to ignore difference in dev-version (third part)
	 * @return	boolean		True if version 1 is greater than version 2
	 */
	function versionDifference($v1,$v2,$div=1)	{
		return floor($this->makeVersion($v1,'int')/$div) > floor($this->makeVersion($v2,'int')/$div);
	}

	/**
	 * Returns true if the $str is found as the first part of a string in $array
	 *
	 * @param	string		String to test with.
	 * @param	array		Input array
	 * @param	boolean		If set, the test is case insensitive
	 * @return	boolean		True if found.
	 */
	function first_in_array($str,$array,$caseInsensitive=FALSE)	{
		if ($caseInsensitive)	$str = strtolower($str);
		if (is_array($array))	{
			foreach($array as $cl)	{
				if ($caseInsensitive)	$cl = strtolower($cl);
				if (t3lib_div::isFirstPartOfStr($cl,$str))	return true;
			}
		}
		return false;
	}

	/**
	 * Returns the $EM_CONF array from an extensions ext_emconf.php file
	 *
	 * @param	string		Absolute path to EMCONF file.
	 * @param	string		Extension key.
	 * @return	array		EMconf array values.
	 */
	function includeEMCONF($path,$_EXTKEY)	{
		@include($path);
		if(is_array($EM_CONF[$_EXTKEY])) {
			return $this->fixEMCONF($EM_CONF[$_EXTKEY]);
		}
		return false;
	}

	/**
	 * Searches for ->lookUpStr in extension and returns true if found (or if no search string is set)
	 *
	 * @param	string		Extension key
	 * @param	array		Extension content
	 * @return	boolean		If true, display extension in list
	 */
	function searchExtension($extKey,$row) {
		if ($this->lookUpStr)	{
			return (
			stristr($extKey,$this->lookUpStr) ||
			stristr($row['EM_CONF']['title'],$this->lookUpStr) ||
			stristr($row['EM_CONF']['description'],$this->lookUpStr) ||
			stristr($row['EM_CONF']['author'],$this->lookUpStr) ||
			stristr($row['EM_CONF']['author_company'],$this->lookUpStr)
			);
		} else return true;
	}



	/**
	 *  Checks if there are newer versions of installed extensions in the TER
	 *  integrated from the extension "ter_update_check" for TYPO3 4.2 by Christian Welzel
	 *
	 * @return	nothing
	 */
	function checkForUpdates() {
		global $LANG;
		$content = '';

		if (is_file(PATH_site.'typo3temp/extensions.xml.gz'))	{
			$content = $this->showExtensionsToUpdate()
			.t3lib_BEfunc::getFuncCheck(0, 'SET[display_installed]', $this->MOD_SETTINGS['display_installed'], '', '', 'id="checkDisplayInstalled"')
			.'&nbsp;<label for="checkDisplayInstalled">'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:display_nle'). '</label><br/>'
			.t3lib_BEfunc::getFuncCheck(0, 'SET[display_files]', $this->MOD_SETTINGS['display_files'], '', '', 'id="checkDisplayFiles"')
			.'&nbsp;<label for="checkDisplayFiles">'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:display_files').'</label>';
			$this->content .= $this->doc->section($LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:header_upd_ext'), $content, 0, 1);

			$content = $LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:note_last_update').' '.date('Y-m-d H:i',filemtime(PATH_site.'typo3temp/extensions.xml.gz')).'<br />';
		}

		$content .= $LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:note_last_update2');
		$this->content .= $this->doc->section($LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:header_vers_ret'), $content, 0, 1);
	}


	/**
	 *  Displays a list of extensions where a newer version is available
	 *  in the TER than the one that is installed right now
	 *  integrated from the extension "ter_update_check" for TYPO3 4.2 by Christian Welzel
	 *
	 * @return	nothing
	 */
	function showExtensionsToUpdate() {
		global $LANG;
		$extList = $this->getInstalledExtensions();

		$content = '<table border="0" cellpadding="2" cellspacing="1">'.
		'<tr class="bgColor5">'.
			'<td></td>'.
			'<td>'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:tab_mod_name').'</td>'.
			'<td>'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:tab_mod_key').'</td>'.
			'<td>'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:tab_mod_loc_ver').'</td>'.
			'<td>'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:tab_mod_rem_ver').'</td>'.
			'<td>'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:tab_mod_location').'</td>'.
			'<td>'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:tab_mod_comment').'</td>'.
		'</tr>';

		foreach ($extList[0] as $name => $data)	{
			$this->xmlhandler->searchExtensionsXML($name, '', '', false, true);
			if (!is_array($this->xmlhandler->extensionsXML[$name]))	{
				continue;
			}

			$v = $this->xmlhandler->extensionsXML[$name][versions];
			$versions = array_keys($v);
			natsort($versions);
			$lastversion = end($versions);

			if ((t3lib_extMgm::isLoaded($name) || $this->MOD_SETTINGS['display_installed']) &&
				($data[EM_CONF][shy] == 0 || $this->MOD_SETTINGS['display_shy']) &&
				$this->versionDifference($lastversion, $data[EM_CONF][version], 1))	{

				$imgInfo = @getImageSize($this->getExtPath($name,$data['type']).'/ext_icon.gif');
				if (is_array($imgInfo)) {
					$icon = '<img src="'.$GLOBALS['BACK_PATH'].$this->typeRelPaths[$data['type']].$name.'/ext_icon.gif'.'" '.$imgInfo[3].' alt="" />';
				} elseif ($extInfo['_ICON']) {
					$icon = $extInfo['_ICON'];
				} else {
					$icon = '<img src="clear.gif" width="1" height="1" alt="" />';
				}
				$comment = '<table cellpadding="0" cellspacing="0" width="100%">';
				foreach ($versions as $vk) {
					$va = & $v[$vk];
					if (t3lib_div::int_from_ver($vk) <= t3lib_div::int_from_ver($data[EM_CONF][version]))	{
						continue;
					}
					$comment .= '<tr><td valign="top" style="padding-right:2px;border-bottom:1px dotted gray">'.$vk.'</td>'.'<td valign="top" style="border-bottom:1px dotted gray">'.nl2br($va[uploadcomment]).'</td></tr>';
				}
				$comment .= '</table>';

				$serverMD5Array = $this->serverExtensionMD5Array($name,$data);
				if (is_array($serverMD5Array))	{
					ksort($serverMD5Array);
				}
				$currentMD5Array = unserialize($data['EM_CONF']['_md5_values_when_last_written']);
				if (is_array($currentMD5Array))	{
					@ksort($currentMD5Array);
				}
				$warn = '';
				if (strcmp(serialize($currentMD5Array), serialize($serverMD5Array)))	{
					$warn = '<tr class="bgColor4" style="color:red"><td colspan="7">'.$GLOBALS['TBE_TEMPLATE']->rfw('<br /><strong>'.$name.': '.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:msg_warn_diff').'</strong>').'</td></tr>'."\n";
					if ($this->MOD_SETTINGS['display_files'] == 1) {
						$affectedFiles = $this->findMD5ArrayDiff($serverMD5Array,$currentMD5Array);
						if (count($affectedFiles)) {
							$warn .= '<tr class="bgColor4"><td colspan="7"><strong>'.$LANG->sL('LLL:EXT:lang/locallang_mod_tools_em.xml:msg_modified').'</strong><br />'.$GLOBALS['TBE_TEMPLATE']->rfw(implode('<br />',$affectedFiles)).'</td></tr>'."\n";
						}
					}
				}
				$content .= '<tr class="bgColor4"><td valign="top">'.$icon.'</td>'.
'<td valign="top"><a href="?CMD[importExtInfo]='.$name.'">'.$data[EM_CONF][title].'</a></td>'.
'<td valign="top">'.$name.'</td>'.
'<td valign="top" align="right">'.$data[EM_CONF][version].'</td>'.
'<td valign="top" align="right">'.$lastversion.'</td>'.
'<td valign="top" nowrap="nowrap">'.$this->typeLabels[$data['type']].(strlen($data['doubleInstall'])>1?'<strong> '.$GLOBALS['TBE_TEMPLATE']->rfw($extInfo['doubleInstall']).'</strong>':'').'</td>'.
'<td valign="top">'.$comment.'</td></tr>'."\n".
$warn.
'<tr class="bgColor4"><td colspan="7"><hr style="margin:0px" /></td></tr>'."\n";
			}
		}

		return $content.'</table><br/>';
	}


	/**
	 *  Quit output buffering started by ob_gzhandler
	 *
	 *  @return	void
	 */
	private function quitOutputBuffering() {
		while (ob_get_level()) {
			ob_end_clean();
		}

		header('Content-Encoding: None', TRUE);
	}

}

// Include extension?
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['typo3/mod/tools/em/index.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['typo3/mod/tools/em/index.php']);
}

?>
