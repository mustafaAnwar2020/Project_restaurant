<p class="has-line-data" data-line-start="0" data-line-end="2">Food Order Web Site<br>
The template used from the course (&quot;<a href="https://www.youtube.com/watch?v=ZBgTzx46B8s&amp;list=PLBLPjjQlnVXXBheMQrkv3UROskC0K1ctW">https://www.youtube.com/watch?v=ZBgTzx46B8s&amp;list=PLBLPjjQlnVXXBheMQrkv3UROskC0K1ctW</a>&quot;)</p>
<h2 class="code-line" data-line-start=2 data-line-end=3 ><a id="Technologies_Used_2"></a>Technologies Used</h2>
<ol>
<li class="has-line-data" data-line-start="3" data-line-end="4">HTML5</li>
<li class="has-line-data" data-line-start="4" data-line-end="5">CSS3</li>
<li class="has-line-data" data-line-start="5" data-line-end="6">php</li>
<li class="has-line-data" data-line-start="6" data-line-end="7">mysql</li>
</ol>
<h3 class="code-line" data-line-start=0 data-line-end=1 ><a id="Installation_0"></a>Installation</h3>
<ol>
<li class="has-line-data" data-line-start="2" data-line-end="3">Download as as Zip or Clone this project</li>
<li class="has-line-data" data-line-start="3" data-line-end="4">Move this project to Root Directory</li>
</ol>
<pre><code class="has-line-data" data-line-start="5" data-line-end="7">Local Disc C: -&gt; xampp -&gt; htdocs -&gt; 'this project'
</code></pre>
<p class="has-line-data" data-line-start="7" data-line-end="8"><em>Local Disk C is the location where xampp was installed</em></p>
<ol start="3">
<li class="has-line-data" data-line-start="9" data-line-end="11">
<p class="has-line-data" data-line-start="9" data-line-end="10">Open XAMPP Control Panel and Start ‘Apache’ and ‘MySQL’</p>
</li>
<li class="has-line-data" data-line-start="11" data-line-end="13">
<p class="has-line-data" data-line-start="11" data-line-end="12">Import Database</p>
</li>
</ol>
<p class="has-line-data" data-line-start="13" data-line-end="16">a. Open ‘phpmyadmin’ in your browser<br>
b. Create a Database<br>
c. Import the SQL file provided with this project</p>
<ol start="5">
<li class="has-line-data" data-line-start="17" data-line-end="19">Make Changes to settings</li>
</ol>
<p class="has-line-data" data-line-start="19" data-line-end="20">Go to ‘config’ folder and Open ‘db.php’ file. Then make changes on following constants</p>
<pre><code class="has-line-data" data-line-start="21" data-line-end="32" class="language-php"><span class="hljs-preprocessor">&lt;?php</span> 
session_start();
<span class="hljs-variable">$server</span>= <span class="hljs-string">"localhost"</span>;
<span class="hljs-variable">$username</span>= <span class="hljs-string">"root"</span>;
<span class="hljs-variable">$password</span>= <span class="hljs-string">""</span>;
<span class="hljs-variable">$dbname</span>= <span class="hljs-string">"food_order"</span>;


<span class="hljs-variable">$conn</span> = mysqli_connect(<span class="hljs-variable">$server</span>,<span class="hljs-variable">$username</span>,<span class="hljs-variable">$password</span>,<span class="hljs-variable">$dbname</span>);

<span class="hljs-preprocessor">?&gt;</span></code></pre>
## Follow Me on
1. LinkedIn - [mustafa anwar](https://www.linkedin.com/in/mustafa-anwar-63b79b199/")
3. Facebook - [mustafa anwar](https://www.facebook.com/mustafa.anwar.98096721")
