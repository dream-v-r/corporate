//graph-line.jsはユーザディレクトリのルート直下に配置します。

Point                 = new Array();
Xname                 = new Array();
Baseline              = new Array();
Refline               = new Array();
Style                 = new Array();
Style["GraphX"]       = 500;
Style["GraphY"]       = 150;
Style["GraphBG"]      = "whitesmoke";
Style["GraphColor"]   = "blue";
Style["MarginTop"]    = 30;
Style["MarginBottom"] = 25;
Style["MarginLeft"]   = 60;
Style["MarginRight"]  = 25;
Style["Title"]        = "";
Style["Unit1"]        = "";
Style["Unit2"]        = "";
Style["BaseFS"]       = 12;
Style["TitleFS"]      = "12px";
Style["MarkerSize"]   = 10;
Style["MarkerColor"]  = "";
Style["Pointer"]      = 1;

function PointPush(x,y,m,t){
	var i       = Point.length;
	Point[i]    = new Array();
	Point[i][0] = x;
	Point[i][1] = y;
	Point[i][2] = m;
	Point[i][3] = t;
}
function PointReset(){
	Point.length=0;
}
function XnamePush(x,s){
	var i       = Xname.length;
	Xname[i]    = new Array();
	Xname[i][0] = x;
	Xname[i][1] = s;
}
function XnameReset(){
	Xname.length = 0;
}
function ReflinePush(y,c){
	var i         = Refline.length;
	Refline[i]    = new Array();
	Refline[i][0] = y;
	Refline[i][1] = c;
}
function ReflineReset(){
	Refline.length = 0;
}
function BaselineSet(y,c){
	Baseline[0] = y;
	Baseline[1] = c;
}
function StyleSet(key,value){
	Style[key] = value;
}
function GraphShow(){
	var max;
	var min;
	var dec;
	for(i in Point){
		if(max < Point[i][1] || max == null) max = Point[i][1];
		if(min > Point[i][1] || min == null) min = Point[i][1];
		if((t = ("" + Point[i][1]).indexOf(".")) >= 0){
			t = ("" + Point[i][1]).substr(t + 1);
			t = ("" + t).length;
			if(dec < t || dec == null) dec = t;
		}
	}
	if(dec != null){
		max = null;
		min = null;
		t = Math.pow(10,dec);
		if(Baseline[0] != null) Baseline[0] *= t;
		for(i in Point){
			Point[i][1] *= t;
			if(max < Point[i][1] || max == null) max = Point[i][1];
			if(min > Point[i][1] || min == null) min = Point[i][1];
		}
	}
	if(max - min == 0){
		max++;
		min--;
	}
	if(Baseline[0] == null){
		Baseline[1] = "black";
		if(max >= 0 && min <= 0){
			Baseline[0] = 0;
		}else{
			Baseline[0] = min;
			i = 1;
			while((Math.ceil(min / Math.pow(10,i)) * Math.pow(10,i)) <= max){
				Baseline[0] = Math.ceil(min / Math.pow(10,i)) * Math.pow(10,i);
				i++;
			}
		}
	}
	line = new Array();
	t = ("" + (max - min)).length;
	if(t > 1){
		if(t < 2) t = 2;
		t = Math.pow(10,t - 1);
		if((max - min) / t < 5)  t /= 10;
		if((max - min) / t > 20) t *= 5;
		if((max - min) / t > 10) t *= 2;
	}
	for(i = Baseline[0] ; i <= max ; i += t){
		if(i == Baseline[0]) continue;
		line.push(i);
	}
	for(i = Baseline[0] ; i >= min ; i -= t){
		if(i == Baseline[0]) continue;
		line.push(i);
	}

	s = (Style["GraphY"] - 1) / (max - min);

	document.write("<div style='width:"+(Style["GraphX"]+Style["MarginLeft"]+Style["MarginRight"])+"px;height:"+(Style["GraphY"]+Style["MarginTop"]+Style["MarginBottom"])+"px;position:relative;border:1px solid black;font-size:"+Style["BaseFS"]+"px'>");
	document.write("<div style='width:"+(Style["GraphX"]+Style["MarginLeft"]+Style["MarginRight"])+"px;height:"+Style["MarginTop"]+"px;position:absolute;left:0px;top:0px;text-align:center;padding-top:5px;font-size:"+Style["TitleFS"]+"'>"+Style["Title"]+"</div>");

	y = Style["MarginTop"] - Math.floor(Style["BaseFS"]/2) - Style["BaseFS"] - 1;

	document.write("<div style='width:"+Style["MarginLeft"]+"px;position:absolute;top:"+y+"px;left:0px;text-align:right'>"+Style["Unit1"]+"</div>");

	if(Baseline[0] != null){
		y = Math.floor((max-Baseline[0])*s) + Style["MarginTop"] - Math.floor(Style["BaseFS"] / 2) - 1;
		if(dec == null){
			t = Baseline[0];
		}else{
			t = Baseline[0]/Math.pow(10,dec);
			if(("" + t).indexOf(".") < 0) t = "" + t + ".";
			while((("" + t).substr(("" + t).indexOf(".") + 1)).length < dec){
				t = "" + t + "0";
			}
		}
		document.write("<div style='width:"+(Style["MarginLeft"]-3)+"px;position:absolute;top:"+y+"px;left:0px;text-align:right;color:"+Baseline[1]+"'>"+t+"</div>");
	}
	for(i in line){
		y = Math.floor((max - line[i]) * s) + Style["MarginTop"] - Math.floor(Style["BaseFS"] / 2) - 1;
		if(dec == null){
			t = line[i];
		}else{
			t = line[i] / Math.pow(10,dec);
			if(("" + t).indexOf(".") < 0) t = "" + t + ".";
			while((("" + t).substr(("" + t).indexOf(".") + 1)).length < dec){
				t = "" + t + "0";
			}
		}
		document.write("<div style='width:"+(Style["MarginLeft"]-3)+"px;position:absolute;top:"+y+"px;left:0px;text-align:right'>"+t+"</div>");
	}
	for(i in Xname){
		document.write("<div style='width:50px;position:absolute;top:"+(Style["GraphY"]+Style["MarginTop"]+4)+"px;left:"+(Xname[i][0]+Style["MarginLeft"]-24)+"px;text-align:center'>"+Xname[i][1]+"</div>");
	}
	document.write("<div style='width:50px;position:absolute;top:"+(Style["GraphY"]+Style["MarginTop"]+4)+"px;left:"+(Style["GraphX"]+40)+"px;text-align:center'>"+Style["Unit2"]+"</div>");
	document.write("<div id='Graph' style='width:"+Style["GraphX"]+"px;height:"+Style["GraphY"]+"px;background-color:"+Style["GraphBG"]+";position:absolute;left:"+Style["MarginLeft"]+"px;top:"+Style["MarginTop"]+"px'>");
	document.write("<div id='PointerY' style='width:"+Style["GraphX"]+"px;height:0px;position:absolute;left:0px;top:0px;border-top:1px solid black'></div>");
	document.write("<div id='PointerX' style='width:0px;height:"+Style["GraphY"]+"px;position:absolute;left:0px;top:0px;border-left:1px solid black'></div>");
	document.write("<div style='width:"+Style["GraphX"]+"px;height:0px;position:absolute;left:0px;top:0px;border-top:1px solid black'></div>");
	document.write("<div style='width:"+Style["GraphX"]+"px;height:0px;position:absolute;left:0px;top:"+(Style["GraphY"]-1)+"px;border-top:1px solid black'></div>");
	document.write("<div style='width:0px;height:"+Style["GraphY"]+"px;position:absolute;left:0px;top:0px;border-left:1px solid black'></div>");
	document.write("<div style='width:0px;height:"+Style["GraphY"]+"px;position:absolute;left:"+(Style["GraphX"]-1)+"px;top:0px;border-left:1px solid black'></div>");

	y = Math.round((max - Baseline[0]) * s);

	document.write("<div style='width:"+Style["GraphX"]+"px;height:0px;position:absolute;top:"+y+"px;left:0px;border-top:1px dashed "+Baseline[1]+"'></div>");

	for(i in line){
		y = Math.round((max - line[i]) * s);
		document.write("<div style='width:"+Style["GraphX"]+"px;height:0px;position:absolute;top:"+y+"px;left:0px;border-top:1px dashed black'></div>");
	}
	for(i in Refline){
		y = Math.round((max - Refline[i][0]) * s);
		document.write("<div style='width:"+Style["GraphX"]+"px;height:0px;position:absolute;top:"+y+"px;left:0px;border-top:1px dashed "+Refline[i][1]+"'></div>");
	}

	i = 0;
	y = null;
	for(x = 0 ; x < Style["GraphX"] ; x++){
		if(i == 0 && x < Point[i][0]) continue;
		if(y == null){
			y = Math.round((max - Point[0][1]) * s);
			n = y;
			b = y;
			h = 1;
		}else{
			t = (Point[i][0] - Point[i-1][0]) / (x - Point[i-1][0]);
			h = y - Math.round(b - (b - n) / t);
			if(b > n) y -= h;
			if(h == 0) h = 1;
			h = Math.abs(h);
		}
		document.write("<div style='width:1px;height:0px;position:absolute;top:"+y+"px;left:"+x+"px;border-top:"+h+"px solid "+Style["GraphColor"]+"'></div>");
		if(b < n){
			t = (Point[i][0] - Point[i-1][0]) / (x - Point[i-1][0]);
			h = y - Math.round(b - (b - n) / t);
			y -= h;
		}
		if(x == Point[i][0]){
			b = n;
			i++;
			if(Point[i] == null) break;
			n = Math.round((max - Point[i][1]) * s);
		}
	}
	for(i in Point){
		if(Point[i][2] != 1) continue;
		if(Point[i][3] == null){
			Point[i][3] = Point[i][1];
			if(dec != null){
				Point[i][3] = Point[i][3] / Math.pow(10,dec);
				if(("" + Point[i][3]).indexOf(".") < 0) Point[i][3] = "" + Point[i][3] + ".";
				while((("" + Point[i][3]).substr(("" + Point[i][3]).indexOf(".") + 1)).length < dec){
					Point[i][3] = "" + Point[i][3] + "0";
				}
			}
		}
		document.write("<div title='"+Point[i][3]+"' style='width:"+Style["MarkerSize"]+"px;height:0px;position:absolute;top:"+(Math.round((max-Point[i][1])*s)-Math.floor(Style["MarkerSize"]/2))+"px;left:"+(Point[i][0]-Math.floor(Style["MarkerSize"]/2))+"px;border-top:"+Style["MarkerSize"]+"px solid "+Style["MarkerColor"]+"'></div>");
	}
	document.write("</div>");
	document.write("</div>");
}
