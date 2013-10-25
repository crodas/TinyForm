<?php
/*
  +---------------------------------------------------------------------------------+
  | Copyright (c) 2013 César Rodas                                                  |
  +---------------------------------------------------------------------------------+
  | Redistribution and use in source and binary forms, with or without              |
  | modification, are permitted provided that the following conditions are met:     |
  | 1. Redistributions of source code must retain the above copyright               |
  |    notice, this list of conditions and the following disclaimer.                |
  |                                                                                 |
  | 2. Redistributions in binary form must reproduce the above copyright            |
  |    notice, this list of conditions and the following disclaimer in the          |
  |    documentation and/or other materials provided with the distribution.         |
  |                                                                                 |
  | 3. All advertising materials mentioning features or use of this software        |
  |    must display the following acknowledgement:                                  |
  |    This product includes software developed by César D. Rodas.                  |
  |                                                                                 |
  | 4. Neither the name of the César D. Rodas nor the                               |
  |    names of its contributors may be used to endorse or promote products         |
  |    derived from this software without specific prior written permission.        |
  |                                                                                 |
  | THIS SOFTWARE IS PROVIDED BY CÉSAR D. RODAS ''AS IS'' AND ANY                   |
  | EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED       |
  | WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE          |
  | DISCLAIMED. IN NO EVENT SHALL CÉSAR D. RODAS BE LIABLE FOR ANY                  |
  | DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES      |
  | (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;    |
  | LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND     |
  | ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT      |
  | (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS   |
  | SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE                     |
  +---------------------------------------------------------------------------------+
  | Authors: César Rodas <crodas@php.net>                                           |
  +---------------------------------------------------------------------------------+
*/
namespace crodas\Form;

class Form extends Events
{
    protected $values;
    protected $token;

    public function __construct()
    {
    }

    public function populate(Array $values)
    {
        $this->values = $values;
        return $this;
    }

    public function open($action = '', $method = 'POST', $extra = Array())
    {
        $args  = array_merge($extra, compact('action', 'method'));
        $targs = Templates::get('helper/args')->render(compact('args'), true);
        Templates::get('form/open')
            ->render(compact('targs'));

        self::trigger('open', $this, $args);

        return $this;
    }

    public function close()
    {
        Templates::get('form/close')
            ->render(compact('action', 'method'));
        return $this;
    }

    protected function render($type, $name, Array $args = [], $value = null)
    {
        $args['name']  = $name;

        if (empty($value) && !empty($this->values[$name])) {
            $value = $this->values[$name];
        }

        $targs = Templates::get('helper/args')->render(compact('args'), true);

        Templates::get($type)
            ->render(compact('targs', 'value'));
    }

    public function hidden($name, $value = null, Array $args = array())
    {
        $args['type'] = 'hidden';
        return $this->render('input', $name, $args, $value);
    }

    public function text($name, Array $args = array(), $value = null)
    {
        $args['type'] = 'input';
        return $this->render('input', $name, $args, $value);
    }

    public function textarea($name, Array $args = array(), $value = null)
    {
        return $this->render('textarea', $name, $args, $value);
    }

    public function file($name, Array $args = array())
    {
        $args['type'] = 'file';
        return $this->render('input', $name, $args);
    }

    public function checkbox($name, $value, Array $args = array(), $selected = null)
    {
        $args['type'] = 'checkbox';
        if (!empty($selected) || !empty($this->values[$name])) {
            $args['checked'] = 'checked';
        }

        return $this->render('input', $name, $args, $value);
    }

    public function radio($name, $value, Array $args = array(), $selected = null)
    {
        $args['type'] = 'radio';
        if (!empty($selected) || !empty($this->values[$name]) && $this->values[$name] == $value) {
            $args['checked'] = 'checked';
        }

        return $this->render('input', $name, $args, $value);
    }

    public function options($name, Array $values, Array $args = array())
    {
        foreach ($values as $key => $value) {
            $this->radio($name, $key, $args);
            echo $value;
        }
    }
}
