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
 * Move element wizard:
 * Moving pages or content elements (tt_content) around in the system via a page tree navigation.
 *
 * $Id: move_el.php 8427 2010-07-28 09:17:45Z ohader $
 * Revised for TYPO3 3.6 November/2003 by Kasper Skaarhoj
 * XHTML compatible.
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   96: class localPageTree extends t3lib_pageTree
 *  105:     function wrapIcon($icon,$row)
 *
 *
 *  127: class ext_posMap_pages extends t3lib_positionMap
 *  137:     function onClickEvent($pid,$newPagePID)
 *  148:     function linkPageTitle($str,$rec)
 *  161:     function boldTitle($t_code,$dat,$id)
 *
 *
 *  184: class ext_posMap_tt_content extends t3lib_positionMap
 *  194:     function linkPageTitle($str,$rec)
 *  206:     function wrapRecordTitle($str,$row)
 *
 *
 *  227: class SC_move_el
 *  250:     function init()
 *  284:     function main()
 *  416:     function printContent()
 *
 * TOTAL FUNCTIONS: 9
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */


$BACK_PATH='';
require('init.php');
require('template.php');

	// Include local language labels:
$LANG->includeLLFile('EXT:lang/locallang_misc.xml');

	// Include libraries:
require_once(PATH_t3lib.'class.t3lib_page.php');
require_once(PATH_t3lib.'class.t3lib_positionmap.php');
require_once(PATH_t3lib.'class.t3lib_pagetree.php');










/**
 * Local extension of the page tree class
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @package TYPO3
 * @subpackage core
 */
class localPageTree extends t3lib_pageTree {

	/**
	 * Inserting uid-information in title-text for an icon
	 *
	 * @param	string		Icon image
	 * @param	array		Item row
	 * @return	string		Wrapping icon image.
	 */
	function wrapIcon($icon,$row)	{
		return $this->addTagAttributes($icon,' title="id='.htmlspecialchars($row['uid']).'"');
	}
}











/**
 * Extension of position map for pages
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @package TYPO3
 * @subpackage core
 */
class ext_posMap_pages extends t3lib_positionMap {
	var $l_insertNewPageHere = 'movePageToHere';

	/**
	 * Creates the onclick event for the insert-icons.
	 *
	 * @param	integer		The pid.
	 * @param	integer		New page id.
	 * @return	string		Onclick attribute content
	 */
	function onClickEvent($pid,$newPagePID)	{
		return 'window.location.href=\'tce_db.php?cmd[pages]['.$GLOBALS['SOBE']->moveUid.']['.$this->moveOrCopy.']='.$pid.'&redirect='.rawurlencode($this->R_URI).'&prErr=1&uPT=1&vC='.$GLOBALS['BE_USER']->veriCode().'\';return false;';
	}

	/**
	 * Wrapping page title.
	 *
	 * @param	string		Page title.
	 * @param	array		Page record (?)
	 * @return	string		Wrapped title.
	 */
	function linkPageTitle($str,$rec)	{
		$url = t3lib_div::linkThisScript(array('uid'=>intval($rec['uid']),'moveUid'=>$GLOBALS['SOBE']->moveUid));
		return '<a href="'.htmlspecialchars($url).'">'.$str.'</a>';
	}

	/**
	 * Wrap $t_code in bold IF the $dat uid matches $id
	 *
	 * @param	string		Title string
	 * @param	array		Infomation array with record array inside.
	 * @param	integer		The current id.
	 * @return	string		The title string.
	 */
	function boldTitle($t_code,$dat,$id)	{
		return parent::boldTitle($t_code,$dat,$GLOBALS['SOBE']->moveUid);
	}
}












/**
 * Extension of position map for content elements
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @package TYPO3
 * @subpackage core
 */
class ext_posMap_tt_content extends t3lib_positionMap {
	var $dontPrintPageInsertIcons = 1;

