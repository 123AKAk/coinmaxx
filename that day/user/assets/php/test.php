<?php

$name = $_FILES['myfile']['name'];
$name = $_FILES['myfile']['type'];
$data = file_get_contents($_FILES['myfile']['tmp_name'])