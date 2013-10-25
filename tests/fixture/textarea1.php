<?php

$form = new \crodas\Form\Form(false);
$form->textarea('foobar', ['class' => '"foobar"<>\'']);
