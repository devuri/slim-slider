## Slim Slider
The Slim Slider plugin is a simple WordPress slider plugin that allows you to add a slider in posts and pages using a simple Shortcode.

```bash
[slim_slider]
```

## Installation

***Installation via  WordPress admin.***  
WordPress admin Installation is quick, and easy.
The Plugin can be installed via the built-in plugin installer.


***Upload via WordPress Admin.***  
You can add a new plugin by uploading a zip of the plugin from your computer.


***Manual Plugin Installation.***  
In some cases, you may need to manually upload a plugin directly using an SFTP client.

## Usage

The Slim Slider shortcode can be used as is like this: `[slim_slider]`, this will simply
create the slideshow with all defined slides that are published.

The slider shortcode can also be used with the slide IDs, Like this: `[slim_slider slides="135,654,168,201"]`,
In this case only the slide IDs that have been included will be included in the slideshow.

```shell
[slim_slider slides="135,654,168,201"]
```

### Slider Options

Slim Slider includes several options that can be specified in the shortcode:

```shell
[slim_slider height="740" fill="stretch" speed="3000"]
```
| Options | Default Values | Description             |
| ------  | -----------    | ----------------------- |
id        | 904562         | The slider ID.
height    | 740            | Height of every slide in pixels
nav       | ab             | Navigation type. b: bullet navigator or a: arrow navigator  
swipe     | 800            | Swipe animation duration (in milliseconds).
fill      | stretch        | Type of image fill for the slide.
duration  | 300            | Transition speed (in milliseconds).
opacity   | 2              | Transition Opacity.
speed     | 3000           | Slider speed (in milliseconds).
slides    | -              | List of slide IDs


> Fill type options

| Fill   |  Description |
| ------ | ------------------------------------------- |
stretch  | Stretch the image to fit slide.             |
contain  | Keep aspect ratio and put all inside slide. |
cover    | Keep aspect ratio and cover whole slide.    |
actual   | Keep the actual image size.                 |
contain  | Large image and actual size for small image.|

***Important***
> Slim Slider only supports one slide per page or post.

Thats it, you're done!


**note**: Slim Slider only supports one slider per page or post.

#### Credits
- Slim Slider uses the [jssor slider](https://github.com/jssor/slider/blob/master/js/jssor.slider.min.js)


## License
WP Slim Slider is licensed under The [GPL-2.0 License](https://github.com/devuri/slim-slider/blob/master/LICENSE).
#### GPL-2.0 License
Slim Slider WordPress Plugin, Copyright 2021 Uriel Wilson.
Slim Slider is distributed under the terms of the GNU GPL.
http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html


