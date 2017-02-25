# composer-tools

As of now, its still work in progress and has the following tools:
 - Display a table of dependencies
 - Generate a html file with a table of dependencies
 
## Example Usage

Download a release from https://github.com/vamsiikrishna/composer-tools/releases

### To display a table in the terminal

``` php composer-tools.phar display composer.lock ```

### To save a report 

``` php composer-tools.phar generate composer.lock /home/vamsi/Desktop/composer-report.html ```