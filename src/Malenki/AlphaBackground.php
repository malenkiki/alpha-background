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


/**
 * Create simple image with alpha channel to have backgound with alpha 
 * available on IE7 and IE8 or a CSS part for IE6, IE7 and IE8. 
 * 
 * @author Michel Petit <michel.petit@gmail.com> 
 * @license MIT
 */
class AlphaBackground
{
    protected $int_red = 0;
    protected $int_green = 0;
    protected $int_blue = 0;
    protected $float_alpha = 1.0;


    /**
     * CSS official and unofficial name
     * @var $arr_colors
     */
    protected static $arr_colors = array(
        'aliceblue' => '#f0f8ff',
        'antiquewhite' => '#faebd7',
        'aqua' => '#00ffff',
        'aquamarine' => '#7fffd4',
        'azure' => '#f0ffff',
        'beige' => '#f5f5dc',
        'bisque' => '#ffe4c4',
        'black' => '#000000',
        'blanchedalmond' => '#ffebcd',
        'blue' => '#0000ff',
        'blueviolet' => '#8a2be2',
        'brown' => '#a52a2a',
        'burlywood' => '#deb887',
        'cadetblue' => '#5f9ea0',
        'chartreuse' => '#7fff00',
        'chocolate' => '#d2691e',
        'coral' => '#ff7f50',
        'cornflowerblue' => '#6495ed',
        'cornsilk' => '#fff8dc',
        'crimson' => '#dc143c',
        'cyan' => '#00ffff',
        'darkblue' => '#00008b',
        'darkcyan' => '#008b8b',
        'darkgoldenrod' => '#b8860b',
        'darkgray' => '#a9a9a9',
        'darkgreen' => '#006400',
        'darkkhaki' => '#bdb76b',
        'darkmagenta' => '#8b008b',
        'darkolivegreen' => '#556b2f',
        'darkorange' => '#ff8c00',
        'darkorchid' => '#9932cc',
        'darkred' => '#8b0000',
        'darksalmon' => '#e9967a',
        'darkseagreen' => '#8fbc8f',
        'darkslateblue' => '#483d8b',
        'darkslategray' => '#2f4f4f',
        'darkturquoise' => '#00ced1',
        'darkviolet' => '#9400d3',
        'deeppink' => '#ff1493',
        'deepskyblue' => '#00bfff',
        'dimgray' => '#696969',
        'dodgerblue' => '#1e90ff',
        'firebrick' => '#b22222',
        'floralwhite' => '#fffaf0',
        'forestgreen' => '#228b22',
        'fuchsia' => '#ff00ff',
        'gainsboro' => '#dcdcdc',
        'ghostwhite' => '#f8f8ff',
        'gold' => '#ffd700',
        'goldenrod' => '#daa520',
        'gray' => '#808080',
        'green' => '#008000',
        'greenyellow' => '#adff2f',
        'honeydew' => '#f0fff0',
        'hotpink' => '#ff69b4',
        'indianred' => '#cd5c5c',
        'indigo' => '#4b0082',
        'ivory' => '#fffff0',
        'khaki' => '#f0e68c',
        'lavender' => '#e6e6fa',
        'lavenderblush' => '#fff0f5',
        'lawngreen' => '#7cfc00',
        'lemonchiffon' => '#fffacd',
        'lightblue' => '#add8e6',
        'lightcoral' => '#f08080',
        'lightcyan' => '#e0ffff',
        'lightgoldenrodyellow' => '#fafad2',
        'lightgray' => '#d3d3d3',
        'lightgreen' => '#90ee90',
        'lightpink' => '#ffb6c1',
        'lightsalmon' => '#ffa07a',
        'lightseagreen' => '#20b2aa',
        'lightskyblue' => '#87cefa',
        'lightslategray' => '#778899',
        'lightsteelblue' => '#b0c4de',
        'lightyellow' => '#ffffe0',
        'lime' => '#00ff00',
        'limegreen' => '#32cd32',
        'linen' => '#faf0e6',
        'magenta' => '#ff00ff',
        'maroon' => '#800000',
        'mediumaquamarine' => '#66cdaa',
        'mediumblue' => '#0000cd',
        'mediumorchid' => '#ba55d3',
        'mediumpurple' => '#9370db',
        'mediumseagreen' => '#3cb371',
        'mediumslateblue' => '#7b68ee',
        'mediumspringgreen' => '#00fa9a',
        'mediumturquoise' => '#48d1cc',
        'mediumvioletred' => '#c71585',
        'midnightblue' => '#191970',
        'mintcream' => '#f5fffa',
        'mistyrose' => '#ffe4e1',
        'moccasin' => '#ffe4b5',
        'navajowhite' => '#ffdead',
        'navy' => '#000080',
        'oldlace' => '#fdf5e6',
        'olive' => '#808000',
        'olivedrab' => '#6b8e23',
        'orange' => '#ffa500',
        'orangered' => '#ff4500',
        'orchid' => '#da70d6',
        'palegoldenrod' => '#eee8aa',
        'palegreen' => '#98fb98',
        'paleturquoise' => '#afeeee',
        'palevioletred' => '#db7093',
        'papayawhip' => '#ffefd5',
        'peachpuff' => '#ffdab9',
        'peru' => '#cd853f',
        'pink' => '#ffc0cb',
        'plum' => '#dda0dd',
        'powderblue' => '#b0e0e6',
        'purple' => '#800080',
        'red' => '#ff0000',
        'rosybrown' => '#bc8f8f',
        'royalblue' => '#4169e1',
        'saddlebrown' => '#8b4513',
        'salmon' => '#fa8072',
        'sandybrown' => '#f4a460',
        'seagreen' => '#2e8b57',
        'seashell' => '#fff5ee',
        'sienna' => '#a0522d',
        'silver' => '#c0c0c0',
        'skyblue' => '#87ceeb',
        'slateblue' => '#6a5acd',
        'slategray' => '#708090',
        'snow' => '#fffafa',
        'springgreen' => '#00ff7f',
        'steelblue' => '#4682b4',
        'tan' => '#d2b48c',
        'teal' => '#008080',
        'thistle' => '#d8bfd8',
        'tomato' => '#ff6347',
        'turquoise' => '#40e0d0',
        'violet' => '#ee82ee',
        'wheat' => '#f5deb3',
        'white' => '#ffffff',
        'whitesmoke' => '#f5f5f5',
        'yellow' => '#ffff00',
        'yellowgreen' => '#9acd32'
    );


