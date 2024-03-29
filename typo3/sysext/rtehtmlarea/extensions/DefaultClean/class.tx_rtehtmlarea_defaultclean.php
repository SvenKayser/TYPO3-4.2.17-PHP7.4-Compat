<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008-2009 Stanislas Rolland <typo3(arobas)sjbr.ca>
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Default Clean extension for htmlArea RTE
 *
 * @author Stanislas Rolland <typo3(arobas)sjbr.ca>
 *
 * TYPO3 SVN ID: $Id: class.tx_rtehtmlarea_defaultclean.php 4759 2009-01-20 04:16:48Z stan $
 *
 */

require_once(t3lib_extMgm::extPath('rtehtmlarea').'class.tx_rtehtmlareaapi.php');

class tx_rtehtmlarea_defaultclean extends tx_rtehtmlareaapi {

	protected $extensionKey = 'rtehtmlarea';		// The key of the extension that is extending htmlArea RTE
	protected $pluginName = 'DefaultClean';			// The name of the plugin registered by the extension
	protected $relativePathToLocallangFile = '';		// Path to this main locallang file of the extension relative to the extension dir.
	protected $relativePathToSkin = '';			// Path to the skin (css) file relative to the extension dir
	protected $htmlAreaRTE;					// Reference to the invoking object
	protected $thisConfig;					// Reference to RTE PageTSConfig
	protected $toolbar;					// Reference to RTE toolbar array
	protected $LOCAL_LANG; 					// Frontend language array
	
	protected $pluginButtons = 'cleanword';
	protected $convertToolbarForHtmlAreaArray = array (
		'cleanword'	=> 'CleanWord',
		);
	
	public function main($parentObject) {
		return parent::main($parentObject) && $this->thisConfig['enableWordClean'] && !is_array($this->thisConfig['enableWordClean.']['HTMLparser.']);
	}
	
	/**
	 * Return JS configuration of the htmlArea plugins registered by the extension
	 *
	 * @param	integer		Relative id of the RTE editing area in the form
	 *
	 * @return 	string		JS configuration for registered plugins, in this case, JS configuration of block elements
	 *
	 * The returned string will be a set of JS instructions defining the configuration that will be provided to the plugin(s)
	 * Each of the instructions should be of the form:
	 * 	RTEarea['.$RTEcounter.']["buttons"]["button-id"]["property"] = "value";
	 */
	public function buildJavascriptConfiguration($RTEcounter) {
		
		$registerRTEinJavascriptString = '';
		$button = 'cleanword';
		if (in_array($button, $this->toolbar)) {
			if (!is_array( $this->thisConfig['buttons.']) || !is_array( $this->thisConfig['buttons.'][$button.'.'])) {
					$registerRTEinJavascriptString .= '
			RTEarea['.$RTEcounter.'].buttons.'. $button .' = new Object();';
			}
			$registerRTEinJavascriptString .= '
			RTEarea['.$RTEcounter.'].buttons.'. $button .' = {"hotKey" : "0"};';
		}
		return $registerRTEinJavascriptString;
	}

	/**
	 * Return an updated array of toolbar enabled buttons
	 * Force inclusion of hidden button cleanword
	 *
	 * @param	array		$show: array of toolbar elements that will be enabled, unless modified here
	 *
	 * @return 	array		toolbar button array, possibly updated
	 */
	public function applyToolbarConstraints($show) {
		return array_unique(array_merge($show, t3lib_div::trimExplode(',', $this->pluginButtons)));
	}
} // end of class

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtehtmlarea/extensions/DefaultClean/class.tx_rtehtmlarea_defaultclean.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtehtmlarea/extensions/DefaultClean/class.tx_rtehtmlarea_defaultclean.php']);
}

?>
