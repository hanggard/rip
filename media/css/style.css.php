<?php
ob_start ("ob_gzhandler");
header("Content-type: text/css; charset=UTF-8");
header("Cache-Control: must-revalidate");
$offset = 60 * 60 * 24;
$ExpStr = "Expires: " .
gmdate("D, d M Y H:i:s",
time() + $offset) . " GMT";
header($ExpStr);
?>

@charset "utf-8";

/* General */

* {
	margin:0;
	padding:0;
}

html {
	height:100%;
}

body {
	height:100%;
	position:relative;
	margin:0;
	padding:0;
	font:12px Verdana, Arial, Helvetica, sans-serif;
	line-height:1.4;
	color:#eee;
	background-color:#333;
}

p {
	margin-bottom:5px;
}

a {
	cursor:pointer;
	color:#cf0000;
}

a:hover {
	color:#eee;
}

a, img {
	outline:0;
	border:0;
}

h1 {
	font-size:36px;
	line-height:36px;
	color:#cf0000;
}

h2 {
	margin-bottom:20px;
	font-size:18px;
	color:#cf0000;
}

input[type="text"].standard_input, input[type="password"].standard_input {
	font:12px Verdana, Arial, Helvetica, sans-serif;
	padding:0 3px;
	border:1px solid #999;
	width:400px;
	color:#666;
}

input[type="text"].short_input {
	font:12px Verdana, Arial, Helvetica, sans-serif;
	padding:0 3px;
	border:1px solid #999;
	width:40px;
	color:#666;	
}

input[type="text"].search_input {
	float:left;
	font:12px Verdana, Arial, Helvetica, sans-serif;
	margin:0 10px 0 0;
	padding:0 3px;
	border:1px solid #999;
	width:200px;
	color:#666;
}

input[type="text"].short_search_input {
	float:left;
	font:12px Verdana, Arial, Helvetica, sans-serif;
	margin:0 10px 0 0;
	padding:0 3px;
	border:1px solid #999;
	width:100px;
	color:#666;
}

textarea.standard_textarea {
	font:12px Verdana, Arial, Helvetica, sans-serif;
	padding:0 3px;
	border:1px solid #999;
	line-height:1.5;
	width:600px;
	height:250px;
	color:#666;
}

textarea.description_textarea {
	font:12px Verdana, Arial, Helvetica, sans-serif;
	padding:0 3px;
	border:1px solid #999;
	line-height:1.5;
	width:400px;
	height:70px;
	color:#666;
}

input[type="submit"].standard_button {
	font:12px Verdana, Arial, Helvetica, sans-serif;
	padding:0 5px;
	border:1px solid #ccc;
	background-color:#999;
	color:#fff;
}

input[type="submit"].standard_button:hover {
	color:#333;
}

input[type="submit"].search_button {
	font:12px Verdana, Arial, Helvetica, sans-serif;
	padding:0 5px;
	border:1px solid #ccc;
	background-color:#999;
	color:#fff;
}

input[type="submit"].search_button:hover {
	color:#333;
}

span.red_bg {
	background-color:#F57695;
}

.clear {
	clear:both;
}

.blank_5 {
	height:5px;
	clear:both;
}

.blank_10 {
	height:10px;
	clear:both;
}

.blank_20 {
	height:20px;
	clear:both;
}

.positive {
	color:green;
}

.negative {
	color:#cf0000;
}

.disclaimer {
	padding:5px;
	border:1px solid #cf0000;
	margin-bottom:20px;
	text-align:center;
}

.upper_disclaimer {
	padding:5px;
	background-color:#fff;
	color:#333;
	text-align:center;
}

.upper_disclaimer a:hover {
	color:#333;
}

.banner {
	height:90px;
}

.roi_banner {
	height:22px;
}

/* Template */

#emblem {
	position:fixed;
	right:10px;
	top:10px;
	width:75px;
	height:101px;
	background:url('/media/images/wheatley.png') left bottom no-repeat;
}

#wrapper {
	min-height:100%;
    height:auto !important;
    height:100%;
	max-width:800px;
	margin:0 auto -50px;
}

/* Header */

#header {
	position:relative;
	height:50px;
	margin-bottom:20px;
}

#logo {
	position:absolute;
	left:0;
	bottom:0;
}

#logo a {
	text-decoration:none;
}

#third {
	position:absolute;
	bottom:0;
	right:0;
}

#third .third_item {
	float:right;
	height:32px;
	width:32px;
	margin-left:10px;
	overflow:hidden;
}

#third .lightning {
	background:url('/media/images/lightning.png') left bottom no-repeat;
}

