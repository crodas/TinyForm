<?php
$form = new \crodas\Form\Form(false);
$form->populate(['foobar' => '"foobar']);
$form->text('foobar', ['class' => 'foobar']);
$form->text('foobarx', ['class' => 'foobar'], 'xxxx');
