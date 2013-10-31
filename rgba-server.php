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
define('ALPHA_PATH', __DIR__ . DS . 'src'.DS.'Malenki'.DS);
include(ALPHA_PATH . 'AlphaBackground.php');

if(isset($_GET['color']))
{
    $str_param = $_GET['color'];

    $rgba = new AlphaBackground();

    // color name
    if(preg_match('/^[a-zA-Z]+,[0-9]\.[0-9]+$/', $str_param))
    {
        list($str_name, $float_alpha) = explode(',', $str_param);

        try
        {
            $rgba->name(strtolower($str_name));
            $rgba->alpha((float) $float_alpha);

            $rgba->display();
        }
        catch(\Exception $e)
        {
            $rgba->display();
        }
    }

    // rgba
    if(preg_match('/^[0-9]{1,3},[0-9]{1,3},[0-9]{1,3},[0-9]\.[0-9]+$/', $_GET['color']))
    {
        $arr = explode(',', $str_param);

        try
        {
            $rgba->red((int) $arr[0]);
            $rgba->green((int) $arr[1]);
            $rgba->blue((int) $arr[2]);
            $rgba->alpha((float) $arr[3]);
            $rgba->display();
        }
        catch(\Exception $e)
        {
            $rgba->display();
        }
    }
}
