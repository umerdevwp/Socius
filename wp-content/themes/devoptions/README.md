Socius Custom Underscores Theme - Bootstrap 4
===

Hi. I'm a starter theme based off of Underscores. I'm a theme meant for customizing, so don't use me as a Parent Theme. Instead, try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

Getting Started
---------------
1. After downloading the theme, change the name of the folder and the information in style.css to reflect that of your client
2. Update screenshot.png with the mockup
3. Update gulpfile.js with your localhost directory for BrowserSync capability.
4. Install gulp in your project through command line, via copy/paste from the instructions at the top of gulpfile.js
5. Code something awesome!

Gulp File
---------------

A gulpfile.js is included in this theme, with easy instructions to get started. Assuming that node is globally installed, simply copy and paste the npm install command with the appropriate dependencies in your favorite command line software. Update the localhost directory (Line 50) you wish to use with BrowserSync, Save, and run your gulp command. 

The structure of this theme combines all the files in the scss folder into a minified css/style.css. This leaves the style.css in your root directory clean and is meant specifically for your theme information. In a pinch, you could add styles to this stylesheet if you are not able to run the gulp task. Similarly, all of your theme javascript should be built in js/main.js, which is minified to js/main.min.js and enqueued.


Naming Conventions
---------------

This theme uses "socius-custom" for all naming conventions (functions, comments, etc.) instead of the "_s" from Underscores. It is recommended this stay in place instead of customizing to each client's name so that future code snippets can be swapped in and out and still function appropriately. 

However, you can and SHOULD customize the name of the theme (folder, style.css) to appropriately reflect the client in FTP and the WordPress backend.