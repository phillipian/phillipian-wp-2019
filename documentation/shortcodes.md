# Guide to Proprietary Template Shortcodes

This template uses a couple of proprietary shortcodes built into `functions.php`. Before the website has relied on many plugins for core functionality such as media credit; these proprietary shortcodes make it easier to implement features how we want while still providing support for the thousands of articles that have already been published using old shortcodes.

WIP - full documentation to be written

## imggallery

Instructions to use -- just throw normal caption/media-credit/image inside a big `[imggallery]` wrapper. Example:

```
[imggallery]

[caption][media-credit name='T. WEI/The Phillipian']<img src='https://phillipian.net/wp-content/uploads/2019/09/Compressed_eelleswig.robotics.001-copy-1.jpg' />[/media-credit] The team of 19 students hopes to make its way to the VEX Robotics Regional Championships in March 2020.[/caption]

[caption width="1000" align="alignnone"][media-credit name='S. ZHANG/The Phillipian']<img src="https://www.vexrobotics.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/2/7/276-7040.jpg" />[/media-credit]Testing[/caption]

[caption width="1000" align="alignnone"][media-credit name='S. ZHANG/The Phillipian']<img src="https://cdn-images-1.medium.com/max/2600/1*5mPlh2oKljuXjvE4gKTuVw.jpeg" />[/media-credit]2 Train Robotics[/caption]

[/imggallery]
```

## scorebox

## caption (`caption_override_sc()`)

## media-credit

## ytembed