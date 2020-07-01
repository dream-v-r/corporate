//--------------------------------------------------------------------------
//
// SITEUP-SYSTEM
//
// COPYRIGHT(C)2004-2009 SUNFIRST.INC ALL RIGHTS RESERVED.
//
// ソフトウェア使用許諾契約
//
// [SITEUP-SYSTEM](以下[本ソフトウェア]と記載)に関する著作権等の知的財産権は、
// サンファースト株式会社(以下[弊社]と記載)に帰属し、
// 日本の著作権法その他関連して適用される法律等によって保護されています。
//
// [本ソフトウェア]は実行ファイルだけでなく、
// ユーザデータやヘルプも含む全ての構成ファイルを表します。
//
// お客様は、ソフトウェア使用許諾契約(以下[契約]と記載)の条項に従って、
// [本ソフトウェア]を日本国内で使用する、非独占的な権利を[契約]に基づき取得します。
//
// [契約]に明示的に許諾されている場合を除いて、
// [本ソフトウェア]の使用、全部又は一部を複製、改変等は出来ません。
// [契約]に明示的に許諾されている、[本ソフトウェア]を複製する場合には、
// [本ソフトウェア]に付されている著作権表示及び、その他の権利表示も同時に複製するものとします。
//
// [本ソフトウェア]及び関連資料に付されている、
// 著作権表示及びその他の権利表示を除去することは出来ません。
//
// [契約]が終了したときは、直ちに[本ソフトウェア]及びその全ての複製物並びに関連資料を
// 破棄するものとします。
//
// [弊社]及び、[本ソフトウェア]を配布する全ての者は、[契約]に同意をしていた場合でも、
// [本ソフトウェア]を個人利用・社内利用・営利目的・非営利目的を問わず、
// 全部又は一部を複製、改変等を行った場合の使用によって生じたあらゆる損害について、
// 如何なる責任も負いません。
// [弊社]及び、[本ソフトウェア]を配布する全ての者は、
// そのような損害が発生する可能性について、事前に知らされていた場合でも同様です。
//
// ※以上はインストールした際に表示される「ソフトウェア使用許諾契約書」を抜粋、追記したものです。
//
//--------------------------------------------------------------------------*/
//common.jsはユーザディレクトリのルート直下に配置します。
//最終更新2010.03.24

if(!navigator.cookieEnabled)alert("クッキーの書き込みができません。ブラウザの設定を変更してくだい。");


//判定方法更新(2010.03.05 Ver1.83)
var ua = navigator.userAgent.toLowerCase();
var isMSIE = (ua.indexOf('msie') != -1) ? true : false;
var isFF = (ua.indexOf('firefox', ua) != -1) ? true : false;
//var isSF = (ua.indexOf('safari', ua) != -1 && ua.indexOf('chrome', ua) == -1) ? true : false;
var isOP = (ua.indexOf('opera') != -1) ? true : false;
var isGC = (ua.indexOf('chrome') != -1) ? true : false;



//////////////////////////////////////////////////
// メディア判別。
//////////////////////////////////////////////////

var FlashPlayer = 1;

if (isMSIE) {

	FlashPlayer = 0;

	FlashPlayer = searchActiveX("ShockwaveFlash.ShockwaveFlash.6");

	if (FlashPlayer <= 0) {

		FlashPlayer = searchActiveX("ShockwaveFlash.ShockwaveFlash.7");

	}

	if (FlashPlayer <= 0) {

		FlashPlayer = searchActiveX("ShockwaveFlash.ShockwaveFlash.8");

	}

} else {

	FlashPlayer = 0;

	if (navigator.plugins) {

		if (navigator.plugins["Shockwave Flash"]) {

			FlashPlayer = navigator.plugins["Shockwave Flash"].description.substring(16, 17)

		}

	}

}

//////////////////////////////////////////////////

//////////////////////////////////////////////////
// メディア判別。(IE用)
//////////////////////////////////////////////////

function searchActiveX(ActiveXName) {

	var result = false;

	if (!window.opera && document.all) {

		document.open();
		document.write('<scr'+'ipt language="VBScript"\>\n');
		document.write('On Error Resume Next\n');
		document.write('Dim ax\n');
		document.write('ax = False\n');
		document.write('ax = (IsObject(CreateObject("'+ActiveXName+'")))\n');
		document.write('<\/scr'+'ipt\>\n');
		document.close();
		result = (ax) ? true : false;

	}

	return result;

}

//////////////////////////////////////////////////

function MM_openBrWindow(theURL,winName,features){
	window.open(theURL,winName,features);
}

function MM_openBrSpecificWindow(theURL,winName,features,width,height){

	var x = (screen.width  - width) / 2;
	var y = (screen.height - height) / 2;
	window.open(theURL,winName,features + ',left='+x+',top='+y);

}

function MM_openBrForm1Window(theURL,winName,features,width,height){

	var x = (screen.width  - width) / 2;
	var y = (screen.height - height) / 2;
	window.open(theURL,winName,features + ',left='+x+',top='+y);

}

function MM_openBrCalendarWindow(obj,theURL,winName,features){

	if(window.createPopup){

		var str               = calendar('0','','');
		infoBox               = window.createPopup();
		thisBody              = infoBox.document.body;
		thisBody.style.border = "1px solid #000000";
		thisBody.innerHTML    = str;
		thisBody.onclick      = fOnclick;
		infoBox.show(obj.style.pixelWidth/2 , obj.style.pixelHeight , 270 , 260 , obj);

	}else{

		var x = (screen.width  - 270) / 2;
		var y = (screen.height - 260) / 2;
		window.open(theURL,winName,features + ',left='+x+',top='+y);

	}

}

function fOnclick(){

	var oSrcElement = infoBox.document.parentWindow.event.srcElement;

	if (oSrcElement.tagName == 'A') {
		var href = oSrcElement.href;
		var last = href.split('\/');
		var date = last[last.length - 1];
		var ym   = date.split(':');
		var str  = calendar('1',ym[0],ym[1]);
		thisBody.innerHTML = str
	} else if (oSrcElement.tagName == 'SPAN') {
		if (oSrcElement.id == 'close') {
			infoBox.hide();
		} else {
			if(oSrcElement.id){
				var str = '配送希望日：' + oSrcElement.id +  unescape("%0D%0A") + '配送希望時間帯：（）';
				document.calendar.delivery_day.value = str;
			}
		}
	}

}

