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

## NOTE #
Change following variable accordingly
# server
API_LOG_PATH
# client
API_URL
$config['base_url']
