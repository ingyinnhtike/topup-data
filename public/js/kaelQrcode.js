/**
 * â”â”â”â”â”â”â”“
 * â”ƒâ—¤      â—¥â”ƒ
 * â”ƒ   bug    â”ƒ
 * â”ƒ   stop   â”ƒ
 * â”ƒ   here   â”ƒ
 * â”ƒ          â”ƒ
 * â”ƒ  å·´  åƒ  â”ƒ
 * â”ƒ  æ ¼  è¡Œ  â”ƒ
 * â”ƒ  ä¸  ä»£  â”ƒ
 * â”ƒ  æ²¾  ç   â”ƒ
 * â”ƒ  èº«  è¿‡  â”ƒ
 * â”ƒ          â”ƒ
 * â”ƒâ—£      â—¢â”ƒ
 * â”—â”â”â”â”â”â”›
 *
 * @description Kael-Qrcode åŸºäºŽcanvasçµæ´»å¯é…ç½®çš„äºŒç»´ç ç”Ÿæˆåº“
 * @version 1.0
 * @author litten
 * @dependencies ä¾èµ–äºŽåŒæ–‡ä»¶å¤¹ä¸‹qrcode.jsï¼›å·²å°†ä¸¤ä»½èµ„æºæ‰“åŒ…æˆbuild/kaelQrcode.min.js
 * @lastUpdate 2014-08-10 0:11
 */

