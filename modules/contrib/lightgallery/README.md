# Lightgallery

The [Light Gallery module](https://www.drupal.org/project/lightgallery)
integrates the [jQuery lightGallery plugin](https://www.lightgalleryjs.com/)
with Drupal. lightGallery is a customizable, modular, responsive, lightbox
gallery plugin for jQuery. This module integrates with the Views module.

For a full description of the module, visit the
[project page](https://www.drupal.org/project/lightgallery).

Submit bug reports and feature suggestions, or track changes in the
[issue queue](https://www.drupal.org/project/issues/lightgallery).


## Requirements

This module requires the following packages:
- [Drupal/Views](https://www.drupal.org/project/drupal)
- [Lighgallery plugin](https://www.lightgalleryjs.com/)


## Installation

Install as you would normally install a contributed Drupal module. For further
information, see
[Installing Drupal Modules](https://www.drupal.org/docs/extending-drupal/installing-drupal-modules).

Then you need to properly install the lightgallery plugin, since the module depends on
the plugin to work.

### Using composer to install the lightgallery plugin

1. Open the `composer.json` file of your site.
2. Add `"sachinchoolur/lightgallery": "1.10.0"` to the `require` section.
```
"require": {
    .
    .
    "sachinchoolur/lightgallery": "1.10.0"
 }
```

3. Add `"libraries/{$name}": ["type:drupal-library"]` to the `"installer-paths"`
   section of your composer.
```
"installer-paths": {
    .
    .
    "libraries/{$name}": ["type:drupal-library"]
}
```

4. Add `sachinchoolur/lightgallery` as a new `package` to `"repositories"`.
```
"repositories": [
    .
    .
    {
        "type": "package",
        "package": {
            "name": "sachinchoolur/lightgallery",
            "version": "1.10.0",
            "type": "drupal-library",
            "source": {
                "url": "https://github.com/sachinchoolur/lightGallery",
                "type": "git",
                "reference": "1.10.0"
            }
        }
    }
]
```
5. Run `composer update sachinchoolur/lightgallery`.


### Manually installing the lightgallery plugin

Download the [lightGallery plugin](http://sachinchoolur.github.io/lightGallery/)
(version 1.10) and place the
resulting directory into the libraries directory. Ensure
`libraries/lightgallery/` exists.


## Usage

There's a documentation guide on the drupal site, just check the
[Lightgallery documentation](https://www.drupal.org/docs/contributed-modules/lightgallery).


## Ideas for contributions

Patches are always welcome. Some particular features that will be implemented in
the near future are:

- Support more Slider LightGallery.


## Maintainers

- Robin Ingelbrecht - [robin.ingelbrecht](https://www.drupal.org/u/robiningelbrecht)
- Murilo - [murilohp](https://www.drupal.org/u/murilohp)
- Philippe Joulot - [phjou](https://www.drupal.org/u/phjou)
- Dietrich Moerman - [dietr_ch](https://www.drupal.org/u/dietr_ch)
