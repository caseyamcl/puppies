<?php

namespace Puppies;

use Silex\Application as SilexApp;
use Silex\Provider\TwigServiceProvider;

class App
{
    public function run()
    {
        //Instantiate a Silex Application Object
        $app = new SilexApp();

        //Turn on debugging
        $app['debug'] = true;

        $app->register(new TwigServiceProvider(), array(
            'twig.path' => __DIR__.'/../../templates',
        ));

        //Front Page Route
        $app->get('/', function () use ($app) {
            return $app['twig']->render('index.html.twig', array('site_title' => "Puppies!"));
        });

        //Single Puppy Page Route
        $app->get('/single/{name}', function($name) use ($app) {
            
            return $app['twig']->render('single.html.twig', array(
                'site_title' => "Puppies!",
                'puppy_name' => $name
                ));
        });

        //Run it!
        $app->run();        
    }
}

/* EOF: App.php */