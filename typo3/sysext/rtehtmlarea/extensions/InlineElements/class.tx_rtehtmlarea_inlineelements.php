<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007-2008 Stanislas Rolland <typo3(arobas)sjbr.ca>
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
 * InlineElements plugin for htmlArea RTE
 *
 * @author Stanislas Rolland <typo3(arobas)sjbr.ca>
 *
 * TYPO3 SVN ID: $Id: class.tx_rtehtmlarea_inlineelements.php 4526 2008-12-02 23:45:50Z stan $
 *
 */

require_once(t3lib_extMgm::extPath('rtehtmlarea').'class.tx_rtehtmlareaapi.php');

class tx_rtehtmlarea_inlineelements extends tx_rtehtmlareaapi {

	protected $extensionKey = 'rtehtmlarea';			// The key of the extension that is extending htmlArea RTE
	protected $pluginName = 'InlineElements';			// The name of the plugin registered by the extension
	protected $relativePathToLocallangFile = 'extensions/InlineElements/locallang.xml';	// Path to this main locallang file of the extension relative to the extension dir.
	protected $relativePathToSkin = 'extensions/InlineElements/skin/htmlarea.css';		// Path to the skin (css) file relative to the extension dir.
	protected $htmlAreaRTE;						// Reference to the invoking object
	protected $thisConfig;						// Reference to RTE PageTSConfig
	protected $toolbar;						// Reference to RTE toolbar array
	protected $LOCAL_LANG; 						// Frontend language array

	protected $pluginButtons = 'formattext, bidioverride, big, bold, citation, code, definition, deletedtext, emphasis, insertedtext, italic, keyboard, quotation, sample, small, span, strikethrough, strong, subscript, superscript, underline, variable';

	protected $convertToolbarForHtmlAreaArray = array (
		'formattext'		=> 'FormatText',
		'bidioverride'		=> 'BiDiOverride',
		'big'			=> 'Big',
		'bold'			=> 'Bold',
		'citation'		=> 'Citation',
		'code'			=> 'Code',
		'definition'		=> 'Definition',
		'deletedtext'		=> 'DeletedText',
		'emphasis'		=> 'Emphasis',
		'insertedtext'		=> 'InsertedText',
		'italic'		=> 'Italic',
		'keyboard'		=> 'Keyboard',
		'monospaced'		=> 'MonoSpaced',
		'quotation'		=> 'Quotation',
		'sample'		=> 'Sample',
		'small'			=> 'Small',
		'span'			=> 'Span',
		'strikethrough'		=> 'StrikeThrough',
		'strong'		=> 'Strong',
		'subscript'		=> 'Subscript',
		'superscript'		=> 'Superscript',
		'underline'		=> 'Underline',
		'variable'		=> 'Variable',
		);

	protected $defaultInlineElements = array(
		'none'		=> 'No markup',
		'b'		=> 'Bold',
		'bdo'		=> 'BiDi override',
		'big'		=> 'Large text',
		'cite'		=> 'Citation',
		'code'		=> 'Code',
		'del'		=> 'Deleted text',
		'dfn'		=> 'Definition',
		'em'		=> 'Emphasis',
		'i'		=> 'Italic',
		'ins'		=> 'Inserted text',
		'kbd'		=> 'Keyboard',
		'q'		=> 'Quotation',
		'samp'		=> 'Sample',
		'small'		=> 'Small text',
		'span'		=> 'Style container',
		'strike'	=> 'Strike-through',
		'strong'	=> 'Strong emphasis',
		'sub'		=> 'Subscript',
		'sup'		=> 'Superscript',
		'tt'		=> 'Monospaced text',
		'u'		=> 'Underline',
		'var'		=> 'Variable',
		);

	protected $defaultInlineElementsOrder = 'none, bidioverride, big, bold, citation, code, definition, deletedtext, emphasis, insertedtext, italic, keyboard,
						monospaced, quotation, sample, small, span, strikethrough, strong, subscript, superscript, underline, variable';

	protected $buttonToInlineElement = array(
		'none'		=> 'none',
		'bidioverride'	=> 'bdo',
		'big'		=> 'big',
		'bold'		=> 'b',
		'citation'	=> 'cite',
		'code'		=> 'code',
		'definition'	=> 'dfn',
		'deletedtext'	=> 'del',
		'emphasis'	=> 'em',
		'insertedtext'	=> 'ins',
		'italic'	=> 'i',
		'keyboard'	=> 'kbd',
		'monospaced'	=> 'tt',
		'quotation'	=> 'q',
		'sample'	=> 'samp',
		'small'		=> 'small',
		'span'		=> 'span',
		'strikethrough'	=> 'strike',
		'strong'	=> 'strong',
		'subscript'	=> 'sub',
		'superscript'	=> 'sup',
		'underline'	=> 'u',
		'variable'	=> 'var',
		);

