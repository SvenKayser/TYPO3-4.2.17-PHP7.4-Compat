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
 * Contains a class with Extension Management functions
 *
 * $Id: class.t3lib_extmgm.php 8815 2010-09-19 14:03:57Z ohader $
 * Revised for TYPO3 3.6 July/2003 by Kasper Skaarhoj
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *  114: class t3lib_extMgm
 *
 *              SECTION: PATHS and other evaluation
 *  131:     function isLoaded($key,$exitOnError = 0)
 *  147:     function extPath($key,$script='')
 *  165:     function extRelPath($key)
 *  182:     function siteRelPath($key)
 *  194:     function getCN($key)
 *
 *              SECTION: Adding BACKEND features
 *  227:     function addTCAcolumns($table,$columnArray,$addTofeInterface=0)
 *  251:     function addToAllTCAtypes($table,$str,$specificTypesList='',$position='')
 *  309:     function allowTableOnStandardPages($table)
 *  326:     function addModule($main,$sub='',$position='',$path='')
 *  389:     function insertModuleFunction($modname,$className,$classPath,$title,$MM_key='function',$WS='')
 *  408:     function addPageTSConfig($content)
 *  422:     function addUserTSConfig($content)
 *  437:     function addLLrefForTCAdescr($tca_descr_key,$file_ref)
 *
 *              SECTION: Adding SERVICES features
 *  479:     function addService($extKey, $serviceType, $serviceKey, $info)
 *  547:     function findService($serviceType, $serviceSubType='', $excludeServiceKeys=array())
 *  618:     function deactivateService($serviceType, $serviceKey)
 *
 *              SECTION: Adding FRONTEND features
 *  657:     function addPlugin($itemArray,$type='list_type')
 *  682:     function addPiFlexFormValue($piKeyToMatch,$value)
 *  702:     function addToInsertRecords($table,$content_table='tt_content',$content_field='records')
 *  733:     function addPItoST43($key,$classFile='',$prefix='',$type='list_type',$cached=0)
 *  808:     function addStaticFile($extKey,$path,$title)
 *  827:     function addTypoScriptSetup($content)
 *  841:     function addTypoScriptConstants($content)
 *  858:     function addTypoScript($key,$type,$content,$afterStaticUid=0)
 *
 *              SECTION: INTERNAL EXTENSION MANAGEMENT:
 *  921:     function typo3_loadExtensions()
 *  998:     function _makeIncludeHeader($key,$file)
 * 1019:     function isCacheFilesAvailable($cacheFilePrefix)
 * 1032:     function isLocalconfWritable()
 * 1045:     function cannotCacheFilesWritable($cacheFilePrefix)
 * 1069:     function currentCacheFiles()
 * 1092:     function writeCacheFiles($extensions,$cacheFilePrefix)
 * 1130:     function removeCacheFiles()
 *
 * TOTAL FUNCTIONS: 32
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */
















/**
 * Extension Management functions
 *
 * This class is never instantiated, rather the methods inside is called as functions like
 * 		t3lib_extMgm::isLoaded('my_extension');
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @package TYPO3
 * @subpackage t3lib
 */
final class t3lib_extMgm {


	/**************************************
	 *
	 * PATHS and other evaluation
	 *
	 ***************************************/

	/**
	 * Returns true if the extension with extension key $key is loaded.
	 * Usage: 109
	 *
	 * @param	string		Extension key to test
	 * @param	boolean		If $exitOnError is true and the extension is not loaded the function will die with an error message
	 * @return	boolean
	 */
	public static function isLoaded($key, $exitOnError = 0) {
		global $TYPO3_LOADED_EXT;
		if ($exitOnError && !isset($TYPO3_LOADED_EXT[$key]))	die('Fatal Error: Extension "'.$key.'" was not loaded.');
		return isset($TYPO3_LOADED_EXT[$key]);
	}

	/**
	 * Returns the absolute path to the extension with extension key $key
	 * If the extension is not loaded the function will die with an error message
	 * Useful for internal fileoperations
	 * Usage: 136
	 *
	 * @param	string		Extension key
	 * @param	string		$script is appended to the output if set.
	 * @return	string
	 */
	public static function extPath($key, $script = '') {
		global $TYPO3_LOADED_EXT;
		if (!isset($TYPO3_LOADED_EXT[$key])) {
			#debug(array(debug_backtrace()));
			die('TYPO3 Fatal Error: Extension key "'.$key.'" was NOT loaded! (t3lib_extMgm::extPath)');
		}
		return PATH_site.$TYPO3_LOADED_EXT[$key]['siteRelPath'].$script;
	}

	/**
	 * Returns the relative path to the extension as measured from from the TYPO3_mainDir
	 * If the extension is not loaded the function will die with an error message
	 * Useful for images and links from backend
	 * Usage: 54
	 *
	 * @param	string		Extension key
	 * @return	string
	 */
	public static function extRelPath($key) {
		global $TYPO3_LOADED_EXT;
		if (!isset($TYPO3_LOADED_EXT[$key])) {
			die('TYPO3 Fatal Error: Extension key "'.$key.'" was NOT loaded! (t3lib_extMgm::extRelPath)');
		}
		return $TYPO3_LOADED_EXT[$key]['typo3RelPath'];
	}

	/**
	 * Returns the relative path to the extension as measured from the PATH_site (frontend)
	 * If the extension is not loaded the function will die with an error message
	 * Useful for images and links from the frontend
	 * Usage: 6
	 *
	 * @param	string		Extension key
	 * @return	string
	 */
	public static function siteRelPath($key) {
		return substr(t3lib_extMgm::extPath($key), strlen(PATH_site));
	}

	/**
	 * Returns the correct class name prefix for the extension key $key
	 * Usage: 3
	 *
	 * @param	string		Extension key
	 * @return	string
	 * @internal
	 */
	public static function getCN($key) {
		return substr($key, 0, 5)=='user_' ? 'user_'.str_replace('_', '', substr($key, 5)) : 'tx_'.str_replace('_', '', $key);
	}










	/**************************************
	 *
	 *	 Adding BACKEND features
	 *	 (related to core features)
	 *
	 ***************************************/