function calendar(mode,yyyy,mm){

	var html = "";
	//////////////////////////////////////////////////
	// 基本データ初期化
	//////////////////////////////////////////////////
	monstr = new Array();
	yostr  = new Array();
	//////////////////////////////////////////////////
	// 基本設定
	//////////////////////////////////////////////////
	var ndstr               = "・";			// 日付なし欄に出す文字
	var dwidth              = 25;			// 日付・曜日欄の幅
	var dheight             = 25;			// 日付・曜日欄の高さ
	var bgcolor             = "#666666";		// 全体の背景色

	var closebgcolor        = "#FF3300";		// 閉じるの背景色

	var yyyymmbgcolor       = "#999999";		// 年月の背景色
	var yyyymmfncolor       = "#FFFFFF";		// 年月の文字色
	var yyyymmfnsize        = "12pt";		// 年月の文字サイズ

	var nichiyoubgcolor     = "#FF9966";		// 日曜の背景色
	var nichiyoufncolor     = "#FFFFFF";		// 日曜の文字色
	var nichiyoufnsize      = "12pt";		// 日曜の文字サイズ

	var doyoubgcolor        = "#DDDDDD";		// 土曜の背景色
	var doyoufncolor        = "#666666";		// 土曜の文字色
	var doyoufnsize         = "12pt";		// 土曜の文字サイズ

	var weekbgcolor         = "#EEEEEE";		// その他曜日の背景色
	var weekfncolor         = "#666666";		// その他曜日の文字色
	var weekfnsize          = "12pt";		// その他曜日の文字サイズ

	var ndnichiyoubgcolor   = "#FFCC99";		// 日付なし欄の背景色（日曜）
	var ndnichiyoufncolor   = "#FFCC99";		// 日付なし欄の文字色（日曜）
	var ndnichiyoufnsize    = "12pt";		// 日付なし欄の文字サイズ（日曜）

	var nddoyoubgcolor      = "#FFFFFF";		// 日付なし欄の背景色（土曜）
	var nddoyoufncolor      = "#FFFFFF";		// 日付なし欄の文字色（土曜）
	var nddoyoufnsize       = "12pt";		// 日付なし欄の文字サイズ（土曜）

	var ndbgcolor           = "#FFFFFF";		// 日付なし欄の背景色（平日）
	var ndfncolor           = "#FFFFFF";		// 日付なし欄の文字色（平日）
	var ndfnsize            = "12pt";		// 日付なし欄の文字サイズ（平日）

	var backnichiyoubgcolor = "#EFEFEF";		// 過去の背景色（日曜・休日）
	var backnichiyoufncolor = "#666666";		// 過去の文字色（日曜・休日）
	var backnichiyoufnsize  = "12pt";		// 過去の文字サイズ（日曜・休日）

	var backdoyoubgcolor    = "#EFEFEF";		// 過去の背景色（土曜）
	var backdoyoufncolor    = "#666666";		// 過去の文字色（土曜）
	var backdoyoufnsize     = "12pt";		// 過去の文字サイズ（土曜）

	var backbgcolor         = "#EFEFEF";		// 過去の背景色（平日）
	var backfncolor         = "#666666";		// 過去の文字色（平日）
	var backfnsize          = "12pt";		// 過去の文字サイズ（平日）

	var tdbgcolor           = "#FFCC33";		// 本日の背景色
	var tdfncolor           = "#FFFFFF";		// 本日の文字色
	var tdfnsize            = "12pt";		// 本日の文字サイズ

	var donichiyoubgcolor   = "#FFCC99";		// 背景色（日曜・休日）
	var donichiyoufncolor   = "#666666";		// 文字色（日曜・休日）
	var donichiyoufnsize    = "12pt";		// 文字サイズ（日曜・休日）

	var dodoyoubgcolor      = "#FFFFFF";		// 背景色（土曜）
	var dodoyoufncolor      = "#666666";		// 文字色（土曜）
	var dodoyoufnsize       = "12pt";		// 文字サイズ（土曜）

	var daybgcolor          = "#FFFFFF";		// 背景色（土曜）
	var dayfncolor          = "#666666";		// 文字色（土曜）
	var dayfnsize           = "12pt";		// 文字サイズ（土曜）
	//////////////////////////////////////////////////
	// 月の表示文字
	//////////////////////////////////////////////////
	monstr[0]  = "1";			// 1月
	monstr[1]  = "2";			// 2月
	monstr[2]  = "3";			// 3月
	monstr[3]  = "4";			// 4月
	monstr[4]  = "5";			// 5月
	monstr[5]  = "6";			// 6月
	monstr[6]  = "7";			// 7月
	monstr[7]  = "8";			// 8月
	monstr[8]  = "9";			// 9月
	monstr[9]  = "10";			// 10月
	monstr[10] = "11";			// 11月
	monstr[11] = "12";			// 12月
	//////////////////////////////////////////////////
	// 曜日の表示文字
	//////////////////////////////////////////////////
	yostr[0] = "日";			// 日曜
	yostr[1] = "月";			// 月曜
	yostr[2] = "火";			// 火曜
	yostr[3] = "水";			// 水曜
	yostr[4] = "木";			// 木曜
	yostr[5] = "金";			// 金曜
	yostr[6] = "土";			// 土曜
	//////////////////////////////////////////////////
	// パラメータセット
	//////////////////////////////////////////////////
	var test      = mode;			// 1:testmode on
	var testyear  = yyyy;			// year for test
	var testmonth = mm;			// month for test
	var testday   = '';			// day for test
	//////////////////////////////////////////////////
	// 本日データ取得
	//////////////////////////////////////////////////
	var nowdate  = new Date();
	var nowyear  = nowdate.getFullYear();
	var nowmonth = nowdate.getMonth() + 1;
	var nowtoday = nowdate.getDate();
	//////////////////////////////////////////////////
	// 最終日セット
	//////////////////////////////////////////////////
	maxday   = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
	//////////////////////////////////////////////////
	// パラメータから日付セット
	//////////////////////////////////////////////////
	var date = new Date();
	if (test == 1) {
		date.setYear(testyear);
		date.setMonth(testmonth);
		date.setDate(testday);
	}
	var year  = date.getFullYear();
	var month = date.getMonth() + 1;
	var today = date.getDate();
	if ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) {
		maxday[1]++;			// 閏年計算
	}
	date.setDate(1);
	var yo1    = date.getDay();
	//////////////////////////////////////////////////
	// 各表示データ初期化
	//////////////////////////////////////////////////
	var flag   = 0;
	var daycnt = 1;
	var moncnt = 0;
	var yasumi, syuku, furi;
	//////////////////////////////////////////////////
	// ページング情報形成
	//////////////////////////////////////////////////
	var lastyyyy = 0;
	var lastmm   = 0;
	var nextyyyy = 0;
	var nextmm   = 0;
	if(monstr[month-1] == '1'){
		lastyyyy = year - 1;
		lastmm   = 12;
		nextyyyy = year;
		nextmm   = parseInt(monstr[month-1]) + 1;
	}else if(monstr[month-1] == '12'){
		lastyyyy = year;
		lastmm   = parseInt(monstr[month-1]) - 1;
		nextyyyy = year + 1;
		nextmm   = 1;
	}else{
		lastyyyy = year;
		lastmm   = parseInt(monstr[month-1]) - 1;
		nextyyyy = year;
		nextmm   = parseInt(monstr[month-1]) + 1;
	}
	//////////////////////////////////////////////////
	// カレンダー形成
	//////////////////////////////////////////////////
	html += '<br>\n';
	html += '<table summary="0" border="0" bgcolor="' + bgcolor + '" cellpadding="1" cellspacing="1" align="center">\n';
	html += '<tr>\n';
	html += '<td align="center" bgcolor="' + yyyymmbgcolor + '" height="' + dheight + '"><b><a href="' + lastyyyy + ':' + lastmm + '" style="color:' + yyyymmfncolor + ';font-size:' + yyyymmfnsize + ';text-decoration:none;">&lt;</a></b></td>\n';
	html += '<td align="center" bgcolor="' + yyyymmbgcolor + '" colspan="4" height="' + dheight + '"><b><span style="color:' + yyyymmfncolor + ';font-size:' + yyyymmfnsize + ';">' + year + '年' + monstr[month-1] + '月</span></b></td>\n';
	html += '<td align="center" bgcolor="' + yyyymmbgcolor + '" height="' + dheight + '"><b><a href="' + nextyyyy + ':' + nextmm + '" style="color:' + yyyymmfncolor + ';font-size:' + yyyymmfnsize + ';text-decoration:none;">&gt;</a></b></td>\n';
	html += '<td align="center" bgcolor="' + closebgcolor + '" width="' + dwidth + '" height="' + dheight + '"><b><span style="color:' + yyyymmfncolor + ';font-size:' + yyyymmfnsize + ';cursor:pointer;" id="close">×</span></b></td>\n';
	html += '</tr>\n';
	//////////////////////////////////////////////////
	// 曜日欄
	//////////////////////////////////////////////////
	html += '<tr>\n';

	for (var yo = 0; yo < 7; yo++) {
		if (yo == 0) {
			html += '<td align="center" bgcolor="' + nichiyoubgcolor + '" width="' + dwidth + '" height="' + dheight + '"><span style="color:' + nichiyoufncolor + ';font-size:' + nichiyoufnsize + ';">' + yostr[yo] + '</span></td>\n';
		} else if (yo == 6) {
			html += '<td align="center" bgcolor="' + doyoubgcolor + '" width="' + dwidth + '" height="' + dheight + '"><span style="color:' + doyoufncolor + ';font-size:' + doyoufnsize + ';">' + yostr[yo] + '</span></td>\n';
		} else {
			html += '<td align="center" bgcolor="' + weekbgcolor + '" width="' + dwidth + '" height="' + dheight + '"><span style="color:' + weekfncolor + ';font-size:' + weekfnsize + ';">' + yostr[yo] + '</span></td>\n';
		}
	}

	html += '</tr>\n';
	//////////////////////////////////////////////////
	// 日付欄
	//////////////////////////////////////////////////
	while (flag < 2) {

		html += '<tr>\n';

		for (var yo = 0; yo < 7; yo++) {

			html += '<td width="' + dwidth + '" height="' + dheight + '" align="center"';

			if (flag == 0 && yo1 == yo) {
				flag = 1;									// 1日
			}

			if (flag == 1) {									// 日付あり

				//////////////////////////////////////////////////
				// 休み・祝日フラグ初期化
				//////////////////////////////////////////////////
				yasumi = 0;
				syuku  = 0;
				//////////////////////////////////////////////////
				// 月曜に関する処理 (Happy Mondayと振替休日)
				//////////////////////////////////////////////////
				if (yo == 1) {
					if (furi == 1) {
						yasumi = 1;
						furi   = 0;
					}
					if (++moncnt == 2) {							// 第2月曜
						if (month == 1)  { syuku = 1; }					// 1月 成人の日
						if (month == 10) { syuku = 1; }					// 10月 体育の日
					}
					if (moncnt == 3) {							// 第3月曜
						if (year >= 2003 && month == 7) { syuku = 1; }			// 7月 海の日 (2003～)
						if (year >= 2003 && month == 9) { syuku = 1; }			// 9月 敬老の日 (2003～)
					}
				}
				//////////////////////////////////////////////////
				// Happy Monday以外の祝日に関する処理
				//////////////////////////////////////////////////
				if (month == 1 && daycnt == 1)  { syuku = 1; }					// 1月 1日 元日
				if (month == 2 && daycnt == 11) { syuku = 1; }					// 2月11日 建国記念の日
				if (month == 3) {
					if (daycnt == Math.floor(20.8431+0.242194*(year-1980))-Math.floor((year-1980)/4)) {
						syuku = 1;							// 春分の日
					}
				}
				if (month == 4 && daycnt == 29) { syuku = 1; }					// 4月29日 みどりの日
				if (month == 5 && daycnt == 3)  { syuku = 1; }					// 5月 3日 憲法記念日
				if (month == 5 && daycnt == 4)  { syuku = 1; }					// 5月 4日 国民の休日
				if (month == 5 && daycnt == 5)  { syuku = 1; }					// 5月 5日 こどもの日
				if (month == 9) {
					if (daycnt == Math.floor(23.2488+0.242194*(year-1980))-Math.floor((year-1980)/4)) {
						syuku = 1;							// 秋分の日
					}
				}
				if (month == 11 && daycnt == 3)  { syuku = 1; }					// 11月 3日 文化の日
				if (month == 11 && daycnt == 23) { syuku = 1; }					// 11月23日 勤労感謝の日
				if (month == 12 && daycnt == 23) { syuku = 1; }					// 12月23日 天皇誕生日
				if (year < 2003 && month == 7 && daycnt == 20) { syuku = 1; }			// 7月20日 海の日 (～2002)
				if (year < 2003 && month == 9 && daycnt == 15) { syuku = 1; }			// 9月15日 敬老の日 (～2002)
				if (syuku == 1) { yasumi = 1; }
				if (yo == 0) {
					yasumi = 1;
					if (syuku == 1) { furi = 1; }
				}
				//////////////////////////////////////////////////
				// 比較変数初期化
				//////////////////////////////////////////////////
				var mm1 = 0;
				if(mm < 10){
					mm1 = "0" + mm;
				}else{
					mm1 = mm;
				}
				var mm2 = 0;
				if(nowmonth < 10){
					mm2 = "0" + nowmonth;
				}else{
					mm2 = nowmonth;
				}
				var day1 = 0;
				if(daycnt < 10){
					day1 = "0" + daycnt;
				}else{
					day1 = daycnt;
				}
				var day2 = 0;
				if(nowtoday < 10){
					day2 = "0" + nowtoday;
				}else{
					day2 = nowtoday;
				}
				var yyyymmdd1 = yyyy    + "" + mm1 + "" + day1;
				var yyyymmdd2 = nowyear + "" + mm2 + "" + day2;
				//////////////////////////////////////////////////
				// 背景色・文字色
				//////////////////////////////////////////////////
				if((test == 0 && daycnt < today) || (test == 1 && parseInt(yyyymmdd1) < parseInt(yyyymmdd2))){

					if (yasumi == 1) {																// 過去(日曜・休日)
						html += 'bgcolor="' + backnichiyoubgcolor + '">';
						html += '<span style="color:' + backnichiyoufncolor + ';font-size:' + backnichiyoufnsize + ';">' + daycnt + '</span>';
					} else {
						if (yo == 6) {																// 過去(土曜)
							html += 'bgcolor="' + backdoyoubgcolor + '">';
							html += '<span style="color:' + backdoyoufncolor + ';font-size:' + backdoyoufnsize + ';">' + daycnt + '</span>';
						} else {																// 過去(平日)
							html += 'bgcolor="' + backbgcolor + '">';
							html += '<span style="color:' + backfncolor + ';font-size:' + backfnsize + ';">' + daycnt + '</span>';
						}
					}

				}else{

					if (yasumi == 1) {
						if ((test == 0 && daycnt == today) || (test == 1 && yyyy == nowyear && mm == nowmonth && daycnt == nowtoday)) {				// 本日
							html += 'bgcolor="' + tdbgcolor + '">';
							html += '<span style="color:' + tdfncolor + ';font-size:' + tdfnsize + ';">' + daycnt + '</span>';
						} else {																// 日曜・休日
							html += 'bgcolor="' + donichiyoubgcolor + '">';
							html += '<span style="color:' + donichiyoufncolor + ';font-size:' + donichiyoufnsize + ';"><span id="' + year + '年' + monstr[month-1] + '月' + daycnt + '日" style="cursor:pointer">' + daycnt + '</span></span>';
						}
					} else {
						if (yo == 6) {
							if ((test == 0 && daycnt == today) || (test == 1 && yyyy == nowyear && mm == nowmonth && daycnt == nowtoday)) {			// 本日
								html += 'bgcolor="' + tdbgcolor + '">';
								html += '<span style="color:' + tdfncolor + ';font-size:' + tdfnsize + ';">' + daycnt + '</span>';
							} else {															// 土曜
								html += 'bgcolor="' + dodoyoubgcolor + '">';
								html += '<span style="color:' + dodoyoufncolor + ';font-size:' + dodoyoufnsize + ';"><span id="' + year + '年' + monstr[month-1] + '月' + daycnt + '日" style="cursor:pointer">' + daycnt + '</span></span>';
							}
						} else {
							if ((test == 0 && daycnt == today) || (test == 1 && yyyy == nowyear && mm == nowmonth && daycnt == nowtoday)) {			// 本日
								html += 'bgcolor="' + tdbgcolor + '">';
								html += '<span style="color:' + tdfncolor + ';font-size:' + tdfnsize + ';">' + daycnt + '</span>';
							} else {
								html += 'bgcolor="' + daybgcolor + '">';
								html += '<span style="color:' + dayfncolor + ';font-size:' + dayfnsize + ';"><span id="' + year + '年' + monstr[month-1] + '月' + daycnt + '日" style="cursor:pointer">' + daycnt + '</span></span>';
							}
						}
					}
				}
				if (++daycnt > maxday[month - 1]) {
					flag = 2;								// 最終日
				}
				//////////////////////////////////////////////////
			} else {										// 日付なし

				if (yo == 0) {

					html += 'bgcolor="' + ndnichiyoubgcolor + '">';
					html += '<span style="color:' + ndnichiyoufncolor + ';font-size:' + ndnichiyoufnsize + ';">' + ndstr + '</span>';

				} else if (yo == 6) {

					html += 'bgcolor="' + nddoyoubgcolor + '">';
					html += '<span style="color:' + nddoyoufncolor + ';font-size:' + nddoyoufnsize + ';">' + ndstr + '</span>';

				} else {

					html += 'bgcolor="' + ndbgcolor + '">';
					html += '<span style="color:' + ndfncolor + ';font-size:' + ndfnsize + ';">' + ndstr + '</span>';

				}

			}
			html += '</td>\n';
		}
		html += '</tr>\n';
	}
	html += '</table>\n';

	return html;

}

