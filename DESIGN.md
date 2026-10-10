---
name: "Wizards Terrain"
description: "Sporty club look for the Geneva Wizards: white rounded cards on a soft mauve ground, condensed uppercase burgundy headings, pill buttons."
colors:
  bg: "#F8F4F7"
  bg-alt: "#ECE7ED"
  surface: "#FFFFFF"
  ink: "#211D24"
  muted: "#756F79"
  line: "#E5DCE2"
  accent: "#7D1732"
  accent-strong: "#5F0F25"
  tint: "#FFF8FB"
  card-yellow: "#FFE97D"
  card-blue: "#C0EBF1"
  card-green: "#D8F2C8"
  card-pink: "#FDE4EE"
typography:
  heading:
    fontFamily: "Barlow Condensed, sans-serif"
    fontWeight: "700"
  body:
    fontFamily: "Source Sans 3, sans-serif"
    fontWeight: "400"
spacing:
  sm: "8px"
  md: "16px"
  lg: "36px"
  xl: "52px"
rounded:
  sm: "10px"
  md: "14px"
  pill: "999px"
components:
  buttons: "Pill, solid burgundy with white text; secondary is a burgundy outline pill"
  cards: "White, 14px radius, 1px #E5DCE2 border, soft 0 12px 40px shadow; every page section sits in one"
  header: "Floating white pill bar with logo left and menu right"
dials:
  variance: 0.35
  density: 0.45
  motion: 0.15
---

## Overview

Built from the v2 home page mockup (website/v2). A friendly, energetic club site
for juniors, students and adults. Sections are stacked white cards on a soft
mauve-to-grey gradient ground, aligned to one 1220px container.

## Colors

Burgundy #7D1732 is the single accent: headings, primary buttons and links.
#5F0F25 is its hover state. The pastel card colors come from the existing
juniors page and are only used as backgrounds for practice-place cards.

## Typography

Barlow Condensed (500, 700, 800) for headings, uppercase for H1 and section
titles, tight line-height (0.95). Source Sans 3 (400 to 700) for body text at
1.35 to 1.5 line-height. Both are self-hosted.

## Layout

One shared container, min(1220px, 100% - 28px). Hero is a two-column card:
copy left, photo right bleeding to the card edge. Grids collapse to one column
under 860px.

## Elevation & Depth

One soft shadow level on cards. No stacked shadows.

## Shapes

14px radius on cards, 10px on inner tiles and photos, pill radius on buttons,
chips and the header bar.

## Components

Pill buttons, outline chips, news cards with a small uppercase label, offer
panels with a subtle tinted gradient.

## Do's and Don'ts

### Do's
- Use burgundy for one primary action per section.
- Keep every section inside a white rounded card on the mauve ground.
- Use real club photos from the Media Library.

### Don'ts
- Never use em-dashes in copy.
- Never add a second accent color for buttons or headings.
- Avoid more than one eyebrow label per three sections.