	/**
	 * Adding fields to an existing table definition in $TCA
	 * Adds an array with $TCA column-configuration to the $TCA-entry for that table.
	 * This function adds the configuration needed for rendering of the field in TCEFORMS - but it does NOT add the field names to the types lists!
	 * So to have the fields displayed you must also call fx. addToAllTCAtypes or manually add the fields to the types list.
	 * FOR USE IN ext_tables.php FILES
	 * Usage: 4
	 *
	 * @param	string		$table is the table name of a table already present in $TCA with a columns section
	 * @param	array		$columnArray is the array with the additional columns (typical some fields an extension wants to add)
	 * @param	boolean		If $addTofeInterface is true the list of fields are also added to the fe_admin_fieldList.
	 * @return	void
	 */
	public static function addTCAcolumns($table, $columnArray, $addTofeInterface = 0) {
		global $TCA;
		t3lib_div::loadTCA($table);
		if (is_array($columnArray) && is_array($TCA[$table]) && is_array($TCA[$table]['columns'])) {
			$TCA[$table]['columns'] = array_merge($TCA[$table]['columns'], $columnArray);	// Candidate for t3lib_div::array_merge() if integer-keys will some day make trouble...
			if ($addTofeInterface)	$TCA[$table]['feInterface']['fe_admin_fieldList'].=','.implode(',', array_keys($columnArray));
		}
	}

	/**
	 * Makes fields visible in the TCEforms, adding them to the end of (all) "types"-configurations
	 *
	 * Adds a string $str (comma list of field names) to all ["types"][xxx]["showitem"] entries for table $table (unless limited by $specificTypesList)
	 * This is needed to have new fields shown automatically in the TCEFORMS of a record from $table.
	 * Typically this function is called after having added new columns (database fields) with the addTCAcolumns function
	 * FOR USE IN ext_tables.php FILES
	 * Usage: 1
	 *
	 * @param	string		Table name
	 * @param	string		Field list to add.
	 * @param	string		List of specific types to add the field list to. (If empty, all type entries are affected)
	 * @param	string		Insert fields before (default) or after one of this fields (commalist with "before:" or "after:" commands). Example: "before:keywords,--palette--;;4,after:description". Palettes must be passed like in the example no matter how the palette definition looks like in TCA.
	 * @return	void
	 */
	public static function addToAllTCAtypes($table, $str, $specificTypesList = '', $position = '') {
		global $TCA;

		$positionArr = t3lib_div::trimExplode(',', $position, 1);
		$insert = count($position);

		t3lib_div::loadTCA($table);
		$str = trim($str);
		if ($str && is_array($TCA[$table]) && is_array($TCA[$table]['types'])) {
			foreach($TCA[$table]['types'] as $k => $v) {
				if ($specificTypesList === '' || t3lib_div::inList($specificTypesList, $k)) {
					if ($insert) {
						if (count($positionArr)) {
							$append = true;
							$showItem = t3lib_div::trimExplode(',', $TCA[$table]['types'][$k]['showitem'], 1);
							foreach($showItem as $key => $fieldInfo)	{

								$parts = explode(';', $fieldInfo);
								$theField = trim($parts[0]);
								$palette = trim($parts[0]).';;'.trim($parts[2]);

									// insert before: find exact field name or palette with number
								if (in_array($theField, $positionArr) || in_array($palette, $positionArr) || in_array('before:'.$theField, $positionArr) || in_array('before:'.$palette, $positionArr)) {
									$showItem[$key] = $str.', '.$fieldInfo;
									$append = false;
									break;
								}
									// insert after
								if (in_array('after:'.$theField, $positionArr) || in_array('after:'.$palette, $positionArr)) {
									$showItem[$key] = $fieldInfo.', '.$str;
									$append = false;
									break;
								}
							}

								// Not found? Then append.
							if($append) {
								$showItem[] = $str;
							}

							$TCA[$table]['types'][$k]['showitem'] = implode(', ', $showItem);
						}
						else {
							$TCA[$table]['types'][$k]['showitem'] .= ', ' . $str;
						}

					} else {
						$TCA[$table]['types'][$k]['showitem'].=', ' . $str;
					}
				}
			}
		}
	}


	/**
	 * Add tablename to default list of allowed tables on pages (in $PAGES_TYPES)
	 * Will add the $table to the list of tables allowed by default on pages as setup by $PAGES_TYPES['default']['allowedTables']
	 * FOR USE IN ext_tables.php FILES
	 * Usage: 11
	 *
	 * @param	string		Table name
	 * @return	void
	 */
	public static function allowTableOnStandardPages($table) {
		global $PAGES_TYPES;

		$PAGES_TYPES['default']['allowedTables'].=','.$table;
	}

	/**
	 * Adds a module (main or sub) to the backend interface
	 * FOR USE IN ext_tables.php FILES
	 * Usage: 18
	 *
	 * @param	string		$main is the main module key, $sub is the submodule key. So $main would be an index in the $TBE_MODULES array and $sub could be an element in the lists there.
	 * @param	string		$sub is the submodule key. If $sub is not set a blank $main module is created.
	 * @param	string		$position can be used to set the position of the $sub module within the list of existing submodules for the main module. $position has this syntax: [cmd]:[submodule-key]. cmd can be "after", "before" or "top" (or blank which is default). If "after"/"before" then submodule will be inserted after/before the existing submodule with [submodule-key] if found. If not found, the bottom of list. If "top" the module is inserted in the top of the submodule list.
	 * @param	string		$path is the absolute path to the module. If this value is defined the path is added as an entry in $TBE_MODULES['_PATHS'][  main_sub  ] = $path; and thereby tells the backend where the newly added modules is found in the system.
	 * @return	void
	 */
	public static function addModule($main, $sub = '', $position = '', $path = '') {
		global $TBE_MODULES;

		if (isset($TBE_MODULES[$main]) && $sub)	{	// If there is already a main module by this name:

				// Adding the submodule to the correct position:
			list($place, $modRef) = t3lib_div::trimExplode(':', $position, 1);
			$mods = t3lib_div::trimExplode(',', $TBE_MODULES[$main], 1);
			if (!in_array($sub, $mods)) {
				switch(strtolower($place)) {
					case 'after':
					case 'before':
						$pointer = 0;
						reset($mods);
						while(list($k, $m) = each($mods)) {
							if (!strcmp($m, $modRef)) {
								$pointer = strtolower($place)=='after'?$k+1:$k;
							}
						}
						array_splice(
							$mods, 	// The modules array
							$pointer, 		// To insert one position from the end of the list
							0, 		// Don't remove any items, just insert
							$sub	// Module to insert
						);
					break;
					default:
						if (strtolower($place)=='top') {
							array_unshift($mods, $sub);
						} else {
							array_push($mods, $sub);
						}
					break;
				}
			}
				// Re-inserting the submodule list:
			$TBE_MODULES[$main] = implode(',', $mods);
		} else {	// Create new main modules with only one submodule, $sub (or none if $sub is blank)
			$TBE_MODULES[$main] = $sub;
		}

			// Adding path:
		if ($path) {
			$TBE_MODULES['_PATHS'][$main.($sub?'_'.$sub:'')] = $path;
		}
	}