#third .lightning:hover {
	background:url('/media/images/lightning.png') left top no-repeat;
}

#third .vk {
	background:url('/media/images/vk.png') left bottom no-repeat;
}

#third .vk:hover {
	background:url('/media/images/vk.png') left top no-repeat;
}

#third .facebook {
	background:url('/media/images/facebook.png') left bottom no-repeat;
}

#third .facebook:hover {
	background:url('/media/images/facebook.png') left top no-repeat;
}

#third .twitter {
	background:url('/media/images/twitter.png') left bottom no-repeat;
}

#third .twitter:hover {
	background:url('/media/images/twitter.png') left top no-repeat;
}

#third .rss {
	background:url('/media/images/rss.png') left bottom no-repeat;
}

#third .rss:hover {
	background:url('/media/images/rss.png') left top no-repeat;
}

/* Menu */

#menu {
	margin:0 0 20px 0;
	line-height:20px;
}

#left_menu {
	float:left;
}

#right_menu {
	float:right;
	text-align:right;	
}

/* Footer */

#footer_push {
	height:50px;
}

#footer {
	height:39px;
	max-width:800px;
	margin:0 auto;
	padding-top:10px;
	border-top:1px solid #999;		
	font-size:11px;
}

#footer .left {
	float:left;
}

#footer .right {
	float:right;
	text-align:right;
}

/* Tale */

.tale {
	position:relative;
	margin:0 0 20px 0;
	border:1px solid #999;
}

.tale_special {
	border:1px solid #D6945A;
}

.tale .head {
	background-color:#999;
	padding:5px;
}

.tale_special .head  {
	background-color:#D6945A;
}

.tale .head .left {
	float:left;
}

.tale .head .right {
	float:right;
	width:200px;
}

.tale .head .title {
	font-weight:bold;
}

.tale .head .title a {
	color:#eee;
	text-decoration:none;
}

.tale .head .title a:hover {
	color:#cf0000;
}

.tale .head .identifier {
	float:right;
	margin-left:10px;
}

.tale .head .date {
	float:right;
}

.tale .body {
	padding:10px 5px;
}

.tale .tags {
	margin-top:10px;
}

.tale .tags a {
	margin-right:5px;
}

.tale .foot {
	height:15px;
	padding:5px;
	border-top:1px solid #999;
	font-size:11px;
}

.tale_special .foot {
	border-top:1px solid #D6945A;
}

.tale .votes {
	position:relative;
}

.tale .votes .votes_count {
	position:absolute;
	top:-5px;
	left:-5px;
	width:60px;
	height:23px;
	padding-top:3px;
	background-color:#999;
	font-size:14px;
	font-weight:bold;
	color:yellow;
	text-align:center;	
}

.tale_special .votes .votes_count {
	background-color:#D6945A;
}

.tale .votes .vote_up {
	position:absolute;
	left:65px;
}

.tale .votes .vote_down {
	position:absolute;
	left:125px;
}

.tale .votes .thanks {
	position:absolute;
	left:205px;
}

.tale .actions {
	float:right;
}

.tale .approve {
	float:right;
	margin-right:2px;
}

.tale .moderate {
	float:right;
	text-align:right;
}

.tale  .moderate a {
	margin-left:7px;
}

.tale .share {
	float:right;
	width:104px;
}

.tale .share .share_vk {
	float:right;
	width:16px;
	height:16px;
	background:url('/media/images/share_vk.png') left bottom no-repeat;
}

.tale .share .share_vk:hover {
	background:url('/media/images/share_vk.png') left top no-repeat;
}

.tale .share .share_facebook {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_facebook.png') left bottom no-repeat;
}

.tale .share .share_facebook:hover {
	background:url('/media/images/share_facebook.png') left top no-repeat;
}

.tale .share .share_twitter {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_twitter.png') left bottom no-repeat;
}

.tale .share .share_twitter:hover {
	background:url('/media/images/share_twitter.png') left top no-repeat;
}

.tale .share .share_lj {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_lj.png') left bottom no-repeat;
}

.tale .share .share_lj:hover {
	background:url('/media/images/share_lj.png') left top no-repeat;
}

.tale .share .share_mail {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_mail.png') left bottom no-repeat;
}

.tale .share .share_mail:hover {
	background:url('/media/images/share_mail.png') left top no-repeat;
}

.tale .share .share_more {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_more.png') left bottom no-repeat;
}

.tale .share .share_more:hover {
	background:url('/media/images/share_more.png') left top no-repeat;
}

/* Image */

