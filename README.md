# Extra resources for the Phenix Framework

This repository will contain extra resources to extend the [Phenix Framework](https://github.com/fredi/Phenix)

## Custom Views

At the moment we have a couple a custom views that uses different template engines.

* Twig
* Smarty

You can make your own custom view by extending the View class of the Phenix Framework.

### Using a custom view

1. Copy the custom view to the '/lib' folder of the Phenix Framework
2. Require it in the 'config.php' file inside the '/config' folder (Create if it doesn't exist already):

        require ROOT.DS."lib".DS."TwigView.php";

3. Open the 'application_controller.php' file in the '/app/controllers' folder and set the 'view' variable of the class to 'TwigView':

        <?php
        class ApplicationController extends Controller
        {
            public $view = "TwigView";
        }

    Now all your controllers that extends from ApplicationController will render views using Twig. NOTE: The TwigView class looks for templates with '.tpl' extension.

4. Download and extract the last release of Twig in the '/vendors/Twig' folder.
    NOTE: The TwigView class will automatically require the Twig Autoloader in the following folder:

        /vendor/Twig/lib/Twig/Autoloader.php

    Don't forget to create your views with '.tpl' extension.

## License

Phenix is released under the MIT license.