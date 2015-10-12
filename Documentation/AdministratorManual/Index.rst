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

Install extension using the Extension Manager. The extension will automatically add the required TypoScript.

Extenstion settings
-------------------

typeNum
^^^^^^^
By default the extension will use typeNum 5000 for GeoJSON output. GeoJSON output for a map entry can be accessed by the following URL pattern:
domain.com/index.php?type={typeNum}&uid={uid_of_map}

If you don't change the typeNum it will be the following to get GeoJSON for the map with uid 1:
domain.com/index.php?type=5000&uid=1

Include JavaScript automatically
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
The extension automatically includes the required JavaScript where the map plugin is inserted. If eg. Google Maps is used as map provider for a plugin inserted on a page, the required Google Maps JavaScript will only be included on the page where the plugin is inserted. If JavaScript shouldn't be included automatically you can disabled it in the extension settings.

TSConfig
-------------------

Altitude property for coordinates is disabled by default. If you need to enable altitude set the following setting on your root page in "Page TSConfig". You can also set it on a sub page if you only want to enable altitude for a sub section of your page tree.

.. figure:: ../Images/7.png
	:width: 879px
	:alt: Google Map example