.image {	
	width:192px;
	float:left;
	margin:0 10px 20px 0;
}

.image_last {
	margin-right:0;
}

.image .head {
	background-color:#999;
	padding:5px;
}

.image .head .date {
	float:left;
}

.image .head .identifier {
	float:right;
}

.image table {
	border:none;
	margin:0;
	padding:0;
}

.image table tr {
	height:192px;
}

.image table td {
	width:180px;
	height:180px;
	padding:5px;
	border:1px solid #999;
	overflow:hidden;
}

.image .foot {
	height:15px;
	padding:5px;
	border:1px solid #999;
	border-top:none;
	font-size:11px;
}

.image .votes {
	position:relative;
}

.image .votes .votes_count {
	position:absolute;
	top:-5px;
	left:-5px;
	width:60px;
	height:23px;
	padding-top:3px;
	background-color:#999;
	font-size:14px;
	font-weight:bold;
	color:yellow;
	text-align:center;	
}

/* ImageAd */

.imagead {	
	width:252px;
	float:left;
	margin:0 22px 20px 0;
}

.imagead_last {
	margin-right:0;
}

.imagead table {
	border:none;
	margin:0;
	padding:0;
}

.imagead table tr {
	height:252px;
}

.imagead table td {
	width:240px;
	height:240px;
	padding:5px;
	border:1px solid #999;
	overflow:hidden;
}

/* Image Full */

.image_full {
	margin:0 0 20px 0;
	border:1px solid #999;
}

.image_full .head {
	background-color:#999;
	padding:5px;
}

.image_full .head .left {
	float:left;
}

.image_full .head .right {
	float:right;
	width:200px;
}

.image_full .head .identifier {
	float:right;
	margin-left:10px;
}

.image_full .head .date {
	float:right;
}

.image_full .body {
	padding:10px 5px;
}

.image_full .picture {
	margin-top:5px;
	text-align:center;
}

.image_full .picture img {
	padding:2px;
	border:1px solid #999;
}

.image_full .description {
	margin-top:10px;
	text-align:center;
}

.image_full .albums {
	margin:10px 0 5px 0;
	text-align:center;
}

.image_full .albums a {
	margin-right:5px;
}

.image_full .foot {
	height:15px;
	padding:5px;
	border-top:1px solid #999;
	font-size:11px;
}

.image_full .votes {
	position:relative;	
}

.image_full .votes .votes_count {
	position:absolute;
	top:-5px;
	left:-5px;
	width:60px;
	height:23px;
	padding-top:2px;
	background-color:#999;
	font-size:16px;
	font-weight:bold;
	color:yellow;
	text-align:center;	
}

.image_full .votes .vote_up {
	position:absolute;
	left:65px;
}

.image_full .votes .vote_down {
	position:absolute;
	left:125px;
}

.image_full .votes .thanks {
	position:absolute;
	left:205px;
}

.image_full .actions {
	float:right;
}

.image_full .approve {
	float:right;
	margin-right:2px;
}

.image_full .moderate {
	float:right;
	text-align:right;
}

.image_full  .moderate a {
	margin-left:7px;
}

.image_full .share {
	float:right;
	width:104px;
}

.image_full .share .share_vk {
	float:right;
	width:16px;
	height:16px;
	background:url('/media/images/share_vk.png') left bottom no-repeat;
}

.image_full .share .share_vk:hover {
	background:url('/media/images/share_vk.png') left top no-repeat;
}

.image_full .share .share_facebook {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_facebook.png') left bottom no-repeat;
}

.image_full .share .share_facebook:hover {
	background:url('/media/images/share_facebook.png') left top no-repeat;
}

.image_full .share .share_twitter {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_twitter.png') left bottom no-repeat;
}

.image_full .share .share_twitter:hover {
	background:url('/media/images/share_twitter.png') left top no-repeat;
}

.image_full .share .share_lj {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_lj.png') left bottom no-repeat;
}

.image_full .share .share_lj:hover {
	background:url('/media/images/share_lj.png') left top no-repeat;
}

.image_full .share .share_mail {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_mail.png') left bottom no-repeat;
}

.image_full .share .share_mail:hover {
	background:url('/media/images/share_mail.png') left top no-repeat;
}

.image_full .share .share_more {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_more.png') left bottom no-repeat;
}

.image_full .share .share_more:hover {
	background:url('/media/images/share_more.png') left top no-repeat;
}

/* Video */

.video {
	position:relative;
	margin:0 0 20px 0;
	border:1px solid #999;
}

.video .head {
	background-color:#999;
	padding:5px;
}

.video .head .left {
	float:left;
}

