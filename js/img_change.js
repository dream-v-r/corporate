						var imgMax  = 3; //セットする画像の枚数。
						var imgRand = Math.floor(Math.random() * imgMax);
						
						if(imgRand == 0){
							   document.write('<a href="http://dream-v.co.jp/pl/"><img src="../img/ads_a.jpg" width=280 height=183></a>');
						}
						else if(imgRand == 1){
							document.write('<a href="http://jobacademy.dream-vision.net/"><img src="../img/ads_b.jpg" width=280 height=183></a>');
						}
						else if(imgRand == 2){
							document.write('<a href="http://www.dream-v.co.jp/agent/"><img src="../img/ads_c.jpg" width=280 height=183></a>');
						}