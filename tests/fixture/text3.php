<?php
$form = new \crodas\Form\Form(false);
$form->populate([
    'foobar' => ['x' => ['"foobar'], 'xxxx', 9 => 'yyyy'],
    'x' => [['foo' => 1], ['foo' => 2]],
]);
$form->text('foobar[x][]', ['class' => 'foobar']);
$form->text('foobar[x][]', ['class' => 'foobar']);
$form->text('foobar[]', ['class' => 'foobar']);
$form->text('foobar[9]', ['class' => 'foobar']);
$form->text('x[][foo]', ['class' => 'foobar']);
$form->text('x[][foo]', ['class' => 'foobar']);
