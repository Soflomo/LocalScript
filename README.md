Soflomo\LocalScript
===

Soflomo\LocalScript is a small utility module which enables users to inject javascripts in their own developement
build. Examples are the Grunt browser sync plugins. You would not commit those changes into the source repository and thus you need to exclude it every time you commit the layout files. Not anymore!

Installation
---
Require the package `soflomo/local-script` via composer. Then enable the module in your application configuration with the name "Soflomo\LocalScript".

Usage
---
Copy the file `soflomo_localscript.local.php` from `vendor/soflomo/local-script/config` to your own `config/autoload` directory. Load all files you need to load in the `files` array.

Example
---

An example configuration can look like:

```
return array(
    'soflomo_local_script' => array(
        /**
         * A listing of all the files to be injected
         *
         * Use the full source value to be injected, the array
         * can contain zero, one or multiple items.
         */
        'files' => array(
            'http://192.168.1.152:3000/socket.io/socket.io.js',
            'http://192.168.1.152:3001/browser-sync-client.min.js'
        ),
    ),
);
```