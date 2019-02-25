<?php
/*
 * @author Sikandar Khan Hawa
 * @version 2019-Feb-21
 *
 * @see https://php.radford.edu/~itec325/2019spring-ibarland/Homeworks/form-handle/form-handle.html
 */
    include_once("utils.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            form-handler
        </title>
    </head>
    <body>
        <h1>
            Okaymon Info form handler
        </h1>
        <h3>
            "Gotta Catch Several of 'em"
        </h3>
        <?php
            echo "Here is the information received: <br/>";
            if(array_key_exists('Legendary',$_POST))
                $_POST["Legendary"] = $_POST["Legendary"];
            else
                $_POST["Legendary"] =  "nope";
            if(array_key_exists('disclaimer',$_POST))
                $_POST["disclaimer"] = $_POST["disclaimer"];
            else
                $_POST["disclaimer"] =  "nope";
            echo makeTable("form-hander", array(array("trainer:", $_POST["trainer"]),
                                                array("species: ", $_POST["species"]),
                                                    array("legendary?: ", $_POST["Legendary"]),
                                                        array("energy: ", $_POST["energy"]),
                                                            array("weight: ", $_POST["Weight"]),
                                                                array("weight-unit: ", $_POST["weight-unit"]),
                                                                    array("flavor text: ", $_POST['flavortext'])));
            echo ul(array("clover: ".$_POST["clover"],
                            "candle: ".$_POST["candle"],
                                "puddle: ".$_POST['puddle'],
                                    "spark: ".$_POST["spark"],
                                        "thinkin: ".$_POST["thinkin"]));
            echo "disclaimer: ", $_POST["disclaimer"];
    ?>
    </body>
</html>