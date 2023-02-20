> **Note:** This is the development version and contains features that may be in various stages of development. If you want to use this on a live website download here: [Slim Slider](https://wordpress.org/plugins/slim-slider/).

## Slim Slider, WordPress Slider Plugin
The Slim Slider plugin is a simple WordPress slider plugin that allows you to add a slider in posts and pages using a simple Shortcode.

```bash
[slim_slider]
```

## Description
Slim Slider is a simple, lightweight WordPress plugin designed to make creating and adding sliders to your website a breeze. With its intuitive interface and customizable options, Slim Slider is perfect for anyone looking to enhance their website with dynamic, engaging content.

One of the most significant advantages of Slim Slider is its ease of use. Unlike other slider plugins that can be complicated and difficult to navigate, Slim Slider offers a straightforward, intuitive interface that makes creating and adding sliders a breeze. Whether you're a seasoned developer or a beginner, you'll appreciate how easy it is to use this plugin to create beautiful sliders for your website.

Slim Slider also offers a wide range of customization options, allowing you to fine-tune every aspect of your sliders to meet your unique needs. You can choose from a variety of transition effects, control the speed and duration of your slides, and even adjust the size and placement of your slider on your website. This level of customization ensures that your sliders will look and feel exactly the way you want them to.

Another significant advantage of Slim Slider is its lightweight design. Unlike other slider plugins that can slow down your website's performance and cause it to load slowly, Slim Slider is designed to be as lightweight as possible. This means that it won't have a significant impact on your website's speed or performance, even if you're using it to create multiple sliders.

Slim Slider is also highly responsive, ensuring that your sliders will look great on all devices and screen sizes. Whether your visitors are accessing your website from a desktop computer, a tablet, or a smartphone, they'll be able to enjoy your sliders without any issues.

Another key advantage of Slim Slider is its compatibility with a wide range of WordPress themes and plugins. Whether you're using a free or premium theme, you'll find that Slim Slider works seamlessly with your website's design and layout. Plus, it's fully compatible with most popular plugins.

Another advantage of Slim Slider is its SEO-friendly design. Unlike some other slider plugins that can negatively impact your website's search engine rankings, Slim Slider is designed to be SEO-friendly. This means that it won't interfere with your website's SEO efforts, ensuring that your website continues to rank well in search engine results pages.

Overall, Slim Slider is an excellent WordPress plugin that offers a wide range of benefits and advantages. Whether you're looking to enhance your website with engaging content, create product sliders that showcase your products, or simply add a bit of visual flair to your website, Slim Slider is an excellent choice. With its intuitive interface, customizable options, and lightweight design, it's a great plugin for developers and beginners alike.

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
get       | false          | Get the slide when in do_shortcode() uses: 'true' or 'yes'


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
