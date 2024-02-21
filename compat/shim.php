<?php


/** debugging helper */



/*set_error_handler(function($errNo, $errStr, $errFile, $errLine){
    var_dump($errNo,$errStr,$errFile,$errLine);
    die();
});*/

ini_set("display_errors",0);	
/** Courtesy of urbanstudio.de */

class MYSQLCOMP{
	static public $lp = null;
}


function mysql_pconnect($dbhost,$dbuser, $dbpass){
    if(!$dbhost) return false; 
    $instance = MYSQLCOMP::$lp = new mysqli("p:".$dbhost,$dbuser,$dbpass);
    $instance->query("SET sql_mode = ''");
    return $instance;
}

function mysql_connect($dbhost,$dbuser, $dbpass){	return MYSQLCOMP::$lp = new mysqli($dbhost,$dbuser,$dbpass);	}
function mysql_query($sql,$link=null){
    if(!$link) $link = MYSQLCOMP::$lp;
    if(!$link) return false;
    $query = $link->query($sql);
    if(!$query){
        debug_print_backtrace();
        die("Statement failed: " . $link->error);
    }

    return $query;
}
function mysql_select_db($dbname,$link=null)	{	if(!$link)	{	return MYSQLCOMP::$lp->select_db($dbname);	} else {	return $link->select_db($dbname);	}}
function mysql_insert_id($link=null)			{ 	if(!$link)	{	return MYSQLCOMP::$lp->insert_id;			} else {	return $link->insert_id;			}}
function mysql_close($link=null)				{ 	if(!$link)	{	return MYSQLCOMP::$lp->close();				} else {	return $link->close();				}}
function mysql_error($link=null)				{ 	if(!$link)	{	return MYSQLCOMP::$lp->error;				} else {	return $link->error;				}}
function mysql_errno($link=null)				{ 	if(!$link)	{	return MYSQLCOMP::$lp->errno;				} else {	return $link->errno;				}}
function mysql_affected_rows($result=null) 		{	if(!$link)  {	return MYSQLCOMP::$lp->affected_rows;		} else {	return $link->affected_rows;		}}
function mysql_real_escape_string($escstr,$link=null)
{	if(!$link)	{	return MYSQLCOMP::$lp->real_escape_string($escstr);	} else {	return $link->real_escape_string($escstr);					}}
function mysql_fetch_row(&$result)		{			return $result->fetch_row();		}
function mysql_fetch_array(&$result)	{			return $result->fetch_array();		}	
function mysql_fetch_object(&$result)	{			$r = $result->fetch_object();	return $r;		}
function mysql_fetch_assoc(&$result)	{			if(!$result) return false; return $result->fetch_assoc();		}
function mysql_num_rows(&$result)		{			return $result->num_rows;			}
function mysql_list_dbs($link=null){
    if(!$link){
        if(!MYSQLCOMP::$lp) return false;
        return MYSQLCOMP::$lp->query("SHOW DATABASES");
    } else {
        return $link->query("SHOW DATABASES");
    }
}

function mysql_free_result(&$result){
    mysqli_free_result($result);
    return true;
}

/** Courtesy of https://github.com/bbrala/php7-ereg-shim */

function ereg($pattern, $subject, &$matches = array())
{
    $boundary = _ereg_determine_boundary($pattern);
    return preg_match($boundary . $pattern . $boundary, $subject, $matches);
}

function eregi($pattern, $subject, &$matches = array())
{
    $boundary = _ereg_determine_boundary($pattern);
    return preg_match($boundary . $pattern . $boundary . 'i', $subject, $matches);
}

function ereg_replace($pattern, $replacement, $string)
{
    $boundary = _ereg_determine_boundary($pattern);
    return preg_replace($boundary . $pattern . $boundary, $replacement, $string);
}

function eregi_replace($pattern, $replacement, $string)
{
    $boundary = _ereg_determine_boundary($pattern);
    return preg_replace($boundary . $pattern . $boundary . 'i', $replacement, $string);
}

function split($pattern, $subject, $limit = -1)
{
    $boundary = _ereg_determine_boundary($pattern);
    return preg_split($boundary . $pattern . $boundary, $subject, $limit);
}

function spliti($pattern, $subject, $limit = -1)
{
    $boundary = _ereg_determine_boundary($pattern);
    return preg_split($boundary . $pattern . $boundary . 'i', $subject, $limit);
}

/**
 * @method _ereg_determine_boundary Determine a valid boundary based on the pattern. 
 * 
 * @var string $pattern The possibly escaped pattern to match for. 
 * @return string a suitable RegEx boundary
 * 
 * One would suggest just using preg_quote, but perhaps the pattern already is quoted, and therefore 
 * using preg_quote would just double-quote and with that ruin the pattern.  
 * The trick here is to find a boundary that is not within the pattern. 
 * I have contemplated using "any ASCII charachter" but that would require detecting character classes
 * and that's just too complicated.  
 * The chance that all of these boundaries will conflict, and if so; new ones can be added :)
 */
function _ereg_determine_boundary($pattern) 
{
    foreach (array('/', '@', '#', '%') as $boundary) {
        if (false === strpos($pattern, $boundary)) { 
            return $boundary;
        }
    }

    throw new Exception("Very sorry, could not shim the regular expression. Please follow the debug trace to see where the incompatible ereg-style function call is made.");
}