	/**
	 * Adds a module path to TBE_MODULES for used with the module dispatcher, mod.php
	 * Used only for modules that are not placed in the main/sub menu hierarchy by the traditional mechanism of addModule()
	 * Examples for this is context menu functionality (like import/export) which runs as an independent module through mod.php
	 * FOR USE IN ext_tables.php FILES
	 * Example:  t3lib_extMgm::addModulePath('xMOD_tximpexp', t3lib_extMgm::extPath($_EXTKEY).'app/');
	 *
	 * @param	string		$name is the name of the module, refer to conf.php of the module.
	 * @param	string		$path is the absolute path to the module directory inside of which "index.php" and "conf.php" is found.
	 * @return	void
	 */
	public static function addModulePath($name, $path) {
		global $TBE_MODULES;

		$TBE_MODULES['_PATHS'][$name] = $path;
	}

	/**
	 * Adds a "Function menu module" ('third level module') to an existing function menu for some other backend module
	 * The arguments values are generally determined by which function menu this is supposed to interact with
	 * See Inside TYPO3 for information on how to use this function.
	 * FOR USE IN ext_tables.php FILES
	 * Usage: 26
	 *
	 * @param	string		Module name
	 * @param	string		Class name
	 * @param	string		Class path
	 * @param	string		Title of module
	 * @param	string		Menu array key - default is "function"
	 * @param	string		Workspace conditions. Blank means all workspaces, any other string can be a comma list of "online", "offline" and "custom"
	 * @return	void
	 * @see t3lib_SCbase::mergeExternalItems()
	 */
	public static function insertModuleFunction($modname, $className, $classPath, $title, $MM_key = 'function', $WS = '') {
		global $TBE_MODULES_EXT;
		$TBE_MODULES_EXT[$modname]['MOD_MENU'][$MM_key][$className] = array(
			'name' => $className,
			'path' => $classPath,
			'title' => $title,
			'ws' => $WS
		);
	}

	/**
	 * Adds $content to the default Page TSconfig as set in $TYPO3_CONF_VARS[BE]['defaultPageTSconfig']
	 * Prefixed with a [GLOBAL] line
	 * FOR USE IN ext_tables.php/ext_locallang.php FILES
	 * Usage: 5
	 *
	 * @param	string		Page TSconfig content
	 * @return	void
	 */
	public static function addPageTSConfig($content) {
		global $TYPO3_CONF_VARS;
		$TYPO3_CONF_VARS['BE']['defaultPageTSconfig'].="\n[GLOBAL]\n".$content;
	}

	/**
	 * Adds $content to the default User TSconfig as set in $TYPO3_CONF_VARS[BE]['defaultUserTSconfig']
	 * Prefixed with a [GLOBAL] line
	 * FOR USE IN ext_tables.php/ext_locallang.php FILES
	 * Usage: 3
	 *
	 * @param	string		User TSconfig content
	 * @return	void
	 */
	public static function addUserTSConfig($content) {
		global $TYPO3_CONF_VARS;
		$TYPO3_CONF_VARS['BE']['defaultUserTSconfig'].="\n[GLOBAL]\n".$content;
	}

	/**
	 * Adds a reference to a locallang file with TCA_DESCR labels
	 * FOR USE IN ext_tables.php FILES
	 * eg. t3lib_extMgm::addLLrefForTCAdescr('pages', 'EXT:lang/locallang_csh_pages.xml'); for the pages table or t3lib_extMgm::addLLrefForTCAdescr('_MOD_web_layout', 'EXT:cms/locallang_csh_weblayout.php'); for the Web > Page module.
	 * Usage: 31
	 *
	 * @param	string		Description key. Typically a database table (like "pages") but for applications can be other strings, but prefixed with "_MOD_")
	 * @param	string		File reference to locallang file, eg. "EXT:lang/locallang_csh_pages.php" (or ".xml")
	 * @return	void
	 */
	public static function addLLrefForTCAdescr($tca_descr_key, $file_ref) {
		global $TCA_DESCR;
		if ($tca_descr_key) {
			if (!is_array($TCA_DESCR[$tca_descr_key])) {
				$TCA_DESCR[$tca_descr_key] = array();
			}
			if (!is_array($TCA_DESCR[$tca_descr_key]['refs'])) {
				$TCA_DESCR[$tca_descr_key]['refs'] = array();
			}
			$TCA_DESCR[$tca_descr_key]['refs'][] = $file_ref;
		}
	}












	/**************************************
	 *
	 *	 Adding SERVICES features
	 *
	 *   @author	Ren� Fritz <r.fritz@colorcube.de>
	 *
	 ***************************************/

