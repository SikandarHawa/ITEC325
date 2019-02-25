<?php
error_reporting(E_ALL);
/*
 * @author Sikandar Khan Hawa
 * @version 2019-Feb-21
 *
 * @see https://php.radford.edu/~itec325/2019spring-ibarland/Homeworks/form-handle/form-handle.html
 */

//pluralizeHelper: string -> string
//given a non-empty lowercase string (noun) will return the plural of the string (noun)
function pluralizeHelper($anyNoun){
    $vowels = array('a','e','i','o','u','A','E','I','O','U');
    $esRule = array('s','x','z','o');
    $chshRule =array('ch','sh');

    if(in_array(substr($anyNoun,-1),$esRule)){
        if(substr($anyNoun,-2,2) === 'us')
            $aNounPlural = substr_replace($anyNoun,'i',-2);
        elseif(substr($anyNoun,-2,2) === 'is')
            $aNounPlural = substr_replace($anyNoun,'es',-2);
        elseif(substr($anyNoun,-2,2) === 'ix' ||
                substr($anyNoun,-2,2) === 'ex')
            $aNounPlural = substr_replace($anyNoun,'ices',-2);
        else
            $aNounPlural = $anyNoun . 'es';
    }
    elseif(in_array(substr($anyNoun,-2,2),$chshRule)){
        $aNounPlural = $anyNoun . 'es';
    }
    elseif(substr($anyNoun,-1) === 'y'){
        $aNounPlural = in_array((substr($anyNoun, -2, 1)), $vowels) ? $anyNoun . 's'
                                        : substr_replace($anyNoun, 'ies', -1);
    }
    elseif(substr($anyNoun,-1) === 'f'){
        if(in_array(substr($anyNoun,-2,2),$vowels))
            $aNounPlural = $anyNoun.'s';
        $aNounPlural = substr_replace($anyNoun,'ves',-1);
    }
    elseif(substr($anyNoun,-2,2) === 'fe'){
        $aNounPlural = substr_replace($anyNoun,'ves',-2);
    }
    elseif(substr($anyNoun,-2,2) === 'is'){
        $aNounPlural = substr_replace($anyNoun,'es',-2);
    }
    else {
        $aNounPlural = $anyNoun . 's';
    }
    return $aNounPlural;
}
// pluralize : positive number, non-empty string -> string
// given a positive number and a string noun will return
// user-friendly string and noun (plural if needed based on number given)
function pluralize($aNum, $aNoun){
    $aNounPlured = strtoupper($aNoun) == $aNoun ? ($aNum > 1 ? (strtoupper(pluralizeHelper(strtolower($aNoun)))) :
                                                    ($aNoun)) : ($aNum > 1 ? pluralizeHelper($aNoun) : $aNoun);
    return $aNum . " " . $aNounPlured;
}

// hyperlink: url , string-or-false -> string
// given a string url ans a string-or-false  will return a string of html
function hyperlink($url, $linkText){
    if ($linkText === false) {
        return "<a href='" . $url . "'>\n    " . $url . "\n</a>\n";
    } else {
        return "<a href='" . $url . "'>\n    " . $linkText . "\n</a>\n";
    }
}
// thumbnail: string, integer -> string
// given a string (which is a URL) and number (which is the width in pixel)
// returns a string html link containing an image
//
function thumbnail($aURL, $aWidth){
    return hyperlink($aURL, "<img src='$aURL' style='width: ".$aWidth."px;'/>");
}
// ******************************************************************************
// ************************ HOMEWORK 2 Starts Here ******************************
// ******************************************************************************

/*
 *  test: ANY , ANY -> void
 *  given any two values will check if they are equal
 */
function test($firstVal, $secondVal){
    if($firstVal === $secondVal)
        echo ".";
    else
        echo "test failed";
}

/*
 *  test: string[], optional string-or-false -> string
 *  given a optional non-empty string (firstItemIsAHeader) and a string array will
 *  return firstItemIsAHeader as th and each element of array as td of a HTML table rows
 *  given false or no second input as second argument wont return the th tag
 */

function asRow($tds, $firstItemIsAHeader = false){
    $tdsSoFar = "";
    foreach($tds AS $td){
        $tdsSoFar .= "    <td>\n        $td\n    </td>\n";
    }
    if ($firstItemIsAHeader === false) {
        return "<tr>\n$tdsSoFar</tr>\n";
    } else {
        return "<tr>\n    <th>\n        $firstItemIsAHeader\n    </th>\n</tr>\n<tr>\n$tdsSoFar</tr>\n";
    }
}

/*
 *  asAttrs: string[] -> string
 *  given a string array of valid html key/value pairs
 *  will return one string that is those key/value pairs separated by “=”, with the value in single quotes
 */

// I tried so many different ideas with this functions and i lack the requirements for this function
// i asked barland a lot and he just keep repeating what he wrote on the webpage (if i understood the webpage, WHY would i
// keeping on asking) I TRIED very hard to understand the requirements and after messing
// with this function for about 3 1/2 hours i choose to go with what i wrote in the first 10 minutes because I don't
// understand what this function's input are parameters.
function asAttrs($attrs){
    $attrSoFar = "";
    foreach($attrs AS $key => $value){
        $attrSoFar .= "$key='$value' ";
    }
    return $attrSoFar;
}

