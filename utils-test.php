<?php
error_reporting(E_ALL);
require_once("utils.php");
/*
 * @author Sikandar Khan Hawa
 * @version 2019-Feb-21
 *
 * @see https://php.radford.edu/~itec325/2019spring-ibarland/Homeworks/form-handle/form-handle.html
 */
// Test cases for pluralize
test(pluralize(0,"t-shirt"),  "0 t-shirt");

test(pluralize(1, "t-shirt"), "1 t-shirt");

test(pluralize(2, "t-shirt"), "2 t-shirts");

test(pluralize(1, "T-SHIRT"), "1 T-SHIRT");

test(pluralize(2, "T-SHIRT"), "2 T-SHIRTS");

test(pluralize(2, "boss"), "2 bosses");

test(pluralize(2, "battery"), "2 batteries");

test(pluralize(2, "battery"), "2 batteries");

test(pluralize(2, "bay"), "2 bays");

test(pluralize(2, "bAy"), "2 bAys");

test(pluralize(2, "box"), "2 boxes");

test(pluralize(2, "sandwich"), "2 sandwiches");

test(pluralize(2, "wife"), "2 wives");

test(pluralize(2, "calf"), "2 calves");

test(pluralize(2, "axis"), "2 axes");

test(pluralize(2, "alumnus"), "2 alumni");

test(pluralize(2, "SANDWICH"), "2 SANDWICHES");

//__________________________________________________________________________________
//test case for hyperlink
echo "\n\n";
test(hyperlink("http://www.gutenberg.org", "free books!"),
    "<a href='http://www.gutenberg.org'>\n    free books!\n</a>\n");

test(hyperlink("myLocalFile.html", false),
    "<a href='myLocalFile.html'>\n    myLocalFile.html\n</a>\n");

//__________________________________________________________________________________
//test cases for Thumbnails;
//<img src='http://imgur.com/Qv2wl56.png' style='width: 300px;'/>
//<a href='http://imgur.com/Qv2wl56.png'>
//    <img src='http://imgur.com/Qv2wl56.png' style='width: 300px;'/>
//</a>

test(thumbnail("http://imgur.com/Qv2wl56.png",300),
    "<a href='http://imgur.com/Qv2wl56.png'>\n    <img src='http://imgur.com/Qv2wl56.png' style='width: 300px;'/>\n</a>\n");

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////// TEST CASES FOR HOMEWORK 2 FUNCTIONS BEGIN HERE /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

// test cases for asRow functions
test(asRow(array()), "<tr>\n</tr>\n");

test(asRow(array("hi")), "<tr>\n    <td>\n        hi\n    </td>\n</tr>\n");

test(asRow(array("hi", "hello", "salam")),
     "<tr>\n    <td>\n        hi\n    </td>\n    <td>\n        hello\n    </td>\n    <td>\n        salam\n    </td>\n</tr>\n");

test(asRow(array(), "Greeting Types"),
     "<tr>\n    <th>\n        Greeting Types\n    </th>\n</tr>\n<tr>\n</tr>\n");

test(asRow(array("Hi"), "Greeting Types"),
     "<tr>\n    <th>\n        Greeting Types\n    </th>\n</tr>\n<tr>\n    <td>\n        Hi\n    </td>\n</tr>\n");


test(asRow(array("Hi", "Hello"), "Greeting Types"),
     "<tr>\n    <th>\n        Greeting Types\n    </th>\n</tr>\n<tr>\n    <td>\n        Hi\n    </td>\n    <td>\n        Hello\n    </td>\n</tr>\n");


test(asRow(array(), false), "<tr>\n</tr>\n");

test(asRow(array("hello"), false),
     "<tr>\n    <td>\n        hello\n    </td>\n</tr>\n");

test(asRow(array("hello", "salam"), false),
     "<tr>\n    <td>\n        hello\n    </td>\n    <td>\n        salam\n    </td>\n</tr>\n");

// test cases for asAttrs
test(asAttrs(array()), "");
test(asAttrs(array("id"=>"main-point",)), "id='main-point' ");
test(asAttrs(array("id"=>"main-point", "class"=>"unimportant")), "id='main-point' class='unimportant' ");

//these these cases fail i could make the function to work for these
test(asAttrs(array()), "");
echo "the next two test will fail";
test(asAttrs(array("id","main-point")), "id='main-point' ");
test(asAttrs(array("id","main-point", "class","unimportant")), "id='main-point' class='unimportant' ");


/////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////// TEST CASES FOR HOMEWORK 3 FUNCTIONS BEGIN HERE /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br/>";
echo "Homework 3 Test Cases starts here : <br/>";
//  Test cases for dropdown
test(dropdown("",false, array()), "<select name=''>\n</select>\n");
test(dropdown("",false, array("hello")),
     "<select name=''>\n    <option value='hello' >\n        hello\n    </option>\n</select>\n");
