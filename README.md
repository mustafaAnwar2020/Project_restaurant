<p class="has-line-data" data-line-start="0" data-line-end="2">Food Order Web Site<br>
The template used from the course (&quot;<a href="https://www.youtube.com/watch?v=ZBgTzx46B8s&amp;list=PLBLPjjQlnVXXBheMQrkv3UROskC0K1ctW">https://www.youtube.com/watch?v=ZBgTzx46B8s&amp;list=PLBLPjjQlnVXXBheMQrkv3UROskC0K1ctW</a>&quot;)</p>
<h2 class="code-line" data-line-start=2 data-line-end=3 ><a id="Technologies_Used_2"></a>Technologies Used</h2>
<ol>
<li class="has-line-data" data-line-start="3" data-line-end="4">HTML5</li>
<li class="has-line-data" data-line-start="4" data-line-end="5">CSS3</li>
<li class="has-line-data" data-line-start="5" data-line-end="6">php</li>
<li class="has-line-data" data-line-start="6" data-line-end="7">mysql</li>
</ol>
### Installation

1. Download as as Zip or Clone this project
2. Move this project to Root Directory
```
Local Disc C: -> xampp -> htdocs -> 'this project'
```
*Local Disk C is the location where xampp was installed*

3. Open XAMPP Control Panel and Start 'Apache' and 'MySQL'

4. Import Database

a. Open 'phpmyadmin' in your browser
b. Create a Database
c. Import the SQL file provided with this project

5. Make Changes to settings

Go to 'config' folder and Open 'db.php' file. Then make changes on following constants
```php
<?php 
session_start();
$server= "localhost";
$username= "root";
$password= "";
$dbname= "food_order";


$conn = mysqli_connect($server,$username,$password,$dbname);

?>
```

6. Now, Open the project in your browser. It should run perfectly.
## Follow Me on
1. LinkedIn - [mustafa anwar](https://www.linkedin.com/in/mustafa-anwar-63b79b199/")
3. Facebook - [mustafa anwar](https://www.facebook.com/mustafa.anwar.98096721")
