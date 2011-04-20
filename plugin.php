<?php
/* Plugin name: Fabs Links
   Plugin URI: http://www.owlwatch.com
   Author: Mark Fabrizio
   Author URI: http://www.owlwatch.com
   Version: 1.00
   Description: Shows links in a tree view

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
wp_enqueue_script('fabs_links', plugins_url('/resources/js/fabs-links.js', __FILE__), array('jquery'), '1.0');
wp_enqueue_style('fabs_links', plugins_url('/resources/css/style.css', __FILE__));
include( dirname(__FILE__).'/widgets.php');
include( dirname(__FILE__).'/template.php');
include( dirname(__FILE__).'/shortcodes.php');