	/**
	 * Wrapping page title.
	 *
	 * @param	string		Page title.
	 * @param	array		Page record (?)
	 * @return	string		Wrapped title.
	 */
	function linkPageTitle($str,$rec)	{
		$url = t3lib_div::linkThisScript(array('uid'=>intval($rec['uid']),'moveUid'=>$GLOBALS['SOBE']->moveUid));
		return '<a href="'.htmlspecialchars($url).'">'.$str.'</a>';
	}

	/**
	 * Wrapping the title of the record.
	 *
	 * @param	string		The title value.
	 * @param	array		The record row.
	 * @return	string		Wrapped title string.
	 */
	function wrapRecordTitle($str,$row)	{
		if ($GLOBALS['SOBE']->moveUid==$row['uid'])	$str = '<b>'.$str.'</b>';
		return parent::wrapRecordTitle($str,$row);
	}
}









/**
 * Script Class for rendering the move-element wizard display
 *
 * @author	Kasper Skaarhoj <kasperYYYY@typo3.com>
 * @package TYPO3
 * @subpackage core
 */
class SC_move_el {

		// Internal, static (eg. from GPvars):
	var $sys_language=0;
	var $page_id;
	var $table;
	var $R_URI;
	var $input_moveUid;
	var $moveUid;
	var $makeCopy;

	/**
	 * Document template object
	 *
	 * @var mediumDoc
	 */
	var $doc;
	var $perms_clause;		// Pages-select clause

		// Internal, dynamic:
	var $content;			// Content for module accumulated here.


	/**
	 * Constructor, initializing internal variables.
	 *
	 * @return	void
	 */
	function init()	{
		global $BE_USER,$LANG,$BACK_PATH;


			// Setting internal vars:
		$this->sys_language = intval(t3lib_div::_GP('sys_language'));
		$this->page_id=intval(t3lib_div::_GP('uid'));
		$this->table=t3lib_div::_GP('table');
		$this->R_URI=t3lib_div::sanitizeLocalUrl(t3lib_div::_GP('returnUrl'));
		$this->input_moveUid = t3lib_div::_GP('moveUid');
		$this->moveUid = $this->input_moveUid ? $this->input_moveUid : $this->page_id;
		$this->makeCopy = t3lib_div::_GP('makeCopy');

			// Select-pages where clause for read-access:
		$this->perms_clause = $BE_USER->getPagePermsClause(1);

			// Starting the document template object:
		$this->doc = t3lib_div::makeInstance('template');
		$this->doc->docType= 'xhtml_trans';
		$this->doc->backPath = $BACK_PATH;
		$this->doc->setModuleTemplate('templates/move_el.html');
		$this->doc->JScode='';

			// Starting document content (header):
		$this->content='';
		$this->content.=$this->doc->header($LANG->getLL('movingElement'));
		$this->content.=$this->doc->spacer(5);
	}

