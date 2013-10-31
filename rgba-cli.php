<?php
/*
Copyright (c) 2013 Michel Petit <petit.michel@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/



namespace Malenki;


define('DS', DIRECTORY_SEPARATOR);
define('ARGILE_PATH', __DIR__ . DS . 'vendor'.DS.'malenki'.DS.'argile'.DS.'src'.DS.'Malenki'.DS.'Argile'.DS);
define('ALPHA_PATH', __DIR__ . DS . 'src'.DS.'Malenki'.DS);

include(ARGILE_PATH . 'Arg.php');
include(ARGILE_PATH . 'Options.php');

include(ALPHA_PATH . 'AlphaBackground.php');


use Malenki\Argile\Arg as Arg;
use Malenki\Argile\Options as Options;




$opt = Options::getInstance();


$opt->flexible();

$opt->newValue('red')
    ->required()
    ->short('r')
    ->long('red')
    ->help('Red value, between 0 and 255', 'INTEGER')
    ;

$opt->newValue('green')
    ->required()
    ->short('g')
    ->long('green')
    ->help('Green value, between 0 and 255', 'INTEGER')
    ;

$opt->newValue('blue')
    ->required()
    ->short('b')
    ->long('blue')
    ->help('Blue value, between 0 and 255', 'INTEGER')
    ;

$opt->newValue('alpha')
    ->required()
    ->short('a')
    ->long('alpha')
    ->help('Alpha value, between 0 and 1', 'FLOAT')
    ;

$opt->newValue('hex')
    ->required()
    ->short('x')
    ->long('hex')
    ->help('RGB(A) string, if alpha not given by this option or by --alpha, then alpha will be 0', 'STRING')
    ;

$opt->newValue('output')
    ->required()
    ->short('o')
    ->long('output')
    ->help('Output file name to save the PNG image. This option is mandatory.', 'FILE')
    ;


$opt->parse();


if($opt->has('output'))
{
    $rgba = new AlphaBackground();

    try
    {
        if($opt->has('red'))
        {
            $rgba->red((int) $opt->get('red'));
        }

        if($opt->has('green'))
        {
            $rgba->green((int) $opt->get('green'));
        }

        if($opt->has('blue'))
        {
            $rgba->blue((int) $opt->get('blue'));
        }

        if($opt->has('alpha'))
        {
            $rgba->alpha((float) $opt->get('alpha'));
        }

        if($opt->has('hex'))
        {
            $rgba->hex((string) $opt->get('hex'));
        }
    }
    catch(\Exception $e)
    {
        print($e->getMessage());
        print("\n");
        exit(1);
    }

    try
    {
        $rgba->save($opt->get('output'));
    }
    catch(\Exception $e)
    {
        print($e->getMessage());
        print("\n");
        exit(1);
    }
}
else
{
    print('You must provide at least a filename!');
    print("\n");
    exit(1);
}

exit();

