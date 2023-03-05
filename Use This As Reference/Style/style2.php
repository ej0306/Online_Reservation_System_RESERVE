/*
	Author	:	Christopher Robinson
	Email		:	christopher@edg3.co.uk
	Website	:	http://www.edg3.co.uk/
*/
* {
	border:2;
	margin:0;
	padding:0;
}

/* general */
a {
	color:white;
	
}

a:hover {
	color:#333;
	text-decoration:none;
}

/* body */
body {
	background:black;
	color:#555;
	font:0.8em Arial, Helvetica, "bitstream vera sans", sans-serif;
}

/* header */
#header {
	border-bottom:1px solid #999;
	height:80px;
	margin:0 auto;
	width:751px;
}
 h1 {
	color:white;
	font-size:300%;
	letter-spacing:-3px;
	text-align:center;
	padding:10px;
	margin-bottom:-20px;
    text-transform: uppercase;
}
#header h2 {
	color:#CCC;
	font-size:200%;
	letter-spacing:-2px;
	text-align:right;
}

/* navigation */
#navigation {
	background:#fafafa;
	border-right:1px solid #999;
	margin:10;
	width:500px;
	height:30px;
	list-style:none;
}
#navigation li {
	border-left:1px solid #999;
	float:left;
	width:100px;
	list-style:none;
}
#navigation a {
	color:#555;
	display:block;
	line-height:40px;
	text-align:center;
}
#navigation a:hover {
	background:#e3e3e3;
	color:#555;
}
#navigation .active {
	background:#777;
	color:#777;
}

/* content */
#content {
	height:auto;
	margin:0 auto;
	padding:0 0 20px;
	width:751px;
}
#content h1 {
	border-bottom:1px dashed #999;
	font-size:1.8em;
	padding:20px 0 0;
}
#content p {
	padding:20px 20px 0;
    color:white;
}
p,label{
    padding:20px 20px 0;
    color:white;
    font-size: 150%;
    text-transform: uppercase;
}

/* footer */
#footer {
	border-top:1px solid #999; 
	height:50px;
	margin:0 auto;
	padding:10px;
	text-align:center;
	width:751px;
}

/* Added by Larry Ullman: */
.error, .ad {
	font-weight: bold;
	color: #C00
}

input, select,textarea,button, .input {
	padding: 7px;
	font-weight: bold;
	font-size: 1.5em;
    font-weight: 200;
	color: white;
	background: lightgray;
	border:1px  white;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}