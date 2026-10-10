<p align="center">
  <img src="assets/img/wizards-logo.png" alt="Wizards Ultimate Frisbee Genève logo" width="180">
</p>

# Wizards WordPress theme

[![REUSE compliance](https://github.com/tnglch/wp-wizards/actions/workflows/reuse.yml/badge.svg)](https://github.com/tnglch/wp-wizards/actions/workflows/reuse.yml)

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
- Page 3828 is the static front page and uses the "Accueil" template.
- Never name a CSS class after a WordPress body class (`page`, `home`, `single`...): it would also style `<body>`.

## License

This repository is [REUSE](https://reuse.software/) compliant; every file's copyright and
license is declared in its header or in [`REUSE.toml`](REUSE.toml). Check with `reuse lint`;
the [REUSE workflow](.github/workflows/reuse.yml) runs it on every push and pull request.

- Code (PHP, CSS, JavaScript, `theme.json`): GPL-3.0-or-later, © 2026 Giacomo Tenaglia.
- Documentation, logo and images: CC-BY-SA-4.0, © 2026 Giacomo Tenaglia.
- Fonts (Barlow Condensed, Source Sans 3): OFL-1.1, © their respective authors.

License texts are in [`LICENSES/`](LICENSES/).