function CloseWin(){
	window.close();
}

function MM_goToURL(){ //v3.0
	var i,args = MM_goToURL.arguments;
	document.MM_returnValue = false;
	for(i = 0 ; i < (args.length-1) ; i += 2) eval(args[i]+".location = '"+args[i+1]+"'");
}

function changeButton(type){
	if((document.getElementById('step1')) && (document.getElementById('step2'))){
		if(type == '商品配送確認画面に進む'){
			document.getElementById('step1').style.display = 'block';
			document.getElementById('step2').style.display = 'none';
		}else if(type == '配送先入力画面に進む'){
			document.getElementById('step1').style.display = 'none';
			document.getElementById('step2').style.display = 'block';
		}
	}
	document.user_data.submit.value = type;
}

function changeButtonCheck(){

	var sameData  = user_data.address[0].checked;
	var otherData = user_data.address[1].checked;
	var type      = "";

	if(sameData == true){
		type = "商品配送確認画面に進む";
	}else if(otherData == true){
		type = "配送先入力画面に進む";
	}

	if((document.getElementById('step1')) && (document.getElementById('step2'))){
		if(type == '商品配送確認画面に進む'){
			document.getElementById('step1').style.display = 'block';
			document.getElementById('step2').style.display = 'none';
		}else if(type == '配送先入力画面に進む'){
			document.getElementById('step1').style.display = 'none';
			document.getElementById('step2').style.display = 'block';
		}
	}
	document.user_data.submit.value = type;
}

