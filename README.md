## Slim Slider, WordPress Slider Plugin
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

### Create Slides
To get started you will need to create the slides for the slider.

This can be done in WordPress admin menu select `Add New` under `Slim Slides` Menu.

![slim-slide-menu](https://user-images.githubusercontent.com/4777400/115136071-d9c62980-9fe2-11eb-95a3-c46d1db594ee.png)

Here you can add the new slide with the following information:

* Slide Title, the title of your slide.
* Slide ID, the ID for the slide can be used in the shortcode see options section.
* Slide Heading, can be the same as slide title.
* Alt Text, used to define image alt attribute.
* Description, the slide description.
* Slide Url, use to link the current slide to any valid http or https url ( other protocols are not supported).

![slide-information](https://user-images.githubusercontent.com/4777400/115136375-05e2aa00-9fe5-11eb-8f11-31bec07b6a49.png)


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


Thats it, you're done!

***Important***
> Slim Slider only supports one slide per page or post.


#### Credits
- Slim Slider uses the [jssor slider](https://github.com/jssor/slider/blob/master/js/jssor.slider.min.js)


## License
WP Slim Slider is licensed under The [GPL-2.0 License](https://github.com/devuri/slim-slider/blob/master/LICENSE).
#### GPL-2.0 License
Slim Slider WordPress Plugin, Copyright 2021 Uriel Wilson.
Slim Slider is distributed under the terms of the GNU GPL.
http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html

