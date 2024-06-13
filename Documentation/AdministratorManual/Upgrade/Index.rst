..  include:: /Includes.rst.txt


..  _upgrade:

=======
Upgrade
=======

If you upgrade/update EXT:daycarecenters to a newer version, please read this
section carefully!

Upgrade to Version 6.0.0
========================

Version 6.0.0 has some changes in column name renaming. So please be careful
while comparing database with TCA definition after upgrading.

..  important::

    Please do **not** delete or rename columns in InstallTool after installing
    the new version! Only add the new fields, then go to the Upgrade module,
    select daycarecenters and start the upgrade script. Delete the old cols in
    InstallTool only, if the upgrade script symbol will not appear in
    Upgrade backend module anymore.

Database Column Renaming Notice
-------------------------------

In this new version, we have renamed the database column `logo` to `logos` in the
tables `tx_daycarecenters_domain_model_kita` and `tx_daycarecenters_domain_model_holder`
for better management. As a result, you will need to adjust your extended Fluid
templates and partials accordingly.

Update to Version 5.0.0
=======================

This version is no longer compatible with TYPO3 9. We have completely removed
jQuery and jQuery UI, replacing the jQuery UI slider with a Vanilla JS solution.

There are two update wizards available in this extension.

*   HolderLogoUpdateWizard
*   SlugUpdateWizard
