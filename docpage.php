<?php
// $Id: tips.php 286580 2009-07-31 10:28:16Z bjori $
$_SERVER['BASE_PAGE'] = 'docpage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("Doc page");
?>
    <div class="layout-menu">
        <ul>
            <li><a href="#">Menu Section</a>
                <ul>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                </ul>
            </li>
            <li><a href="#">Menu Section</a>
                <ul>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                </ul>
            </li>
            <li><a href="#">Menu Section</a>
                <ul>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                    <li><a href="#">Menu item</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="layout-content">
        <div id="function.mysql-pconnect" class="refentry">
         <div class="refnamediv">
          <h1 class="refname"><a href="#">mysql_pconnect</a></h1>
          <p class="verinfo">(PHP 4, PHP 5)</p><p class="refpurpose"><span class="refname">mysql_pconnect</span> &mdash; <span class="dc-title">Open a persistent connection to a MySQL server</span></p>
        
         </div>
        
         <a name="function.mysql-pconnect.description"></a><div class="refsect1 description">
          <h3 class="title">Description</h3>
          <div class="methodsynopsis dc-description">
           <span class="type">resource</span> <span class="methodname"><b>mysql_pconnect</b></span>
            ([ <span class="methodparam"><span class="type">string</span> <tt class="parameter">$server</tt><span class="initializer"> = ini_get(&quot;mysql.default_host&quot;)</span></span>
           [, <span class="methodparam"><span class="type">string</span> <tt class="parameter">$username</tt><span class="initializer"> = ini_get(&quot;mysql.default_user&quot;)</span></span>
           [, <span class="methodparam"><span class="type">string</span> <tt class="parameter">$password</tt><span class="initializer"> = ini_get(&quot;mysql.default_password&quot;)</span></span>
           [, <span class="methodparam"><span class="type">int</span> <tt class="parameter">$client_flags</tt></span>
          ]]]] )</div>
        
          
          <p class="para rdfs-comment">
           Establishes a persistent connection to a MySQL server.
          </p>
          
          <p class="para">
           <b>mysql_pconnect()</b> acts very much like
           <a href="function.mysql-connect.php" class="function">mysql_connect()</a> with two major differences.
          </p>
          <p class="para">
           First, when connecting, the function would first try to find a
           (persistent) link that&#039;s already open with the same host,
           username and password.  If one is found, an identifier for it
           will be returned instead of opening a new connection.
          </p>
          <p class="para">
           Second, the connection to the SQL server will not be closed when
           the execution of the script ends.  Instead, the link will remain
           open for future use (<a href="function.mysql-close.php" class="function">mysql_close()</a> will not
           close links established by <b>mysql_pconnect()</b>).
          </p>
          <p class="para">
           This type of link is therefore called &#039;persistent&#039;.
          </p>
         </div>
        
        
         <a name="function.mysql-pconnect.parameters"></a><div class="refsect1 parameters">
          <h3 class="title">Parameters</h3>
          <p class="para">
           </p><dl>
        
            <dt class="varlistentry">
        
             <span class="term"><i><tt class="parameter">server</tt></i>
        </span>
        
             </dt><dd class="listitem">
        
              <p class="para">
               The MySQL server. It can also include a port number. e.g. 
               &quot;hostname:port&quot; or a path to a local socket e.g. &quot;:/path/to/socket&quot; for 
               the localhost.
              </p>
              <p class="para">
               If the PHP directive <a href="mysql.configuration.php#ini.mysql.default-host" class="link">
               mysql.default_host</a> is undefined (default), then the default 
               value is &#039;localhost:3306&#039;
              </p>
             </dd>
        
            
            <dt class="varlistentry">
        
             <span class="term"><i><tt class="parameter">username</tt></i>
        </span>
        
             </dt><dd class="listitem">
        
              <p class="para">
               The username. Default value is the name of the user that owns the
               server process.
              </p>
             </dd>
        
            
            <dt class="varlistentry">
        
             <span class="term"><i><tt class="parameter">password</tt></i>
        </span>
        
             </dt><dd class="listitem">
        
              <p class="para">
               The password. Default value is an empty password.
              </p>
             </dd>
        
            
            <dt class="varlistentry">
        
             <span class="term"><i><tt class="parameter">client_flags</tt></i>
        </span>
        
             </dt><dd class="listitem">
        
              <p class="para">
               The <i><tt class="parameter">client_flags</tt></i>
         parameter can be a combination 
               of the following constants:
               128 (enable <i>LOAD DATA LOCAL</i> handling),
               <b><tt class="constant">MYSQL_CLIENT_SSL</tt></b>, 
               <b><tt class="constant">MYSQL_CLIENT_COMPRESS</tt></b>, 
               <b><tt class="constant">MYSQL_CLIENT_IGNORE_SPACE</tt></b> or
               <b><tt class="constant">MYSQL_CLIENT_INTERACTIVE</tt></b>.
              </p>
             </dd>
        
             
           </dl>
        <p>
          </p>
         </div>
        
        
         <a name="function.mysql-pconnect.returnvalues"></a><div class="refsect1 returnvalues">
          <h3 class="title">Return Values</h3>
          <p class="para">
           Returns a MySQL persistent link identifier on success, or <b><tt class="constant">FALSE</tt></b> on 
           failure.
          </p>
         </div>
        
         
         <a name="function.mysql-pconnect.changelog"></a><div class="refsect1 changelog">
          <h3 class="title">Changelog</h3>
          <p class="para">
           </p><table class="doctable informaltable">
            
             <thead valign="middle">
              <tr valign="middle">
               <th>Version</th>
               <th>Description</th>
              </tr>
        
             </thead>
        
             <tbody valign="middle" class="tbody">
              <tr valign="middle">
               <td align="left">4.3.0</td>
               <td align="left">
                Added the <i><tt class="parameter">client_flags</tt></i>
         parameter.
               </td>
              </tr>
        
             </tbody>
            
           </table>
        <p>
          </p>
         </div>
        
        
         <a name="function.mysql-pconnect.notes"></a><div class="refsect1 notes">
          <h3 class="title">Notes</h3>
          <blockquote class="note">
           <h4>Note</h4>
           <p class="para">
            Note, that these kind of links only work if you are using
            a module version of PHP. See the
            <a href="features.persistent-connections.php" class="link">Persistent
            Database Connections</a> section for more information.
          </p></blockquote>
          <blockquote class="warning">
           <h4>Warning</h4>
           <p class="para">
            Using persistent connections can require a bit of tuning of your Apache
            and MySQL configurations to ensure that you do not exceed the number of
            connections allowed by MySQL.
           </p>
          </blockquote>
          <blockquote class="note">
           <h4>Note</h4>
           <p class="para">
            You can suppress the error message on failure by prepending 
            a <a href="language.operators.errorcontrol.php" class="link">@</a>
            to the function name.
          </p></blockquote>
         </div>
        
        
         <a name="function.mysql-pconnect.seealso"></a><div class="refsect1 seealso">
          <h3 class="title">See Also</h3>
          <p class="para">
           </p><ul class="simplelist">
            <li class="member"><a href="function.mysql-connect.php" class="function" rel="rdfs-seeAlso">mysql_connect()</a> - Open a connection to a MySQL Server</li>
            <li class="member"><a href="features.persistent-connections.php" class="link">Persistent
            Database Connections</a></li>
           </ul><p>
          </p>
         </div>
        
        </div>
        
        <div id="usernotes">
         <div class="head">
          <span class="action"><a href="#"><img src="http://static.php.net/www.php.net/images/notes-add.gif" alt="add a note" width="13" height="13" class="middle" /></a> <small><a href="#">add a note</a></small></span>
          <h3 class="title">User Contributed Notes</h3>
         </div>

         <a name="43"></a>
         <div class="note">
           <strong class="user">example2@example.com</strong>
           <a class="date" href="#43">25-Sep-2009 15:25</a>
           <div class="text">
             <div class="phpcode">
               <code>
                 <span class="html">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ultricies neque, in ornare lectus commodo eget. Donec non lacus quis sapien feugiat interdum nec vel tellus.
                   Vivamus turpis felis, ultrices sed euismod in, scelerisque quis nunc. Proin luctus lacus in est consectetur auctor. Suspendisse potenti. Donec semper commodo vehicula. Aliquam eget
                   nisi quis neque semper bibendum tempor ut mi. Proin at dolor dignissim mi pretium vulputate tristique quis sapien. In hac habitasse platea dictumst. Cras fermentum pharetra ligula
                   sit amet porttitor. Praesent aliquam pulvinar consectetur. Cras vitae vulputate arcu. Nunc interdum venenatis diam, nec ultrices arcu interdum vestibulum. Vestibulum ante ipsum primis
                   in faucibus orci luctus et ultrices posuere cubilia Curae; In blandit bibendum elit ut varius. Aenean egestas imperdiet eros blandit tempus.
                 </span>
               </code>
             </div>
           </div>
         </div>

         <a name="42"></a>
         <div class="note">
           <strong class="user">example@example.com</strong>
           <a class="date" href="#42">08-Aug-2008 08:42</a>
           <div class="text">
             <div class="phpcode">
               <code>
                 <span class="html">
                   This is an example user note.
                   <br /><br />
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ultricies neque, in ornare lectus commodo eget. Donec non lacus quis sapien feugiat interdum nec vel tellus.
                   Vivamus turpis felis, ultrices sed euismod in, scelerisque quis nunc. Proin luctus lacus in est consectetur auctor. Suspendisse potenti. Donec semper commodo vehicula. Aliquam eget
                   nisi quis neque semper bibendum tempor ut mi. Proin at dolor dignissim mi pretium vulputate tristique quis sapien. In hac habitasse platea dictumst. Cras fermentum pharetra ligula
                   sit amet porttitor. Praesent aliquam pulvinar consectetur. Cras vitae vulputate arcu. Nunc interdum venenatis diam, nec ultrices arcu interdum vestibulum. Vestibulum ante ipsum primis
                   in faucibus orci luctus et ultrices posuere cubilia Curae; In blandit bibendum elit ut varius. Aenean egestas imperdiet eros blandit tempus.
                 </span>
               </code>
             </div>
           </div>
         </div>

         <div class="foot">
          <span class="action"><a href="#"><img src="http://static.php.net/www.php.net/images/notes-add.gif" alt="add a note" width="13" height="13" class="middle" /></a> <small><a href="#">add a note</a></small></span>
         </div>
        </div>
         </div>
<?php
site_footer();

