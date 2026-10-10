# Wizards WordPress theme

Classic WordPress theme (PHP templates + `theme.json`) for [wizards.ch](https://wizards.ch/),
Geneva's Flying Disk Wizards. Built from the v2 home page mockup; design tokens are in
[`DESIGN.md`](DESIGN.md).

## Contents

- `theme.json`: colors, fonts (self-hosted Barlow Condensed and Source Sans 3), block styles.
- `header.php`, `footer.php`: floating pill header with the `primary` menu, footer with the `footer` menu.
- `page.php`, `single.php`, `index.php`: pages and posts as white cards; news and archives as a card grid.
- `page-templates/template-landing.php` ("Accueil"): no page title, each top-level block becomes a card;
  the first section is the hero. Used by the home page (page 3828).
- `page-templates/template-fullwidth.php` ("Pleine largeur"): same path as Hestia's template, kept for compatibility.
- `patterns/`: v2 sections (hero, values, offers, news, call to action) under the "Wizards" category.

## Deploying

The theme is deployed by zipping this folder as `wizards/` and extracting it to
`wp-content/themes/wizards` on the server. Bump `Version` in `style.css` and `WIZARDS_VERSION`
in `functions.php` on each release so browsers reload the CSS.

## Notes

- Menu locations use Hestia's names (`primary`, `footer`) so menus stay assigned on a theme switch.
- The logo is `assets/img/wizards-logo.png`, not the site-wide `site_logo` option.
- While Hestia is active, saving page 3828 in the editor resets its template to "default".

Fonts are licensed under the SIL Open Font License (see `assets/fonts/OFL-*.txt`).
