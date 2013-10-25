<?php
$form = new \crodas\Form\Form(false);
$form->open();
$form->populate(['foobar' => '"foobar']);
$form->text('foobar', ['class' => 'foobar']);
$form->text('foobarx', ['class' => 'foobar'], 'xxxx');
$form->close();
