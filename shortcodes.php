<?php


add_shortcode('fabs_links', 'fabs_links_shortcode');
function fabs_links_shortcode($attrs)
{
    fabs_links_page($attrs);
}