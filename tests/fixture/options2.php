<?php

$form = new \crodas\Form\Form(false);
$form->populate(['sex' => 'M']);
$form->options('sex', ['M' => 'male', 'F' => 'Female']);