test(dropdown("",false, array("hello","hi")),
     "<select name=''>\n    <option value='hello' >\n        hello\n    </option>\n    <option value='hi' >\n        hi\n    </option>\n</select>\n");

test(dropdown("",true, array()),
     "<select name=''>\n    <option value='' >\n        Select One\n    </option>\n</select>\n");
test(dropdown("",true, array("hello")),
     "<select name=''>\n    <option value='' >\n        Select One\n    </option>\n    <option value='hello' >\n        hello\n    </option>\n</select>\n");

test(dropdown("","No Options", array()),
     "<select name=''>\n    <option value='No Options' >\n        No Options\n    </option>\n</select>\n");
test(dropdown("","greetings", array("hello")),
     "<select name=''>\n    <option value='greetings' >\n        greetings\n    </option>\n    <option value='hello' >\n        hello\n    </option>\n</select>\n");
echo "<br/>";
// Test Cases for radioTableRow
echo "Test cases fail cause of spacing issues FUNCTION : radioTableRow";
echo "<br/>";
test (radioTableRow("clover", array("weak-to")),
      "<tr>
    <td>
        clover
    </td>
    <td>
        <input type='radio' name='clover' value='weak-to'>
    </td>
</tr>
");

test (radioTableRow( "clover", array("weak-to","neutral","resistant")),
      "<tr> 
    <td>
        clover
    </td>   
    <td>
        <input type='radio' name='clover' value='weak-to'>    
    </td>
    <td>    
        <input type='radio' name='clover' value='neutral'>    
    </td>
    <td>
        <input type='radio' name='clover' value='resistant'>    
    </td>
</tr>");
echo "<br/>";
// Test Cases for radioTable
echo " These tests fail because of spacing issues : Function: RadioTable <br/>";

test(radioTable("singleElement",array("good", "bad", "excellent"), array("How I feel today")),
"<table id='singleElement'>
    <tr>
        <th>
        </th>
        <th>
            good
        </th>
        <th>
            bad
        </th>
        <th>
            excellent
        </th>
    </tr>
<tr>
    <td>
        How I feel today
    </td>
    <td>
        <input type='radio' name='How I feel today' value='good'>
    </td>
    <td>
        <input type='radio' name='How I feel today' value='bad'>
    </td>
    <td>
        <input type='radio' name='How I feel today' value='excellent'>
    </td>
</tr>
</table>\n");

test (radioTable("myTable2",array("weak-to", "netural", "resistant",),
                 array("clover", "candle", "puddle", "spark", "thinkin")),
      "<table id='myTable'>
    <tr>
        <th>
        
        </th>
        <th>
            weak-to
        </th>
        <th>
            netural
        </th>
        <th>
            resistant
        </th>
    </tr>
    <tr>
        <td>
            clover
        </td>
        <td>
            <input type='radio' name='clover' value='weak-to'>
        </td>
        <td>
            <input type='radio' name='clover' value='netural'>
        </td>
        <td>
            <input type='radio' name='clover' value='resistant'>
        </td>        
    </tr>
</table>\n");
echo "<br/>";
echo "Test cases for Function: makeTextbox <br/>";
test (makeTextbox("Discovering trainer"), "<input type='text' name='Discovering trainer'>");
test (makeTextbox("Discovering trainer","shown on discussion board"),
      "<input type='text' name='Discovering trainer' placeholder='shown on discussion board'>");

echo "<br/>";
echo "Test cases for Function: makeCheckbox <br/>";
test (makeCheckbox("Legendary"), "<input type='checkbox' name='Legendary'>");

echo "<br/>";
echo "Test cases for Function: makeTextarea <br/>";
test( makeTextarea("", 0,0), "<textarea name='' row='0' cols='0'>\n</textarea>\n");
test( makeTextarea("", 1,1), "<textarea name='' row='1' cols='1'>\n</textarea>\n");
test( makeTextarea("", 4,50), "<textarea name='' row='4' cols='50'>\n</textarea>\n");


echo "<br/>";
echo "Test cases for Function: makeTable <br/>";
echo "Test cases fail because of spacing ISSUE!: <br/>";
test(makeTable("aTable", array(array())), "<table id='aTable'>\n<tr>\n</tr>\n</table>\n");
test(makeTable("aTable", array(array("hello"))), "<table id='aTable'>\n<tr>\n <td>\n    hello\n    </td>\n</tr>\n</table>\n");

echo "<br/>";
echo "Test cases for Function: ul <br/>";
echo "Test cases fail because of spacing ISSUE!: <br/>";
test(ul(array()), "<ul>\n</ul>\n");
test(ul(array("milk")), "<ul>\n    <li>    \nmilk\n    </li>\n</ul>\n");
test(ul(array("milk", "egg")), "<ul>\n    <li>\n    milk\n    </li>\n    <li>\n    egg\n    </li>\n</ul>\n");

// Homework 3 test cases end here
echo "<br/>";

?>