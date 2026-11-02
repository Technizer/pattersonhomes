=== Growth Factory Theme ===
Version: 1.0.0
Author: Syed Zeeshan Ali
Theme URI: https://www.growthfactory.com.au
Author URI: https://www.growthfactory.com.au
Requires WordPress: 6.5 or later
Requires PHP: 7.4 or later
License: GPLv2 or later

A minimal standalone Elementor foundation, following the same blank-canvas
approach as Hello Elementor. Hello Elementor does not need to be installed.
This is an independently written theme, not a complete fork of Hello Elementor.
Hello-specific settings, services, add-ons and promotional screens are not included.

INSTALLATION
1. Open WordPress > Appearance > Themes > Add New > Upload Theme.
2. Upload growth-factory-theme-1.0.0.zip and activate Growth Factory Theme.
3. Use the dashboard prompt to install Elementor, then activate the plugin.
   If Elementor is installed but inactive, the prompt offers activation instead.
4. Create a page and choose Edit with Elementor.
5. Set the page layout in Elementor Page Settings:
   - Elementor Canvas: no theme header/footer, completely blank page.
   - Elementor Full Width: edge-to-edge content with theme/Theme Builder header/footer.
   - Default: standard theme wrapper; Elementor content is not width constrained.
6. Use Elementor Site Settings to define your fonts, colors and content widths.
7. Set the homepage under Settings > Reading when ready.

HEADER AND FOOTER
With Elementor Pro, publish header/footer templates in Theme Builder and set
their display conditions. Single and archive template locations are also
registered. Theme Builder requires Elementor Pro or a compatible separate
extension; the free Elementor plugin can build the page content itself.

Without Theme Builder, a simple logo/site title, menus and copyright are shown.
Configure logo under Appearance > Customize > Site Identity and menus under
Appearance > Menus. Set your site icon in WordPress Site Identity settings.
Toggle the basic header/footer under Customize > Growth Factory Layout.
These switches do not disable assigned Theme Builder templates.

NOTES
- No parent theme, mandatory paid plugin, demo import or external font requests.
- Elementor is recommended and installed separately, never bundled or forced.
- Works with standard WordPress pages/posts even when Elementor is inactive.
- Native comments, blog/search/archive/404 fallback templates are included.
- RTL-aware layout and translatable UI strings use growth-factory-theme.
- The theme uses one small stylesheet and no custom frontend JavaScript.
- A conditional WordPress comment-reply script supports threaded comments.
- Does not implement Hello's proprietary onboarding or Hello-specific APIs.
- Keep custom PHP changes in a child theme for future update safety.

DEVELOPER FILTERS
growth_factory_theme_content_width: default 1140.
growth_factory_theme_enqueue_style: return false to disable the base stylesheet.
growth_factory_theme_show_title: override the page-title visibility decision.

CHANGELOG
1.0.0: Initial release.