	/**
	 * Adds a service to the global services array
	 *
	 * @param	string		Extension key
	 * @param	string		Service type, cannot be prefixed "tx_"
	 * @param	string		Service key, must be prefixed "tx_" or "user_"
	 * @param	array		Service description array
	 * @return	void
	 * @author	Ren� Fritz <r.fritz@colorcube.de>
	 */
	public static function addService($extKey, $serviceType, $serviceKey, $info) {
		global $T3_SERVICES, $TYPO3_CONF_VARS;

		// even not available services will be included to make it possible to give the admin a feedback of non-available services.
		// but maybe it's better to move non-available services to a different array??

		if ($serviceType &&
			!t3lib_div::isFirstPartOfStr($serviceType, 'tx_') &&
			(t3lib_div::isFirstPartOfStr($serviceKey, 'tx_') || t3lib_div::isFirstPartOfStr($serviceKey, 'user_')) &&
			is_array($info))	{

			$info['priority'] = max(0, min(100, $info['priority']));

			$T3_SERVICES[$serviceType][$serviceKey] = $info;

			$T3_SERVICES[$serviceType][$serviceKey]['extKey'] = $extKey;
			$T3_SERVICES[$serviceType][$serviceKey]['serviceKey'] = $serviceKey;
			$T3_SERVICES[$serviceType][$serviceKey]['serviceType'] = $serviceType;


				// mapping a service key to a service type
				// all service keys begin with tx_ - service types don't
				// this way a selection of a special service key as service type is easy
			$T3_SERVICES[$serviceKey][$serviceKey] = &$T3_SERVICES[$serviceType][$serviceKey];


				// change the priority (and other values) from TYPO3_CONF_VARS
				// $TYPO3_CONF_VARS['T3_SERVICES'][$serviceType][$serviceKey]['priority']
				// even the activation is possible (a unix service might be possible on windows for some reasons)
			if (is_array($TYPO3_CONF_VARS['T3_SERVICES'][$serviceType][$serviceKey])) {

				 	// no check is done here - there might be configuration values only the service type knows about, so we pass everything
				$T3_SERVICES[$serviceType][$serviceKey] = array_merge ($T3_SERVICES[$serviceType][$serviceKey], $TYPO3_CONF_VARS['T3_SERVICES'][$serviceType][$serviceKey]);
			}


				// OS check
				// empty $os means 'not limited to one OS', therefore a check is not needed
			if ($T3_SERVICES[$serviceType][$serviceKey]['available'] && $T3_SERVICES[$serviceType][$serviceKey]['os']!='') {

					// TYPO3_OS is not yet defined
				$os_type = stristr(PHP_OS, 'win')&&!stristr(PHP_OS, 'darwin')?'WIN':'UNIX';

				$os = t3lib_div::trimExplode(',', strtoupper($T3_SERVICES[$serviceType][$serviceKey]['os']));

				if (!in_array($os_type, $os)) {
					t3lib_extMgm::deactivateService($serviceType, $serviceKey);
				}
			}

				// convert subtype list to array for quicker access
			$T3_SERVICES[$serviceType][$serviceKey]['serviceSubTypes'] = array();
			$serviceSubTypes = t3lib_div::trimExplode(',', $info['subtype']);
			foreach ($serviceSubTypes as $subtype) {
				$T3_SERVICES[$serviceType][$serviceKey]['serviceSubTypes'][$subtype] = $subtype;
			}
		}
	}

	/**
	 * Find the available service with highest priority
	 *
	 * @param	string		Service type
	 * @param	string		Service sub type
	 * @param	mixed		Service keys that should be excluded in the search for a service. Array or comma list.
	 * @return	mixed		Service info array if a service was found, FLASE otherwise
	 * @author	Ren� Fritz <r.fritz@colorcube.de>
	 */
	public static function findService($serviceType, $serviceSubType = '', $excludeServiceKeys = array()) {
		global $T3_SERVICES, $T3_VAR, $TYPO3_CONF_VARS;

		$serviceKey = FALSE;
		$serviceInfo = FALSE;
		$priority = 0;
		$quality = 0;

		if (!is_array($excludeServiceKeys) ) {
			$excludeServiceKeys = t3lib_div::trimExplode(',', $excludeServiceKeys, 1);
		}

		if (is_array($T3_SERVICES[$serviceType])) {
			foreach($T3_SERVICES[$serviceType] as $key => $info)	{

				if (in_array($key, $excludeServiceKeys)) {
					continue;
				}

					// select a subtype randomly
					// usefull to start a service by service key without knowing his subtypes - for testing purposes
				if ($serviceSubType=='*') {
					$serviceSubType = key($info['serviceSubTypes']);
				}

					// this matches empty subtype too
				if ($info['available'] && ($info['subtype']==$serviceSubType || $info['serviceSubTypes'][$serviceSubType]) && $info['priority']>=$priority )	{

						// has a lower quality than the already found, therefore we skip this service
					if($info['priority']==$priority && $info['quality']<$quality) {
						continue;
					}

						// service depends on external programs - check if they exists
					if(trim($info['exec'])) {
						require_once(PATH_t3lib.'class.t3lib_exec.php');

						$executables = t3lib_div::trimExplode(',', $info['exec'], 1);
						foreach($executables as $executable) {
							if(!t3lib_exec::checkCommand($executable)) {
								t3lib_extMgm::deactivateService($serviceType, $key);
								$info['available'] = FALSE;
								break;
							}
						}
					}

						// still available after exec check?
					if($info['available']) {
						$serviceKey = $key;
						$priority = $info['priority'];
						$quality = $info['quality'];
					}
				}
			}
		}

		if ($serviceKey) {
			$serviceInfo = $T3_SERVICES[$serviceType][$serviceKey];
		}
		return $serviceInfo;
	}

	/**
	 * Deactivate a service
	 *
	 * @param	string		Service type
	 * @param	string		Service key
	 * @return	void
	 * @author	Ren� Fritz <r.fritz@colorcube.de>
	 */
	public static function deactivateService($serviceType, $serviceKey) {
		global $T3_SERVICES;

			// ... maybe it's better to move non-available services to a different array??
		$T3_SERVICES[$serviceType][$serviceKey]['available'] = FALSE;
	}














	/**************************************
	 *
	 *	 Adding FRONTEND features
	 *	 (related specifically to "cms" extension)
	 *
	 ***************************************/

