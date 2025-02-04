=== MapJam Embedded Maps ===
Contributors: MapJam
Tags: maps, mapping, latitude, longitude, easy mapping, easy map, mapjam, map plugin, map marker, google maps, Esri maps, bing maps, HERE maps, map embed, embed map
Requires at least: 3.0.1
Tested up to: 4.3
Stable tag: 1.0
License: MIT
License URI: http://mapjam.mit-license.org/

MapJam is a personalized mapping platform giving individuals and organizations the easiest way to personalize and share maps!  

== Description ==

[MapJam](http://mapjam.com) is the easiest way to add fully customized and branded maps to any WordPress site.  It gives individual users and businesses the power to create branded, personalized maps helping to remove unnecessary clutter and highlight map content while providing context.

MapJam is free to use and includes:

- Choice of map styles
- Maps can be shared 9 different ways (SMS, MMS, Email, Facebook, Twitter, Google+, LinkedIn, Pinterest, QR code)
- Fully responsive HTML 5
- Live data API
- Extensive data layers including points of interest for millions of US locations
- Unique content card feature to provide context
- Upload various types of media including images and video
- Fully customizable map markers and notes including extensive icon library
- Customizable URL


Interactive Map:

- Set Dimensions (px)
- Set Zoom Level
- Center Latitude/Longitude
- Enable and Disable Cluster

Static Map:

- Set Dimensions (px)
- Set Zoom Level
- Center Latitude/Longitude
- Format in PNG or JPG

== Installation ==

To install the plugin, download and unzip the ZIP file into your plugins directory. It is also possible to upload the zip file using the WordPress upload function. Then simply activate the plugin to start using it.

== Frequently Asked Questions ==

= Where can I create my maps? =

All maps can be created on [MapJam](http://mapjam.com) where a user simply creates a free account and can access their maps database.

= Where can I learn how to make a map? =

Head to [MapJam Support](http://support.mapjam.com) for video and text solutions to map making.

= How does the shortcode work? =

The shortcode has only the id attribute set, or the custom URL that you have reserved for your map.

Ex. `[mapjam id="MapURL"]`

= How can I change the default options for my map shortcode? =

These settings can be changed in the edit section of your map on [MapJam](http://mapjam.com)

= How can I set the full shortcode without having to use the map default options? =

To bypass the default map options, you will have to include a complete attribute set for both interactive and static maps. This includes: 

- Zoom Level
- Latitude and Longitude
- Enable/Disable Cluster (For interactive maps)
- Set Dimensions (px)

Ex. `[mapjam id="ggpark" zoom="10" lat="37.753344" long="-122.397995" cluster="8" width="500" height="300"]`

== Screenshots ==

1. This is an example of a full short code which is using the default map settings set by the user on [MapJam](http://mapjam.com)

2. This is an example of a complete attribute set for both static and interactive maps.

== Changelog ==

= 1.0 =
* Initial Release