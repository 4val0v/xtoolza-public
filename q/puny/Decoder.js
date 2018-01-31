
Tools.Decoder=go.Class(Tools.DualWin,{'left2right':function(text){return text.replace(/\\u([0-9a-fA-F]+)/g,function(){return String.fromCharCode(parseInt(arguments[1],16));});},'right2left':function(text){var res=[],i,len=text.length,clen,code;for(i=0;i<len;i+=1){code=text.charCodeAt(i);if(code>127){code=code.toString(16);clen=code.length;if(clen<4){code=(new Array(5-clen)).join("0")+code;}
res.push("\\u"+code);}else{res.push(text.charAt(i));}}
return res.join("");},'eoc':null});