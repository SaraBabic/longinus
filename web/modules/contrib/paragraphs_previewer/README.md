# Paragraphs Previewer

Provides a rendered preview of a paragraphs item while on an entity form.

Features:

- Preview the rendered paragraph before saving the entity.
- Previewer can be enabled per field instance.
- Full width window to preview the design.
- Resizable window to preview responsive designs.

Caveats:

- Preview popup uses the front end theme to style the rendered markup. This
  assumes that all styling is applied to that paragraph's markup and does not
  need any other page context/wrapping markup, for example node markup.

For a full description of the module, visit the
[project page](https://www.drupal.org/project/paragraphs_previewer).

Submit bug reports and feature suggestions, or track changes in the
[issue queue](https://www.drupal.org/project/issues/paragraphs_previewer).

## Table of contents

- Requirements
- Installation
- Configuration
- Maintainers

## Requirements

- [Paragraphs](https://www.drupal.org/project/paragraphs)

## Installation

Install as you would normally install a contributed Drupal module. For further
information, see
[Installing Drupal Modules](https://www.drupal.org/docs/extending-drupal/installing-drupal-modules).

## Configuration

- Create / Edit a paragraphs field:
  - Set widget to "Paragraphs Previewer"
  - Set "Default edit mode" to "Closed" or "Preview".

## Maintainers

- Michael Vanetta - [recrit](https://www.drupal.org/u/recrit)
