# AlphaBackground

Alpha background are difficult with IE7 and 8… So this is a clean solution without DX filter. Need PHP.

## For custom use

Example is better than long blahblah so, I start by showing you how to display at the browser the image:

``` php
$rgba = new AlphaBackground();
$rgba->red(255);
$rgba->green(150);
$rgba->blue(42);
$rgba->alpha(0.8);
$rgba->display();
```
You can do it in one line too:

``` php
$rgba = new AlphaBackground();
$rgba->red(255)->green(150)->blue(42)->alpha(0.8)->display();
```

You can use hexadecimal string too :

``` php
$rgba = new AlphaBackground();
$rgba->hex('#ff962acc')->display();
```

The hexadecimal string can be without alpha:

``` php
$rgba = new AlphaBackground();
$rgba->hex('#ff962a')->alpha(0.8)->display();
```

You can use CSS color name too:
``` php
$rgba = new AlphaBackground();
$rgba->name('orange')->alpha(0.7)->display();
```

If you want save the image, into all previous example, replace the last used method by `save()`, this method take one argument, the file's name:
``` php
$rgba = new AlphaBackground();
$rgba->name('orange')->alpha(0.7)->save('some_file.png');
```

## For server

I have wroten a little script to put on a server to display background image. To use it, simply use the following lines into your CSS file.


``` css
background-image: url(http://www.your-server.com/rgba-serveur.php?color=255,150,42,0.8);
background-image: url(http://www.your-server.com/rgba-serveur.php?color=red,0.5);

```

The script is simple, but it works, you can add some of your code inside it ;)


## For CLI

You can create background image by using a little CLI script I have wroten for you.

Following line show you how to use it.

``` bash
php rgba-cli.php -r 255 -g 150 -b 42 -a 0.8 -o image.png
php rgba-cli.php -n red -a 0.5 -o image.png
php rgba-cli.php --red 255 --green 150 --blue 42 --alpha 0.8 --output image.png
php rgba-cli.php --name red --alpha 0.5 --output image.png
php rgba-cli.php --hex ff962a --alpha 0.8 --output image.png
php rgba-cli.php --hex ff962acc --output image.png
```
