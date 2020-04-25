<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="main1.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <meta property="og:title" content="Flout | Fully encrypted temp file container" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://flout.is" />
    <meta property="og:description" content="Share your files in complete privacy with flout.is, the leading encrypted file container solution for you." /> 
    <meta name="keywords" content="File Sharing, File Storage, Cloud Storage, Encrypted File Storage, Encryption">
	<link rel="stylesheet" type="text/css" href="./table.css" />
    <script src="./code.js"></script>
  </head>
  <body>
  <section class="section main">
    <div class="container main-container">
      <h1 class="title">
	<img src="" width="150px" height="150px"/><br><br>
        Welcome to SecureMe
      </h1>
      <p class="subtitle">
        Experience private yet perfect file sharing.
      </p>
	<article class="message is-success">
	  <div class="message-body">
		Easy file encryption with one click
	  </div>
	</article>
	
	<form method="POST" action="upload.php" enctype="multipart/form-data">
			<div class="field">
				<div class="file has-name">
				  <label class="file-label">
					<input type="file" name="file" class="file-input">
					<span class="file-cta">
					  <span class="file-icon">
						<i class="fas fa-upload"></i>
					  </span>
					  <span class="file-label">
						Choose a file...
					  </span>
					</span>
					<span class="file-name">
					  Waiting for choice...
					</span>
				  </label>
				</div>
			</div>
		
			<div class="field is-grouped">
		  <div class="control">
			<input type="submit" value="Upload" class="button">
			<a href="download.php" class="button">
				Download
			</a>
		  </div>
		</div>
	</form>
			<hr>
			
			<div id="wrapper">
	<table id="keywords" class="container" cellspacing="0" cellpadding="0">
	<thead width="180">
      <tr>
        <th><h1>File</h1></th>
        <th><h1>Download</h1></th>
        <th><h1>Delete</h1></th>
        <th><h1>Encrypt</h1></th>
        <th><h1>Decrypt</h1></th>
      </tr>
    </thead>
		<?php

// This will return all files in that folder
$files = scandir("uploads");

// If you are using windows, first 2 indexes are "." and "..",
// if you are using Mac, you may need to start the loop from 3,
// because the 3rd index in Mac is ".DS_Store" (auto-generated file by Mac)

for ($a = 2; $a < count($files); $a++)
{
    ?>
	
	<tbody>
		<tr>
    	<!-- Displaying file name !-->
        <td><?php  echo $files[$a]; ?></td>

        <!-- href should be complete file path !-->
        <!-- download attribute should be the name after it downloads !-->
        <td class="lalign"><a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">
            Download
        </a>
		<td><a href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;">
			Delete
		</a></td>
		<td><a href="Enc.php?name=uploads/<?php echo $files[$a]; ?>" style="color: green;">
			Encrypt
		</a></td>
		<td><a href="dec.php?name=uploads/<?php echo $files[$a]; ?>" style="color: black;">
			Decrypt
		</a></td>
		</tr>
	</tbody>
	</div>
    <?php
}
?>
 </div>
  </section>
  </body>
  <script>
	document.addEventListener('DOMContentLoaded', () => {
	  // 1. Display file name when select file
	  let fileInputs = document.querySelectorAll('.file.has-name')
	  for (let fileInput of fileInputs) {
		let input = fileInput.querySelector('.file-input')
		let name = fileInput.querySelector('.file-name')
		input.addEventListener('change', () => {
		  let files = input.files
		  if (files.length === 0) {
			name.innerText = 'No file selected'
		  } else {
			name.innerText = files[0].name
		  }
		})
	  }

	  // 2. Remove file name when form reset
	  let forms = document.getElementsByTagName('form')
	  for (let form of forms) {
		form.addEventListener('reset', () => {
		  console.log('a')
		  let names = form.querySelectorAll('.file-name')
		  for (let name of names) {
			name.innerText = 'No file selected'
		  }
		})
	  }
	})
  </script>
</html>
