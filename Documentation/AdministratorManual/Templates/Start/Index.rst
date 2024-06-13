..  include:: /Includes.rst.txt


..  _changeTemplates:

============================
Changing & editing templates
============================

The EXT:daycarecenters extension uses Fluid as its template engine. If you are
already familiar with Fluid, you might skip this section.

This documentation will not cover all aspects of Fluid but will highlight the
most important things you need to use it effectively. For more comprehensive
information, you can refer to resources such as:

*   Books like `Zukunftssichere TYPO3-Extensions mit Extbase & Fluid by Jochen Rau and Sebastian Kurfürst <http://www.amazon.de/Zukunftssichere-TYPO3-Extensions-mit-Extbase-Fluid/dp/3897219654/>`_
*   Online resources like the `http://wiki.typo3.org/Fluid <http://wiki.tpyo3.org/Fluid>`_

Many other sites also provide valuable information about Fluid.

Changing paths of the template
==============================

You should never edit the original templates of an extension, as those changes
will disappear if you upgrade the extension. As with any Extbase-based
extension, you can find the templates in the `Resources/Private/` directory.

If you want to change a template, copy the desired files to the directory where
you store your templates. This can be a directory in a `sitepackage` extension.
Multiple fallbacks can be defined, making it much easier to customize
the templates.

..  code-block:: typoscript

    plugin.tx_daycarecenters {
      view {
        templateRootPaths >
        templateRootPaths {
          0 = EXT:daycarecenters/Resources/Private/Templates/
          1 = EXT:sitepackage/Resources/Private/EXT/daycarecenters/Templates/
        }
        partialRootPaths >
        partialRootPaths {
          0 = EXT:daycarecenters/Resources/Private/Partials/
          1 = EXT:sitepackage/Resources/Private/EXT/daycarecenters/Partials/
        }
        layoutRootPaths >
        layoutRootPaths {
          0 = EXT:daycarecenters/Resources/Private/Layouts/
          1 = EXT:sitepackage/Resources/Private/EXT/daycarecenters/Layouts/
        }
      }
    }

Change the templates using TypoScript constants
===============================================

You can use the following TypoScript in the **constants** to change
the paths

..  code-block:: typoscript

    plugin.tx_daycarecenters {
      view {
        templateRootPath = EXT:sitepackage/Resources/Private/EXT/daycarecenters/Templates/
        partialRootPath = EXT:sitepackage/Resources/Private/EXT/daycarecenters/Partials/
        layoutRootPath = EXT:sitepackage/Resources/Private/EXT/daycarecenters/Layouts/
      }
    }

This configuration allows you to specify custom paths for your templates,
partials, and layouts, ensuring your customizations are maintained independently
of the extension's updates.