function changeButtonPayment(type){
	if((document.getElementById('step1')) && (document.getElementById('step2'))){
		if(type == 'ZEUS決済' || type == 'NICOS決済' || type == 'NICOSライト決済'){
			document.getElementById('step1').style.display = 'none';
			document.getElementById('step2').style.display = 'block';
		}else{
			document.getElementById('step1').style.display = 'block';
			document.getElementById('step2').style.display = 'none';
		}
	}
}

function viewButton(){
	document.settlement.go.style.display = 'block'
}

function allReplace(text,sText,rText){

	// 無限ループ。
	while (true) {

		dummy = text;

		// 置換。
		text  = dummy.replace(sText, rText);

		if(text == dummy){
			// 置換しても変化しなければループを抜ける。
			break;
		}

	}

	return text;

}

var plugin = 0;
function checkPlugin(version,swfName,swfWidth,swfHeight){

	var swfTag = '';

	if (FlashPlayer) {

		if (swfWidth.length != 0 && swfHeight.length != 0) {

			swfTag = '<embed src="' + swfName + '" type="application/x-shockwave-flash" width="' + swfWidth + '" height="' + swfHeight + '"></embed><noembed>お使いのブラウザが古いため、再生出来ません。</noembed>';

		} else if (swfWidth.length == 0 && swfHeight.length != 0) {

			swfTag = '<embed src="' + swfName + '" type="application/x-shockwave-flash" height="' + swfHeight + '"></embed><noembed>お使いのブラウザが古いため、再生出来ません。</noembed>';

		} else if (swfWidth.length != 0 && swfHeight.length == 0) {

			swfTag = '<embed src="' + swfName + '" type="application/x-shockwave-flash" width="' + swfWidth + '"></embed><noembed>お使いのブラウザが古いため、再生出来ません。</noembed>';

		} else if (swfWidth.length == 0 && swfHeight.length == 0) {

			swfTag = '<embed src="' + swfName + '" type="application/x-shockwave-flash"></embed><noembed>お使いのブラウザが古いため、再生出来ません。</noembed>';

		}

	} else {

		swfTag = '<font size="-1" color="red">Flashプラグインがないので、<br>再生出来ません。<br><a href="http://www.adobe.com/jp/downloads/" target="Flash">ダウンロード</a></font>';

	}

	document.write(swfTag);

//	plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
//	if(plugin){
//		plugin = parseInt(plugin.description.substring(plugin.description.indexOf(".")-1)) >= 6;
//	}else if(navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0 && (navigator.userAgent.indexOf("Windows 95")>=0 || navigator.userAgent.indexOf("Windows 98")>=0 || navigator.userAgent.indexOf("Windows NT")>=0)){
//		document.write('<scr' + 'ipt language=VBScript'+'> \n');
//		document.write('on error resume next \n');
//		document.write('plugin = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.6")))\n');
//		document.write('if ( plugin <= 0 ) then plugin = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.7")))\n');
//		document.write('if ( plugin <= 0 ) then plugin = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.8")))\n');
//		document.write('if ( plugin <= 0 ) then plugin = ( IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash.9")))\n');
//		document.write('<'+'/scr' + 'ipt'+'> \n');
//	}
//	if(plugin){
//		var swfTag;
//		if(width.length != 0 && height.length != 0){
//			swfTag = '<embed src="'+swfName+'" width='+width+' height='+height+'></embed>';
//		}else if(width.length == 0 && height.length != 0){
//			swfTag = '<embed src="'+swfName+'" height='+height+'></embed>';
//		}else if(width.length != 0 && height.length == 0){
//			swfTag = '<embed src="'+swfName+'" width='+width+'></embed>';
//		}else if(width.length == 0 && height.length == 0){
//			swfTag = '<embed src="'+swfName+'"></embed>';
//		}
//		document.write(swfTag);
//	}else{
//		document.write("<font size=\"-1\" color=\"red\">Flashプラグインが存在しない為、Flashを表示することが出来ません。</font>");
//	}

}

