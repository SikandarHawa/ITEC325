<?php
/*
 * @author Sikandar Khan Hawa
 * @version 2019-Feb-21
 *
 * @see https://php.radford.edu/~itec325/2019spring-ibarland/Homeworks/form-handle/form-handle.html
 */
    include("utils.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Okaymon Form
        </title>
    </head>
    <body>
        <h1>
            Okaymon Info Entry Form
        </h1>
        <h3>
            "Gotta Catch Several of 'em"
        </h3>
        <p>
            Enter info about a newly-discovered Okaymon species, for our database!
        </p>
        <form action="okaymon-handler.php" method="post">
            <?php
                echo makeTable("OkaymanInfo",array(array("Discovering trainer: ", makeTextbox("trainer", "Shown on discussion board")),
                                                        array("Okaymon Species:", maketextbox("species", "e.g. \"memfive\" "). "Legendary?". makeCheckbox("Legendary")),
                                                            array("Energy Type: ", dropdown("energy","Select One", array("clover", "candle", "puddle", "spark", "thinkin"))),
                                                                array("Weight: ", makeTextbox("Weight"). dropdown("weight-unit","kg", array("lb"))),
                                                                    array("Flavor text: ", makeTextarea("flavortext",2, 70, "1-2 sentences"))));
                echo radioTable("EngeryTable",array("weak-to", "neutral", "resistant"),
                                                            array("clover", "candle", "puddle", "spark", "thinkin"));
                echo "<label><p>", makeCheckbox("disclaimer"),
                    "I understand that by submitting this form, I am transferring any copyright and intellectual property
                        rights to the form's owner that I will have the right to do so, and that
                            my submission is not infringing on the people's rights.</p></label>"
            ?>
            <br/>
            <input type="submit" name="submitThis" value="Submit" >
        </form>
    </body>
</html>