<?php

use App\Core\Config;

/**
 * Routing
 */
Config::set('routes', ['default', 'admin']);
Config::set('defaultRoute', 'default');
Config::set('defaultController', 'category');
Config::set('defaultAction', 'index');
Config::set('defaultQuery', '');

/**
 * Languages
 */
Config::set('languages', ['en', 'ru']);
Config::set('defaultLanguage', 'ru');

/**
 * Debug
 */
Config::set('debug', true);

/**
 * Meta
 */
Config::set('siteName', 'Свадьба под ключ');

/**
 * Database
 */
Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.name', 'wedding_site');

/**
 * User menu
 */
Config::set('userMenu', ['index', 'settings', 'communications', 'favorites', 'purchases']);

/**
 * Набор случайных символов для усложнения подборки пользовательского пароля ("соль").
 */
Config::set('salt', 'g5kgat83kd0pbm51d');

/**
 * Pagination
 */
Config::set('pagLimit', 5);
Config::set('pagButtonLimit', 5);

/**
 * Image
 */
Config::set('gallery', ROOT.DS.'public'.DS.'img'.DS);
Config::set('imgDir', DS.'img'.DS);

/**
 * System image
 */
Config::set('systemImg', DS.'img'.DS.'system'.DS);

/**
 * User image
 */
Config::set('userImgRoot', ROOT.DS.'public'.DS.'img'.DS.'user'.DS);
Config::set('userImg', DS.'img'.DS.'user'.DS);

/**
* Decor image
*/
Config::set('decorImgRoot', ROOT.DS.'public'.DS.'img'.DS.'decor'.DS);
Config::set('decorImg', DS.'img'.DS.'decor'.DS);
Config::set('decorImgWeb', '/img/decor/');

/**
 * Clothes image
 */
Config::set('clothesImgRoot', ROOT.DS.'public'.DS.'img'.DS.'clothes'.DS);
Config::set('clothesImg', DS.'img'.DS.'clothes'.DS);
Config::set('clothesImgWeb', '/img/clothes/');

/**
 * Clothes image
 */
Config::set('autoImgRoot', ROOT.DS.'public'.DS.'img'.DS.'auto'.DS);
Config::set('autoImg', DS.'img'.DS.'auto'.DS);
Config::set('autoImgWeb', '/img/auto/');

/**
 * Hotel image
 */
Config::set('hotelImgRoot', ROOT.DS.'public'.DS.'img'.DS.'hotel'.DS);
Config::set('hotelImg', DS.'img'.DS.'hotel'.DS);
Config::set('hotelImgWeb', '/img/hotel/');
