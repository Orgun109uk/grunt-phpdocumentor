# grunt-phpdocumentor

> Runs the PHPDocumentor documentation generator tool.

[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

This build include phpDocumentor version 2.2.0, other versions can be specified by the `phar` option 

This plugin runs the command : ```phpdoc -d dir -t target```.

## Getting Started
This plugin requires Grunt `~0.4.1`

If you haven't used [Grunt](http://gruntjs.com/) before, be sure to check out the [Getting Started](http://gruntjs.com/getting-started) guide, as it explains how to create a [Gruntfile](http://gruntjs.com/sample-gruntfile) as well as install and use Grunt plugins. Once you're familiar with that process, you may install this plugin with this command:

```shell
npm install grunt-phpdocumentor --save-dev
```

One the plugin has been installed, it may be enabled inside your Gruntfile with this line of JavaScript:

```js
grunt.loadNpmTasks('grunt-phpdocumentor');
```

## The "phpdocumentor" task

### Overview
In your project's Gruntfile, add a section named `phpdocumentor` to the data object passed into `grunt.initConfig()`.

```js
grunt.initConfig({
    phpdocumentor: {
        dist: {
            options: {
	            directory : './',
                target : 'docs'
            }
        }
    }
})
```

You can also use many Grunt targets if you have several phpDocumentor documentations to generate. 

```js
grunt.initConfig({
    phpdocumentor: {

        // Place here Task level options (i.e common to all your phpDocumentor targets)
        options : {
            command : 'run',
        },

        // Grunt Target used to generate a first documentation
        first_api_documentation : {
            options: {
                directory : 'src/first_api',
                target : 'docs/first_api_documentation'
            }
        },

        // Grunt target used to generate a second documentation
        second_api_documentation : {
            options : {
                directory : 'src/second_api',
                target : 'docs/second_api_documentation'
            }
        },
        
        // Sample target used to display the phpDocumentor help
        display_help : {
            options : {
                command : 'help'
            }
        }

    }
})
```

### Options

#### options.bin( optional )
Type: `String`
Default value: `phpdoc`

Path to the phpdoc executable, by default it will use the one that come with task. It is located on the bin folder.

**WARNING** : We kept this option documented here only for versions `0.1.0` and `0.3.0` of the plugin. This option has 
been removed in version `0.4.0` because it was not portable across operating systems. 

#### options.command ( optional )
Type : `String`
Default value: `run`

The name of the phpDocumentor command to execute, the following phpDocumentor commands are available in phpDocumentor : 

 * `help`              : Displays help for a command
 * `list`              : Lists commands
 * `parse`             : Creates a structure file from your source code
 * `run`               : Parses and transforms the given files to a specified location
 * `transform`         : Converts the PHPDocumentor structure file to documentation
 * `project:parse`     : Creates a structure file from your source code
 * `project:run`       : Parses and transforms the given files to a specified location
 * `project:transform` : Converts the PHPDocumentor structure file to documentation
 * `template:list`     : Displays a listing of all available templates in phpDocumentor

**WARNING** : All the phpDocumentor commands can be called using the plugin, but for now you can only use the 
phpDocumentor `[-t|--target[="..."]]` and `[-d|--directory[="..."]]` command line options which are not sufficient to 
make the `transform` and `project:transform` correctly work.

#### options.directory( optional )
Type: `String`
Default value: `./`

Comma-separated list of directories to (recursively) parse (multiple values allowed). It will default to the folder 
where Gruntfile is located.

#### options.phar( optional )
Type: `String`
Default value: undefined

This option is not integrated in phpDocumentor tool and is specific to the plugin. The purpose of this option is to allow you to provide a path to a custom phpDocumentor PHAR file or to indicate to the plugin to use the `phpdoc` command available in your system.

If this option is not specified then the plugin will automatically use the integrated phpDocumentor PHAR file.

If you want to provide a path to a custom PHAR file you can provide it as a string : 

```js
grunt.initConfig({
  phpdocumentor: {
    dist: {
        phar : 'documentation_tools/phpDocumentor.phar'
    }             
  },
})
```

If you want to use the `phpdoc` command which is available on you system instead then you can the `null` value to the `phar` option :

```js
grunt.initConfig({
  phpdocumentor: {
    dist: {
        phar : null
    }             
  },
})
```

#### options.target( optional )
Type: `String`
Default value: `docs`

Path where to store the generated output. It will default to a folder named 'docs' 

### Usage Examples

```grunt phpdocumentor```

## Release History

### 0.4.1
 * Fix a documentation problem, the `options` object was not used in the configuration sample.
 * Document the use of the `command` option
 * Describe how to use the plugin with Task Level options
 * Describe how to use the plugin with multiple phpdocumentor targets
 * Implement unit tests to run all the phpDocumentor commands (except the `transform` and `project:transform` commands

### 0.4.0
 
 * **BREAKING CHANGE, WARNING**: The `bin` option has been deleted and replaced by the `phar` option, if `null` is passed to the `phar` option then the plugin uses the `phpdoc` command available, if the `phar` option is `undefined` then the plugin uses the packaged phpDocumentor PHAR, if the `phar` option is not `null` and not `undefined` then it express a path to a phpDocumentor PHAR file on the file system
 * Add more robust unit tests
 * The unit tests are executed on the `develop` branch with the GoMoob continuous integration server each time the source code is updated on this branch
 * Now the plugin inspects the `[Exception]` string in the phpDocumentor output to know if a phpDocumentor exception has been encountered and make the Grunt task fail
 * Add the build with grunt badge to the README.MD file
 * Global documentation improvements
 * Add lot of comments in the plugin code
 * The `bin\phpdoc` bash script has been deleted because bash is not installed on all UNIX platforms and because using a bash script is not portable across platforms
 * Upgrade the phpDocumentor PHAR to version 2.2.0 of phpDocumentor
 * Remove the use of the loadash `_.extend()` function and replace it with the standard Grunt `task.options()` function 
 * Now the plugin checks if PHP CLI is available at command line
 * Global refactorings
 * Begin to support the execution of the `help`, `parse`, `project:parse`, `transform`, `project:transform`, `list`, 
   `template:list` commands

### 0.3.0

 * Including ```phpDocumentor version 2.0.0a12``` on the bin, giving default to all options

### 0.1.0

 * First release
