<?php

$form = new \crodas\Form\Form;
$form->populate(['sex' => 'M']);
$form->options('sex', ['M' => 'male', 'F' => 'Female']);