    /**
     * Checks the color value.
     * 
     * @param integer $int 
     * @access protected
     * @return void
     */
    protected function validColor($int)
    {
        if($int < 0 || $int > 255)
        {
            throw new \InvalidArgumentException(
                'Color must be in interval 0 - 255 inclusive.'
            );
        }
    }



    /**
     * Converts RGB or RGBA hexadecimal string to RGV ou RGBA integers and 
     * imports them into current object.
     * 
     * @param string $str 
     * @access protected
     * @return void
     */
    protected function hexToRgba($str)
    {
        $str = preg_replace('/^#/', '', $str);

        $this->red(hexdec(substr($str, 0, 2)));
        $this->green(hexdec(substr($str, 2, 2)));
        $this->blue(hexdec(substr($str, 4, 2)));

        if(strlen($str) == 8)
        {
            $this->alpha(hexdec(substr($str, 6)) / 255);
        }
    }



    /**
     * Red channel, an integer between 0 and 255 
     * 
     * @param integer $int 
     * @access public
     * @return AlphaBackground
     */
    public function red($int)
    {
        $this->validColor($int);

        $this->int_red = $int;

        return $this;
    }



    /**
     * Green channel, an integer between 0 and 255 
     * 
     * @param integer $int 
     * @access public
     * @return AlphaBackground
     */
    public function green($int)
    {
        $this->validColor($int);

        $this->int_green = $int;

        return $this;
    }



    /**
     * Blue channel, an integer between 0 and 255 
     * 
     * @param integer $int 
     * @access public
     * @return AlphaBackground
     */
    public function blue($int)
    {
        $this->validColor($int);

        $this->int_blue = $int;

        return $this;
    }



