..  include:: /Includes.rst.txt


..  _for-editors:

===========
For Editors
===========

Managing Daycare Data in TYPO3
==============================

This section is intended for TYPO3 backend editors. It explains the steps
needed to populate and maintain the daycare center (Kita) records so they
appear correctly in the frontend.

Step 1: Add District Records
============================

Before adding any daycare centers, you must create at least one **district**. Districts help organize and categorize daycare centers geographically, making it easier for users to filter results on the website.

..  figure:: ../Images/districtTca.png
    :class: with-shadow
    :alt: Add a district
    :width: 500px

Step 2: Create Responsible Bodies
=================================

Each Kita should be assigned to a **responsible body** — typically an
organization like a city administration, a church, or a private provider. These
records represent who operates or oversees the daycare.

..  figure:: ../Images/responsibleTca.png
    :class: with-shadow
    :alt: Add a responsible body
    :width: 500px

Step 3: Add Kita Records
=========================

Once you’ve set up at least one district and one responsible body, you can begin
adding actual **Kita** records. Be sure to provide all relevant information,
such as name, address, age range, opening hours, and whether meals are
provided. Don’t forget to link each Kita to its associated district and
responsible body.

..  tip::

    The newly created Kita record will appear in the frontend listing as soon
    as it's saved — unless the "Hide" checkbox is selected.
