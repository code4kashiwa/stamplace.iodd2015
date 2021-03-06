<!-- サイドメニュー -->
<div id="modal">
	<div id="menu_title">メニュー</div>
  <ul id="nav">
    <li id="nav_menu_map"><a href="#">マップ表示設定</a>
      <ul onload="display: block;">
        <li>
          <div class="nav_title">中心位置</div>
          <div class="nav_detail">
            <div id="map_lat_val"></div>
            <div id="map_lng_val"></div>
          </div>
          <div class="nav_title">メニュー表示</div>
          <div class="nav_detail">
            <div id="map_menu_val"></div>
          </div>
          <div id="spc10"></div>
        </li>
      </ul>
    </li>

    <li><a href="#">フィルター</a>
      <ul>
        <li><input type="checkbox" name="出生前">出生前</li>
        <li><input type="checkbox" name="0才">0才</a></li>
        <li><input type="checkbox" name="1~3才">1~3才</a></li>
        <li><input type="checkbox" name="4~5才">4~5才</a></li>
      </ul>
    </li>


    <li><a href="#">リンク</a>
      <ul>
        <li><a href="http://www.code4kashiwa.org/" target="_blank">Code for KASHIWA</a></li>
        <li><a href="http://www.code-for-nagareyama.org/" target="_blank">Code for NAGAREYAMA</a></li>
	<li><a href="http://www.city.kashiwa.lg.jp/" target="_blank">柏市 Official Website</a></li>
	<li><a href="http://www.city.nagareyama.chiba.jp/" target="_blank">流山市ホームページ</a></li>
	<li><a href="http://odd15.okfn.jp/" target="_blank">Open Data Day｜OKFJ</a></li>
      </ul>
    </li>
  </ul>
</div>

<script src="./js/jquery/jquery.pageslide.min.js"></script>
<script>$(".sidemenu").pageslide();</script>
