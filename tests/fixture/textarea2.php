<?php

$form = new \crodas\Form\Form(false);
$form->textarea('foobar', ['class' => '"foobar"<>\''], "foobar");
$form->textarea('foobar', ['class' => '"foobar"<>\''], "\nfoobar");
$form->textarea('foobar', ['class' => '"foobar"<>\''], "\nfoobar\n");
$form->textarea('foobar', ['class' => '"foobar"<>\''], "<br/>");