    /**
     * Alpha channel, given as a float between 0 and 1 
     * 
     * @param float $float 
     * @access public
     * @return AlphaBackground
     */
    public function alpha($float)
    {
        if(!is_numeric($float) || $float < 0 || $float > 1)
        {
            throw new \InvalidArgumentException(
                'Alpha value must be float value between 0 and 1.'
            );
        }

        $this->float_alpha = $float;

        return $this;
    }



    /**
     * Give color by hexadecimal string, with or without alpha.
     *
     * This can include or not the sharp character at the first position of the 
     * string, and the end can have alpha value too.
     *
     * RGV value on 3 characters are not implemented.
     * 
     * @param string $str Hexadecimal string
     * @access public
     * @return AlphaBackground
     */
    public function hex($str)
    {
        if(
            !is_string($str)
            ||
            !preg_match('/^#{0,1}([0-9-A-Fa-f]{6}|[0-9-A-Fa-f]{8})$/', $str)
        )
        {
            throw new \InvalidArgumentException('Invalid RGB(A) hexadecimal string.');
        }

        $this->hexToRgba($str);

        return $this;
    }



    /**
     * Give a CSS color name to define the color.
     *
     * This can be official or unafficial name, so, try to know! 
     * 
     * @param string $str Color’s name
     * @access public
     * @return AlphaBackground
     */
    public function name($str)
    {
        if(!is_string($str))
        {
            throw new \InvalidArgumentException('Color name must be a string.');
        }

        if(!array_key_exists(strtolower($str), self::$arr_colors))
        {
            throw new \InvalidArgumentException('this color is not available.');
        }

        $this->hex(self::$arr_colors[strtolower($str)]);

        return $this;
    }



    /**
     * Internal code to generate PNG image.
     * 
     * @access protected
     * @return resource
     */
    protected function createImage()
    {
        if(!function_exists('imagecreatetruecolor'))
        {
            throw new \RuntimeException(
                'Cannot create image, this feature is not available on this server!'
            );
        }

        $res_img = imagecreatetruecolor(1,1);

        imagealphablending($res_img, false);
        imagesavealpha($res_img, true);

        // Opacity order is reversed here for this function, and only in the range 0 - 127 inclusive.
        $int_color = imagecolorallocatealpha(
            $res_img,
            $this->int_red,
            $this->int_green,
            $this->int_blue,
            127 - round($this->float_alpha * 127)
        );

        imagefill($res_img, 0, 0, $int_color);

        return $res_img;
    }



    /**
     * Display image, in server context only.
     *
     * If this is used in CLI mode, you will get an `RuntimeException`
     * 
     * @access public
     * @return void
     */
    public function display()
    {
        if(PHP_SAPI == 'cli')
        {
            throw new \RuntimeException(
                'This method is not available in CLI mode. '
                .
                'Please use "save()" method instead.'
            );
        }

        $res_img = $this->createImage();
        imagepng($res_img);
        imagedestroy($res_img);
    }



    /**
     * Save color image as PNG file. 
     * 
     * @param string $str File’s name
     * @access public
     * @return void
     */
    public function save($str)
    {
        if(!is_string($str) || (is_string($str) && strlen($str) == 0))
        {
            throw new \InvalidArgumentException(
                'Filename must be a not null string.'
            );
        }

        if(!is_writable(dirname($str)))
        {
            throw new \Exception('Cannot write image file!');
        }

        $res_img = $this->createImage();
        imagepng($res_img, $str);
        imagedestroy($res_img);
    }



    /**
     * Create CSS code to have good display on IE.
     *
     * Generated code include fallback too. 
     * 
     * @access public
     * @return string
     */
    public function css()
    {
        $arr = array();
        $arr[] = sprintf(
            'background: rgba(%1$d, %2$d, %3$d, %4$1.2f);',
            $this->int_red,
            $this->int_green, 
            $this->int_blue, 
            $this->float_alpha
        );
        $arr[] = sprintf(
            'filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#%4$x%1$x%2$x%3$x,endColorstr=#%4$x%1$x%2$x%3$x);',
            $this->int_red,
            $this->int_green, 
            $this->int_blue, 
            floor($this->float_alpha * 255)

        );

        return implode("\n", $arr);
    }
}
