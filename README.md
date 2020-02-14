# clientserver
Server to upload string sent from the client

This is developed using CodeIgniter.
# SERVER SETUP:
<ol><li>Configure the database (database name, username, password) in application/config/database.php file.</li>
<li>Hit the server url on your browser so that it will create the require table in your given Database.</li></ol>
  <p>Server is ready Now.</p>

# SERVER API:
<p><u>URL:</u> server_url/<b>api/push</b></p>
<p> This is Post url. To push value to queue you need to set key-value pair form-data with key <b>queue_val</b></p>
<hr>
<p><u>URL:</u> server_url/<b>api/pop</b></p>
<p> This is Get url. It will get most recent value in the queue on server.</p> 

# CLIENT:
<p>Form will be display to push and pop values in the queue.</p>
<p> all operations on the client are done using SERVER API </p>
<p>API_URL contains the server url to be called from client side.</p>
<p>API_URL is set in <u>application/config/constant.php</u> file</p>

# Upload data to file
<p>All queued values will be appended to file. You need to set cronjob for this url: server_url/UpdateFile/update </p>
<p>File path is stored in API_LOG_PATH constant variable.</p>
<p>This variable is defined on server side <u>application/config/constant.php</u></p>
<hr>
<p>Data in file will be stored like in following format
<pre>  2020-02-14 20:00:27
  Value: "test value"
  ------------------------------------------------
  </pre>
</p>
<h4>Following is the process</h4>
<ol>
  <li>SERVER is configured using SERVER Setup step. This is API based Server.</li>
  <li>Creating the database and configuring on SEREVER. And follow the SERVER SETUP step to create table on database.</li>
  <li>On server values are pushed in queue that means in values are stored in table so that afterwards file gets updated from queue.</li>
  <li>To update file you need to setup cronjob by following the Uploading data to file section</li>
  <li>SERVER constant variable is change according to requirement.</li>
  <li>CLIENT is interface. CLIENT's base_url and constant variable are changed accordingly.</li>
  <li>There is form on Client side through which you can push and pop values to queue</li>
</ol>

# # NOTE # #
Change following variable accordingly

# server
<ul><li>API_LOG_PATH</li></ul>

# client
<ul>
  <li>API_URL</li>
  <li>$config['base_url']</li>
</ul>
