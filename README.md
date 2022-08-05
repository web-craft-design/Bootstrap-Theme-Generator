# Bootstrap-Theme-Generator
Bootstrap Theme Generator enables you to choose which components of Bootstrap you want to load. It also gives you the possibility to change the colors (and all generated shades) of your current Bootstrap Theme. All you need to do is using the predefined color-pickers. That gives you the power to change Bootstraps appearance on any live-site without uploading/changing/touching any files!

# Prerequisites
- You'll need the [Metabox-Plugin](https://metabox.io/) for the Bootstrap-Theme-Generator to run!
    - There are currently no checks performed if that plugin is installed. So make sure that you install it beforehand
    - I'm probably gonna add MetaBox through their Composer Package in the future, but that isn't available inside of the plugin yet
- Currently untested plugin, although I performed some Tests if everything works properly with my environment unfortunately that doesn't mean that everything will work on your side, so please feel free to report any bugs (wolfgang@web-craft.design or here on github)

- When using the plugin with themes generated in PG, add Do not Enqueue action on bootstrap CSS and JS resources, because the plugin enqueues them for you.


# Steps to take

## After installation
Head over to the menu entry Appearance, there you can see a new setting which is called "BS-Settings".
To make the plugin compile Bootstrap in your preferred setup you need to check the corresponding boxes / toggles and hit save. 


# What does this plugin do?

## Conditional Compiling of Bootstrap Components
You don't need all BS-Components? No Problem, you can tick on/off any components you (don't) need and the CSS file will regenerate with the new parameters. Leads to a smaller CSS-File in overall.

## Gutenberg - Bootstrap Color Sync!!!
Syncs the Gutenberg Color Palette with the predefined Bootstrap Colors. They stay in sync (also on Frontend) even if you update the colors!

## Enqueues Bootstrap
This Plugin automatically enqueues bootstrap (5.2) on the frontend (after the proper setup).
There is also an option to load bootstrap additionally inside of Gutenberg. You can also choose where you want to load the bootstrap JS file!


## Compiles SCSS-File
All the SCSS Files of Bootstrap get compiled into one usable CSS file. The CSS File gets enqueued on the frontend automatically and optionally also in Gutenberg!

