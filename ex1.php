<?

?>
<html>
<head>
<!-- vertexShader를 정의합니다. -->
<script id="vertexShader" type="x-shader/x-vertex">
  attribute vec4 vPosition;

  void main() {
     gl_Position = vPosition;
  }
</script>
<!-- fragmentShader를 정의합니다. -->
<script id="fragmentShader" type="x-shader/x-fragment">
  void main() {
      gl_FragColor = vec4(0.0, 1.0, 0.0, 1.0); // green color
  }
</script>

<script type="text/javascript">
//////////////////////////////////////////////////////////////////////////////////////////////
 

var gl = null; // WebGL context 객체선언

function draw() { // Draw the picture
    var vertices = [ 0.0, 0.5, 0.0,   -0.5, -0.5, 0.0,
                            0.5, -0.5, 0.0 ]; 

	gl.bufferData(gl.ARRAY_BUFFER, new WebGLFloatArray(vertices), gl.STATIC_DRAW);
	// webkit을 사용하는 경우 WebGLFloatArray을 사용해야합니다. 자세한 내용은 아래 URL에서
	// http://learningwebgl.com/cookbook/index.php/Compatibility_code_for_CanvasFloatArray/WebGLFloatArray_change

    gl.vertexAttribPointer(0, 3, gl.FLOAT, false, 0, 0); //vertex data를 로드합니다.
    gl.enableVertexAttribArray(0); 
    gl.drawArrays(gl.TRIANGLES, 0, 3); 
    gl.flush();

}

function error(errorMessage) {
    alert(errorMessage + " Please see http://learnwebgl.blogspot.com/"); 
}

function getFragmentShader() {
    var shaderNode = document.getElementById("fragmentShader"); // fragmentShader has been defined at the top
    var shaderSource = getShaderSource(shaderNode);

    var shader = gl.createShader(gl.FRAGMENT_SHADER);
    gl.shaderSource(shader, shaderSource);
    gl.compileShader(shader);

    return shader;
}

function getGl() { 
    var theCanvas = document.getElementById("webGlCanvas");

    gl = theCanvas.getContext("moz-webgl"); // Firefox
    if (!gl){
        gl = theCanvas.getContext("webkit-3d"); // Safari or Chrome
 	}
    if (!gl)
        error("Failed to get WebGL context.");
}

function getShaderSource(shaderNode) {
    var shaderSource = "";
    var node = shaderNode.firstChild;
    while (node) {
        if (node.nodeType == 3) // Node.TEXT_NODE
            shaderSource += node.textContent;
        node = node.nextSibling;
    }

    return shaderSource;
}

function getVertexShader() {
    var shaderNode = document.getElementById("vertexShader"); // vertexShader has been defined at the top
    var shaderSource = getShaderSource(shaderNode);

    var shader = gl.createShader(gl.VERTEX_SHADER);
    gl.shaderSource(shader, shaderSource);
    gl.compileShader(shader);

    return shader;
}

function initialize() {
    getGl();

    var vertexShader = getVertexShader();
    var fragmentShader = getFragmentShader();

    var shaderProgram = gl.createProgram();
    gl.attachShader(shaderProgram, vertexShader);
    gl.attachShader(shaderProgram, fragmentShader);
    gl.bindAttribLocation(shaderProgram, 0, "vPosition"); // vPosition has been defined at the top
    gl.linkProgram(shaderProgram);

    gl.useProgram(shaderProgram);

     var buffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, buffer); // Bind a buffer object. Accepted values for target are: ARRAY_BUFFER or ELEMENT_ARRAY_BUFFER 

}

// Main program starts here. The above functions are alphabetical order
function main() { 
    initialize();
    draw();
} // main

window.onload = main; // Call the main() function when the window has been loaded

//////////////////////////////////////////////////////////////////////////////////////////////
</script>
<link rel="stylesheet" type="text/css" href="http://s1.daumcdn.net/cfs.tistory/v/111130102906/blog/style/menubar.css"/><style type="text/css">.tt_article_useless_p_margin p {padding-top:0 !important;padding-bottom:0 !important;margin-top:0 !important;margin-bottom:0 !important;}</style></head>
<body>
<canvas id="webGlCanvas" style="border: 1px solid green" width="300" height="300"></canvas>
<script charset="utf-8" type="text/javascript" src="http://d1.daumcdn.net/tiara/tracker/tiara.min.js"></script>

<script type="text/javascript">
//<!--<![CDATA
	var __pageTracker = {};
	if (typeof __Tiara != "undefined" && typeof __Tiara.__getTracker != "undefined") {
		__pageTracker = __Tiara.__getTracker();
	} else {
		__pageTracker.__trackPageview = function() {};
		__pageTracker.__addParam = function() {};
		__pageTracker.__setTitle = function() {};
	}

	__pageTracker.__setTitle("KCI - my story :: webGL 시작하기#1");
	__pageTracker.__addParam("svcdomain","user.tistory.com");
	__pageTracker.__addParam("category","");
	__pageTracker.__addParam("articleno","160");
	__pageTracker.__addParam("plink","http://dancer.tistory.com/160");
	__pageTracker.__addParam("date","2009-11-28 12:44:46");
	__pageTracker.__addParam("author","dancer");
	__pageTracker.__addParam("length ","12059");
	__pageTracker.__addParam("isauthor","N");
	__pageTracker.__addParam("ishidden","1");
	__pageTracker.__addParam("comments","1");
	__pageTracker.__addParam("param1","0");
	__pageTracker.__addParam("param2","e");
	__pageTracker.__addParam("param3","");

	window.setTimeout("try { __pageTracker.__trackPageview('http://dancer.tistory.com/160'); } catch(e) {}", 1);
//]]>-->
</script></body>
</html>
