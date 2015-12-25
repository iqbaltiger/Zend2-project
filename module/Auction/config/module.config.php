<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Auction\Controller\Auction' => 'Auction\Controller\AuctionController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'auction' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/auction[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Auction\Controller\Auction',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'auction' => __DIR__ . '/../view',
        ),
    ),
);