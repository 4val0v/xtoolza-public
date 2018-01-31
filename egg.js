if (window.addEventListener) {
    var keys = [],
        wordis = "88,84,79,79,76,90,65";
    window.addEventListener("keydown", function(e){
        keys.push(e.keyCode);
        if (keys.toString().indexOf(wordis) >= 0) {
			var image = document.getElementById("test");
			var i = 0, s = ["block","none"],t = [2000,1000];
			function show()
			{  i ^= 1
				image.style.display = s[i];
				setTimeout(show,t[i]);
			}
			show()
            keys = [];
        };
    }, true);
};