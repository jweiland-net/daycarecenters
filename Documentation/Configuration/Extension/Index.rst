..  include:: /Includes.rst.txt


..  _extensionSettings:

==================
Extension Settings
==================

..  tip::

    You need to configure the extension maps2 first! Check out
    the `maps2 documentation <https://docs.typo3.org/p/jweiland/maps2/master/en-us/Configuration/Index.html>`_.

Open the Extension Configuration inside the Configuration module and set a
default page (or storage folder) for all poi collection records (created using
a maps2 hook) and a default maps2 category. This category will be used for all
maps2 record that has been generated using a maps2 hook while saving a kita
record.


Tab: Basic
==========

poiCollectionPid
----------------

Default: 0

Only valid, if you have installed EXT:maps2, too.

While creating location records we catch the address and automatically create
a maps2 record for you. Define a storage PID where we should store these
records.

defaultMaps2Category
--------------------

Default: 0

When creating new location records a `maps2` POI record will automatically
be created. Here you can define a category UID which should be
automatically added to the POI record.
