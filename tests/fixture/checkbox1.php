<?php

$form = new \crodas\Form\Form;
$form->checkbox('male', 'yes');
$form->checkbox('female', 'yes');

$form->populate(['male' => true]);

$form->checkbox('male', 'yes');
$form->checkbox('female', 'yes');
