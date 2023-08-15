CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers


INTRODUCTION
------------

SVG Formatter module provides support for using SVG images on your website.

The standard image field in Drupal 9 doesn't support SVG images. If you really
want to display SVG images on your website then you need another solution. This
module adds a new formatter for the file field, which allows files with any
extension to be uploaded. In the formatter settings you can set the default
image size and enable alt and title attributes. If you want to add some CSS and
Javascript magic to your SVG images, then use the inline SVG option.

 * For a full description of the module, visit the project page:
   https://www.drupal.org/project/svg_formatter

 * To submit bug reports and feature suggestions, or to track changes:
   https://www.drupal.org/project/issues/svg_formatter


REQUIREMENTS
------------

This module requires no modules outside of Drupal core, but please make sure to
install it via Composer so that library 'enshrined/svg-sanitize' is also
installed. Otherwise, your site may be vulnerable to XSS exploits if you allow
users to upload SVG images and use inline SVG output mode.


INSTALLATION
------------

 * Install the SVG Formatter module as you would normally install a contributed
   Drupal module. Visit https://www.drupal.org/node/1897420 for further
   information.


CONFIGURATION
-------------

 * Add a file field to your content type, taxonomy or any other entity and add
svg to the allowed file extensions.
 * Go to the 'Manage display' and change the field format to 'SVG Formatter'.
 * Set image dimensions if you want and enable or disable attributes.

Blog post describing how to use the module:
https://gorannikolovski.com/drupal-8-and-svg-images


MAINTAINERS
-----------

Current maintainers:
 * Goran Nikolovski (gnikolovski) - https://www.drupal.org/u/gnikolovski

This project has been sponsored by:
 * Studio Present - https://www.drupal.org/studio-present
