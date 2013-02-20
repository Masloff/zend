<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Massive
 * Date: 18.02.13
 * Time: 15:07
 * To change this template use File | Settings | File Templates.
 */

return array(
    array
    (
        'label' => 'Home',
        'id' => 'home',
        'module' => 'default',
        'controller' => 'index',
        'action' => 'index',
        'route' => 'default',

        'pages' => array
        (
            array (
                'label' => 'Головна',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'index',
                'action' => 'index',
                'resource' => 'index',
                'privilege' => 'index',
            ),
            array (
                'label' => 'Logout',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'user',
                'action' => 'logout',
                'resource' => 'user',
                'privilege' => 'logout',
            ),
            array (
                'label' => 'Login',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'user',
                'action' => 'login',
                'resource' => 'user',
                'privilege' => 'login',
            ),
            array (
                'label' => 'Реєстрація',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'user',
                'action' => 'registration',
                'resource' => 'user',
                'privilege' => 'registration',
            ),
            array(
                'label' => 'Список статей',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'article',
                'action' => 'list',
                'resource' => 'article',
                'privilege' => 'list',
            ),
            array(
                'label' => 'Список користувачів',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'admin',
                'action' => 'users',
                'resource' => 'admin',
                'privilege' => 'users',
            ),
            array(
                'label' => 'Редагувати статті',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'admin',
                'action' => 'articles',
                'resource' => 'admin',
                'privilege' => 'articles',
            ),
            array(
                'label' => 'Редагувати коментарі',
                'tag' => 'topMenu',
                'route' => 'default',
                'module' => 'default',
                'controller' => 'admin',
                'action' => 'comments',
                'resource' => 'admin',
                'privilege' => 'comments',
            )
        )
    )
);