<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Seller\Controller\Seller' => 'Seller\Controller\SellerController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'seller' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/seller[/:action][/:id][/page/:page]',
                    'constraints' => array(
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                      
                        'id'     => '[0-9]+',
                        'page' => '[0-9]+',
                        
                    ),
                    'defaults' => array(
                        'controller' => 'Seller\Controller\Seller',
                        'action'     => 'index',
                    ),
                ),
            ),
            
           'pages' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/seller/allproperty[/page/:page]',
                    'constraints' => array(
                        'action' => '(?!\bpage\b)(?!\border_by\b)[a-zA-Z][a-zA-Z0-9_-]*',
                      
                        'id'     => '[0-9]+',
                        'page' => '[0-9]+',
                        
                    ),
                    'defaults' => array(
                        'controller' => 'Seller\Controller\Seller',
                        'action'     => 'allproperty',
                    ),
                ),
            ),
            
            
            
            
            
            
            
            
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'seller' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'paginator-slide' => __DIR__ . '/../view/layout/slidePaginator.phtml',
        ),
    ),
);