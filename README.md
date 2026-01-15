# Slim Slider

A simple, lightweight WordPress slider plugin.

> **Note:** This is the development version. For production use, download from [WordPress.org](https://wordpress.org/plugins/slim-slider/).

## Features

- Lightweight and fast
- Responsive design
- Simple shortcode integration
- Customizable transitions and timing
- Optional call-to-action buttons
- SEO-friendly

## Installation

**WordPress Admin:** Plugins → Add New → Search "Slim Slider" → Install → Activate

**Manual Upload:** Plugins → Add New → Upload Plugin → Choose zip file → Install

## Quick Start

```
[slim_slider]
```

This displays all published slides. To show specific slides:

```
[slim_slider slides="135,654,168,201"]
```

## Creating Slides

Go to **Slim Slides → Add New** in WordPress admin.

### Slide Meta Fields

| Field | Description |
| ----- | ----------- |
| ID | Auto-generated slide ID (read-only) |
| Heading | Slide heading text |
| Alt Text | Image alt attribute for accessibility/SEO |
| Description | Slide description |
| Url | Link destination (http/https only) |
| Button Text | Call-to-action button label (requires Url) |
| Button Class | Custom CSS class for button styling |
| Button Position | Button alignment: `left`, `center`, `right` |
| Onclick | JavaScript onclick event handler |

### Button Feature

Add a call-to-action button instead of making the entire slide clickable.

> **Note:** Button only appears when both **Url** and **Button Text** are set.

| Position Value | Result |
| -------------- | ------ |
| `left` | Aligned left, 20px from edge |
| `center` | Centered (default) |
| `right` | Aligned right, 20px from edge |

#### Button Styling

```css
/* Custom colors */
.slimslider-btn {
    background-color: #e74c3c;
}

.slimslider-btn:hover {
    background-color: #c0392b;
}

/* Adjust vertical position */
.slimslider-btn-wrap {
    bottom: 40px;
}
```

## Shortcode Options

```
[slim_slider height="740" fill="stretch" speed="3000"]
```

| Option | Default | Description |
| ------ | ------- | ----------- |
| `id` | - | Slider ID |
| `slides` | - | Comma-separated slide IDs |
| `height` | `740` | Slide height in pixels |
| `width` | `1200` | Slide width in pixels |
| `nav` | `ab` | Navigation: `a` (arrows), `b` (bullets), `ab` (both) |
| `fill` | `stretch` | Image fill mode (see below) |
| `speed` | `3000` | Time between slides (ms) |
| `duration` | `300` | Transition speed (ms) |
| `swipe` | `800` | Swipe animation duration (ms) |
| `opacity` | `2` | Transition opacity |
| `get` | `false` | Use `true` when called via `do_shortcode()` |

### Fill Modes

| Value | Description |
| ----- | ----------- |
| `stretch` | Stretch image to fit slide |
| `contain` | Fit entire image, maintain aspect ratio |
| `cover` | Cover entire slide, maintain aspect ratio |
| `actual` | Use actual image size |

## Limitations

- One slider per page/post

## Credits

- [jssor slider](https://github.com/jssor/slider)

## License

GPL-2.0 — [License details](https://github.com/devuri/slim-slider/blob/master/LICENSE)