	/**
	 * Creating the module output.
	 *
	 * @return	void
	 */
	function main()	{
		global $LANG,$BACK_PATH,$BE_USER;

		if ($this->page_id)	{

				// Get record for element:
			$elRow = t3lib_BEfunc::getRecordWSOL($this->table,$this->moveUid);

				// Headerline: Icon, record title:
			$hline = t3lib_iconWorks::getIconImage($this->table,$elRow,$BACK_PATH,' id="c-recIcon" title="'.htmlspecialchars(t3lib_BEfunc::getRecordIconAltText($elRow,$this->table)).'"');
			$hline.= t3lib_BEfunc::getRecordTitle($this->table,$elRow,TRUE);

				// Make-copy checkbox (clicking this will reload the page with the GET var makeCopy set differently):
			$onClick = 'window.location.href=\''.t3lib_div::linkThisScript(array('makeCopy'=>!$this->makeCopy)).'\';';
			$hline.= '<br /><input type="hidden" name="makeCopy" value="0" /><input type="checkbox" name="makeCopy" id="makeCopy" value="1"'.($this->makeCopy?' checked="checked"':'').' onclick="'.htmlspecialchars($onClick).'" /> <label for="makeCopy">'.
				$LANG->getLL('makeCopy',1).'</label>';

				// Add the header-content to the module content:
			$this->content.=$this->doc->section($LANG->getLL('moveElement').':',$hline,0,1);
			$this->content.=$this->doc->spacer(20);

				// Reset variable to pick up the module content in:
			$code='';

				// IF the table is "pages":
			if ((string)$this->table=='pages')	{
					// Get page record (if accessible):
				$pageinfo = t3lib_BEfunc::readPageAccess($this->page_id,$this->perms_clause);
				if (is_array($pageinfo) && $BE_USER->isInWebMount($pageinfo['pid'],$this->perms_clause))	{

						// Initialize the position map:
					$posMap = t3lib_div::makeInstance('ext_posMap_pages');
					$posMap->moveOrCopy = $this->makeCopy?'copy':'move';

						// Print a "go-up" link IF there is a real parent page (and if the user has read-access to that page).
					if ($pageinfo['pid'])	{
						$pidPageInfo = t3lib_BEfunc::readPageAccess($pageinfo['pid'],$this->perms_clause);
						if (is_array($pidPageInfo))	{
							if ($BE_USER->isInWebMount($pidPageInfo['pid'],$this->perms_clause))	{
								$code.= '<a href="'.htmlspecialchars(t3lib_div::linkThisScript(array('uid'=>intval($pageinfo['pid']),'moveUid'=>$this->moveUid))).'">'.
									'<img'.t3lib_iconWorks::skinImg($this->doc->backPath,'gfx/i/pages_up.gif','width="18" height="16"').' alt="" />'.
									t3lib_BEfunc::getRecordTitle('pages',$pidPageInfo,TRUE).
									'</a><br />';
							} else {
								$code.= t3lib_iconWorks::getIconImage('pages',$pidPageInfo,$BACK_PATH,'').
									t3lib_BEfunc::getRecordTitle('pages',$pidPageInfo,TRUE).
									'<br />';
							}
						}
					}

						// Create the position tree:
					$code.= $posMap->positionTree($this->page_id,$pageinfo,$this->perms_clause,$this->R_URI);
				}
			}

				// IF the table is "tt_content":
			if ((string)$this->table=='tt_content')	{

					// First, get the record:
				$tt_content_rec = t3lib_BEfunc::getRecord('tt_content',$this->moveUid);

					// ?
				if (!$this->input_moveUid)	$this->page_id = $tt_content_rec['pid'];

					// Checking if the parent page is readable:
				$pageinfo = t3lib_BEfunc::readPageAccess($this->page_id,$this->perms_clause);
				if (is_array($pageinfo) && $BE_USER->isInWebMount($pageinfo['pid'],$this->perms_clause))	{

						// Initialize the position map:
					$posMap = t3lib_div::makeInstance('ext_posMap_tt_content');
					$posMap->moveOrCopy = $this->makeCopy?'copy':'move';
					$posMap->cur_sys_language = $this->sys_language;

						// Headerline for the parent page: Icon, record title:
					$hline = t3lib_iconWorks::getIconImage('pages',$pageinfo,$BACK_PATH,' title="'.htmlspecialchars(t3lib_BEfunc::getRecordIconAltText($pageinfo,'pages')).'"');
					$hline.= t3lib_BEfunc::getRecordTitle('pages',$pageinfo,TRUE);

						// Load SHARED page-TSconfig settings and retrieve column list from there, if applicable:
					$modTSconfig_SHARED = t3lib_BEfunc::getModTSconfig($this->page_id,'mod.SHARED');		// SHARED page-TSconfig settings.
					$colPosList = strcmp(trim($modTSconfig_SHARED['properties']['colPos_list']),'') ? trim($modTSconfig_SHARED['properties']['colPos_list']) : '1,0,2,3';
					$colPosList = implode(',',array_unique(t3lib_div::intExplode(',',$colPosList)));		// Removing duplicates, if any

						// Adding parent page-header and the content element columns from position-map:
					$code=$hline.'<br />';
					$code.=$posMap->printContentElementColumns($this->page_id,$this->moveUid,$colPosList,1,$this->R_URI);

						// Print a "go-up" link IF there is a real parent page (and if the user has read-access to that page).
					$code.= '<br />';
					$code.= '<br />';
					if ($pageinfo['pid'])	{
						$pidPageInfo = t3lib_BEfunc::readPageAccess($pageinfo['pid'],$this->perms_clause);
						if (is_array($pidPageInfo))	{
							if ($BE_USER->isInWebMount($pidPageInfo['pid'],$this->perms_clause))	{
								$code.= '<a href="'.htmlspecialchars(t3lib_div::linkThisScript(array('uid'=>intval($pageinfo['pid']),'moveUid'=>$this->moveUid))).'">'.
									'<img'.t3lib_iconWorks::skinImg($this->doc->backPath,'gfx/i/pages_up.gif','width="18" height="16"').' alt="" />'.
									t3lib_BEfunc::getRecordTitle('pages',$pidPageInfo,TRUE).
									'</a><br />';
							} else {
								$code.= t3lib_iconWorks::getIconImage('pages',$pidPageInfo,$BACK_PATH,'').
									t3lib_BEfunc::getRecordTitle('pages',$pidPageInfo,TRUE).
									'<br />';
							}
						}
					}

						// Create the position tree (for pages):
					$code.= $posMap->positionTree($this->page_id,$pageinfo,$this->perms_clause,$this->R_URI);
				}
			}

				// Add the $code content as a new section to the module:
			$this->content.=$this->doc->section($LANG->getLL('selectPositionOfElement').':',$code,0,1);
		}

			// Setting up the buttons and markers for docheader
		$docHeaderButtons = $this->getButtons();
		$markers['CSH'] = $docHeaderButtons['csh'];
		$markers['CONTENT'] = $this->content;

			// Build the <body> for the module
		$this->content = $this->doc->startPage($LANG->getLL('movingElement'));
		$this->content.= $this->doc->moduleBody($this->pageinfo, $docHeaderButtons, $markers);
		$this->content.= $this->doc->endPage();
		$this->content = $this->doc->insertStylesAndJS($this->content);
	}

