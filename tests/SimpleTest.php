<?php

class SimpleTest extends \phpunit_framework_testcase
{
    public static function provider()
    {
        return [
            ['text1'],
            ['text2'],
            ['textarea1'],
            ['textarea2'],
            ['options1'],
            ['options2'],
            ['checkbox1'],
            ['select1'],
            ['form1'],
            ['form2'],
        ];
    }

    /**
     *  @dataProvider provider
     */
    public function testGetCollection($file)
    {
        if ($file == 'form2') {
            \crodas\Form\Form::on('open', function($form) {
                $form->hidden('token', 'foobar');
            });
        }
        $file = __DIR__ . "/fixture/{$file}";
        ob_start();
        require $file . ".php";
        $txt = ob_get_clean();
        $this->assertEquals(
            trim($txt), 
            trim(file_get_contents($file . ".html"))
        );
    }
}
