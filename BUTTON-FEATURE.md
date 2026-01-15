# Slide Button Feature

**Version:** 0.8.7

Add a call-to-action button overlay on your slides.

## Usage

Add these fields to your slide meta:

```php
$meta['url']             = 'https://...'; // Required - button won't show without a URL
$meta['button_text']     = 'Learn More';  // Required - enables button
$meta['button_position'] = 'center';      // Optional - left, center, right (default: center)
$meta['button_class']    = 'my-btn';      // Optional - custom CSS class (default: slimslider-btn)
```

> **Important:** The button only appears when BOTH `url` AND `button_text` are set. If there's no URL, the button won't display.

## Position Options

| Value | Result |
|-------|--------|
| `left` | Button aligned left, 20px from edge |
| `center` | Button centered (default) |
| `right` | Button aligned right, 20px from edge |

## Requirements

- `url` must be set (button needs somewhere to link)
- `button_text` must not be empty

## Backward Compatibility

Existing slides without `button_text` work exactly as before (full image is clickable).

## Customizing

### Adjust Vertical Position

```css
#slimslider_1 .slimslider-btn-wrap {
    bottom: 40px;
}
```

### Change Colors

```css
.slimslider-btn {
    background-color: #e74c3c;
}

.slimslider-btn:hover {
    background-color: #c0392b;
}
```

### Larger Button

```css
.slimslider-btn {
    padding: 16px 36px;
    font-size: 16px;
}
```

### Outline Style

```css
.slimslider-btn {
    background-color: transparent;
    border: 2px solid #ffffff;
}

.slimslider-btn:hover {
    background-color: #ffffff;
    color: #333333;
}
```
