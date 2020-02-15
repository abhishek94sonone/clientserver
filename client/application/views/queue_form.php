<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add to Queue</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

</head>
<body>
  <script type="text/javascript">
  const API_URL = "<?php echo API_URL;?>";
  </script>
<section class="container">
 <section class="one">
  <h2 class="heading">
    Enter text to queue
  </h2>
  <form method="post" action="<?php echo base_url();?>index.php/ClientController/push">
    <input id="queue_val" type='text' placeholder="enter text" value="<?php echo set_value('queue_val'); ?>" name="queue_val" required><br/>
  	<?php echo form_error('queue_val'); ?>
    <button class="btn" role="button" type="submit">
      Push
    </button>
  </form>
  <br>
  <form method="post" action="<?php echo base_url();?>index.php/ClientController/pop">
    <button class="btn" role="button" type="submit">
      Pop
    </button>
  </form>
  <br>
  <hr>
    <div>
    <button class="btn" id="async_push" role="button" type="submit">
      Push(Async)
    </button>
    </div>
  <br>
    <button class="btn" id="async_pop" role="button" type="submit">
      Pop(Async)
    </button>
  </section>
  <section class="two" style="<?php echo ($message!=''|| $popmessage!=''|| $error!='')? 'display: block':'display: none'; ?>">
    <h3 id="pop_val">
    <?php 
    if($error!=""){
    	echo "Something went wrong. <br>".$error;
    }elseif($message!=""){
    	echo "Success! Generated id is ".(json_decode($message,true))['id'];
    }elseif($popmessage!=""){
    	echo (json_decode($popmessage,true))['message'];
    }
    ?>
    </h3>
    <div class="close"> 
    </div>
  </section>
</section>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script>
  
  <script  src="<?php echo base_url();?>assets/js/script.js"></script>

</body>
</html>