function selectData(name_data,type,cmt9){

	if(isMSIE){

		//////////////////////////////////////////////////
		// 比較変数初期化
		//////////////////////////////////////////////////
		var flg = 0;
		//////////////////////////////////////////////////
		// 商品クッキー取得
		//////////////////////////////////////////////////
		var theData   = "";
		var theName   = "COMMODITY=";
		var theCookie = document.cookie+";";
		var start     = theCookie.indexOf(theName);

		if (start != -1){
			var end = theCookie.indexOf(";",start);
			theData = unescape(theCookie.substring(start+theName.length,end));
		}

		var data = theData.split(",");
		//////////////////////////////////////////////////
		// カテゴリーID
		//////////////////////////////////////////////////
		var category = document.getElementById(name_data).category.value;
		//////////////////////////////////////////////////
		// ページID
		//////////////////////////////////////////////////
		var page = document.getElementById(name_data).page.value;
		//////////////////////////////////////////////////
		// 商品ID
		//////////////////////////////////////////////////
		var id = document.getElementById(name_data).id.value;
		//////////////////////////////////////////////////
		// 選択支1
		//////////////////////////////////////////////////
		// 項目番号
		var data11 = '';
		if(document.getElementById(name_data).unit_price 
		&& document.getElementById(name_data).unit_price.options){
			data11 = document.getElementById(name_data).unit_price.selectedIndex;
		}else if(document.getElementById(name_data).unit_price_data){
			data11 = 0;
		}
		// 項目データ
		var data12 = '';
		if(document.getElementById(name_data).unit_price 
		&& document.getElementById(name_data).unit_price.options){
			data12 = document.getElementById(name_data).unit_price.options[data11].text;
		}else if(document.getElementById(name_data).unit_price_data){
			data12 = document.getElementById(name_data).unit_price_data.value;
		}
		// 項目データを半角スペースで分離
		var data130 = '';
		var data131 = '';
		if(data12.search(/ /i) != -1){
			var data13 = data12.split(" ");
			data130    = data13[0];//金額代入
			data131    = data13[1];
		}else{
			data130 = data12;
		}
		// カンマを削除
		data130  = allReplace(data130,"\,","");
		// 円を削除
		data130  = allReplace(data130,"円","");
		//////////////////////////////////////////////////
		// 選択支2
		//////////////////////////////////////////////////
		// 項目番号
		var data21 = '';
		if(document.getElementById(name_data).other1 
		&& document.getElementById(name_data).other1.options){
			data21 = document.getElementById(name_data).other1.selectedIndex;
		}else if(document.getElementById(name_data).other1_data){
			data21 = 0;
		}
		// 項目データ
		var data22 = '';
		if(document.getElementById(name_data).other1 
		&& document.getElementById(name_data).other1.options){
			data22 = document.getElementById(name_data).other1.options[data21].text;
		}else if(document.getElementById(name_data).other1_data){
			data22 = document.getElementById(name_data).other1_data.value;
		}
		//////////////////////////////////////////////////
		// 選択支3
		//////////////////////////////////////////////////
		// 項目番号
		var data31 = '';
		if(document.getElementById(name_data).other2 
		&& document.getElementById(name_data).other2.options){
			data31 = document.getElementById(name_data).other2.selectedIndex;
		}else if(document.getElementById(name_data).other2_data){
			data31 = 0;
		}
		// 項目データ
		var data32 = '';
		if(document.getElementById(name_data).other2 
		&& document.getElementById(name_data).other2.options){
			data32 = document.getElementById(name_data).other2.options[data31].text;
		}else if(document.getElementById(name_data).other2_data){
			data32 = document.getElementById(name_data).other2_data.value;
		}
		//////////////////////////////////////////////////
		// 在庫数取得
		//////////////////////////////////////////////////
		var param = data130 + ',' + data131 + ',' + data22 + ',' + data32;
		//////////////////////////////////////////////////
		// 在庫数精査
		//////////////////////////////////////////////////
		if(document.getElementById(name_data)(param)){

			//////////////////////////////////////////////////
			// 商品クッキー精査
			// category:page:code:id:unit:unit_price:other1:other2
			//////////////////////////////////////////////////
			var param_data = document.getElementById(name_data)(param).value;

			if(param_data != ''){

				if(param_data <= 0){

					flg = 1;

				}else{

					if((data.length - 1) >= 1){

						data11 = data11 + 1;
						data21 = data21 + 1;
						data31 = data31 + 1;

						if(isNaN(data11)){
							data11 = 0;
						}

						if(isNaN(data21)){
							data21 = 0;
						}

						if(isNaN(data31)){
							data31 = 0;
						}

						for(var i = 0 ; i < data.length - 1 ; i++){

							var temp_data = data[i].split(":");

							if(temp_data[0] == category 
							&& temp_data[1] == page 
							&& temp_data[3] == id 
							&& temp_data[5] == data11 
							&& temp_data[6] == data21 
							&& temp_data[7] == data31){

								if(parseFloat(param_data) <= 0){

									flg = 1;

								}else{

									if(parseFloat(temp_data[4]) >= parseFloat(param_data)){

										flg = 1;

									}

								}

							}

						}

					}

				}

			}
			//////////////////////////////////////////////////
			// ボタン状態変更
			//////////////////////////////////////////////////
			var pageType = document.getElementById(name_data).pageType.value;

			if(pageType == 'shop1'){

				if(document.getElementById(name_data).submit.value){

					if(param_data == ""){

						if(flg == 0){
							var submit_data = document.getElementById(name_data).submit_data.value;
							document.getElementById(name_data).submit.disabled = false;
							document.getElementById(name_data).submit.value    = submit_data;
						}else{
							var zaiko_data = document.getElementById(name_data).zaiko_data.value;
							document.getElementById(name_data).submit.disabled = true;
							document.getElementById(name_data).submit.value    = zaiko_data;
						}

					}else if(param_data == 0){

						var zaiko_data = document.getElementById(name_data).zaiko_data.value;
						document.getElementById(name_data).submit.disabled = true;
						document.getElementById(name_data).submit.value    = zaiko_data;

					}else{

						if(flg == 0){
							var submit_data = document.getElementById(name_data).submit_data.value;
							document.getElementById(name_data).submit.disabled = false;
							document.getElementById(name_data).submit.value    = submit_data;
						}else{
							var zaiko_data = document.getElementById(name_data).zaiko_data.value;
							document.getElementById(name_data).submit.disabled = true;
							document.getElementById(name_data).submit.value    = zaiko_data;
						}

					}

				}

			}else if(pageType == 'shop2'){

				if(document.getElementById('data_submit')){

					if(param_data == ""){

						if(flg == 0){
							var submit_data = document.getElementById(name_data).submit_data.value;
							document.getElementById('data_submit').disabled = false;
							document.getElementById('data_submit').value    = submit_data;
						}else{
							var zaiko_data = document.getElementById(name_data).zaiko_data.value;
							document.getElementById('data_submit').disabled = true;
							document.getElementById('data_submit').value    = zaiko_data;
						}

					}else if(param_data == 0){

						var zaiko_data = document.getElementById(name_data).zaiko_data.value;
						document.getElementById('data_submit').disabled = true;
						document.getElementById('data_submit').value    = zaiko_data;

					}else{

						if(flg == 0){
							var submit_data = document.getElementById(name_data).submit_data.value;
							document.getElementById('data_submit').disabled = false;
							document.getElementById('data_submit').value    = submit_data;
						}else{
							var zaiko_data = document.getElementById(name_data).zaiko_data.value;
							document.getElementById('data_submit').disabled = true;
							document.getElementById('data_submit').value    = zaiko_data;
						}

					}

				}

			}

		}else{

			if(document.getElementById(name_data).pageType){

				var pageType = document.getElementById(name_data).pageType.value;

				if(pageType == 'shop1'){

					if(document.getElementById(name_data).submit.value){
						var submit_data = document.getElementById(name_data).submit_data.value;
						document.getElementById(name_data).submit.disabled = false;
						document.getElementById(name_data).submit.value    = submit_data;
					}

				}else if(pageType == 'shop2'){
					if(document.getElementById('data_submit')){
						var submit_data = document.getElementById(name_data).submit_data.value;
						document.getElementById('data_submit').disabled = false;
						document.getElementById('data_submit').value    = submit_data;
					}
				}

			}

		}
////////////////////////////////////////////////////////////////////////////////////////////////////

//IE以外のブラウザの対応ルーチン  Firefox,Google Chrome,Opera

////////////////////////////////////////////////////////////////////////////////////////////////////
	}else if(isFF || isGC || isOP){

		//////////////////////////////////////////////////
		// 比較変数初期化
		//////////////////////////////////////////////////
		var flg = 0;
		//////////////////////////////////////////////////
		// 商品クッキー取得
		//////////////////////////////////////////////////
		var theData   = "";
		var theName   = "COMMODITY=";
		var theCookie = document.cookie+";";
		var start     = theCookie.indexOf(theName);

		if (start != -1){
			var end = theCookie.indexOf(";",start);
			theData = unescape(theCookie.substring(start+theName.length,end));
		}

		var data = theData.split(",");
		//////////////////////////////////////////////////
		// カテゴリーID
		//////////////////////////////////////////////////
		var category = document.forms[name_data].category.value;
		//////////////////////////////////////////////////
		// ページID
		//////////////////////////////////////////////////
		var page = document.forms[name_data].page.value;
		//////////////////////////////////////////////////
		// 商品ID
		//////////////////////////////////////////////////
		var id = document.forms[name_data].id.value;
		//////////////////////////////////////////////////
		// 選択支1
		//////////////////////////////////////////////////
		// 項目番号
		var data11 = '';
		if(document.forms[name_data].unit_price 
		&& document.forms[name_data].unit_price.options){
			data11 = document.forms[name_data].unit_price.selectedIndex;
		}else if(document.forms[name_data].unit_price_data){
			data11 = 0;
		}
		// 項目データ
		var data12 = '';
		if(document.forms[name_data].unit_price 
		&& document.forms[name_data].unit_price.options){
			data12 = document.forms[name_data].unit_price.options[data11].text;
		}else if(document.forms[name_data].unit_price_data){
			data12 = document.forms[name_data].unit_price_data.value;
		}
		// 項目データを半角スペースで分離
		var data130 = '';
		var data131 = '';
		if(data12.search(/ /i) != -1){
			var data13 = data12.split(" ");
			data130    = data13[0];//金額を代入
			data131    = data13[1];
		}else{
			data130 = data12;
		}
		// カンマを削除
		data130  = allReplace(data130,"\,","");
		// 円を削除
		data130  = allReplace(data130,"円","");
		//////////////////////////////////////////////////
		// 選択支2
		//////////////////////////////////////////////////
		// 項目番号
		var data21 = '';
		if(document.forms[name_data].other1 
		&& document.forms[name_data].other1.options){
			data21 = document.forms[name_data].other1.selectedIndex;
		}else if(document.forms[name_data].other1_data){
			data21 = 0;
		}
		// 項目データ
		var data22 = '';
		if(document.forms[name_data].other1 
		&& document.forms[name_data].other1.options){
			data22 = document.forms[name_data].other1.options[data21].text;
		}else if(document.forms[name_data].other1_data){
			data22 = document.forms[name_data].other1_data.value;
		}
		//////////////////////////////////////////////////
		// 選択支3
		//////////////////////////////////////////////////
		// 項目番号
		var data31 = '';
		if(document.forms[name_data].other2 
		&& document.forms[name_data].other2.options){
			data31 = document.forms[name_data].other2.selectedIndex;
		}else if(document.forms[name_data].other2_data){
			data31 = 0;
		}
		// 項目データ
		var data32 = '';
		if(document.forms[name_data].other2 
		&& document.forms[name_data].other2.options){
			data32 = document.forms[name_data].other2.options[data31].text;
		}else if(document.forms[name_data].other2_data){
			data32 = document.forms[name_data].other2_data.value;
		}
		//////////////////////////////////////////////////
		// 在庫数取得
		//////////////////////////////////////////////////
		var param = data130 + ',' + data131 + ',' + data22 + ',' + data32;
		var temp_prm = param;
		//////////////////////////////////////////////////
		// 在庫数精査
		//////////////////////////////////////////////////
		var hidden_data = '';
		hidden_data = document.forms[name_data];

		var param_flg = 0;

		var param_data = '';

		for (var i = 0 ; i < hidden_data.length ; i++){

			if(hidden_data[i].name == param){

				param_flg = 1;

				param_data = hidden_data[i].value;

			}

		}

		if(param_flg == 1){

			//////////////////////////////////////////////////
			// 商品クッキー精査
			// category:page:code:id:unit:unit_price:other1:other2
			//////////////////////////////////////////////////
			if(param_data != ''){

				if(param_data <= 0){

					flg = 1;

				}else{

					if((data.length - 1) >= 1){

						data11 = data11 + 1;
						data21 = data21 + 1;
						data31 = data31 + 1;

						if(isNaN(data11)){
							data11 = 0;
						}

						if(isNaN(data21)){
							data21 = 0;
						}

						if(isNaN(data31)){
							data31 = 0;
						}

						for(var i = 0 ; i < data.length - 1 ; i++){

							var temp_data = data[i].split(":");

							if(temp_data[0] == category 
							&& temp_data[1] == page 
							&& temp_data[3] == id 
							&& temp_data[5] == data11 
							&& temp_data[6] == data21 
							&& temp_data[7] == data31){

								if(parseFloat(param_data) <= 0){

									flg = 1;

								}else{

									if(parseFloat(temp_data[4]) >= parseFloat(param_data)){

										flg = 1;

									}

								}

							}

						}

					}

				}

			}
			//////////////////////////////////////////////////
			// ボタン状態変更
			//////////////////////////////////////////////////
			var pageType = document.forms[name_data].pageType.value;
			
			var submit_data = '';
			var zaiko_data =  '';

			if(pageType == 'shop1'){

				if(document.forms[name_data].submit.value){

					if(param_data == ""){//データが空なら

						if(flg == 0){//データが空なら
							submit_data = document.forms[name_data].submit_data.value;
							document.forms[name_data].submit.disabled = false; //disableをキャンセルさせる
							document.forms[name_data].submit.value    = submit_data;
						}else{
							zaiko_data = document.forms[name_data].zaiko_data.value;
							document.forms[name_data].submit.disabled = true; //disableをそのまま生かす
							document.forms[name_data].submit.value    = zaiko_data;
						}

					}else if(param_data == 0){//在庫が無ければ

						zaiko_data = document.forms[name_data].zaiko_data.value;
						document.forms[name_data].submit.disabled = true;//disableをそのまま生かす
						document.forms[name_data].submit.value    = zaiko_data;

					}else{//在庫があれば

						if(flg == 0){
							submit_data = document.forms[name_data].submit_data.value;
							document.forms[name_data].submit.disabled = false; //disableをキャンセルさせる
							document.forms[name_data].submit.value    = submit_data;
						}else{
							zaiko_data = document.forms[name_data].zaiko_data.value;
							document.forms[name_data].submit.disabled = true; //disableをそのまま生かす
							document.forms[name_data].submit.value    = zaiko_data;
						}

					}
						flg = 0;
				}

			}else if(pageType == 'shop2'){

				if(document.getElementById('data_submit')){

					if(param_data == ""){

						if(flg == 0){
							submit_data = document.forms[name_data].submit_data.value;
							document.getElementById('data_submit').disabled = false;
							document.getElementById('data_submit').value    = submit_data;
						}else{
							zaiko_data = document.forms[name_data].zaiko_data.value;
							document.getElementById('data_submit').disabled = true;
							document.getElementById('data_submit').value    = zaiko_data;
						}

					}else if(param_data == 0){

						zaiko_data = document.forms[name_data].zaiko_data.value;
						document.getElementById('data_submit').disabled = true;
						document.getElementById('data_submit').value    = zaiko_data;

					}else{

						if(flg == 0){
							submit_data = document.forms[name_data].submit_data.value;
							document.getElementById('data_submit').disabled = false;
							document.getElementById('data_submit').value    = submit_data;
						}else{
							zaiko_data = document.forms[name_data].zaiko_data.value;
							document.getElementById('data_submit').disabled = true;
							document.getElementById('data_submit').value    = zaiko_data;
						}

					}

				}

			}

		}else{

			if(document.forms[name_data].pageType){

				var pageType = document.forms[name_data].pageType.value;
				var submit_data = '';
				var zaiko_data =  '';

				if(pageType == 'shop1'){

					if(document.forms[name_data].submit.value){
						submit_data = document.forms[name_data].submit_data.value;
						document.forms[name_data].submit.disabled = false;
						document.forms[name_data].submit.value    = submit_data;
					}

				}else if(pageType == 'shop2'){
					if(document.getElementById('data_submit')){
						submit_data = document.forms[name_data].submit_data.value;
						document.getElementById('data_submit').disabled = false;
						document.getElementById('data_submit').value    = submit_data;
					}
				}

			}

		}


////////////////////////////////////////////////////////////////////////////////////////////////////
//Safariとその他対象外のブラウザ
////////////////////////////////////////////////////////////////////////////////////////////////////
	}else{

		if(document.getElementById(name_data).pageType){

			var pageType = document.getElementById(name_data).pageType.value;
			var submit_data = '';
			var zaiko_data =  '';

			if(pageType == 'shop1'){

				if(document.getElementById(name_data).submit.value){
					submit_data = document.getElementById(name_data).submit_data.value;
					document.getElementById(name_data).submit.disabled = false;
					document.getElementById(name_data).submit.value    = submit_data;
				}

			}else if(pageType == 'shop2'){
				if(document.getElementById('data_submit')){
					submit_data = document.getElementById(name_data).submit_data.value;
					document.getElementById('data_submit').disabled = false;
					document.getElementById('data_submit').value    = submit_data;
				}
			}

		}

	}

}
////////////////////////////////////////////////////////////////////////////////////////////////////
//ブラウザ別ボタン制御関連ここまで
////////////////////////////////////////////////////////////////////////////////////////////////////
window.onload = init;