/*
 * dropdown: string, string[] → string
 * given a non-empty string $name, an optional string-or-boolean $selOpt and a string array $aDDmenuOps
 * will return html drop-down menu with the elements of $aDDMenuOps as options
 * if $selOpt is string the drop-down menu will have $selOpt as the first option and if $selOpt
 * is true (which by default it is) will have first option as "Select One" a value of false for $selOpt
 * wont include any of these two features.
 */

// ******************************************************************************
// ************************ HOMEWORK 3 Starts Here ******************************
// ******************************************************************************

function dropdown($name, $selOpt = true, $aDDMenuOps){
    $opsSoFar = "";
    if($selOpt === true)
        $opsSoFar .= "    <option value='' >\n        Select One\n    </option>\n";
    elseif (is_string($selOpt))
        $opsSoFar .= "    <option value='$selOpt' >\n        $selOpt\n    </option>\n";
    else
        $opsSoFar .= "";
    foreach($aDDMenuOps AS $anOption){
        $opsSoFar .= "    <option value='$anOption' >\n        $anOption\n    </option>\n";
    }
    return "<select name='$name'>\n$opsSoFar</select>\n";
}

/*
 *  radioTableRow: string, string[] -> string
 *  given a non-empty string $attrName and non-empty string array $radioOpts (interpreted as radio options)
 *  will return a bank of radio-buttons inside of a table-row with each element of $radioOpts as an option
 *  and the $attrName as the value of the button's name attribute
 */
function radioTableRow($attrName, $radioOpts){
    $tempArray = array($attrName);
    foreach($radioOpts AS $eachOpts){
        array_push($tempArray, "<input type='radio' name='$attrName' value='$eachOpts'>");
    }
    return asRow($tempArray, false);
}

/*
 *  radioTable : string, string[], string[] → string
 *  given a string $tableName, a non-empty string array $colHeaders, a non-empty string array $attrNames
 *  will return the html table string
 */
function radioTable($tableName, $colHeaders, $attrNames){
    $thsHTML  = "    <th>\n        </th>\n";
    $tdsHTML  = "";
    foreach ($colHeaders AS $colHeader){
        $thsHTML .= "        <th>\n            $colHeader\n        </th>\n";
    }
    foreach ($attrNames AS $attrName){
        $tdsHTML .= radioTableRow($attrName, $colHeaders);
    }
    return "<table id='$tableName'>\n    <tr>\n    $thsHTML    </tr>\n$tdsHTML</table>\n";
}

/*
 *  makeTextbox: string, string-or-boolean -> string
 *  given a non-empty string $inputAttrName and optional string-boolean $inputPlaceHolder
 *  will return HTML string for input box with $inputAttrName as attribute name value and
 *  placeholder attribute value as $inputplaceHolder
 */
function makeTextbox($inputAttrName, $inputPlaceHolder = false){
    if($inputPlaceHolder === false)
        return "<input type='text' name='$inputAttrName'>";
    else
        return "<input type='text' name='$inputAttrName' placeholder='$inputPlaceHolder'>";
}

/*
 *  makeCheckbox: string -> string
 *  given a non-empty string $cbAttrName
 *  will return string for html checkbox with atrribute name value as $cbAttrName
 */
function makeCheckbox($cbAttrName){
    return "<input type='checkbox' name='$cbAttrName' value='yep'>";
}

/*
 *  makeTextarea: integer, integer, string-or-boolean -> string
 *  given an integer $numRows, integer $numCols, and optional string-or-boolean $inputPlaceholder
 *  will return HTML string for a textarea with row's attribute value as $numRows and
 *  column's attribute value as $numCols and optional $inputPlaceholder as Placeholder attribute value
 */
function makeTextarea($attrName, $numRows, $numCols, $inputPlaceHolder = false){
    if($inputPlaceHolder === false)
        return "<textarea row='$numRows' cols='$numCols'>\n</textarea>\n";
    else
        return "<textarea name='$attrName' row='$numRows' cols='$numCols' placeholder='$inputPlaceHolder'>\n</textarea>\n";
}

/*
 *  makeTable string, string[string[]] -> table
 *  given an non-empty string $tableName and a non-empty string array $rowsArray of non-empty string arrays
 *  will return string for HTML table with table id = $tableName and each array inside the $rowsArray as a row
 *  in the table
 */
function makeTable($tableName, $rowsArray){
    $tableHTML = "";
    foreach($rowsArray AS $row){
        $tableHTML .= asRow($row, false);
    }
    return "<table id='$tableName'>\n$tableHTML\n</table>\n";
}

/* ul: string[] → string
 * Return the html for an unordered list whose items are `$lis`.
 */
function ul( $lis ) {
    $lisSoFar = "";
    foreach( $lis AS $li ) {
        $lisSoFar .= "  <li>\n    $li\n  </li>\n";
    }
    return "<ul>\n$lisSoFar</ul>";
}
?>