var KaelQrcode = function(){

    var basicConfig = {};
    var config = {};
    var qrcode, canvas, ctx;

    var Tool = {
        //RGBé¢œè‰²è½¬æ¢ä¸º16è¿›åˆ¶
        colorHex: function(color){
            var reg = /^#([0-9a-fA-f]{3}|[0-9a-fA-f]{6})$/;
            var that = color;
            if(/^(rgb|RGB)/.test(that)){
                var aColor = that.replace(/(?:\(|\)|rgb|RGB)*/g,"").split(",");
                var strHex = "#";
                for(var i=0; i<aColor.length; i++){
                    var hex = Number(aColor[i]).toString(16);
                    if(hex === "0"){
                        hex += hex;
                    }
                    strHex += hex;
                }
                if(strHex.length !== 7){
                    strHex = that;
                }
                return strHex;
            }else if(reg.test(that)){
                var aNum = that.replace(/#/,"").split("");
                if(aNum.length === 6){
                    return that;
                }else if(aNum.length === 3){
                    var numHex = "#";
                    for(var i=0; i<aNum.length; i+=1){
                        numHex += (aNum[i]+aNum[i]);
                    }
                    return numHex;
                }
            }else{
                return that;
            }
        },
        //16è¿›åˆ¶é¢œè‰²è½¬ä¸ºRGBæ ¼å¼
        colorRgb: function(color){
            var reg = /^#([0-9a-fA-f]{3}|[0-9a-fA-f]{6})$/;
            var sColor = color.toLowerCase();
            if(sColor && reg.test(sColor)){
                if(sColor.length === 4){
                    var sColorNew = "#";
                    for(var i=1; i<4; i+=1){
                        sColorNew += sColor.slice(i,i+1).concat(sColor.slice(i,i+1));
                    }
                    sColor = sColorNew;
                }
                //å¤„ç†å…­ä½çš„é¢œè‰²å€¼
                var sColorChange = [];
                for(var i=1; i<7; i+=2){
                    sColorChange.push(parseInt("0x"+sColor.slice(i,i+2)));
                }
                return "RGB(" + sColorChange.join(",") + ")";
            }else{
                return sColor;
            }
        },
        //é¢œè‰²å¢žé‡å˜åŒ–ï¼Œæ”¯æŒrgbï¼Œ16è¿›åˆ¶å’Œlinear
        changeRGB : function(curcolor, num){
            function addRGB(val){
                var valFormat = (val.match(/\([^\)]+\)/g))[0];
                valFormat = valFormat.substr(1, valFormat.length-2);
                var arr = valFormat.split(",");
                for(var i=0,len=arr.length;i<len;i++){
                    arr[i] = parseInt(arr[i]) + num;
                    if(arr[i] < 0){
                        arr[i] = 0;
                    }
                }
                return "rgb("+arr.join(",")+")";
            }
            if(typeof(curcolor) == "object"){
                var linear  = ctx.createLinearGradient(0,0, 0, config.width);
                for(var em in curcolor){
                    var val = curcolor[em];
                    val = addRGB(val);
                    linear.addColorStop(em, val);
                }
                return linear;
            }else if(typeof(curcolor) == "string"){
                if(curcolor.indexOf("#") < 0){
                    return addRGB(curcolor);
                }else{
                    return addRGB(Tool.colorRgb(curcolor));
                }
            }
        }
    }

    //ç”»å¸ƒåˆå§‹åŒ–
    var canvasInit = function(){
        canvas = document.createElement('canvas');
        canvas.width = config.width;
        canvas.height = config.height;
        ctx	= canvas.getContext('2d');
    }
    //äºŒç»´ç æ•°æ®åˆå§‹åŒ–
    var qrcodeInit = function(){
        qrcode	= new QRCode(config.typeNumber, config.correctLevel);
        qrcode.addData(config.text);
        qrcode.make();
    }
    //æ£€æµ‹è‰²å—è¾¹ç¼˜
    var edgeTest = function(row, col){
        var len = qrcode.getModuleCount();
        var obj = {
            "l": false,
            "r": false,
            "t": false,
            "b": false,
            "row": row,
            "col": col
        };

        if(col != 0 && qrcode.isDark(row, col-1)){
            obj["l"] = true;
        }
        if(col != len-1 && qrcode.isDark(row, col+1)){
            obj["r"] = true;
        }
        if(row != 0 && qrcode.isDark(row-1, col)){
            obj["t"] = true;
        }
        if(row != len-1 && qrcode.isDark(row+1, col)){
            obj["b"] = true;
        }
        if(row == 8 && col == 6){
            console.log(obj);
        }
        return obj;
    }


    //ç”»å›¾ç‰‡
    var drawImg = function(){
        var img = new Image();
        img.src = config.img.src;
        var imgSize = config.width/2;
        var imgPos = config.width/10*2.5;
        var imgPosFix = config.width/120;

        //å›¾ç‰‡border
        //ctx.strokeStyle = config.img.border || '#fff';
        // ctx.lineWidth   = config.width/40;
        ctx.globalAlpha   = 1;
        ctx.lineCap = "round";
        ctx.lineJoin = "round";

        ctx.beginPath();
        ctx.moveTo(imgPos-imgPosFix, imgPos-imgPosFix);
        ctx.lineTo(imgPos+imgSize+imgPosFix, imgPos-imgPosFix);
        ctx.lineTo(imgPos+imgSize+imgPosFix, imgPos+imgSize+imgPosFix);
        ctx.lineTo(imgPos-imgPosFix, imgPos+imgSize+imgPosFix);
        ctx.lineTo(imgPos-imgPosFix, imgPos-imgPosFix);
        // ctx.stroke();
        ctx.closePath();

        img.onload = function(){
            ctx.drawImage(img,imgPos,imgPos,imgSize,imgSize);
            ctx.beginPath();
        }
    }
    //ç”»å•ç‚¹
    var drawPoint = function(edgeResult, isShadow){
        var shadowColor = Tool.changeRGB(basicConfig.color, -20);
        var pointShadowColor = Tool.changeRGB(basicConfig.pointColor, -20);

        if((edgeResult["l"] || edgeResult["r"] || edgeResult["t"] || edgeResult["b"])){
            if(isShadow){
                ctx.fillStyle = shadowColor;
            }else{
                ctx.strokeStyle = config.color;
                ctx.fillStyle = config.color;
            }

        }else{
            if(isShadow){
                ctx.fillStyle = pointShadowColor;
            }else{
                ctx.strokeStyle = config.pointColor;
                ctx.fillStyle = config.pointColor;
            }

        }
    }
    //ç”»èƒŒæ™¯
    var drawBg = function(){
        ctx.fillStyle = config.background;
        ctx.fillRect(0, 0, config.width, config.height);
    }

    //ç”»äºŒç»´ç 
    var drawCode = function(type, opt, isShadow){
        var row = opt.row;
        var col = opt.col;
        var tileW = opt.tileW;
        var tileH = opt.tileH;
        var w = opt.w;
        var h = opt.h;

        var shadowColor = Tool.changeRGB(basicConfig.color, -20);
        var pointShadowColor = Tool.changeRGB(basicConfig.pointColor, -20);

        if(type == "round"){
            //åœ†è§’
            var isDark = qrcode.isDark(row, col);
            if(isDark){

                var edgeResult = edgeTest(row, col);

                var imgSize = config.width/5;
                var imgPos = config.width/10*4;
                //å›¾ç‰‡border
                if(isShadow){
                    ctx.fillStyle = shadowColor;
                    ctx.strokeStyle = shadowColor;
                }else{
                    ///////////////todoï¼šç¡®è®¤æœ‰æ²¡æœ‰è§†è§‰åå·®
                    var w = (col+1)*tileW - col*tileW;
                    var h = (row+1)*tileW - row*tileW;

                    //å•ç‚¹è®¾å®šé¢œè‰²
                    if(config.pointColor){
                        drawPoint(edgeResult, isShadow);
                    }else{
                        ctx.fillStyle = config.color;
                        ctx.strokeStyle = config.color;
                    }
                }
                ctx.lineWidth   = 2;
                ctx.globalAlpha   = 1;
                ctx.lineCap = "round";
                ctx.lineJoin = "round";
                ctx.beginPath();



                var posX = Math.round(col*tileW);
                var posY = Math.round(row*tileH);
                var r = w/2;


                //console.log(edgeResult);

                if(!edgeResult["l"] && !edgeResult["t"]){
                    //å·¦ä¸Šè§’åœ†è§’
                    ctx.moveTo(posX+r, posY);
                }else{
                    ctx.moveTo(posX, posY);
                }

                if(!edgeResult["r"] && !edgeResult["t"]){
                    //å³ä¸Šè§’åœ†è§’
                    ctx.arcTo(posX+w, posY, posX+w, posY+h, r);
                }else{
                    ctx.lineTo(posX + w, posY);
                }

                if(!edgeResult["r"] && !edgeResult["b"]){
                    //å³ä¸‹è§’åœ†è§’
                    ctx.arcTo(posX+w, posY+h, posX, posY+h, r);
                }else{
                    ctx.lineTo(posX + w, posY + h);
                }

                if(!edgeResult["l"] && !edgeResult["b"]){
                    //å·¦ä¸‹è§’åœ†è§’
                    ctx.arcTo(posX, posY+h, posX, posY, r);
                }else{
                    ctx.lineTo(posX, posY + h);
                }

                if(!edgeResult["l"] && !edgeResult["t"]){
                    //å·¦ä¸Šè§’åœ†è§’
                    ctx.arcTo(posX, posY, posX+w, posY, r);
                }else{
                    ctx.lineTo(posX, posY);
                }



                ctx.stroke();

                ctx.fill();
                ctx.closePath();
            }
        }else{
            //åŸºæœ¬ç±»åž‹
            //å•ç‚¹è®¾å®šé¢œè‰²
            var isDark = qrcode.isDark(row, col);
            if(isDark){


                if(config.pointColor){
                    drawPoint(edgeTest(row, col), isShadow);
                }else{
                    if(isShadow){
                        ctx.fillStyle = shadowColor;
                    }else{
                        ctx.fillStyle = config.color;
                    }
                }
                ctx.fillRect(Math.round(col*tileW),Math.round(row*tileH), w, h);
            }
        }

    }

    //ç”ŸæˆäºŒç»´ç 
    var createCanvas = function(){

        var tileW	= config.width  / qrcode.getModuleCount();
        var tileH	= config.height / qrcode.getModuleCount();

        drawBg();

        //ç»˜åˆ¶é˜´å½±
        if(config.shadow){
            for( var row = 0; row < qrcode.getModuleCount(); row++ ){
                for( var col = 0; col < qrcode.getModuleCount(); col++ ){
                    var w = (Math.ceil((col+1)*tileW) - Math.floor(col*tileW));
                    var h = (Math.ceil((row+1)*tileW) - Math.floor(row*tileW));
                    var shadowW = config.width/150;
                    drawCode(config.type, {
                        row: row,
                        col: col,
                        tileW: tileW,
                        tileH: tileH,
                        w: w+shadowW,
                        h: h+shadowW
                    }, true);
                }
            }
        }
        //åŸºæœ¬
        for( var row = 0; row < qrcode.getModuleCount(); row++ ){
            for( var col = 0; col < qrcode.getModuleCount(); col++ ){
                var w = (Math.ceil((col+1)*tileW) - Math.floor(col*tileW));
                var h = (Math.ceil((row+1)*tileW) - Math.floor(row*tileW));
                drawCode(config.type, {
                    row: row,
                    col: col,
                    tileW: tileW,
                    tileH: tileH,
                    w: w,
                    h: h
                });

            }
        }

        //ç»˜åˆ¶å›¾ç‰‡
        if(config.img){
            drawImg();
        }

        return canvas;

    }

    var init = function(dom, options){
        basicConfig = options;

        if( typeof options === 'string' ){
            config = options = { text: options };
        }else{
            config.text = options.text || "litten";
        }

        config.width = options.size || 150;
        config.height = options.size || 150;
        config.shadow = options.shadow || false;

        canvasInit();

        config.typeNumber = options.typeNumber || -1;
        config.correctLevel = QRErrorCorrectLevel.H;
        config.pointColor = options.pointColor || null;

        config.type = options.type || "base";


        //å›¾ç‰‡
        if(typeof(options.img) == "string"){
            config.img = {
                src: options.img
            }
        }else{
            config.img = options.img
        }
        //èƒŒæ™¯
        if(options.background){
            var type = typeof(options.background);
            if(type == "string"){
                config.background = options.background;
            }else if(type == "object"){
                var linear  = ctx.createLinearGradient(0,0, 0, config.width);
                for(var em in options.background){
                    linear.addColorStop(parseInt(em), options.background[em]);
                }
                config.background = linear;
            }else{
                config.background = "#fff";
            }
        }else{
            config.background = "#fff";
        }
        //å‰æ™¯è‰²
        if(options.color){
            var type = typeof(options.color);
            if(type == "string"){
                config.color = options.color;
            }else if(type == "object"){
                var linear  = ctx.createLinearGradient(0,0, 0, config.width);
                for(var em in options.color){
                    linear.addColorStop(em, options.color[em]);
                }
                config.color = linear;
            }else{
                config.color = "#000";
            }
        }else{
            config.color = "#000";
        }


        qrcodeInit();
        dom.appendChild(createCanvas());
    }

    return {
        init: init,
        config: config
    }
}