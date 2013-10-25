<?php
$form = new \crodas\Form\Form;
$form->populate(['foobar' => '"foobar']);
$form->text('foobar', ['class' => 'foobar']);
$form->text('foobarx', ['class' => 'foobar'], 'xxxx');
