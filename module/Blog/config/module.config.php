<?php

// Filename: /module/Blog/config/module.config.php
return array(
    'db' => array(
        'driver'         => 'Pdo',
        'username'       => 'root',  //edit this
        'password'       => '',  //edit this
        'dsn'            => 'mysql:dbname=contestweb;host=localhost',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
     'service_manager' => array(
         'factories' => array(
             'Blog\Mapper\PageMapperInterface'   => 'Blog\Factory\ZendDbSqlMapperFactory',
             'Blog\Service\PageServiceInterface' => 'Blog\Factory\PageServiceFactory',
             'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory',
             'Blog\Service\UserService' => 'Blog\Factory\UserServiceFactory',
         )
     ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    // This lines opens the configuration for the RouteManager
     'controllers' => array(
             'factories' => array(
             'Blog\Controller\Page' => 'Blog\Factory\PageControllerFactory',
                 'Blog\Controller\User'=>'Blog\Factory\UserControllerFactory',
         )
        ),
    'router' => array(
        // Open configuration for all possible routes
        'routes' => array(
            // Define a new route called "post"
            'page' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/blog',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Page',
                        'action'     => 'index',
                    )
                )
            ),
            'register'=>array(
                'type' => 'literal',
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/register',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Blog\Controller\User',
                        'action'     => 'register',
                    )
                )
            ),
            'test'=>array(
                'type' => 'literal',
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/test',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Blog\Controller\User',
                        'action'     => 'test',
                    )
                )
            ),
            'login'=>array(
                'type' => 'literal',
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/login',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Blog\Controller\User',
                        'action'     => 'login',
                    )
                )
            )
        )
    )
);