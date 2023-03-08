..  include:: /Includes.rst.txt


..  _typoscript:

==========
TypoScript
==========

`daycarecenters` needs some basic TypoScript configuration. To do so you have
to add an +ext template to either the root page of your website or to a
specific page which contains the `daycarecenters` plugin.

..  rst-class:: bignums

1.  Locate page

    You have to decide where you want to insert the TypoScript template. Either
    root page or page with `daycarecenters` plugin is OK.

2.  Create TypoScript template

    Switch to template module and choose the specific page from above in the
    pagetree. Choose `Click here to create an extension template` from the
    right frame. In the TYPO3 community it is also known as "+ext template".

3.  Add static template

    Choose `Info/Modify` from the upper selectbox and then click
    on `Edit the whole template record` button below the little table. On
    tab `Includes` locate the section `Include static (from extension)`. Use
    the search below `Available items` to search for `daycarecenters`.
    Hopefully just one record is visible below. Choose it, to move that
    record to the left.

4.  Save

    If you want you can give that template a name on tab "General", save and
    close it.

5.  Constants Editor

    Choose `Constant Editor` from the upper selectbox.

6.  `daycarecenters` constants

    Choose `PLUGIN.TX_DAYCARECENTERS` from the category selectbox to show
    just `daycarecenters` related constants.

7.  Configure constants

    Adapt the constants to your needs.

8.  Configure TypoScript

    As constants will only allow modifiying a fixed selection of TypoScript you
    also switch to `Info/Modify` again and click on `Setup`. Here you have the
    possibility to configure all `daycarecenters` related configuration.

View
====

view.templateRootPaths
----------------------

Default: Value from Constants *EXT:daycarecenters/Resources/Private/Templates/*

You can override our Templates with your own SitePackage extension. We prefer
to change this value in TS Constants.

view.partialRootPaths
---------------------

Default: Value from Constants *EXT:daycarecenters/Resources/Private/Partials/*

You can override our Partials with your own SitePackage extension. We prefer
to change this value in TS Constants.

view.layoutsRootPaths
---------------------

Default: Value from Constants *EXT:daycarecenters/Resources/Layouts/Templates/*

You can override our Layouts with your own SitePackage extension. We prefer
to change this value in TS Constants.


Persistence
===========

persistence.storagePid
----------------------

Set this value to a Storage Folder (PID) where you have stored the records.

Example: `plugin.tx_daycarecenters.settings.storagePid = 21,45,3234`


Settings
========

settings.pidOfMaps2Plugin
-------------------------

Default: empty

Example: `plugin.tx_daycarecenters.settings.pidOfMaps2Plugin = 325`

Define the page UID, where you have inserted the `maps2` plugin

settings.pidOfDetailPage
------------------------

Default: empty

Example: `plugin.tx_daycarecenters.settings.pidOfDetailPage = 843`

For design reasons it can make sense to define a detail page UID here
for daycarecenter records.

settings.search.earliestAge
---------------------------

Default: 0

Example: `plugin.tx_daycarecenters.settings.search.earliestAge = 2`

In search form we have a slider for age. Here you can set the left anker
of the slider to another default value.

settings.search.latestAge
-------------------------

Default: 6

Example: `plugin.tx_daycarecenters.settings.search.latestAge = 5`

In search form we have a slider for age. Here you can set the right anker
of the slider to another default value.

settings.search.earliestOpeningTime
-----------------------------------

Default: 7.00

Example: `plugin.tx_daycarecenters.settings.search.earliestOpeningTime = 8.50`

In search form we have a slider for opening times. Here you can set the left
anker of the slider to another default value.

settings.search.latestOpeningTime
---------------------------------

Default: 18.00

Example: `plugin.tx_daycarecenters.settings.search.latestOpeningTime = 16,75`

In search form we have a slider for opening times. Here you can set the right
anker of the slider to another default value.

settings.pageBrowser.itemsPerPage
---------------------------------

Default: 15

Example: `plugin.tx_daycarecenters.settings.pageBrowser.itemsPerPage = 7`

If there are too many records in frontend visible we add a page browser
to navigate throw the records. Here you can define how many records should be
visible for each page.