function init(){

	var forms_length = document.forms.length;

	for(no = 0 ; no <= forms_length ; no++){

		if(document.forms[no]){

			if((document.forms[no].pageType) && (document.forms[no].cart) && (document.forms[no].submit)){

				var pageType = document.forms[no].pageType.value;
				var cart     = document.forms[no].cart.value;

				if((pageType == 'shop1') && (cart == 'select')){

					selectData(document.forms[no].name,pageType);

				}else if((pageType == 'shop2') && (cart == 'select')){

					selectData('item_1',pageType);

				}

			}

		}

	}

	if(isMSIE){

		if(document.getElementById('page_end') && document.getElementById('page_end').address_go){

			var cName = "COMMODITY="; // 削除するクッキー名
			var dTime = new Date();
			dTime.setYear(dTime.getYear() - 1);
			document.cookie = cName + ";expires=" + dTime.toGMTString();

			var address_go = document.getElementById('page_end').address_go.value;

			if(address_go == 'other'){

				if(document.getElementById('page_end').address_save_go){

					var address_save_go = document.getElementById('page_end').address_save_go.value;

					//配送先を保存しない場合。
					if(address_save_go == ''){

						//クッキーを設定。
						document.cookie = "DELIVERY1=;";

						//クッキーを設定。
						document.cookie = "DELIVERY2=;";

						//クッキーを設定。
						document.cookie = "DELIVERY3=;";

					}else{

						var item1 = 'DELIVERY1';
						var item2 = 'DELIVERY2';
						var item3 = 'DELIVERY3';

						var d        = new Date();
						var previsit = d.toGMTString();
						d.setTime(d.getTime() + 365*24*60*60*1000);
						var expire   = d.toGMTString();

						var arr = document.cookie.split(";");

						for(var i = 0; i < arr.length; i++) {

							var index = arr[i].indexOf("=");

							if(arr[i].substring(0, index) == item1 || arr[i].substring(0, index) == " " + item1){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY1=" + temp + "; expires=" + expire + ";";

							}else if(arr[i].substring(0, index) == item2 || arr[i].substring(0, index) == " " + item2){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY2=" + temp + "; expires=" + expire + ";";

							}else if(arr[i].substring(0, index) == item3 || arr[i].substring(0, index) == " " + item3){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY2=" + temp + "; expires=" + expire + ";";

							}

						}

					}

				}

			}

			if(!window.opener || window.opener.closed){ 

			}else{

				var parent_url = document.parentWindow.location;

				window.opener.location.href = parent_url + '?view=payment_nicos';

			}

		}

	}else if(isFF || isOP || isGC){

		if(document.forms['page_end'] && document.forms['page_end'].address_go){

			var cName = "COMMODITY="; // 削除するクッキー名
			var dTime = new Date();
			dTime.setYear(dTime.getYear() - 1);
			document.cookie = cName + ";expires=" + dTime.toGMTString();

			var address_go = document.forms['page_end'].address_go.value;

			if(address_go == 'other'){

				if(document.forms['page_end'].address_save_go){

					var address_save_go = document.forms['page_end'].address_save_go.value;

					//配送先を保存しない場合。
					if(address_save_go == ''){

						//クッキーを設定。
						document.cookie = "DELIVERY1=;";

						//クッキーを設定。
						document.cookie = "DELIVERY2=;";

						//クッキーを設定。
						document.cookie = "DELIVERY3=;";

					}else{

						var item1 = 'DELIVERY1';
						var item2 = 'DELIVERY2';
						var item3 = 'DELIVERY3';

						var d        = new Date();
						var previsit = d.toGMTString();
						d.setTime(d.getTime() + 365*24*60*60*1000);
						var expire   = d.toGMTString();

						var arr = document.cookie.split(";");

						for(var i = 0; i < arr.length; i++) {

							var index = arr[i].indexOf("=");

							if(arr[i].substring(0, index) == item1 || arr[i].substring(0, index) == " " + item1){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY1=" + temp + "; expires=" + expire + ";";

							}else if(arr[i].substring(0, index) == item2 || arr[i].substring(0, index) == " " + item2){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY2=" + temp + "; expires=" + expire + ";";

							}else if(arr[i].substring(0, index) == item3 || arr[i].substring(0, index) == " " + item3){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY2=" + temp + "; expires=" + expire + ";";

							}

						}

					}

				}

			}

			if(!window.opener || window.opener.closed){ 

			}else{

				var parent_url = parent.location.href;

				window.opener.location.href = parent_url + '?view=payment_nicos';

			}

		}

	}else{

		if(document.getElementById('page_end') && document.getElementById('page_end').address_go){

			var cName = "COMMODITY="; // 削除するクッキー名
			var dTime = new Date();
			dTime.setYear(dTime.getYear() - 1);
			document.cookie = cName + ";expires=" + dTime.toGMTString();

			var address_go = document.getElementById('page_end').address_go.value;

			if(address_go == 'other'){

				if(document.getElementById('page_end').address_save_go){

					var address_save_go = document.getElementById('page_end').address_save_go.value;

					//配送先を保存しない場合。
					if(address_save_go == ''){

						//クッキーを設定。
						document.cookie = "DELIVERY1=;";

						//クッキーを設定。
						document.cookie = "DELIVERY2=;";

						//クッキーを設定。
						document.cookie = "DELIVERY3=;";

					}else{

						var item1 = 'DELIVERY1';
						var item2 = 'DELIVERY2';
						var item3 = 'DELIVERY3';

						var d        = new Date();
						var previsit = d.toGMTString();
						d.setTime(d.getTime() + 365*24*60*60*1000);
						var expire   = d.toGMTString();

						var arr = document.cookie.split(";");

						for(var i = 0; i < arr.length; i++) {

							var index = arr[i].indexOf("=");

							if(arr[i].substring(0, index) == item1 || arr[i].substring(0, index) == " " + item1){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY1=" + temp + "; expires=" + expire + ";";

							}else if(arr[i].substring(0, index) == item2 || arr[i].substring(0, index) == " " + item2){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY2=" + temp + "; expires=" + expire + ";";

							}else if(arr[i].substring(0, index) == item3 || arr[i].substring(0, index) == " " + item3){

								var temp = arr[i].substring(index + 1);

								temp = allReplace(temp,"&quot;","&quot");
								temp = allReplace(temp,"&lt;","&lt");
								temp = allReplace(temp,"&gt;","&gt");
								temp = allReplace(temp,"&#44;","&#44");

								//address_saveが「on」の場合は、日付付きでクッキーを設定。
								document.cookie = "DELIVERY2=" + temp + "; expires=" + expire + ";";

							}

						}

					}

				}

			}

			if(!window.opener || window.opener.closed){ 

			}else{

				var parent_url = document.parentWindow.location;

				window.opener.location.href = parent_url + '?view=payment_nicos';

			}

		}

	}

}
//////////////////////////////////////////////////
// 機能名：HTMLソース貼り付け
// 関数名：AjaxReqExecPost(url,directry)
// タイプ：共通
//////////////////////////////////////////////////
function AjaxReqExecPost(url){

	var html  = '';

	var param = '';

	if(window.location.search){
		param = window.location.search.substring(1);
	}

	var xmlhttp = false;

	try{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}catch(e){
		xmlhttp = false;
	}

	if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp = new XMLHttpRequest();
	}

	if(xmlhttp){

		xmlhttp.open('post',url,true);

		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				html = xmlhttp.responseText;
			}
		}

		var data = "";

		xmlhttp.send(data);

	}

	return html;

}
