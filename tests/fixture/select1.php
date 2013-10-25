<?php
$form = new \crodas\Form\Form(false);
$form->select("foobar", ['foo', 'bar', 'xxx'], ['class' => 'foobar']);
$form->populate(['foobar' => 'bar']);
$form->select("foobar", ['foo', 'bar', 'xxx'], ['class' => 'foobar']);
$form->select("foobar", ['foo', 'bar', 'xxx'], ['class' => 'foobar'], 'xxx');