	/**
	 * Adds an entry to the list of plugins in content elements of type "Insert plugin"
	 * Takes the $itemArray (label, value[,icon]) and adds to the items-array of $TCA[tt_content] elements with CType "listtype" (or another field if $type points to another fieldname)
	 * If the value (array pos. 1) is already found in that items-array, the entry is substituted, otherwise the input array is added to the bottom.
	 * Use this function to add a frontend plugin to this list of plugin-types - or more generally use this function to add an entry to any selectorbox/radio-button set in the TCEFORMS
	 * FOR USE IN ext_tables.php FILES
	 * Usage: 13
	 *
	 * @param	array		Item Array
	 * @param	string		Type (eg. "list_type") - basically a field from "tt_content" table
	 * @return	void
	 */
	public static function addPlugin($itemArray, $type = 'list_type') {
		global $TCA;
		t3lib_div::loadTCA('tt_content');
		if (is_array($TCA['tt_content']['columns']) && is_array($TCA['tt_content']['columns'][$type]['config']['items'])) {
			reset($TCA['tt_content']['columns'][$type]['config']['items']);
			while(list($k, $v) = each($TCA['tt_content']['columns'][$type]['config']['items'])) {
				if (!strcmp($v[1], $itemArray[1])) {
					$TCA['tt_content']['columns'][$type]['config']['items'][$k] = $itemArray;
					return;
				}
			}
			$TCA['tt_content']['columns'][$type]['config']['items'][] = $itemArray;
		}
	}

	/**
	 * Adds an entry to the "ds" array of the tt_content field "pi_flexform".
	 * This is used by plugins to add a flexform XML reference / content for use when they are selected as plugin or content element.
	 * Usage: 0
	 *
	 * @param	string		Plugin key as used in the list_type field. Use the asterisk * to match all list_type values.
	 * @param	string		Either a reference to a flex-form XML file (eg. "FILE:EXT:newloginbox/flexform_ds.xml") or the XML directly.
	 * @param	string		Value of tt_content.CType (Content Type) to match. The default is "list" which corresponds to the "Insert Plugin" content element.  Use the asterisk * to match all CType values.
	 * @return	void
	 * @see addPlugin()
	 */
	public static function addPiFlexFormValue($piKeyToMatch, $value, $CTypeToMatch = 'list') {
		global $TCA;
		t3lib_div::loadTCA('tt_content');

		if (is_array($TCA['tt_content']['columns']) && is_array($TCA['tt_content']['columns']['pi_flexform']['config']['ds'])) {
			$TCA['tt_content']['columns']['pi_flexform']['config']['ds'][$piKeyToMatch.','.$CTypeToMatch] = $value;
		}
	}

	/**
	 * Adds the $table tablename to the list of tables allowed to be includes by content element type "Insert records"
	 * By using $content_table and $content_field you can also use the function for other tables.
	 * FOR USE IN ext_tables.php FILES
	 * Usage: 9
	 *
	 * @param	string		Table name to allow for "insert record"
	 * @param	string		Table name TO WHICH the $table name is applied. See $content_field as well.
	 * @param	string		Field name in the database $content_table in which $table is allowed to be added as a reference ("Insert Record")
	 * @return	void
	 */
	public static function addToInsertRecords($table, $content_table = 'tt_content', $content_field = 'records') {
		global $TCA;
		t3lib_div::loadTCA($content_table);
		if (is_array($TCA[$content_table]['columns']) && isset($TCA[$content_table]['columns'][$content_field]['config']['allowed'])) {
			$TCA[$content_table]['columns'][$content_field]['config']['allowed'].=','.$table;
		}
	}