.video .head .right {
	float:right;
	width:200px;
}

.video .head .title {
	font-weight:bold;
}

.video .head .title a {
	color:#eee;
	text-decoration:none;
}

.video .head .title a:hover {
	color:#cf0000;
}

.video .head .identifier {
	float:right;
	margin-left:10px;
}

.video .head .date {
	float:right;
}

.video .body {
	padding:10px 5px;
}

.video .description {
	margin-top:10px;
	text-align:center;
}

.video .collections {
	margin:10px 0 5px 0;
	text-align:center;
}

.video .collections a {
	margin-right:5px;
}

.video .foot {
	height:15px;
	padding:5px;
	border-top:1px solid #999;
	font-size:11px;
}

.video .votes {
	position:relative;
}

.video .votes .votes_count {
	position:absolute;
	top:-5px;
	left:-5px;
	width:60px;
	height:23px;
	padding-top:3px;
	background-color:#999;
	font-size:14px;
	font-weight:bold;
	color:yellow;
	text-align:center;	
}

.video .votes .vote_up {
	position:absolute;
	left:65px;
}

.video .votes .vote_down {
	position:absolute;
	left:125px;
}

.video .votes .thanks {
	position:absolute;
	left:205px;
}

.video .actions {
	float:right;
}

.video .approve {
	float:right;
	margin-right:2px;
}

.video .moderate {
	float:right;
	text-align:right;
}

.video  .moderate a {
	margin-left:7px;
}

.video .share {
	float:right;
	width:104px;
}

.video .share .share_vk {
	float:right;
	width:16px;
	height:16px;
	background:url('/media/images/share_vk.png') left bottom no-repeat;
}

.video .share .share_vk:hover {
	background:url('/media/images/share_vk.png') left top no-repeat;
}

.video .share .share_facebook {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_facebook.png') left bottom no-repeat;
}

.video .share .share_facebook:hover {
	background:url('/media/images/share_facebook.png') left top no-repeat;
}

.video .share .share_twitter {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_twitter.png') left bottom no-repeat;
}

.video .share .share_twitter:hover {
	background:url('/media/images/share_twitter.png') left top no-repeat;
}

.video .share .share_lj {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_lj.png') left bottom no-repeat;
}

.video .share .share_lj:hover {
	background:url('/media/images/share_lj.png') left top no-repeat;
}

.video .share .share_mail {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_mail.png') left bottom no-repeat;
}

.video .share .share_mail:hover {
	background:url('/media/images/share_mail.png') left top no-repeat;
}

.video .share .share_more {
	float:right;
	width:16px;
	height:16px;
	margin-left:10px;
	background:url('/media/images/share_more.png') left bottom no-repeat;
}

.video .share .share_more:hover {
	background:url('/media/images/share_more.png') left top no-repeat;
}

/* Post */

.post {
	padding:5px;
	border:1px solid #666;
	margin:0 0 10px 0;
	font-size:11px;
}

.post .date {
	float:right;
	max-width:200px;
	text-align:right;
}

.post .author {
	float:left;
	max-width:550px;
	font-weight:bold;
	overflow:hidden;
}

.post .authorized {
	color:#cf0000;
}

/* Tags */

#tags a {
	color:#eee;
	margin:0 10px 0 0;
}

#tags a:hover {
	color:#cf0000;
}

/* Form */

form .left {
	float:left;
	width:95px;
	font-weight:bold;
}

form .right {
	float:left;
	margin-bottom:10px;
}

form .right span {
	font-size:11px;
}

form .captcha {
	margin:5px 0 0 0;
}

form .area {
	padding:10px 10px 5px 10px;
	border:1px solid #999;
	margin:0 0 10px 0;
}

form .centered {
	margin:0 0 10px 0;
	text-align:center;
}

form .centered img {
	padding:2px;
	border:1px solid #999;
}

.error {
	margin-bottom:10px;
	padding:5px;
	border:1px solid #cf0000;
	color:#cf0000;
}

.success {
	margin-bottom:10px;
	padding:5px;
	border:1px solid #00cf00;
	color:#00cf00;
}

/* Pager */

.pager {
	margin:0 0 10px 0;
}

.pager_item {
	float:left;
	width:20px;
	height:18px;
	margin:0 8px 10px 0;
	padding:4px 1px 0 1px;
	border:1px solid #999;
	font-size:9px;
	text-align:center;
}

/* Table */

table {
	border:1px solid #999;
	margin-bottom:20px;
}

table tr.table_head {
	background-color:#999;
}

table td, table th {
	padding:5px;
}