	/**
	 * Print out the accumulated content:
	 *
	 * @return	void
	 */
	function printContent()	{
		echo $this->content;
	}

	/**
	 * Create the panel of buttons for submitting the form or otherwise perform operations.
	 *
	 * @return	array	all available buttons as an assoc. array
	 */
	protected function getButtons()	{
		global $LANG, $BACK_PATH;

		$buttons = array(
			'csh' => '',
			'back' => ''
		);

		if ($this->page_id)	{
			if ((string)$this->table == 'pages') {
					// CSH
				$buttons['csh'] = t3lib_BEfunc::cshItem('xMOD_csh_corebe', 'move_el_pages', $GLOBALS['BACK_PATH'], '', TRUE);
			} elseif((string)$this->table == 'tt_content') {
					// CSH
				$buttons['csh'] = t3lib_BEfunc::cshItem('xMOD_csh_corebe', 'move_el_cs', $GLOBALS['BACK_PATH'], '', TRUE);
			}

			if ($this->R_URI) {
					// Back
				$buttons['back'] ='<a href="' . htmlspecialchars($this->R_URI) . '" class="typo3-goBack"><img' . t3lib_iconWorks::skinImg($this->doc->backPath, 'gfx/goback.gif') . ' alt="" title="' . $LANG->getLL('goBack', 1) .'" /></a>';
			}
		}

		return $buttons;
	}
}

// Include extension?
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['typo3/move_el.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['typo3/move_el.php']);
}












// Make instance:
$SOBE = t3lib_div::makeInstance('SC_move_el');
$SOBE->init();
$SOBE->main();
$SOBE->printContent();
?>