	/**
	 * Add PlugIn to Static Template #43
	 *
	 * When adding a frontend plugin you will have to add both an entry to the TCA definition of tt_content table AND to the TypoScript template which must initiate the rendering.
	 * Since the static template with uid 43 is the "content.default" and practically always used for rendering the content elements it's very useful to have this function automatically adding the necessary TypoScript for calling your plugin. It will also work for the extension "css_styled_content"
	 * $type determines the type of frontend plugin:
	 * 		"list_type" (default)	- the good old "Insert plugin" entry
	 * 		"menu_type"	- a "Menu/Sitemap" entry
	 * 		"splash_layout" - a "Textbox" entry
	 * 		"CType" - a new content element type
	 * 		"header_layout" - an additional header type (added to the selection of layout1-5)
	 * 		"includeLib" - just includes the library for manual use somewhere in TypoScript.
	 * 	(Remember that your $type definition should correspond to the column/items array in $TCA[tt_content] where you added the selector item for the element! See addPlugin() function)
	 * FOR USE IN ext_locallang.php FILES
	 * Usage: 2
	 *
	 * @param	string		$key is the extension key
	 * @param	string		$classFile is the PHP-class filename relative to the extension root directory. If set to blank a default value is chosen according to convensions.
	 * @param	string		$prefix is used as a - yes, suffix - of the class name (fx. "_pi1")
	 * @param	string		$type, see description above
	 * @param	boolean		If $cached is set as USER content object (cObject) is created - otherwise a USER_INT object is created.
	 * @return	void
	 */
	public static function addPItoST43($key, $classFile = '', $prefix = '', $type = 'list_type', $cached = 0) {
		global $TYPO3_LOADED_EXT;
		$classFile = $classFile ? $classFile : 'pi/class.tx_'.str_replace('_', '', $key).$prefix.'.php';
		$cN = t3lib_extMgm::getCN($key);

			// General plugin:
		if ($cached) {
			$pluginContent = trim('
includeLibs.'.$cN.$prefix.' = '.$TYPO3_LOADED_EXT[$key]['siteRelPath'].$classFile.'
plugin.'.$cN.$prefix.' = USER
plugin.'.$cN.$prefix.' {
  userFunc = '.$cN.$prefix.'->main
}');
		} else {
			$pluginContent = trim('
plugin.'.$cN.$prefix.' = USER_INT
plugin.'.$cN.$prefix.' {
  includeLibs = '.$TYPO3_LOADED_EXT[$key]['siteRelPath'].$classFile.'
  userFunc = '.$cN.$prefix.'->main
}');
		}
		t3lib_extMgm::addTypoScript($key, 'setup', '
# Setting '.$key.' plugin TypoScript
'.$pluginContent);

			// After ST43:
		switch($type) {
			case 'list_type':
				$addLine = 'tt_content.list.20.'.$key.$prefix.' = < plugin.'.$cN.$prefix;
			break;
			case 'menu_type':
				$addLine = 'tt_content.menu.20.'.$key.$prefix.' = < plugin.'.$cN.$prefix;
			break;
			case 'splash_layout':
				$addLine = 'tt_content.splash.'.$key.$prefix.' = < plugin.'.$cN.$prefix;
			break;
			case 'CType':
				$addLine = trim('
tt_content.'.$key.$prefix.' = COA
tt_content.'.$key.$prefix.' {
	10 = < lib.stdheader
	20 = < plugin.'.$cN.$prefix.'
}
				');
			break;
			case 'header_layout':
				$addLine = 'lib.stdheader.10.'.$key.$prefix.' = < plugin.'.$cN.$prefix;
			break;
			case 'includeLib':
				$addLine = 'page.1000 = < plugin.'.$cN.$prefix;
			break;
			default:
				$addLine = '';
			break;
		}
		if ($addLine) {
			t3lib_extMgm::addTypoScript($key, 'setup', '
# Setting '.$key.' plugin TypoScript
'.$addLine.'
', 43);
		}
	}

	/**
	 * Call this method to add an entry in the static template list found in sys_templates
	 * "static template files" are the modern equalent (provided from extensions) to the traditional records in "static_templates"
	 * FOR USE IN ext_locallang.php FILES
	 * Usage: 3
	 *
	 * @param	string		$extKey is of course the extension key
	 * @param	string		$path is the path where the template files (fixed names) include_static.txt (integer list of uids from the table "static_templates"), constants.txt, setup.txt, editorcfg.txt, and include_static_file.txt is found (relative to extPath, eg. 'static/'). The file include_static_file.txt, allows you to include other static templates defined in files, from your static template, and thus corresponds to the field 'include_static_file' in the sys_template table. The syntax for this is a commaseperated list of static templates to include, like:  EXT:css_styled_content/static/,EXT:da_newsletter_subscription/static/,EXT:cc_random_image/pi2/static/
	 * @param	string		$title is the title in the selector box.
	 * @return	void
	 * @see addTypoScript()
	 */
	public static function addStaticFile($extKey, $path, $title) {
		global $TCA;
		t3lib_div::loadTCA('sys_template');
		if ($extKey && $path && is_array($TCA['sys_template']['columns'])) {
			$value = str_replace(',', '', 'EXT:'.$extKey.'/'.$path);
			$itemArray = array(trim($title.' ('.$extKey.')'), $value);
			$TCA['sys_template']['columns']['include_static_file']['config']['items'][] = $itemArray;
		}
	}

	/**
	 * Adds $content to the default TypoScript setup code as set in $TYPO3_CONF_VARS[FE]['defaultTypoScript_setup']
	 * Prefixed with a [GLOBAL] line
	 * FOR USE IN ext_locallang.php FILES
	 * Usage: 6
	 *
	 * @param	string		TypoScript Setup string
	 * @return	void
	 */
	public static function addTypoScriptSetup($content) {
		global $TYPO3_CONF_VARS;
		$TYPO3_CONF_VARS['FE']['defaultTypoScript_setup'].="\n[GLOBAL]\n".$content;
	}

	/**
	 * Adds $content to the default TypoScript constants code as set in $TYPO3_CONF_VARS[FE]['defaultTypoScript_constants']
	 * Prefixed with a [GLOBAL] line
	 * FOR USE IN ext_locallang.php FILES
	 * Usage: 0
	 *
	 * @param	string		TypoScript Constants string
	 * @return	void
	 */
	public static function addTypoScriptConstants($content) {
		global $TYPO3_CONF_VARS;
		$TYPO3_CONF_VARS['FE']['defaultTypoScript_constants'].="\n[GLOBAL]\n".$content;
	}

	/**
	 * Adds $content to the default TypoScript code for either setup, constants or editorcfg as set in $TYPO3_CONF_VARS[FE]['defaultTypoScript_*']
	 * (Basically this function can do the same as addTypoScriptSetup and addTypoScriptConstants - just with a little more hazzle, but also with some more options!)
	 * FOR USE IN ext_locallang.php FILES
	 * Usage: 7
	 *
	 * @param	string		$key is the extension key (informative only).
	 * @param	string		$type is either "setup", "constants" or "editorcfg" and obviously determines which kind of TypoScript code we are adding.
	 * @param	string		$content is the TS content, prefixed with a [GLOBAL] line and a comment-header.
	 * @param	string		$afterStaticUid is either an integer pointing to a uid of a static_template or a string pointing to the "key" of a static_file template ([reduced extension_key]/[local path]). The points is that the TypoScript you add is included only IF that static template is included (and in that case, right after). So effectively the TypoScript you set can specifically overrule settings from those static templates.
	 * @return	void
	 */
	public static function addTypoScript($key, $type, $content, $afterStaticUid = 0) {
		global $TYPO3_CONF_VARS;

		if ($type=='setup' || $type=='editorcfg' || $type=='constants')		{
			$content = '

[GLOBAL]
#############################################
## TypoScript added by extension "'.$key.'"
#############################################

'.$content;
			if ($afterStaticUid) {
				$TYPO3_CONF_VARS['FE']['defaultTypoScript_'.$type.'.'][$afterStaticUid].=$content;
				if ($afterStaticUid==43)	{	// If 'content (default)' is targeted, also add to other 'content rendering templates', eg. css_styled_content
					$TYPO3_CONF_VARS['FE']['defaultTypoScript_'.$type.'.']['cssstyledcontent/static/'].=$content;
				}
			} else {
				$TYPO3_CONF_VARS['FE']['defaultTypoScript_'.$type].=$content;
			}
		}
	}


















	/**************************************
	 *
	 *	 INTERNAL EXTENSION MANAGEMENT:
	 *
	 ***************************************/

	/**
	 * Loading extensions configured in $TYPO3_CONF_VARS['EXT']['extList']
	 *
	 * CACHING ON: ($TYPO3_CONF_VARS['EXT']['extCache'] = 1 or 2)
	 * 		If caching is enabled (and possible), the output will be $extensions['_CACHEFILE'] set to the cacheFilePrefix. Subsequently the cache files must be included then since those will eventually set up the extensions.
	 * 		If cachefiles are not found they will be generated
	 * CACHING OFF:	($TYPO3_CONF_VARS['EXT']['extCache'] = 0)
	 * 		The returned value will be an array where each key is an extension key and the value is an array with filepaths for the extension.
	 * 		This array will later be set in the global var $TYPO3_LOADED_EXT
	 *
	 * Usages of this function can be seen in config_default.php
	 * Extensions are always detected in the order local - global - system.
	 * Usage: 1
	 *
	 * @return	array		Extension Array
	 * @internal
	 */
	public static function typo3_loadExtensions() {
		global $TYPO3_CONF_VARS;

			// Caching behaviour of ext_tables.php and ext_localconf.php files:
		$extensionCacheBehaviour = self::getExtensionCacheBehaviour();
			// Full list of extensions includes both required and extList:
		$rawExtList = self::getEnabledExtensionList();

			// Empty array as a start.
		$extensions = array();

			//
		if ($rawExtList) {
				// The cached File prefix.
			$cacheFilePrefix = self::getCacheFilePrefix();

				// If cache files available, set cache file prefix and return:
			if ($extensionCacheBehaviour && t3lib_extMgm::isCacheFilesAvailable($cacheFilePrefix)) {
					// Return cache file prefix:
				$extensions['_CACHEFILE'] = $cacheFilePrefix;
			} else {	// ... but if not, configure...

					// Prepare reserved filenames:
				$files = t3lib_div::trimExplode(',', 'ext_localconf.php,ext_tables.php,ext_tables.sql,ext_tables_static+adt.sql,ext_typoscript_constants.txt,ext_typoscript_editorcfg.txt,ext_typoscript_setup.txt', 1);

					// Traverse extensions and check their existence:
				clearstatcache();	// Clear file state cache to make sure we get good results from is_dir()
				$temp_extensions = array_unique(t3lib_div::trimExplode(',', $rawExtList, 1));
				foreach($temp_extensions as $temp_extKey) {
						// Check local, global and system locations:
					if (@is_dir(PATH_typo3conf.'ext/'.$temp_extKey.'/')) {
						$extensions[$temp_extKey] = array('type'=>'L', 'siteRelPath'=>'typo3conf/ext/'.$temp_extKey.'/', 'typo3RelPath'=>'../typo3conf/ext/'.$temp_extKey.'/');
					} elseif (@is_dir(PATH_typo3.'ext/'.$temp_extKey.'/')) {
						$extensions[$temp_extKey] = array('type'=>'G', 'siteRelPath'=>TYPO3_mainDir.'ext/'.$temp_extKey.'/', 'typo3RelPath'=>'ext/'.$temp_extKey.'/');
					} elseif (@is_dir(PATH_typo3.'sysext/'.$temp_extKey.'/')) {
						$extensions[$temp_extKey] = array('type'=>'S', 'siteRelPath'=>TYPO3_mainDir.'sysext/'.$temp_extKey.'/', 'typo3RelPath'=>'sysext/'.$temp_extKey.'/');
					}

						// If extension was found, check for reserved filenames:
					if (isset($extensions[$temp_extKey])) {
						foreach($files as $fName) 	{
							$temp_filename = PATH_site.$extensions[$temp_extKey]['siteRelPath'].trim($fName);
							if (is_array($extensions[$temp_extKey]) && @is_file($temp_filename)) {
								$extensions[$temp_extKey][$fName] = $temp_filename;
							}
						}
					}
				}
				unset($extensions['_CACHEFILE']);

					// write cache?
				if ($extensionCacheBehaviour &&
						@is_dir(PATH_typo3.'sysext/') &&
						@is_dir(PATH_typo3.'ext/'))	{	// Must also find global and system extension directories to exist, otherwise caching cannot be allowed (since it is most likely a temporary server problem). This might fix a rare, unrepeatable bug where global/system extensions are not loaded resulting in fatal errors if that is cached!
					$wrError = t3lib_extMgm::cannotCacheFilesWritable($cacheFilePrefix);
					if ($wrError) {
						$TYPO3_CONF_VARS['EXT']['extCache'] = 0;
					} else {
							// Write cache files:
						$extensions = t3lib_extMgm::writeCacheFiles($extensions, $cacheFilePrefix);
					}
				}
			}
		}

		return $extensions;
	}

	/**
	 * Returns the section headers for the compiled cache-files.
	 *
	 * @param	string		$key is the extension key
	 * @param	string		$file is the filename (only informative for comment)
	 * @return	string
	 * @internal
	 */
	public static function _makeIncludeHeader($key, $file) {
		return '<?php
###########################
## EXTENSION: '.$key.'
## FILE:      '.$file.'
###########################

$_EXTKEY = \''.$key.'\';
$_EXTCONF = $TYPO3_CONF_VARS[\'EXT\'][\'extConf\'][$_EXTKEY];

?>';
	}

	/**
	 * Returns true if both the localconf and tables cache file exists (with $cacheFilePrefix)
	 * Usage: 2
	 *
	 * @param	string		Prefix of the cache file to check
	 * @return	boolean
	 * @internal
	 */
	public static function isCacheFilesAvailable($cacheFilePrefix) {
		return
			@is_file(PATH_typo3conf.$cacheFilePrefix.'_ext_localconf.php') &&
			@is_file(PATH_typo3conf.$cacheFilePrefix.'_ext_tables.php');
	}

	/**
	 * Returns true if the "localconf.php" file in "typo3conf/" is writable
	 * Usage: 1
	 *
	 * @return	boolean
	 * @internal
	 */
	public static function isLocalconfWritable() {
		return @is_writable(PATH_typo3conf) && @is_writable(PATH_typo3conf.'localconf.php');
	}

	/**
	 * Returns an error string if typo3conf/ or cache-files with $cacheFilePrefix are NOT writable
	 * Returns false if no problem.
	 * Usage: 1
	 *
	 * @param	string		Prefix of the cache file to check
	 * @return	string
	 * @internal
	 */
	public static function cannotCacheFilesWritable($cacheFilePrefix) {
		$error = array();
		if (!@is_writable(PATH_typo3conf)) {
			$error[] = PATH_typo3conf;
		}
		if (@is_file(PATH_typo3conf.$cacheFilePrefix.'_ext_localconf.php') &&
			!@is_writable(PATH_typo3conf.$cacheFilePrefix.'_ext_localconf.php')) {
				$error[] = PATH_typo3conf.$cacheFilePrefix.'_ext_localconf.php';
		}
		if (@is_file(PATH_typo3conf.$cacheFilePrefix.'_ext_tables.php') &&
			!@is_writable(PATH_typo3conf.$cacheFilePrefix.'_ext_tables.php')) {
				$error[] = PATH_typo3conf.$cacheFilePrefix.'_ext_tables.php';
		}
		return implode(', ', $error);
	}

	/**
	 * Returns an array with the two cache-files (0=>localconf, 1=>tables) from typo3conf/ if they (both) exist. Otherwise false.
	 * Evaluation relies on $TYPO3_LOADED_EXT['_CACHEFILE']
	 * Usage: 2
	 *
+ 	 * @param string $cacheFilePrefix Cache file prefix to be used (optional)
	 * @return	array
	 * @internal
	 */
	public static function currentCacheFiles($cacheFilePrefix = NULL) {
		if (is_null($cacheFilePrefix)) {
			$cacheFilePrefix = $GLOBALS['TYPO3_LOADED_EXT']['_CACHEFILE'];
		}

		if ($cacheFilePrefix) {
			if (t3lib_extMgm::isCacheFilesAvailable($cacheFilePrefix)) {
				return array(
					PATH_typo3conf . $cacheFilePrefix . '_ext_localconf.php',
					PATH_typo3conf . $cacheFilePrefix . '_ext_tables.php'
				);
			}
		}
	}

	/**
	 * Compiles/Creates the two cache-files in typo3conf/ based on $cacheFilePrefix
	 * Returns a array with the key "_CACHEFILE" set to the $cacheFilePrefix value
	 * Usage: 1
	 *
	 * @param	array		Extension information array
	 * @param	string		Prefix for the cache files
	 * @return	array
	 * @internal
	 */
	public static function writeCacheFiles($extensions, $cacheFilePrefix) {
			// Making cache files:
		$extensions['_CACHEFILE'] = $cacheFilePrefix;
		$cFiles = array();
		$cFiles['ext_localconf'].='<?php

$TYPO3_LOADED_EXT = unserialize(stripslashes(\''.addslashes(serialize($extensions)).'\'));

?>';

		reset($extensions);
		while(list($key, $conf) = each($extensions)) {
			if (is_array($conf)) {
				if ($conf['ext_localconf.php']) {
					$cFiles['ext_localconf'].=t3lib_extMgm::_makeIncludeHeader($key, $conf['ext_localconf.php']);
					$cFiles['ext_localconf'].=trim(t3lib_div::getUrl($conf['ext_localconf.php']));
				}
				if ($conf['ext_tables.php']) {
					$cFiles['ext_tables'].=t3lib_extMgm::_makeIncludeHeader($key, $conf['ext_tables.php']);
					$cFiles['ext_tables'].=trim(t3lib_div::getUrl($conf['ext_tables.php']));
				}
			}
		}

		$cFiles['ext_localconf'] = "<?php\n" . preg_replace('/<\?php|\?>/is', '', $cFiles['ext_localconf']) . "?>\n";
		$cFiles['ext_tables'] = "<?php\n" . preg_replace('/<\?php|\?>/is', '', $cFiles['ext_tables']) . "?>\n";

		t3lib_div::writeFile(PATH_typo3conf.$cacheFilePrefix.'_ext_localconf.php', $cFiles['ext_localconf']);
		t3lib_div::writeFile(PATH_typo3conf.$cacheFilePrefix.'_ext_tables.php', $cFiles['ext_tables']);

		$extensions = array();
		$extensions['_CACHEFILE'] = $cacheFilePrefix;

		return $extensions;
	}

	/**
	 * Unlink (delete) cache files
	 *
	 * @param string $cacheFilePrefix Cache file prefix to be used (optional)
	 * @return	integer		Number of deleted files.
	 */
	public static function removeCacheFiles($cacheFilePrefix = NULL) {
		$cacheFiles = self::currentCacheFiles($cacheFilePrefix);

		$out = 0;
		if (is_array($cacheFiles)) {
			reset($cacheFiles);
			foreach($cacheFiles as $cfile) {
				@unlink($cfile);
				clearstatcache();
				$out++;
			}
		}
		return $out;
	}

	/**
	 * Gets the behaviour for caching ext_tables.php and ext_localconf.php files
	 * (see $TYPO3_CONF_VARS['EXT']['extCache'] setting in the install tool).
	 *
	 * @param boolean $usePlainValue Whether to use the value as it is without modifications
	 * @return integer
	 */
	public static function getExtensionCacheBehaviour($usePlainValue = FALSE) {
		$extensionCacheBehaviour = intval($GLOBALS['TYPO3_CONF_VARS']['EXT']['extCache']);

		// Caching of extensions is disabled when install tool is used:
		if (!$usePlainValue && defined('TYPO3_enterInstallScript') && TYPO3_enterInstallScript) {
			$extensionCacheBehaviour = 0;
		} 

		return $extensionCacheBehaviour;
	}

	/**
	 * Gets the prefix used for the ext_tables.php and ext_localconf.php cached files.
	 *
	 * @return string
	 */
	public static function getCacheFilePrefix() {
		$extensionCacheBehaviour = self::getExtensionCacheBehaviour(TRUE);

		$cacheFilePrefix = 'temp_CACHED';

		if ($extensionCacheBehaviour == 1) {
			$cacheFilePrefix.= '_ps' . substr(t3lib_div::shortMD5(PATH_site . '|' . $GLOBALS['TYPO_VERSION']), 0, 4);
		} elseif ($extensionCacheBehaviour == 2) {
			$cacheFilePrefix.= '_' . t3lib_div::shortMD5(self::getEnabledExtensionList());
		}

		return $cacheFilePrefix;
	}

	/**
	 * Gets the list of enabled extensions.
	 *
	 * @return string
	 */
	public static function getEnabledExtensionList() {
		$extensionList = $GLOBALS['TYPO3_CONF_VARS']['EXT']['requiredExt'] . ',' . $GLOBALS['TYPO3_CONF_VARS']['EXT']['extList'];

		return $extensionList;
	}
}

?>
