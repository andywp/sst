<?php if (!defined('basePath')) exit('No direct script access allowed');?><!DOCTYPE html><html lang="en">	<head>		<!-- Styles -->		<style>			body {				background: #E6E6E6;				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;				font-size: 12px;				padding: 0;				margin: 0;				text-rendering: optimizelegibility;				color: #666;				line-height: 20px;			}			.error-page .error-container {				margin: 100px auto 0;				max-width: 600px;				text-align: center;				width: 90%;			}			.error-container .error-code {				display: inline-block;;				font-family: Trebuchet MS,sans-serif;				font-size: 162px;				font-weight: normal;				line-height: 140px;				margin: 0;				position: relative;			}			.error-container .error-code:before,			.error-container .error-code:after {				position: absolute;			}			.error-container .error-code:before {}			.error-container .error-code:after {}			.error-page .error-container p.description {				font-size: 39px;				margin-top: 50px;			}			a {				color: #70A3E2;				text-decoration: none;			}			a:hover {				color: #5587C5;				text-decoration: none;			}		</style>	</head>		<body class="error-page">				<!-- Error page container -->		<section class="error-container">					<h1 class="error-code" title="401">401</h1>			<p class="description">Whoops! Access denied...</p>			<p>Sorry, it appears the page you were looking for requires authentication or you have failed authentication. If the problem persists, please contact our support at <a href="example_domain.html">example@domain.com</a>.</p>			<a href="#" class="btn btn-alt btn-primary btn-large" title="Back to Homepage" onclick="window.history.back()">Back to Homepage</a>				</section>			</body></html>