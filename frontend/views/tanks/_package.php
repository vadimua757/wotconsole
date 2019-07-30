<?php
/**
 * @var $package common\models\Package
 */
foreach ($package->attributes as $key => $attribute) {
    echo $key . ": " . $attribute;
    echo "<br>";
}