	/**
	 * Return JS configuration of the htmlArea plugins registered by the extension
	 *
	 * @param	integer		Relative id of the RTE editing area in the form
	 *
	 * @return string		JS configuration for registered plugins
	 *
	 * The returned string will be a set of JS instructions defining the configuration that will be provided to the plugin(s)
	 * Each of the instructions should be of the form:
	 * 	RTEarea['.$RTEcounter.']["buttons"]["button-id"]["property"] = "value";
	 */
	public function buildJavascriptConfiguration($RTEcounter) {
		global $TSFE, $LANG;

		$registerRTEinJavascriptString = '';
		if (in_array('formattext', $this->toolbar)) {
			if (!is_array( $this->thisConfig['buttons.']) || !is_array( $this->thisConfig['buttons.']['formattext.'])) {
				$registerRTEinJavascriptString .= '
			RTEarea['.$RTEcounter.'].buttons.formattext = new Object();';
			}

		 		// Default inline elements
			$hideItems = array();
			$restrictTo = array('*');
			$inlineElementsOrder = $this->defaultInlineElementsOrder;
			$prefixLabelWithTag = false;
			$postfixLabelWithTag = false;

				// Processing PageTSConfig
			if (is_array($this->thisConfig['buttons.']) && is_array($this->thisConfig['buttons.']['formattext.'])) {
					// Removing elements
				if ($this->thisConfig['buttons.']['formattext.']['removeItems']) {
					$hideItems =  t3lib_div::trimExplode(',', $this->htmlAreaRTE->cleanList($this->thisConfig['buttons.']['formattext.']['removeItems']), 1);
				}
					// Restriction clause
				if ($this->thisConfig['buttons.']['formattext.']['restrictToItems']) {
					$restrictTo =  t3lib_div::trimExplode(',', $this->htmlAreaRTE->cleanList('none,'.$this->thisConfig['buttons.']['formattext.']['restrictTo']), 1);
				}
					// Elements order
				if ($this->thisConfig['buttons.']['formattext.']['orderItems']) {
					$inlineElementsOrder = 'none,'.$this->thisConfig['buttons.']['formattext.']['orderItems'];
				}
				$prefixLabelWithTag = ($this->thisConfig['buttons.']['formattext.']['prefixLabelWithTag'])?true:$prefixLabelWithTag;
				$postfixLabelWithTag = ($this->thisConfig['buttons.']['formattext.']['postfixLabelWithTag'])?true:$postfixLabelWithTag;
			}

			$inlineElementsOrder = array_diff(t3lib_div::trimExplode(',', $this->htmlAreaRTE->cleanList($inlineElementsOrder), 1), $hideItems);
			if (!in_array('*', $restrictTo)) {
				$inlineElementsOrder = array_intersect($inlineElementsOrder, $restrictTo);
			}

				// Localizing the options
			$inlineElementsOptions = array();
			foreach ($inlineElementsOrder as $item) {
				if ($this->htmlAreaRTE->is_FE()) {
					$inlineElementsOptions[$this->buttonToInlineElement[$item]] = $TSFE->getLLL($this->defaultInlineElements[$this->buttonToInlineElement[$item]], $this->LOCAL_LANG);
				} else {
					$inlineElementsOptions[$this->buttonToInlineElement[$item]] = $LANG->getLL($this->defaultInlineElements[$this->buttonToInlineElement[$item]]);
				}
				$inlineElementsOptions[$this->buttonToInlineElement[$item]] = (($prefixLabelWithTag && $item != 'none')?($this->buttonToInlineElement[$item].' - '):'') . $inlineElementsOptions[$this->buttonToInlineElement[$item]] . (($postfixLabelWithTag && $item != 'none')?(' - '.$this->buttonToInlineElement[$item]):'');
			}

			$first = array_shift($inlineElementsOptions);
				// Sorting the options
			if (!is_array($this->thisConfig['buttons.']) || !is_array($this->thisConfig['buttons.']['formattext.']) || !$this->thisConfig['buttons.']['formattext.']['orderItems']) {
				asort($inlineElementsOptions);
			}
				// utf8-encode labels if we are responding to an IRRE ajax call
			if (!$this->htmlAreaRTE->is_FE() && $this->htmlAreaRTE->TCEform->inline->isAjaxCall) {
				foreach ($inlineElementsOptions as $item => $label) {
					$inlineElementsOptions[$item] = $GLOBALS['LANG']->csConvObj->utf8_encode($label, $GLOBALS['LANG']->charSet);
				}
			}
				// Generating the javascript options
			$JSInlineElements = '{
			"'. $first.'" : "none"';
			foreach ($inlineElementsOptions as $item => $label) {
				$JSInlineElements .= ',
			"' . $label . '" : "' . $item . '"';
			}
			$JSInlineElements .= '};';

			$registerRTEinJavascriptString .= '
			RTEarea['.$RTEcounter.'].buttons.formattext.dropDownOptions = '. $JSInlineElements;
		}
		return $registerRTEinJavascriptString;
	 }


} // end of class

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtehtmlarea/extensions/InlineElements/class.tx_rtehtmlarea_inlineelements.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rtehtmlarea/extensions/InlineElements/class.tx_rtehtmlarea_inlineelements.php']);
}

?>