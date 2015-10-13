.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator manual
====================

Installation
------------

Install extension using the Extension Manager. Include Cartography TypoScript template in your site's template in the Template module.

Administrator information
-------------------------

typeNum
^^^^^^^
By default the extension will use typeNum 5000 for GeoJSON output. GeoJSON output for a map entry can be accessed by the following URL pattern:
domain.com/index.php?type={typeNum}&uid={uid_of_map}

For a map with uid 1 the URL will be:
domain.com/index.php?type=5000&uid=1

JavaScript included automatically
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
The extension automatically includes the required JavaScript where the map plugin is inserted. Eg. if Google Maps is used as map provider for a plugin inserted on a page, the required Google Maps JavaScript will only be included on the page where the plugin is inserted.