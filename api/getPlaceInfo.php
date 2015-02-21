<?php

//require_once(dirname(__FILE__) . "/../module/ApiModule.inc");
//require_once('/home/code4kashiwa/www/stamplace/module/ApiModule.php');
require_once('../module/ApiModule.php');

// デバッグモード
if(DEBUGMODE)
{
	ini_set("display_errors", "On");
	error_reporting(E_ALL);
//	error_reporting(E_WARNING);
}

class getPlaceInfoModule
{
	var $api;
/*
 *  初期処理
 */
	function __construct()
	{
		$this->api = new ApiModule();
		return true;
	}

/*
 *  API制御処理
 */
	function execute()
	{
		$this->api->logWrite(SP_LOG_INFO, "getPlaceInfoModule Start");

		try {
			// DB接続＆API認証
			$this->api->initApi();
			// APIキー認証
			$this->api->isAuthApiKey();
			// 位置リスト取得
			$place = $this->getPlaceSql($this->api->params);
			// ステータス設定
			$result = $this->api->makeSuccessResponse($place);
		}
		catch (BaseModuleException $e)
		{
			$result = $this->api->makeErrorResponse($e->getMessage());
		}

		// レスポンス情報編集
		$this->api->makeResponse($result);

		$this->api->logWrite(SP_LOG_INFO, "getPlaceInfoModule Finish");
	}

/*
 *  位置情報取得SQL文編集
 */
	function getPlaceSql($params = null)
	{
		// 抽出条件の設定
// *** 条件を追加する時は、ここに項目を追加して下さい
		$colArray = array(
//			$params[PLACE_ID]
		);
		// SQL文の編集
		$sqlStr  = "SELECT p.place_id";		// 場所ID
		$sqlStr .= ", p.lat";							// 緯度
		$sqlStr .= ", p.lng";							// 緯度
		$sqlStr .= ", p.place_name";			// 場所の名称
		$sqlStr .= ", p.zip";							// 郵便番号
		$sqlStr .= ", p.address";					// 住所
		$sqlStr .= ", p.tel";							// 電話番号
		$sqlStr .= ", p.status";					// レコードステータス
		$sqlStr .= ", " . $this->api->getViewStatus();	// 表示ステータス
		$sqlStr .= " FROM place p";
		$sqlStr .= " LEFT JOIN place_advance pa ON p.place_id = pa.place_id";
		$sqlStr .= " LEFT OUTER JOIN place_extension pe ON p.place_id = pe.place_id";
		$sqlStr .= " WHERE p.status > 0";
		if(array_key_exists("type0", $params) ) {
			$colArray[] = $params["type0"];
			$sqlStr .= " AND pe.type0 = ?";
		}
		if(array_key_exists("type1", $params) ) {
			$colArray[] = $params["type1"];
			$sqlStr .= " AND pe.type1 = ?";
		}
		if(array_key_exists("type2", $params) ) {
			$colArray[] = $params["type2"];
			$sqlStr .= " AND pe.type2 = ?";
		}
		if(array_key_exists("type3", $params) ) {
			$colArray[] = $params["type3"];
			$sqlStr .= " AND pe.type3 = ?";
		}

		$result = $this->api->getSelectData($sqlStr);

		return $result;
	}

/*
 *  終了処理
 */
	function __destruct() {
		return true;
	}
}

$module = new getPlaceInfoModule();
$module->execute();
header($module->api->apiHeaderInfo);
print $module->api->apiBodyInfo;
?>
